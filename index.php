<h1>header this</h1>

<?php
$home_page = 'home.php';
include key_exists('path', $_GET) ? $_GET['path'] != "" ? $_GET['path'] : $home_page : $home_page;
