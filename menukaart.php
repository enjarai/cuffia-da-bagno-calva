<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/36dd471165.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="menukaart.css" type="text/css">

<?php
require "src/types/Category.php";

$categories = Category::get_all();
foreach ($categories as $category) {

}

require "src/types/Product.php";

$products = Product::get_all();
foreach ($products as $product) {
}

?>



<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="dropdown">
            <select class="dropdownmenu">
                <?php
                $categories = Category::get_all();
                foreach ($categories as $cat) {?>
                    <option value="<?php $cat ->categortid; ?>"><?php echo $cat ->name?></option>
                <?php } ?>
            </select>
                <i class="fa-solid fa-plus"></i>
                <i class="fa-solid fa-pen-to-square"></i>
                <i class="fa-solid fa-trash"></i>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3 colum">
            <?php
            $products = Product::get_all();
            foreach ($products as $prod) {?>
                <dt><?php echo $prod ->name?></dt>
            <?php } ?>
        </div>
        <div class="col colum">
            <?php
            $products = Product::get_all();
            foreach ($products as $prod) {?>
                <dt><?php echo $prod ->description?></dt>
            <?php } ?>
        </div>
        <div class="col-md-auto colum">
            <?php
            $products = Product::get_all();
            foreach ($products as $prod) {?>
                <dt><?php echo $prod ->price?></dt>
            <?php } ?>
        </div>
        <div class="col-md-auto colum">
            <?php
            $products = Product::get_all();
            foreach ($products as $prod) {?>
                <dt><i class="fa-solid fa-pen-to-square"></i>
            <i class="fa-solid fa-trash"></i></dt>
            <?php } ?>
        </div>
    </div>
</div>
