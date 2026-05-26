
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
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
if ($name && $email && $phone) {
    $sql = "INSERT INTO users (name, email, phone) VALUES (:name, :email, :phone)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'email' => $email, 'phone' => $phone]);
    echo "User added successfully!";
}


?>
    


    <form action="" method="POST">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="email" placeholder="Last email">
        <input type="text" name="phone" placeholder="phone">
        <button type="submit">Add User</button>
    </form>
</body>
</html>