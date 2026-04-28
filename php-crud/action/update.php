<?php
require "../config/db.php";

$id = $_POST['id'] ?? '';
$name = $_POST['name'] ?? '';
$price = $_POST['price'] ?? '';
$category = $_POST['Category'] ?? '';
$description = $_POST['description'] ?? '';

$image = $_FILES['image'] ?? null;

//old image
$oldImage = $_POST['old_image'] ?? '';

//for validation 
if(empty($id) || empty($name)){
    die("Required fields missing");
}

$uploadPath = "../uploads/";

if($image && $image['name']){

    $filename = time() . "_" . basename($image['name']);
    $target = $uploadPath . $filename;

    if(!move_uploaded_file($image['tmp_name'], $target)){
        die("Image upload failed");
    }

    // delete old image
    if(!empty($oldImage)){
        $oldPath = $uploadPath . $oldImage;

        if(file_exists($oldPath)){
            unlink($oldPath);
        }
    }

} else {
    $filename = $oldImage;
}

$stmt = $pdo->prepare("
    UPDATE products 
    SET name=?, price=?, description=?, category=?, image=? 
    WHERE id=?
");

$stmt->execute([$name,$price,$description,$category,$filename,$id]);

header("Location: ../index.php");
exit;
?>