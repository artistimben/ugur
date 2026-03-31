<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(Illuminate\Http\Request::capture());

$post = \App\Models\Post::where('title', 'LIKE', '%Manevi Boşluk%')->first();
if ($post) {
    echo "ID: " . $post->id . "\n";
    echo "Title: " . $post->title . "\n";
    echo "Slug: " . $post->slug . "\n";
    echo "Content: " . $post->content . "\n";
} else {
    echo "Post not found by title.\n";
}
