<?php

require "connection.php";

$sql = "
    SELECT 
        users.id,
        users.name,
        users.email,
        posts.title
       
    FROM users
    LEFT JOIN posts
    ON users.id = posts.user_id
    ORDER BY users.id DESC
";

$stmt = $pdo->prepare($sql);

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>LEFT JOIN Example</title>

    <style>

        table{
            width: 80%;
            border-collapse: collapse;
            margin: 30px auto;
        }

        th, td{
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th{
            background: #333;
            color: white;
        }

    </style>

</head>
<body>

<h2 align="center">Users & Posts</h2>

<table>

    <tr>
        <th>ID</th>
        
        <th>Name</th>
        <th>Email</th>
        <th>Post Title</th>
    </tr>

    <?php foreach($results as $row): ?>

        <tr>

            <td><?= $row['id']; ?></td>

            <td><?= htmlspecialchars($row['name']); ?></td>

            <td><?= htmlspecialchars($row['email']); ?></td>

            <td>

                <?php

                    if($row['title']){
                        echo htmlspecialchars($row['title']);
                    }else{
                        echo "No Post Available";
                    }

                ?>

            </td>

        </tr>

    <?php endforeach; ?>

</table>

</body>
</html>