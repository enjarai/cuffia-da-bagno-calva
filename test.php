<?php
require 'src/types/Category.php';
require 'src/types/Product.php';
$all = Category::get_all();
foreach ($all as $category) {
    echo "<h1>" . $category->name . "</h1>";
    foreach (Product::get_all_from_category($category) as $product) {
        echo $product->name . "<br>";
    }
}