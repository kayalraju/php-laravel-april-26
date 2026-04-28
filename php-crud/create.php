<?php include "include/header.php"; ?>

<h3>Add Product</h3>
<form action="action/insert.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
    <input type="text" name="price" class="form-control mb-2" placeholder="Price" required>
    <input type="text" name="category" class="form-control mb-2" placeholder="Category" required>
    <input type="text" name="description" class="form-control mb-2" placeholder="Description" required>
    
     <input type="file" name="image" class="form-control mb-2" required>

    <button class="btn btn-success">Save</button>
</form>

<?php include "include/footer.php"; ?>