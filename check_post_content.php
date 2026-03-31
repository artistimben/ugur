<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(Illuminate\Http\Request::capture());

$post = \App\Models\Post::where('slug', 'manevi-bosluk-ve-arayis')->first();
if ($post) {
    echo "Title: " . $post->title . "\n";
    echo "Content Length: " . strlen($post->content) . "\n";
    echo "Content Sample: " . substr($post->content, 0, 500) . "...\n";
    echo "Image: " . $post->image . "\n";
} else {
    echo "Post not found.\n";
}
