<?php
require __DIR__ . '/../dbcore/rborm.php';

R::setup('mysql:host=localhost;dbname=wptest', 'root', 'toto');
R::freeze(false);

for ($i = 1; $i <= 10000; $i++) {
    $post = R::dispense('post');
    $post->title = 'My holiday';
    $id = R::store($post);
    echo $post->title;
}

// $shop = R::dispense('shop');
// $shop->name = 'Antiques';
// $vase = R::dispense('product');
// $vase->price = 25;
$shop->ownProductList[] = $vase;
R::store($shop);

die();
