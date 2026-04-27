<?php
require "../config/db.php";

$id = $_POST["id"];
$name = $_POST["name"];
$price = $_POST["price"];
$category = $_POST["category"];
$description = $_POST["description"];

$stmt=$pdo->prepare("UPDATE products SET name=:name, price=:price, category=:category, description=:description WHERE id=:id");
$stmt->bindParam(":name", $name);
$stmt->bindParam(":price", $price);
$stmt->bindParam(":category", $category);
$stmt->bindParam(":description", $description);
$stmt->bindParam(":id", $id);
$stmt->execute();

header("Location: ../index.php");




?>