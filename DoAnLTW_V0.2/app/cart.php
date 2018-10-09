<?php
require "db.php";

class Cart extends db{
    
    public function getProduct($id)
    {
        $sql = "SELECT * FROM products WHERE products.id = '$id'";
        $result = self::$conn->query($sql);
        return self:: getData($result);
    }
}