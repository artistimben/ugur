<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Page;
$pages = Page::all();
foreach ($pages as $p) {
    echo "ID: {$p->id}, Slug: {$p->slug}, Title: {$p->title}\n";
}
