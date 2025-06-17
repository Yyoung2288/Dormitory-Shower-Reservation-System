<?php
   foreach ($_COOKIE as $key => $value )
   $ID = $value;
   /*-------------撈學生預約資料------------------*/
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

   $floor = $InBathroom[2];
   $area = $InBathroom[3];
   $number = $InBathroom[4];
   /*-------------撈學生預約資料------------------*/

   /*------------------撈學生指定的浴室-------------------------*/
   $query = "SELECT * FROM `floor".$floor.$area."` WHERE `number` = ".$number;
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
        $room[] = $value;
   }

   $reservation = $room[2];
   $checkout = $room[4];
   $checkin = $room[1];
   $T = $room[3];
   /*------------------撈學生指定的浴室-------------------------*/

   /*----------------拿現在時間--------------------*/
   date_default_timezone_set('Asia/Shanghai');

   $Time = date('h:i:s', time());

   $parsed = date_parse($Time);

   $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];

   /*----------------拿現在時間--------------------*/

   /*-------------------升降溫---------------------------*/
   $difference = $checkin - $checkout;
   $diff = $seconds - $checkin;
   $T = $T - (0.006*$diff);
   $T = $T + (0.006*$difference);
   if($T > 60)
     $T = 60;
   //UPDATE `floor1a` SET `T` = '59' WHERE `floor1a`.`number` = 4;
   $query = "UPDATE `floor".$floor.$area."` SET `T` = '".$T."' WHERE `floor".$floor.$area."`.`number` = ".$number;
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

   /*-------------------升降溫---------------------------*/
   
   /*-------------------------將學生設定為未預約---------------------------------*/
           //UPDATE `id` SET `inBathroom` = '0', `Bathroomfloor` = '0', `Bathroomarea` = '0', `Bathroomnumber` = '0' WHERE `id`.`StudentID` = 1101502;
   $query = "UPDATE `id` SET `inBathroom` = '0', `Bathroomfloor` = '0', `Bathroomarea` = '0', `Bathroomnumber` = '0' WHERE `id`.`StudentID` = ".$ID;
   
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
    /*-------------------------將學生設定為未預約---------------------------------*/

    /*-----------------------------------------------------------------------*/
    if($reservation != 0)//有人預約
    {
        //UPDATE `floor1a` SET `checkin` = '0', `checkout` = '0' WHERE `floor1a`.`number` = 4;
        $query = "UPDATE `floor".$floor.$area."` SET `checkin` = '".$seconds."', `checkout` = '".$seconds."' WHERE `floor".$floor.$area."`.`number` = ".$number;
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
    }
    else//沒人預約
    {
        //UPDATE `floor1a` SET `checkout` = '1' WHERE `floor1a`.`number` = 4;
        $query = "UPDATE `floor".$floor.$area."` SET `checkin` = '0', `checkout` = '".$seconds."' WHERE `floor".$floor.$area."`.`number` = ".$number;
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
    }
    /*-----------------------------------------------------------------------*/

    /*-------------------------將浴室設定為未預約---------------------------------*/
           //UPDATE `floor1a` SET `checkin` = '1', `inBathroom` = '1' WHERE `floor1a`.`number` = 4;;
   $query = "UPDATE `floor".$floor.$area."` SET  `inBathroom` = '0' WHERE `floor".$floor.$area."`.`number` = ".$number;
   
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
   /*-------------------------將浴室設定為未預約---------------------------------*/
   header('Location: http://localhost/Web期末/Mainpage.html');
       exit();
?>
