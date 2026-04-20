<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use App\Models\Page;
use Illuminate\Database\Eloquent\Model;

class ImportWordPressData extends Command
{
    protected $signature = 'import:wordpress';
    protected $description = 'Imports posts, pages, and categories directly from WordPress tables within the same database.';

    public function handle()
    {
        $this->info("Importing WordPress Data...");

        Model::unguard();

        $this->importCategories();
        $this->importPosts();
        $this->importPages();

        Model::reguard();

        $this->info("Migration completed successfully.");
    }

    private function importCategories()
    {
        $this->info("Importing Categories...");
        $categories = DB::select("
            SELECT t.term_id, t.name, t.slug 
            FROM wpmv_terms t 
            JOIN wpmv_term_taxonomy tt ON t.term_id = tt.term_id 
            WHERE tt.taxonomy = 'category'
        ");

        $count = 0;
        foreach ($categories as $cat) {
            Category::updateOrCreate(
                ['id' => $cat->term_id],
                [
                    'name' => html_entity_decode($cat->name),
                    'slug' => $cat->slug
                ]
            );
            $count++;
        }
        $this->info("Imported $count categories.");
    }

    private function importPosts()
    {
        $this->info("Importing Posts...");
        
        $hasViewsTable = DB::getSchemaBuilder()->hasTable('wpmv_post_views');

        $posts = DB::select("
            SELECT p.ID, p.post_title, p.post_content, p.post_excerpt, p.post_name, p.post_date, p.post_status
            FROM wpmv_posts p
            WHERE p.post_type = 'post' AND p.post_status = 'publish'
        ");

        $count = 0;
        foreach ($posts as $post) {
            $categoryRel = DB::selectOne("
                SELECT tt.term_id 
                FROM wpmv_term_relationships tr
                JOIN wpmv_term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
                WHERE tr.object_id = ? AND tt.taxonomy = 'category'
                LIMIT 1
            ", [$post->ID]);
            
            $categoryId = $categoryRel ? $categoryRel->term_id : (Category::first()->id ?? 1);

            $thumbMeta = DB::selectOne("
                SELECT pm2.meta_value as file_path, p2.guid as full_url
                FROM wpmv_postmeta pm
                JOIN wpmv_posts p2 ON pm.meta_value = p2.ID
                LEFT JOIN wpmv_postmeta pm2 ON pm2.post_id = p2.ID AND pm2.meta_key = '_wp_attached_file'
                WHERE pm.post_id = ? AND pm.meta_key = '_thumbnail_id'
                LIMIT 1
            ", [$post->ID]);

            $imagePath = null;
            if ($thumbMeta) {
                $imagePath = $thumbMeta->full_url; 
            }

            $views = 0;
            if ($hasViewsTable) {
                // Type 0 is usually total views in WP-PostViews
                $viewsResult = DB::selectOne("SELECT SUM(count) as total_views FROM wpmv_post_views WHERE id = ?", [$post->ID]);
                $views = $viewsResult && $viewsResult->total_views ? (int)$viewsResult->total_views : 0;
            }

            $content = preg_replace('/<!-- \/?wp:[^>]+ -->/i', '', $post->post_content);
            $content = str_replace(url('/'), 'https://ugurkantekin.com.tr', $content); // In case they have hardcoded links

            $excerptRaw = $post->post_excerpt ?: Str::limit(strip_tags($content), 150);

            $excerptStr = preg_replace('/<(script|style)[^>]*?>.*?<\/\\1>/si', '', $excerptRaw);
            $excerptStr = strip_tags($excerptStr);
            $excerptStr = preg_replace('/[\r\n\t ]+/', ' ', $excerptStr);
            $excerptStr = trim($excerptStr);

            $excerpt = mb_substr(html_entity_decode($excerptStr), 0, 500);

            Post::updateOrCreate(
                ['id' => $post->ID],
                [
                    'title' => html_entity_decode($post->post_title),
                    'slug' => $post->post_name ?: Str::slug($post->post_title) . '-' . $post->ID,
                    'content' => $content,
                    'excerpt' => $excerpt,
                    'category_id' => $categoryId,
                    'image' => $imagePath,
                    'is_published' => true,
                    'views' => $views,
                    'clicks' => 0,
                    'unique_views' => 0,
                    'created_at' => $post->post_date,
                    'updated_at' => $post->post_date
                ]
            );
            $count++;
        }
        $this->info("Imported $count posts.");
    }

    private function importPages()
    {
        $this->info("Importing Pages...");
        $pages = DB::select("
            SELECT p.ID, p.post_title, p.post_content, p.post_excerpt, p.post_name, p.post_date, p.post_status
            FROM wpmv_posts p
            WHERE p.post_type = 'page' AND p.post_status = 'publish'
        ");

        $count = 0;
        foreach ($pages as $page) {
            $content = preg_replace('/<!-- \/?wp:[^>]+ -->/i', '', $page->post_content);
            
            $thumbMeta = DB::selectOne("
                SELECT p2.guid as full_url
                FROM wpmv_postmeta pm
                JOIN wpmv_posts p2 ON pm.meta_value = p2.ID
                WHERE pm.post_id = ? AND pm.meta_key = '_thumbnail_id'
                LIMIT 1
            ", [$page->ID]);

            $imagePath = $thumbMeta ? $thumbMeta->full_url : null;

            Page::updateOrCreate(
                ['id' => $page->ID],
                [
                    'title' => html_entity_decode($page->post_title),
                    'slug' => $page->post_name ?: Str::slug($page->post_title) . '-' . $page->ID,
                    'content' => $content,
                    'image' => $imagePath,
                    'created_at' => $page->post_date,
                    'updated_at' => $page->post_date
                ]
            );
            $count++;
        }
        $this->info("Imported $count pages.");
    }
}
