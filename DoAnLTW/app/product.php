<?php
class product extends db{
	public function addproduct($brand, $name, $price, $img){
		$sql = "INSERT INTO products(brand, name, price, img) VALUES ('$brand', '$name', '$price', '$img')";
		var_dump($sql);
		$result = self::$conn->query($sql);
		return $result;
	}

	public function deleteproduct($id){
		$sql = "DELETE FROM products WHERE id = $id";
		var_dump($sql);
		$result = self::$conn->query($sql);
		return $result;
	}

	public function getProductById($id){
		$sql = "SELECT * FROM products WHERE id = $id";
		$result = self::$conn->query($sql);
		return $this->getData($result);
	}	

	public function editproduct($brand, $name, $price, $img, $id){
		$sql = "UPDATE products SET brand = '$brand', name = '$name', price = '$price', img = '$img' WHERE id = $id";
		var_dump($sql);
		$result = self::$conn->query($sql);
		return $result;
	}
}