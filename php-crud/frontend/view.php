

<?php 
require "config/db.php";
include "include/header.php";


$stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$stmt->bindParam(":id", $_GET["id"]);
$stmt->execute();
$product = $stmt->fetch();;

?>

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product Details</h3>
                </div>
                <div class="card-body">
                    <p><b>Name:</b> <?php echo $product["name"]; ?></p>
                    <p><b>Price:</b> <?php echo $product["price"]; ?></p>
                    <p><b>Category:</b> <?php echo $product["category"]; ?></p>
                    <p><b>Description:</b> <?php echo $product["description"]; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "include/footer.php"; ?>