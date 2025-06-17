<?php
/*--------------------拿學號------------------------------*/
foreach ($_COOKIE as $key => $value )
$ID = $value;
/*--------------------拿學號------------------------------*/

/*--------------------拿浴室樓層區域號碼---------------------------*/
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
/*--------------------拿浴室樓層區域號碼---------------------------*/
/*----------------------------將浴室設定為有人預約---------------------------------------*/
  //UPDATE `floor1a` SET `inBathroom` = '0' WHERE `floor1a`.`number` = 2;
  $query = "UPDATE `floor".$floor.$area."` SET `inBathroom` = '1' WHERE `floor".$floor.$area."`.`number` = ".$number;
  if ( !( $database = mysqli_connect( "localhost", "young", "oscar0709" ) ) )
     die( "Could not connect to database </body></html>" );
  if ( !mysqli_select_db($database,"final") )
     die( "Could not open products database </body></html>" );
  if ( !( $result = mysqli_query($database, $query) ) )
  {
     print( "<p>Could not execute query!</p>" );
     die( mysqli_error() . "</body></html>" );
  }
  mysqli_close( $database );
/*----------------------------將浴室設定為有人預約---------------------------------------*/

/*----------------------------將學生設定為已預約---------------------------------------*/
          //UPDATE `id` SET `inBathroom` = '1', `Bathroomfloor` = '1', `Bathroomarea` = 'A', `Bathroomnumber` = '2' WHERE `id`.`StudentID` = 1101502;
  $query = "UPDATE `id` SET `inBathroom` = '1', `Bathroomfloor` = '".$floor."', `Bathroomarea` = '".$area."', `Bathroomnumber` = '".$number."' WHERE `id`.`StudentID` = ".$ID;
  if ( !( $database = mysqli_connect( "localhost", "young", "oscar0709" ) ) )
     die( "Could not connect to database </body></html>" );
  if ( !mysqli_select_db($database,"final") )
     die( "Could not open products database </body></html>" );
  if ( !( $result = mysqli_query($database, $query) ) )
  {
     print( "<p>Could not execute query!</p>" );
     die( mysqli_error() . "</body></html>" );
  }
  mysqli_close( $database ); 
  
?>
<script>
   window.close();
</script>



