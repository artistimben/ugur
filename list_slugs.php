<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(Illuminate\Http\Request::capture());

$posts = \App\Models\Post::take(10)->get();
foreach ($posts as $post) {
    echo $post->slug . " - " . $post->title . "\n";
}
