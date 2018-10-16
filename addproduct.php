<?php
$brand = $_POST['brand'];
$name = $_POST['name'];
$price = $_POST['price'];
$detail = $_POST['description'];
$img = $_FILES['fileUpload']['name'];
spl_autoload_register(function ($class_name){
    require "app/" .$class_name . ".php";
});
$product = new product();

$target_dir = "./public/img/";
$target_img = $target_dir . basename($_FILES['fileUpload']["name"]);

if(move_uploaded_file($_FILES['fileUpload']["tmp_name"], $target_img)){
	$product->addproduct($brand, $name, $detail, $price, $img);
	header('location:index.php');
}else{
	header('location:addnewproduct.php');
}





?>