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

    public static function get_all(): array
    {
        global $con;
        $result = mysqli_query($con, "SELECT * FROM categories;");
        return self::from_result($result);
    }

    public static function get_one(int $categoryid): Category
    {
        global $con;
        $result = mysqli_query($con, "SELECT * FROM categories WHERE categoryid = $categoryid;");
        return self::from_result($result)[0];
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
