<?php
$c = new \App\Models\Category();
$c->name = 'Genel';
$c->slug = 'genel';
$c->save();

$p = new \App\Models\Post();
$p->category_id = $c->id;
$p->title = 'Laravel Bloguma Hoşgeldiniz!';
$p->slug = 'laravel-bloguma-hosgeldiniz';
$p->content = 'Bu benim ilk blog yazım. Laravel ile harika şeyler yapacağız! Uğur Kantekin Blog yayında.';
$p->save();
