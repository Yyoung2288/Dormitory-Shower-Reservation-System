<?php
/*--------------------拿學號------------------------------*/
foreach ($_COOKIE as $key => $value )
$ID = $value;
/*--------------------拿學號------------------------------*/
$reservation = $_POST["reservation"];

//UPDATE `id` SET `Bathroomnumber` = '1' WHERE `id`.`StudentID` = 1101502;
$query = "UPDATE `id` SET `Bathroomnumber` = '".$reservation."' WHERE `id`.`StudentID` =".$ID;
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