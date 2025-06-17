<html>
   <head>
      <meta charset = "utf-8">
      <title>宿舍洗澡預約系統</title>
     </style>
   </head>
   <body>
<?php   
   foreach ($_COOKIE as $key => $value )
        $ID = $value;
   
           //SELECT * FROM `id` WHERE `StudentID` = 1101509
           //SELECT * FROM `id` WHERE `StudentID` = 1101509
   $query = "SELECT * FROM `id` WHERE `StudentID` = ".$ID;
   //print ("$query");
   if ( !( $database = mysqli_connect( "localhost", "young", "oscar0709" ) ) )
       die( "Could not connect to database </body></html>" );
   if ( !mysqli_select_db($database,"final" ) )
       die( "Could not open products database </body></html>" );
   if ( !( $result = mysqli_query($database, $query) ) )
   {
       print( "<p>Could not execute query!</p>" );
       die( mysqli_error() . "</body></html>" );
   }
   mysqli_close( $database );
   while ( $row = mysqli_fetch_row( $result ) )
   {
      foreach ( $row as $value )
        $InBathroom[] = $value;
   }

   //Inbathroom[0]:學號 Inbathroom[1]:是否有預約
   //print("$InBathroom[0]");
   //print("$InBathroom[1]");

   if($InBathroom[1])
   {
       //有預約
       header('Location: http://localhost/Web期末/Cancel.html');
       exit();
   }
   else
   {
       //沒預約
       header('Location: http://localhost/Web期末/reservation.php');
       exit();
       
   }
?>
    </body>
</html>