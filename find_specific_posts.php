<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(Illuminate\Http\Request::capture());

use App\Models\Post;

$titles = [
    'BİLGİ VE SEVGİNİN BİRLEŞİMİ; İNSAN KAYNAKLARI',
    'AŞAĞILIK KOMPLEKSİ İNSAN DÖVMEYE VE ÖLDÜRMEYE NEDEN OLUR MU?',
    'BABA YARASIMI? KALP AÇLIĞI MI, KARIN AÇLIĞI MI?',
    'PROBLEM GENÇLERDE Mİ? AİLELERDE Mİ?',
    'ÇEKTİKLERİMİZ HEP KENDİ ELİMİZDEN Mİ?'
];

foreach ($titles as $t) {
    $post = Post::where('title', 'LIKE', '%' . trim($t) . '%')->first();
    if ($post) {
        echo "MATCHED: {$t} => ID: {$post->id} | SLUG: {$post->slug}\n";
    } else {
        echo "NOT FOUND: {$t}\n";
    }
}
