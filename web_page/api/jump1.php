<?php
    /*--------------------拿學號---------------------------*/
    foreach ($_COOKIE as $key => $value )
    $ID = $value;
    /*--------------------拿學號---------------------------*/

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

    /*--------------------拿訂房資料---------------------------*/
    $query = "SELECT * FROM `floor".$floor.$area."` WHERE `number` = ".$number;
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

    while ( $row = mysqli_fetch_row( $result ) )
    {
        foreach ( $row as $value )
        {
            $bathroom[] = $value;
        }
    }

    $second = $bathroom[1];
    $T = $bathroom[3];
    //print("$second");

    $seconds -= $second;

    if($seconds < 0)
        $seconds *= -1;

    //$T = $T - 0.016 * $seconds;
    
    /*$query = "UPDATE `floor".$floor.$area."` SET `T` = '".$T."' WHERE `floor".$floor.$area."`.`number` = ".$number;
    if ( !( $database = mysqli_connect( "localhost", "young", "oscar0709" ) ) )
       die( "Could not connect to database </body></html>" );
    if ( !mysqli_select_db($database,"final" ) )
       die( "Could not open products database </body></html>" );
    if ( !( $result = mysqli_query($database, $query) ) )
    {
       print( "<p>Could not execute query!</p>" );
       die( mysqli_error() . "</body></html>" );
    }
    mysqli_close( $database );*/


    $hour = (integer)$seconds / 3600;
    $seconds %= 3600;
    $minute = (integer)$seconds / 60;
    $seconds %= 60;

    $h2 = (integer)($hour / 10);
    $h1 = $hour % 10;
    $m2 = (integer)($minute / 10);
    $m1 = $minute % 10;
    $s2 = (integer)($seconds / 10);
    $s1 = $seconds % 10;

    
    $text = $h2.$h1.":".$m2.$m1.":".$s2.$s1;

    //print("$text");
    print("<div id =\"time\" style=\"text-align:center; font-family: Main_Chinese, serif; margin-top:100px; font-size:50px;\">".$text."</div>");
    print("<h1 style=\"text-align:center; font-family: Main_Chinese, serif; font-size:50px; margin-top:-10px\">".$T."度c</h1>");
   
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="../assets/css/main.css" rel="stylesheet">
    <title>使用時間、溫度一覽表</title>
    <script>
        var interval = null;
        var s1 = 0,s2 = 0,m1 = 0,m2 = 0,h1 = 0,h2 = 0;
        function display()
        {
            var text = ['','','','','','','','',''];

            text = document.getElementById('time').innerHTML;
            s1 = text[7];
            s2 = text[6];
            m1 = text[4];
            m2 = text[3];
            h1 = text[1];
            h2 = text[0];
            //document.write("<h1>"+text+"</h1>");
            interval = window.setInterval("run()", 1000);
            
        }


        function run() 
        {
            parseInt(s1);
            parseInt(s2);
            parseInt(m1);
            parseInt(m2);
            parseInt(h1);
            parseInt(h2);
            s1++;
            if(s1 > 9)
            {
                s1 -= 10;
                s2++;
            }
            if(s2 > 5)
            {
                s1 = 0;
                s2 = 0;
                m1++;
            }
            if(m1 > 9)
            {
                m1 = 0;
                m2++;
            }
            if(m2 > 5)
            {
                m1 = 0;
                m2 = 0;
                h1++;
            }
            
            document.getElementById("time").innerHTML =h2.toString()+h1.toString()+":"+m2.toString()+m1.toString()+":"+s2.toString()+s1.toString();

        }
        window.addEventListener("load",display,false);
        
    </script>
</head>

<body>
    <section id="head">
        <div id="header">
            <h1 style="text-align:center;margin-top:14px ;color:#f0bbbb; font-size:50px ;font-weight: 200;">
                宿舍洗澡預約系統                
            </h1>
        </div>
    </section>
    <div style="float:left; width:100%; margin-top:-250px;">
        <form method="post" action="confirmreservation.php" style="width=30%;margin-left:32%;float:left;"><input id="  " type="submit" value="預約" style="font-family: Main_Chinese , serif; text-align: center; width: 100%; height:50px; border:3px solid lightskyblue; background-color: deepskyblue; color:azure; font-size:18px;"></form>    
        <form method="post" action="cancelreservation.php" style="width=30%;margin-left:10%;float:left;"><input id="  "  type="submit" value="取消" style="font-family: Main_Chinese , serif; text-align: center; width: 100%; height:50px; border:3px solid lightskyblue; background-color: deepskyblue; color:azure; font-size:18px;"></form>
    </div>
</body>
</html>

