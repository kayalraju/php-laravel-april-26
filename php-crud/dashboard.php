<?php

 include "include/header.php"; 
 
 include "middleware/auth.php";

 ?>

<div class="container mt-4 w-50">
   
<?php

echo "Welcome " ."<b>". $_SESSION['user_name'] ."</b>". " is logged in";


?>
   
</div>




<?php include "include/footer.php"; ?>