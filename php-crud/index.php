<?php
require "config/db.php";
include "include/header.php";
include "middleware/auth.php";


$stmt = $pdo->prepare("SELECT * FROM products WHERE is_delete IS NULL");
$stmt->execute();
$products = $stmt->fetchAll();

?>

<div class="container mt-4 w-80">
    <h3>All product</h3>

    <a href="create.php" class="btn btn-primary mb-2">Add product</a>
    <a href="recyclebin.php" class="btn btn-primary mb-2">Recycle Bin</a>

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
            <th>Sl.No</th>
            <th>Name</th>
            <th>Price</th>
            <th>category</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
        </tr>


        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= $product['name'] ?></td>
                <td><?= $product['price'] ?></td>
                <td><?= $product['category'] ?></td>
                <td><?= $product['description'] ?></td>
                <td>
                    <img src="uploads/<?= $product['image'] ?>" width="100" height="100" alt="image">
                </td>
                <td>
                    <a href="edit.php?id=<?= $product['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="action/delete.php?id=<?= $product['id'] ?>" class="btn btn-danger btn-sm"
                    onclick="return confirm('Are you sure?')"
                    >Delete</a>
                    <a href="view.php?id=<?= $product['id'] ?>" class="btn btn-info btn-sm">View</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

</div>
<?php include "include/footer.php"; ?>