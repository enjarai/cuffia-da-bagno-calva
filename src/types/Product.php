<?php

require ('config/db.php');

class Product
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $vega;
    public $categoryid;

    public function __construct($id, $name, $description, $price, $vega, $categoryid)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->vega = $vega;
        $this->categoryid = $categoryid;
    }

    public function get_category(): Category
    {
        return Category::get_one($this->categoryid);
    }

    static function get_all(): array
    {
        global $con;
        $result = mysqli_query($con, "SELECT * FROM products;");
        return self::from_result($result);
    }

    public static function get_all_from_category(Category $category): array
    {
        global $con;
        $id = $category->id;
        $result = mysqli_query($con, "SELECT * FROM products WHERE categoryid = $id;");
        return self::from_result($result);
    }

    private static function from_result($result): array
    {
        $out = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($out, new Product($row['productid'], $row['name'], $row['description'], $row['price'], $row['vega'], $row['categoryid']));
        }
        return $out;
    }
}
