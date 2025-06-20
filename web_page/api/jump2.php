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
/*----------------------拿溫度----------------------------------*/
//        SELECT * FROM `floor1a` WHERE `number` = 1
$query = "SELECT * FROM `floor" . $floor . $area ."` WHERE `number` = ".$number;
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

$count = 0;
while ( $row = mysqli_fetch_row( $result ) )
{
    foreach ( $row as $value )
    {
        $bathroom[] = $value;
    }
}

$T = $bathroom[3];
/*----------------------拿溫度----------------------------------*/
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="../assets/css/main.css" rel="stylesheet">
    <title>使用時間、溫度一覽表</title>
</head>
<body>
    <section id="head">
        <div id="header">
            <h1 style="text-align:center;margin-top:14px ;color:#f0bbbb;font-weight: 200;">
                宿舍洗澡預約系統                
            </h1>
        </div>
    </section>
    <div id="countnum" style="margin-top:-150px;">
        <h1 style="text-align:center;">
            00:00:00
        </h1>
    </div>
    <?php
        print("<h1 style=\"font-size=100px;text-align:center;\">".$T."度c</h1>");
    ?>
    <div style="float:left; width:100%;">
        <form method="post" action="use.php" style="width=30%;margin-left:32%;float:left;"><input id="  "type="submit" value="使用" style="font-family: Main_Chinese , serif; text-align: center; width: 100%; height:50px; border:3px solid lightskyblue; background-color: deepskyblue; color:azure; font-size:18px;"></form>
        <form method="post" action="cancelreservation.php" style="width=30%;margin-left:10%;float:left;"><input id="  " type="submit" value="取消" style="font-family: Main_Chinese , serif; text-align: center; width: 100%; height:50px; border:3px solid lightskyblue; background-color: deepskyblue; color:azure; font-size:18px;"></form>
    </div>  
</body>
</html>
