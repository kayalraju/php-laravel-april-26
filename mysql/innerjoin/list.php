<?php

require "../connection.php";

$sql = "SELECT users.name, users.email, orders.order_item
        FROM users
        INNER JOIN orders
        ON users.id = orders.user_id";

$stmt = $pdo->prepare($sql);

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>INNER JOIN Example</title>
</head>
<body>

<h2>User Orders</h2>

<table border="1" cellpadding="10">

    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>order item</th>
    </tr>

    <?php foreach($results as $row): ?>

    <tr>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['order_item']) ?></td>
    </tr>

    <?php endforeach; ?>

</table>

</body>
</html>