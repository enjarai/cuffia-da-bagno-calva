<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/36dd471165.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="menukaart.css" type="text/css">
<link rel="stylesheet" href="index.css" type="text/css">

<?php
require "src/types/Category.php";
require "src/types/Product.php";

if (isset($_POST["category"])){
    $selectedcategory = (int) $_POST["category"];
//    echo $selectedcategory;
}
else{
    $selectedcategory = -1;
}
global $con;
$query = "select * from products";
$result = mysqli_query($con,$query);

while ($row = mysqli_fetch_assoc($result)) {
    $productid = $row['productid'];
    $name = $row['name'];
    $description = $row['description'];
    $price = $row['price'];
    $vega = $row['vega'];
    $categoryid = $row['categoryid'];
}
?>
<?php
global $con;
$query = "select * from categories";
$result = mysqli_query($con,$query);
while ($row=mysqli_fetch_assoc($result)) {
    $categoryid = $row['categoryid'];
    $name = $row['name'];
}
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
                    $categoryidT = $cat->id;
                    if ($selectedcategory === -1){
                        $selectedcategory = $categoryidT;
                    }
                    if($categoryidT == $selectedcategory){?>
                        <option value="<?php echo $categoryidT; ?>" selected><?php echo  $cat ->name?></option>
                        <?php  } else{ ?>
                    <option value="<?php echo $categoryidT; ?>"><?php echo  $cat ->name ?></option>
                <?php } ?>
/                <?php } ?>
            </select>

                    <a href="editproducts/categoryedit/cat.create.php?=<?php $categories ?>"><i class="fa-solid fa-plus"></i></a>
                    <a href="editproducts/categoryedit/cat.edit.php?CatGetID=<?php echo $selectedcategory ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="editproducts/categoryedit/cat.delete.php?CatDel=<?php echo $selectedcategory ?>"><i class="fa-solid fa-trash"></i></a>
<!--                    --><?php //} ?>
                </form>
            </div>
        </div>
    </div>
    <?php $products = Product::get_all_from_category(Category::get_one($selectedcategory)); ?>
    <table style="width: 100%" class="blue-background">
        <tr>
            <td>Name</td>
            <td>Description</td>
            <td>Price</td>
            <td>Vega</td>
            <td>
                <a href="editproducts/productedit/create.php?=<?php $products ?>"><i class="fa-solid fa-plus plus"></i></a>
            </td>
        </tr>
        <?php
        foreach ($products as $product) {
            ?>
            <tr>
                <td class="cell colum" style="width: 25%"><?php echo $product->name ?></td>
                <td class="cell colum" style=""><?php echo $product->description ?></td>
                <td class="cell colum" style="width: 10%; text-align: right"><?php echo number_format($product->price, 2) ?></td>
                <td class="cell colum" style=""><?php echo $vega?></td>

                <td class="cell colum" style="width: 1px; white-space: nowrap">
                    <dt>
                        <a href="editproducts/productedit/edit.php?GetID=<?php echo $product->id ?>"><i class='fa-solid fa-pen-to-square'></i></a>
                        <a href="editproducts/productedit/delete.php?Del=<?php echo $product->id ?>"><i class='fa-solid fa-trash'></i></a>
                    </dt>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>



<link rel='stylesheet' href='menukaart.css' type='text/css'>
