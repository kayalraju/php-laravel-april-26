<?php
require "../config/db.php";

$id = $_GET['id'];

//unlink image then delete(this one for permanent delete)
$stmt = $pdo->prepare("SELECT image FROM products WHERE id=?");
$stmt->execute([$id]);
$user = $stmt->fetch();
unlink("../uploads/" . $user['image']);

// Soft delete (not permanent)
$stmt = $pdo->prepare("DELETE FROM products WHERE id=?");
$stmt->execute([$id]);

header("Location: ../index.php");
?>