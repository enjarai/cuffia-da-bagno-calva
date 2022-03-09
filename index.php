<h1>header this</h1>

<?php
$path = $_GET['path'];
include $path ?? 'home.php';

