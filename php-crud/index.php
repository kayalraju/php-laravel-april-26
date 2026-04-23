

<?php 
// require "config/db.php";
 include "include/header.php";

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
    <th>ID</th><th>Name</th><th>Email</th><th>Status</th><th>Action</th>
</tr>
<tr>
    <td>1</td>
    <td>John Doe</td>
    <td>9i9w8@example.com</td>
    <td>Active</td>
</tr>

<!-- <?php foreach($users as $u): ?>
<tr>
    <td><?= $u['id'] ?></td>
    <td><?= $u['name'] ?></td>
    <td><?= $u['email'] ?></td>
    <td><?= $u['status'] ?></td>
    <td>
        <a href="edit.php?id=<?= $u['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="actions/delete.php?id=<?= $u['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
        <a href="view.php?id=<?= $u['id'] ?>" class="btn btn-info btn-sm">View</a>
    </td>
</tr>
<?php endforeach; ?> -->

</table>

<?php include "include/footer.php"; ?>