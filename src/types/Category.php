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

        if ($this->id === null) {
            $stmt = $con->prepare("INSERT INTO categories (categoryid, name, imagepath) VALUES (NULL, ?, ?);");
            $stmt->bind_param("ss", $this->name, $this->image_path);
            $stmt->execute();
            $this->id = $stmt->insert_id;
        } else {
            $stmt = $con->prepare("UPDATE categories SET name = ?, imagepath = ? WHERE categoryid = ?;");
            $stmt->bind_param("ssi", $this->name, $this->image_path, $this->id);
            $stmt->execute();
        }
    }

    public function delete()
    {
        global $con;

        if ($this->id !== null) {
            $stmt = $con->prepare("DELETE FROM categories WHERE categoryid = ?;");
            $stmt->bind_param("i", $this->id);
            $stmt->execute();
            $this->id = null;
        }
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

        $stmt = $con->prepare("SELECT * FROM categories WHERE categoryid = ?;");
        $stmt->bind_param("i", $categoryid);
        $stmt->execute();
        $result = $stmt->get_result();

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
