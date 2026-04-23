<?php
include "../config/db.php";
$name = $_POST['name'];
$price = $_POST['price'];
$category = $_POST['category'];
$desc = $_POST['desc'];


$stmt = $pdo->prepare("INSERT INTO products(name,price,category,desc) VALUES(?,?,?,?)");

$stmt->execute([$name,$price,$category,$desc]);

header("Location: ../index.php");
?>
