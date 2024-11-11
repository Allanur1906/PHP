<?php
require_once("app/models/Product.php");


class ProductController {
    public static function index() {
        $products = Product::getAllProduct();
        
        require_once "app/views/products/index.php";
    }
}