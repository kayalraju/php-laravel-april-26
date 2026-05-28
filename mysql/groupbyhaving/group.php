

<?php

include "connection.php";


//group by

// $sql = "SELECT department, COUNT(*) AS total_employee, SUM(amount) AS total_salary
//     FROM sales
//     GROUP BY department";
// $sql = "SELECT department, COUNT(*) AS total_employee, COUNT(*) AS total_employee
//     FROM sales
//     GROUP BY department";


//having
$sql = "SELECT department, SUM(amount) AS total_salary
    FROM sales
    GROUP BY department
    HAVING total_salary > 10000";
 

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

<h2 align="center">total employee by department having total </h2>

<table>

    <tr>
     
        
        <th>total employee</th>
        <th>Department</th>
       
    </tr>

    <?php foreach($results as $row): ?>

        <tr>

      

            <td><?= htmlspecialchars($row['total_salary']); ?></td>

            <td><?= htmlspecialchars($row['department']); ?></td>

            
        </tr>

    <?php endforeach; ?>
<!-- <table>

    <tr>
     
        
        <th>total employee</th>
        <th>Department</th>
       
    </tr>

    <?php foreach($results as $row): ?>

        <tr>

      

            <td><?= htmlspecialchars($row['total_employee']); ?></td>

            <td><?= htmlspecialchars($row['department']); ?></td>

            
        </tr>

    <?php endforeach; ?> -->
<!-- <h2 align="center">total sale by department</h2>

<table>

    <tr>
     
        
        <th>total sale</th>
        <th>Department</th>
       
    </tr>

    <?php foreach($results as $row): ?>

        <tr>

      

            <td><?= htmlspecialchars($row['total_salary']); ?></td>

            <td><?= htmlspecialchars($row['department']); ?></td>

            
        </tr>

    <?php endforeach; ?> -->

</table>

</body>
</html>


