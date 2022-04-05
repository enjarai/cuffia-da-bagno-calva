<?php
function get_page($home_page): string {
    $path = key_exists('path', $_GET) && $_GET['path'] != "" ? $_GET['path'] : $home_page;
    $array = array_values(array_diff(explode("/", $path), ["..", ".", ""]));
    array_unshift($array, ".");
    return implode("/", $array);
}