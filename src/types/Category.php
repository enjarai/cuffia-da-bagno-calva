<?php

require ('config/db.php');

class Category
{
    public ?int $id;
    public string $name;
    public ?string $image_path;

    public function __construct($name, $image_path, $id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image_path = $image_path;
    }

    public function save()
    {
        global $con;
        $name = $con->escape_string($this->name);
        $image_path = $con->escape_string($this->image_path);

        if ($this->id === null) {
            $con->query("INSERT INTO categories (categoryid, name, imagepath) VALUES (NULL, $name, $image_path);");
            $this->id = $con->insert_id;
        } else {
            $id = $con->escape_string($this->id);

            $con->query("UPDATE categories SET name = $name, imagepath = $image_path WHERE categoryid = $id;");
        }
    }

    public function delete()
    {
        global $con;
        $id = $con->escape_string($this->id);

        $con->query("DELETE FROM categories WHERE categoryid = $id;");
        $this->id = null;
    }

    public static function get_all(): array
    {
        global $con;
        $result = $con->query("SELECT * FROM categories;");
        return self::from_result($result);
    }

    public static function get_one(int $categoryid): Category
    {
        global $con;
        $result = $con->query("SELECT * FROM categories WHERE categoryid = $categoryid;");
        return self::from_result($result)[0];
    }

    private static function from_result($result): array
    {
        $out = [];
        while ($row = $result->fetch_assoc()) {
            $out[] = new Category($row['name'], $row['imagepath'], $row['categoryid']);
        }
        return $out;
    }
}
