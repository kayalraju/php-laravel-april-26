<?php include "include/header.php"; ?>
<?php
include "config/db.php";

//$id=$_GET["id"];
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$stmt->bindParam(":id", $_GET["id"]);
$stmt->execute();
$product = $stmt->fetch();

?>

<h3>Update Product</h3>
<form action="action/update.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $product["id"]; ?>">
    <input type="hidden" name="old_image" value="<?php echo $product["image"]; ?>">


    <input type="text" name="name" class="form-control mb-2" placeholder="Name" value="<?php echo $product["name"]; ?>" required>
    <input type="text" name="price" class="form-control mb-2" placeholder="Price" value="<?php echo $product["price"]; ?>" required>
    <input type="text" name="category" class="form-control mb-2" placeholder="Category" value="<?php echo $product["category"]; ?>" required>
    <input type="text" name="description" class="form-control mb-2" value="<?php echo $product["description"]; ?>" placeholder="Description" required>
 <input type="file" name="image" class="form-control mb-2" required>
    <button class="btn btn-success">Update</button>
</form>

<?php include "include/footer.php"; ?>