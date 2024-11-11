<?php

class Product {
    public static function getAllProduct() {
        global $pdo;

        $sql = "SELECT * 
                FROM products";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}