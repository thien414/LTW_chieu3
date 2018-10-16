<?php 
session_start();
	if(isset($_SESSION['search'])){
		unset($_SESSION['search']);
	}
	$_SESSION['search'] = $_GET['key'];
	if ($_SESSION['user'] != 'admin')
	{
	    header('location: search.php');
	}
	else{
		header('location: searchadmin.php');
	}
 ?>