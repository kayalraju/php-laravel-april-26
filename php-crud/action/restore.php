<?php

require "../config/db.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("UPDATE products SET is_delete = NULL WHERE id=?");
$stmt->execute([$id]);

header("Location: ../index.php");




?>