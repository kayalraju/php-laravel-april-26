<?php
include "../config/db.php";

$name = $_POST['name'];
$price = $_POST['price'];
$category = $_POST['category'];
$description = $_POST['description'];
// FILE
$image = $_FILES['image'];

// Image validation
$allowedTypes = ['image/jpeg','image/png','image/jpg'];
if(!in_array($image['type'], $allowedTypes)){
    die("Only JPG, JPEG, PNG allowed");
}

// Unique filename
$filename = time() . "_" . basename($image['name']);
$targetPath = "../uploads/" . $filename;

// Move file
if(!move_uploaded_file($image['tmp_name'], $targetPath)){
    die("Image upload failed");
}




$stmt = $pdo->prepare("INSERT INTO products(name,price,category,description,image) VALUES(?,?,?,?,?)");

$stmt->execute([$name,$price,$category,$description,$filename]);

header("Location: ../index.php");
?>
