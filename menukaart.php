<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/36dd471165.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="menukaart.css" type="text/css">

<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "pizza";
$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$query = "SELECT * FROM `categories`";
$query2 = "SELECT * FROM `products`";

$result1 = mysqli_query($connect, $query);
$result2 = mysqli_query($connect, $query2);

?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="dropdown">
            <select class="dropdownmenu">
                <?php while ($row1 = mysqli_fetch_array($result1)):;?>
                <option><?php echo $row1[1];?></option>
                <?php endwhile;?>
            </select>
                <i class="fa-solid fa-plus"></i>
                <i class="fa-solid fa-pen-to-square"></i>
                <i class="fa-solid fa-trash"></i>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3 colum">
            <dt>Product naam</dt>

        </div>
        <div class="col colum">
            <dt>Beschrijving van product</dt>
        </div>
        <div class="col-md-auto colum">
            <dt>72.33€</dt>
            <dt>72.33€</dt>
            <dt>72.33€</dt>
            <dt>72.33€</dt>
            <dt>72.33€</dt>
            <dt>72.33€</dt>
        </div>
        <div class="col-md-auto colum">
            <i class="fa-solid fa-pen-to-square"></i>
            <i class="fa-solid fa-trash"></i>
        </div>
    </div>
</div>
