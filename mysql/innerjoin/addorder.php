<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include "../connection.php";

// get users
$stmt = $pdo->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);


// insert order
if(isset($_POST['user_id']) && isset($_POST['order_item'])){

    $user_id = $_POST['user_id'];
    $order_item = $_POST['order_item'];

    if($user_id != "" && $order_item != ""){

        $sql = "INSERT INTO orders (user_id, order_item)
                VALUES (:user_id, :order_item)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'user_id' => $user_id,
            'order_item' => $order_item
        ]);

        header("Location: list.php");
        exit();
    }
}
?>

<form action="" method="POST">

    <select name="user_id" id="user_id">

        <option value="">select user</option>

        <?php foreach($users as $user){ ?>

            <option value="<?= $user['id'] ?>">
                <?= $user['name'] ?>
            </option>

        <?php } ?>

    </select>

    <input type="text"
           name="order_item"
           id="product"
           placeholder="item name">

    <input type="submit" value="Submit">

</form>

</body>
</html>