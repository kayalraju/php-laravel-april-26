<?php

include 'db.php';

$sql="
SELECT
    employees1.employee_name AS name,
    departments.department_name
FROM employees1
RIGHT JOIN departments
ON employees1.department_id = departments.id;
";
$stmt = $pdo->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($result);
// echo "</pre>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .table-bordered{
            border: 1px solid black;
        }
    </style>
</head>
<body>


<div class="container">
    <h1>list of employees with departments</h1>

        <table class="table table-bordered" border="2">
            <tr>
                <th>Employee Name</th>
                <th>Department Name</th>
            </tr>
            <?php foreach ($result as $employee): ?>
                <tr>
                    <td><?= $employee['name'] ?></td>
                    <td><?= $employee['department_name'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
</div>
    
</body>
</html>