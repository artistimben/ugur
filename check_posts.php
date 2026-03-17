<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(Illuminate\Http\Request::capture());

use App\Models\Post;

$titles = [
    'BİLİNÇALTINI YÖNETMEK',
    'BİLİNÇALTI',
    'SEVGİ… BİLDİĞİMİZ GİBİ Mİ?',
    'AŞAĞILIK KOMPLEKSİ İNSAN DÖVMEYE VE ÖLDÜRMEYE NEDEN OLUR MU?'
];

foreach ($titles as $t) {
    $p = Post::where('title', 'LIKE', '%' . $t . '%')->first();
    if ($p) {
        echo "FOUND: ID: {$p->id} | TITLE: {$p->title}\n";
    } else {
        echo "NOT FOUND: {$t}\n";
    }
}
