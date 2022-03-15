<?php
require "src/types/Category.php";
require "src/types/Product.php";
?>

<link rel='stylesheet' href='menu.css' type='text/css'>

<figure class='menu-text text-center align-text-center'>
    <h3>Menukaart</h3>
</figure>

<div class="container">
    <div class="row align-items-top">
        <?php
        $result = Category::get_all();
        $cols = array_chunk($result, ceil(sizeof($result) / 2));
        foreach ($cols as $col) {
            echo "<div class='blue-background menu-column col'>";
            foreach ($col as $cat) {
                $name = $cat->name;
                $image_path = $cat->image_path;
                $image = $image_path != null ? "<div class='category-image' style='background-image: url(/images/dynamic/$image_path)'></div>" : "";
                echo "
                    <figure class='category-name'>
                        $image
                        <h5>$name</h5>
                        <hr class='category-hr'>
                    </figure>
                ";
                $prods = Product::get_all_from_category($cat);
                echo "<dl class='category-content row'>";
                foreach ($prods as $prod) {
                    $prod_name = $prod->name;
                    $price = number_format($prod->price, 2);
                    $description = $prod->description;
                    echo "
                        <dt class='product product-name col-sm-10'>$prod_name</dt>
                        <dd class='product product-price col-sm-2 text-end'>$price</dd>
                        <dd class='product product-description col-sm-12'>$description</dd>
                    ";
                }
                echo "</dl>";
            }
            echo "</div>";
        }
        ?>
    </div>
</div>