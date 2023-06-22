<?php 
include_once('my admin/AdminDashboard/Managers/GestionProducts.php');

$gestionProducts = new GestionProduct();

$filterValue = $_POST['filterValue'];

$productList = $gestionProducts->searchProducts($filterValue);

// Set the response content type to JSON
header('Content-Type: application/json');

// Return the product list as JSON
echo json_encode($productList);
?>

