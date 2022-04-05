<?php
global $con;
require_once '../../config/db.php';
$query = "select * from products";
$result = mysqli_query($con,$query);
?>

<table>
    <tr>
        <td> ID</td>
        <td> Name</td>
        <td> Description</td>
        <td> Price</td>
        <td> Vega</td>
        <td> category</td>
        <td> Edit</td>
        <td> Delete</td>

    </tr>

    <?php
    while ($row=mysqli_fetch_assoc($result))
    {
        $productid = $row['productid'];
        $name = $row['name'];
        $description = $row['description'];
        $price = $row['price'];
        $vega = $row['vega'];
        $categoryid = $row['categoryid'];
        ?>

        <tr>
            <td><?php echo $productid?></td>
            <td><?php echo $name?></td>
            <td><?php echo $description?></td>
            <td><?php echo $price?></td>
            <td><?php echo $vega?></td>
            <td><?php echo $categoryid?></td>
            <td><a href="edit.php?GetID=<?php echo $productid ?>"> Edit</a> </td>
            <td><a href="delete.php?Del=<?php echo $productid ?>"> Delete</a> </td>
        </tr>
        <?php
    }
?>


</table>






<?php


$productid =['product_id'];
$name = ['product_name'];
$description = ['product_description'];
$price = ['product_price'];
$vega = ['product_vega'];
$categoryid = ['product_categoryid'];
