<?php

$category = $_GET['category'];
$vendors = $_GET['vendors'];

$price_min = $_GET['price_min'];
$price_max = $_GET['price_max'];

$search = $_GET['search'];
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");

  // Створення масиву з отриманих даних
  $data = array(
    'category' => $category,
    'vendors' => $vendors,
    'price_min' => $price_min,
    'price_max' => $price_max,
    'search' => $search
  );
  



  $sql = "SELECT * FROM items  
  INNER JOIN category ON category.ID_Category=items.FID_Category 
  INNER JOIN vendors ON vendors.ID_Vendors=items.FID_Vendor
  WHERE price BETWEEN :price_min AND :price_max 
  AND vendors.v_name = :vendors
  AND category.c_name = :category
  ORDER BY ID_Items ASC";
  $stmt = $dbh->prepare($sql);
  
  $stmt->bindParam(':vendors', $vendors);
  $stmt->bindParam(':category', $category);
  $stmt->bindParam(':price_min', $price_min);
  $stmt->bindParam(':price_max', $price_max);
  $stmt->execute();
 

  // Конвертація масиву у формат JSON
  $json_e = json_encode($data);
  echo $json_e;

  
 

  //exit;




?>