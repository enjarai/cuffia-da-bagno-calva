<?php
function check_included($path) {
    if ($path == realpath($_SERVER['SCRIPT_FILENAME'])) {
        header("Location: index.php?path=" . $path);
        die;
    }
}