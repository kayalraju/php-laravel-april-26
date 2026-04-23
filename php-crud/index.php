

<?php 
require "config/db.php";
include "include/header.php";


$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();
$products = $stmt->fetchAll();

?>

<h3>All product</h3>

<a href="create.php" class="btn btn-primary mb-2">Add product</a>

<form method="GET" class="form-inline mb-3">
    <input type="text" name="search" placeholder="Search..." class="form-control mr-2">
    
    <select name="status" class="form-control mr-2">
        <option value="">All</option>
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
    </select>

    <button class="btn btn-info">Filter</button>
</form>

<table class="table table-bordered">
<tr>
    <th>Sl.No</th><th>Name</th><th>Price</th><th>category</th><th>Description</th><th>Action</th>
</tr>


<?php foreach($products as $product): ?>
<tr>
    <td><?= $product['id'] ?></td>
    <td><?= $product['name'] ?></td>
    <td><?= $product['price'] ?></td>
    <td><?= $product['category'] ?></td>
    <td><?= $product['description'] ?></td>
    <td>
        <a href="" class="btn btn-warning btn-sm">Edit</a>
        <a href="action/delete.php?id=<?= $product['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
        <a href="" class="btn btn-info btn-sm">View</a>
    </td>
</tr>
<?php endforeach; ?>

</table>

<?php include "include/footer.php"; ?>