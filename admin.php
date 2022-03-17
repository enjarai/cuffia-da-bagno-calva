<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="admin.css" type="text/css">
<body>
<div class="navbar">
    <img src="images/logo.png" class="navbarlogo">
    <ul class="nav">
        <li><a href="?path=">Home</a></li>
        <li><a href="?path=menu.php">Menu</a></li>
        <li><a href="?path=contact.php">Contact</a></li>
    </ul>
    <lu class="navbarright">
        <li class="navbarright"><a href="login.php">Login</a></li>
    </lu>
</div>


<?php
$home_page = 'menukaart.php';
require key_exists('path', $_GET) ? $_GET['path'] != "" ? $_GET['path'] : $home_page : $home_page;
?>


</body>