<?php
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$detail = $_POST['description'];
$brand = $_POST['brand'];
if (isset($_FILES)) {
	$img = $_FILES['fileUpload']['name'];
}
else
{
	$img = NULL;
}
spl_autoload_register(function ($class_name){
    require "app/" .$class_name . ".php";
});
$product = new product();
$product->editproduct($brand, $name, $detail, $price, $img, $id);
header('location:admin.php');
?>