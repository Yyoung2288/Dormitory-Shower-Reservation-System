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

/*----------------將使用者狀態清空--------------------*/
$query = "UPDATE `id` SET `Bathroomfloor` = '0', `Bathroomarea` = '0', `Bathroomnumber` = '0' WHERE `id`.`StudentID` = ".$ID;
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
/*----------------將使用者狀態清空-------------------*/

?>

<script>
   window.close();
</script>