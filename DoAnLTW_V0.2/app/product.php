<?php
class product extends db{
	public function addproduct($brand, $name, $detail, $price, $img){
		$sql = "INSERT INTO products(brand, name, details, price, img) VALUES ('$brand', '$name', '$detail', '$price', '$img')";
		$result = self::$conn->query($sql);
		return $result;
	}

	public function deleteproduct($id){
		$sql = "DELETE FROM products WHERE id = $id";
		$result = self::$conn->query($sql);
		return $result;
	}

	public function getProductById($id){
		$sql = "SELECT * FROM products WHERE id = $id";
		$result = self::$conn->query($sql);
		return $this->getData($result);
	}	

	public function editproduct($brand, $name, $detail, $price, $img, $id){
		if($img == NULL){
			$sql = "UPDATE products SET brand = '$brand', name = '$name', price = '$price' WHERE id = $id";
		}
		else{
			$sql = "UPDATE products SET brand = '$brand', name = '$name', price = '$price', img = '$img' WHERE id = $id";
		}
		
		$result = self::$conn->query($sql);
		return $result;
	}
}