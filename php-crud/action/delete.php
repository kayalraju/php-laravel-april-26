<?php
include "../config/db.php";

$id = $_GET['id'];


$stmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

header("Location: ../index.php");
?>