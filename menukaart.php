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


if (isset($_POST["category"])){
    $selectedcategory = $_POST["category"];
//    echo $selectedcategory;
}
else{
    $selectedcategory = -1;
}
//echo $selectedcategory;
?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="dropdown">
                <form method="POST" action="">
            <select class="dropdownmenu" name="category" onchange="this.form.submit()">
                <?php
                $categories = Category::get_all();
                foreach ($categories as $cat) {
                    $categoryidT = $cat ->categoryid;
                    if ($selectedcategory == -1){
                        $selectedcategory = $categoryidT;
                    }
                    if($categoryidT == $selectedcategory){?>
                        <option value="<?php echo $categoryidT; ?>" selected><?php echo  $cat ->name?></option>
                        <?php  } else{ ?>
                    <option value="<?php echo $categoryidT; ?>"><?php echo  $cat ->name ?></option>
                <?php }} ?>
            </select>
                    <i class="fa-solid fa-plus"></i>
                    <i class="fa-solid fa-pen-to-square"></i>
                    <i class="fa-solid fa-trash"></i>
                </form>

        </div>
        </div>
    </div>


            <?php
            $products = Product::get_all();

            foreach ($products as $prods) {
                $productcategoryid = $prods->categoryid;
//            echo $categoryidT . $productcategoryid;

                if ($selectedcategory == $productcategoryid) {

                    echo "<div class='row'>";
                    echo "<div class='col-3 colum'>";
                    echo "<dt>" . $prods->name . "</dt>";
                    echo "</div>";
                    echo "<div class='col colum'>";
                    echo "<dt>" . $prods->description . "</dt>";
                    echo "</div>";
                    echo "<div class='col-md-auto colum'>";
                    echo "<dt>" . $prods->price . "</dt>";
                    echo "</div>";
                    echo "<div class='col-md-auto colum'>
                        <i class='fa-solid fa-pen-to-square'></i>
                        <i class='fa-solid fa-trash'></i>
                      </div>";
                    echo "</div>";
                }
            }
            ?>
<!--        </div>-->
<!--        <div class="col colum">-->
<!--            <dt>Beschrijving van product</dt>-->
<!--        </div>-->
<!--        <div class="col-md-auto colum">-->
<!--            <dt>72.33€</dt>-->
<!--            <dt>72.33€</dt>-->
<!--            <dt>72.33€</dt>-->
<!--            <dt>72.33€</dt>-->
<!--            <dt>72.33€</dt>-->
<!--            <dt>72.33€</dt>-->
<!--        </div>-->
<!--    </div>-->
</div>
