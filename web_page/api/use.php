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

    /*----------------拿現在時間--------------------*/
    date_default_timezone_set('Asia/Shanghai');

    $Time = date('h:i:s', time());

    $parsed = date_parse($Time);

    $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];

    /*----------------拿現在時間--------------------*/

    /*----------------將使用者狀態改成已預約--------------------*/
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
    /*----------------將使用者狀態改成已預約--------------------*/
    
    /*----------------------浴室checkin更新-----------------------------------*/

    //UPDATE `floor1a` SET `checkin` = '1' WHERE `floor1a`.`number` = 4;
    $query = "UPDATE `floor".$floor.$area."` SET `checkin` = '".$seconds."' WHERE `floor".$floor.$area."`.`number` = ".$number;

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
    /*----------------------浴室checkin更新-----------------------------------*/
   

?>

<script>
   window.close();
</script>

