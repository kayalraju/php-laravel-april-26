<?= 
include "middleware/authcheck.php";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  

echo "Welcome " ."<b>". $_SESSION['user_name'] ."</b>". " is logged in";    

?>

<h4><a href="logout.php">Logout</a></h4>
</body>
</html>