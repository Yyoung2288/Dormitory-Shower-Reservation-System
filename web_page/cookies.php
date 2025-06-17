<?php
   define( "FIVE_DAYS", 60 * 60 * 24 * 5 ); // define constant

   setcookie( "studentID", $_POST["studentID"], time() + FIVE_DAYS );
   header('Location: http://localhost/Web期末/room.php');
   exit();
?>
