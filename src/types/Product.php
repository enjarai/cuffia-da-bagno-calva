<?php

require ('config/db.php');

class Product
{
    public ?int $id;
    public string $name;
    public ?string $description;
    public float $price;
    public bool $vega;
    private int $categoryid;

    public function __construct($name, $description, $price, $vega, $categoryid, $id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->vega = $vega;
        $this->categoryid = $categoryid;
    }

    public function save()
    {
        global $con;

        if ($this->id === null) {
            $stmt = $con->prepare("INSERT INTO products (productid, name, description, price, vega, categoryid) VALUES (NULL, ?, ?, ?, ?, ?);");
            $stmt->bind_param("ssdbi", $this->name, $this->description, $this->price, $this->vega, $this->categoryid);
            $stmt->execute();
            $this->id = $stmt->insert_id;
        } else {
            $stmt = $con->prepare("UPDATE products SET name = ?, description = ?, price = ?, vega = ?, categoryid = ? WHERE productid = ?;");
            $stmt->bind_param("ssdbii", $this->name, $this->description, $this->price, $this->vega, $this->categoryid, $this->id);
            $stmt->execute();
        }
    }

    public function delete()
    {
        global $con;

        if ($this->id !== null) {
            $stmt = $con->prepare("DELETE FROM products WHERE productid = ?;");
            $stmt->bind_param("i", $this->id);
            $stmt->execute();
            $this->id = null;
        }
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

        $stmt = $con->prepare("SELECT * FROM products WHERE categoryid = ?;");
        $stmt->bind_param("i", $category->id);
        $stmt->execute();
        $result = $stmt->get_result();

        return self::from_result($result);
    }

    private static function from_result($result): array
    {
        $out = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $out[] = new Product($row['name'], $row['description'], $row['price'], $row['vega'], $row['categoryid'], $row['productid']);
        }
        return $out;
    }
}
