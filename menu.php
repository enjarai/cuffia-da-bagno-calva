<?php
include("src/check_included.php");
check_included(__FILE__);
?>

<?php
require "src/types/Category.php";
require "src/types/Product.php";
?>

<link rel='stylesheet' href='menu.css' type='text/css'>

<body onresize="onResizeMenu()">

<figure class='menu-text text-center align-text-center'>
    <h3>Menukaart</h3>
</figure>

<div class="container">
    <div class="row align-items-top">
        <?php
        $result = Category::get_all();
        $cols = array_chunk($result, ceil(sizeof($result) / 2));
        for ($i = 0; $i < sizeof($cols); $i++) {
            $col = $cols[$i];
            echo "<div class='blue-background menu-column col' id='col-num-$i'>";
            foreach ($col as $cat) {
                $name = $cat->name;
                $image_path = $cat->image_path;
                $image = $image_path != null ? "<div class='category-image' style='background-image: url(images/dynamic/$image_path)'></div>" : "";
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

<script>
    const mergeSize = 620;
    const colsAmount = <?php echo sizeof($cols) ?>;
    let lastSize = 0;

    function getCols() {
        let cols = [];
        for (let i = 0; i < colsAmount; i++) {
            cols.push(document.getElementById("col-num-" + i));
        }
        return cols;
    }

    function onResizeMenu() {
        let currentSize = window.innerWidth;
        if (lastSize > mergeSize && currentSize < mergeSize) {
            getCols().forEach((value, index, array) => {
                if (index !== 0) {
                    array[0].body += value.body;
                    value.body = null;
                }
            });
        }
        lastSize = currentSize
    }
</script>