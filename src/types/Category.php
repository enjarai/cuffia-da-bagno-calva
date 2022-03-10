<?php

require ('config/db.php');

class Category
{
    public $id;
    public $name;
    public $image_path;

    public function __construct($id, $name, $image_path)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image_path = $image_path;
    }

    static function get_all(): array
    {
        global $con;
        $result = mysqli_query($con, "SELECT * FROM Categories;");
        return self::from_result($result);
    }

    private static function from_result($result): array
    {
        $out = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($out, new Category($row['categoryid'], $row['name'], $row['imagepath']));
        }
        return $out;
    }
}