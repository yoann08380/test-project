<?php

/**
 * Récupérer l'ensemble des produits en base
 * 
 * @param PDO $pdo Connexion à la base de données
 * @return Array Tableau de produits
 */
function getAllProducts($pdo) {
    $stmt = $pdo->prepare('SELECT id, name, description, price FROM products');
    $stmt->execute();
    return $stmt->fetchAll();
}
