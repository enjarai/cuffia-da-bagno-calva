<?php
global $con;
require_once '../../config/db.php';
$query = "select * from categories";
$result = mysqli_query($con,$query);
?>

    <table>
        <tr>
            <td> Category Name</td>

        </tr>

        <?php
        while ($row=mysqli_fetch_assoc($result))
        {
            $categoryid = $row['categoryid'];
            $name = $row['name'];
            ?>

            <tr>
                <td><?php echo $categoryid?></td>
                <td><?php echo $name?></td>
                <td><a href="cat.edit.php?CatGetID=<?php echo $categoryid ?>"> Edit</a> </td>
                <td><a href="cat.delete.php?CatDel=<?php echo $categoryid ?>"> Delete</a> </td>
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