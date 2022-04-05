<?php
function check_included($path) {
    if ($path == realpath($_SERVER['SCRIPT_FILENAME'])) {
        $array = explode("/", $path);
        header("Location: index.php?path=" . end($array));
        die;
    }
}