<?php

session_start();

require_once 'inc/functions.php';
require_once 'inc/connect.php';


$products = getAllProducts($pdo);

// Si on a reçu un id de produit dans $_GET['add-product'], on l'ajoute dans le tableau de session $_SESSION['cart']
// Soit $_SESSION['cart'][] = $_GET['add-product']


print_r($_SESSION);

?><!DOCTYPE HTML>
<html lang="fr">
<head>
    <title>Shop</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="main">
    <section id="shop">
        <?php foreach($products as $product) : ?>
            <article class="product">
                <header><strong><?php echo $product['name'] ?></strong></header>
                <span class="description"><?php echo $product['description'] ?></span>
                <div class="price"><?php echo $product['price'] ?> €</div>
                <?php if(isset($_SESSION['cart']) && in_array($product['id'], $_SESSION['cart'])) : ?>
                    <div class="cart-btn remove-cart">
                        <a href="?remove-product=<?php echo $product['id'] ?>">Retirer du panier</a>
                    </div>
                <?php else : ?>
                    <div class="cart-btn add-cart">
                        <a href="?add-product=<?php echo $product['id'] ?>">Ajouter au panier</a>
                    </div>
                <?php endif ?>
            </article>
        <?php endforeach ?>

        <div id="nb-products">
            <div id="products-big-nb"><?php if(isset($_SESSION['cart'])) echo count($_SESSION['cart']) ?></div>
            <div id="products-label">produits</div>
            <div id="go-cart"><a href="cart.php">Panier</a></div>
        </div>
    </section>
</div>
</body>
</html>

