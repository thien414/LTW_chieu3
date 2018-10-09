<?php
    require "db.php";
    class search extends db{
        public function searchProduct($keyword, $page, $per_page){
            $first_link = ($page - 1) * $per_page;
            $sql = "SELECT * FROM products WHERE products.brand LIKE '%".$keyword."%' OR products.name LIKE '%".$keyword."%' ORDER BY price DESC LIMIT $first_link, $per_page";
            $result = self::$conn->query($sql);
            return self:: getData($result);
        }
        
        public function countSearched($keyword){
            $sql = "SELECT * FROM products WHERE products.brand LIKE '%".$keyword."%' OR products.name LIKE '%".$keyword."%'";
            $result = self::$conn->query($sql);
            return $result->num_rows;
        }
    }