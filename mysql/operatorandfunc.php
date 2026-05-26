<?php
include "connection.php";


//select all data
// $stmt = $pdo->prepare("SELECT * FROM employees");
// $stmt->execute();
// $employees = $stmt->fetchAll();

//or operator
// $stmt = $pdo->prepare("SELECT * FROM employees WHERE department = 'IT' OR department = 'HR'");
// $stmt->execute();
// $employees = $stmt->fetchAll();


//and operator
// $stmt = $pdo->prepare("SELECT * FROM employees WHERE department = 'Reactjs' AND salary > 35000");
// $stmt->execute();
// $employees = $stmt->fetchAll();

//not operator
// $stmt = $pdo->prepare("SELECT * FROM employees WHERE NOT department = 'HR'");
// $stmt->execute();
// $employees = $stmt->fetchAll();

//min function
// $stmt = $pdo->prepare("SELECT MIN(salary) AS minimum_salary FROM employees");
// $stmt->execute();
// $employees = $stmt->fetch();

//max function
// $stmt = $pdo->prepare("SELECT MAX(salary) AS maximum_salary FROM employees");
// $stmt->execute();
// $employees = $stmt->fetch();

//sum function
// $stmt = $pdo->prepare("SELECT SUM(salary) AS total_salary FROM employees");
// $stmt->execute();
// $employees = $stmt->fetch();

//avg function
// $stmt = $pdo->prepare("SELECT AVG(salary) AS average_salary FROM employees");
// $stmt->execute();
// $employees = $stmt->fetch();

//limit
// $stmt = $pdo->prepare("SELECT * FROM employees LIMIT 2");
// $stmt->execute();
// $employees = $stmt->fetchAll();

//like
$stmt = $pdo->prepare("SELECT * FROM employees WHERE name LIKE '%r%'");
$stmt->execute();
$employees = $stmt->fetchAll();


echo "<pre>";
print_r($employees);
echo "</pre>";



?>