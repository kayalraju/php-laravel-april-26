<?php

include 'connection.php';


$sql="
SELECT

    students.id,
    students.name,
    students.email,
    courses.course_name,
    courses.course_fee,
    student_courses.enrollment_date
FROM students
LEFT JOIN student_courses
ON students.id = student_courses.student_id
LEFT JOIN courses
ON student_courses.course_id = courses.id
ORDER BY students.id DESC
";

$stmt=$pdo->prepare($sql);

$stmt->execute();

$results=$stmt->fetchAll(PDO::FETCH_ASSOC);



echo "<pre>";
print_r($results);
echo "</pre>";



?>