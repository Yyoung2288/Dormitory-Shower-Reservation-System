<?php
    /*---------------------拿學號---------------------------*/
    foreach ($_COOKIE as $key => $value )
    $ID = $value;
    /*---------------------拿學號---------------------------*/

    /*----------------------接使用者輸入的floor和area再把該樓層區域的浴室資料撈出來-----------------------------*/
    $area = $_POST["area"];
    $floor = $_POST["floor"];
           //SELECT * FROM `floor5a`
    $query = "SELECT * FROM `floor" . $floor . $area ."`" ;
    //print("$query");
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
            $count += 1;
        }
    }

    $count /= 5;
    $j = 0;

    for ($i = 0; $i < $count ; $i++)
    {
        $number[$i] = $bathroom[$j];
        $checkin[$i] = $bathroom[$j + 1];
        $inBathroom[$i] = $bathroom[$j + 2];
        $T[$i] = $bathroom[$j + 3];
        $j += 5;
    }
/*----------------------接使用者輸入的floor和area再把該樓層區域的浴室資料撈出來-----------------------------*/

/*------------------預約-----------------------*/
$reservationnumber;
if($area == 'A')
{
   //green:rgb(70, 245, 70),  red:rgb(224, 54, 54)
   print('<div>
   <table style="margin-left: -300px; margin-top: 30px;">
       <tr>
           <td>');
           if(!$inBathroom[3])
           {
               $reservationnumber = 4;
               if($checkin[3] == 0)//使用
               {
                    print('<input id = "A4" type="button" value="4" onclick="use4()" style="background-color: rgb(70, 245, 70);">');
                    
               }
               else//預約*/
               {
                  print('<input id = "A4" type="button" value="4" onclick="greenlight4()" style="background-color: rgb(70, 245, 70);">');
                  
               }
               
           }
           else
               print('<input id = "A4" type="button" value="4" onclick="redlight()" style="background-color: rgb(224, 54, 54);">');
           print('</td>
       </tr>
       <tr>
           <td>');
           if(!$inBathroom[2])
           {
               $reservationnumber = 3;
               if($checkin[2] == 0)//使用
               {
                  print('<input id = "A3" type="button" value="3" onclick="use3()" style="background-color: rgb(70, 245, 70);">');
               }
               else//預約*/
               {
                  print('<input id = "A3" type="button" value="3" onclick="greenlight3()" style="background-color: rgb(70, 245, 70);">');
               }
           }
           else
               print('<input id = "A3" type="button" value="3" onclick="redlight()" style="background-color: rgb(224, 54, 54);">');
           print('</td>
       </tr>
       <tr>
           <td>');
           if(!$inBathroom[1])
           {
               $reservationnumber = 2;
               if($checkin[1] == 0)//使用
               {
                    print('<input id = "A2" type="button" value="2" onclick="use2()" style="background-color: rgb(70, 245, 70);">');
               }
               else//預約*/
               {
                  print('<input id = "A2" type="button" value="2" onclick="greenlight2()" style="background-color: rgb(70, 245, 70);">');
               }
           }
           else
               print('<input id = "A2" type="button" value="2" onclick="redlight()" style="background-color: rgb(224, 54, 54);">');
           print('</td>
       </tr>
       <tr>
           <td>');
           if(!$inBathroom[0])
           {
               $reservationnumber = 1;
               if($checkin[0] == 0)//使用
               {
                    print('<input id = "A1" type="button" value="1" onclick="use1()" style="background-color: rgb(70, 245, 70);">');
               }
               else//預約*/
               {
                  print('<input id = "A1" type="button" value="1" onclick="greenlight1()" style="background-color: rgb(70, 245, 70);">');
               }
           }
           else
               print('<input id = "A1" type="button" value="1" onclick="redlight()" style="background-color: rgb(224, 54, 54);">');
           print('</td>
       </tr>
   </table>
   <table style="margin-left: 20px; margin-top: 30px;">
       <tr>
           <td>');
           if(!$inBathroom[6])
           {
               $reservationnumber = 7;
               if($checkin[6] == 0)//使用
               {
                    print('<input id = "A7" type="button" value="7" onclick="use7()" style="background-color: rgb(70, 245, 70);">');
               }
               else//預約*/
               {
                  print('<input id = "A7" type="button" value="7" onclick="greenlight7()" style="background-color: rgb(70, 245, 70);">');
               }
           }
           else
               print('<input id = "A7" type="button" value="7" onclick="redlight()" style="background-color: rgb(224, 54, 54);">');
           print('</td>
       </tr>
       <tr>
           <td>');
           if(!$inBathroom[5])
           {
               $reservationnumber = 6;
               if($checkin[5] == 0)//使用
               {
                    print('<input id = "A6" type="button" value="6" onclick="use6()" style="background-color: rgb(70, 245, 70);">');
               }
               else//預約*/
               {
                  print('<input id = "A6" type="button" value="6" onclick="greenlight6()" style="background-color: rgb(70, 245, 70);">');
               }
           }
           else
               print('<input id = "A6" type="button" value="6" onclick="redlight()" style="background-color: rgb(224, 54, 54);">');
           print('</td>
       </tr>
       <tr>
           <td>');
           if(!$inBathroom[4])
           {
               $reservationnumber = 5;
               if($checkin[4] == 0)//使用
               {
                    print('<input id = "A5" type="button" value="5" onclick="use5()" style="background-color: rgb(70, 245, 70);">');
               }
               else//預約*/
               {
                  print('<input id = "A5" type="button" value="5" onclick="greenlight5()" style="background-color: rgb(70, 245, 70);">');
               }
           }
           else
               print('<input id = "A5" type="button" value="5" onclick="redlight()" style="background-color: rgb(224, 54, 54);">');

           print('</td>
       </tr>
   </table>
</div>');
}
else if($area == 'B')
{
   print('<div>
   <table style="margin-left: -450px; margin-top: 30px;">
       <tr>
           <td>');
            if(!$inBathroom[2])
            {
               $reservationnumber = 3;
               if($checkin[2] == 0)//使用
               {
                    print('<input id = "B3" type="button" value="3" onclick="use3()" style="background-color: rgb(70, 245, 70);">');
               }
               else//預約*/
               {
                  print('<input id = "B3" type="button" value="3" onclick="greenlight3()" style="background-color: rgb(70, 245, 70);">');
               }
            }
            else
               print('<input id = "B3" type="button" value="3" onclick="redlight()" style="background-color: rgb(224, 54, 54);">');
           print('</td>
       </tr>
       <tr>
           <td>');
            if(!$inBathroom[1])
            {
               $reservationnumber = 2;
               if($checkin[1] == 0)//使用
               {
                    print('<input id = "B2" type="button" value="2" onclick="use2()" style="background-color: rgb(70, 245, 70);">');
               }
               else//預約*/
               {
                  print('<input id = "B2" type="button" value="2" onclick="greenlight2()" style="background-color: rgb(70, 245, 70);">');
               }
            }
           else
               print('<input id = "B2" type="button" value="2" onclick="redlight()" style="background-color: rgb(224, 54, 54);">');
           print('</td>
       </tr>
       <tr>
           <td>');
           if(!$inBathroom[0])
            {
               $reservationnumber = 1;
               if($checkin[0] == 0)//使用
               {
                    print('<input id = "B1" type="button" value="1" onclick="use1()" style="background-color: rgb(70, 245, 70);">');
               }
               else//預約*/
               {
                  print('<input id = "B1" type="button" value="1" onclick="greenlight1()" style="background-color: rgb(70, 245, 70);">');
               }
            }
           else
               print('<input id = "B1" type="button" value="1" onclick="redlight()" style="background-color: rgb(224, 54, 54);">');
           print('</td>
       </tr>
   </table>
   <table style="margin-left: -190px; margin-top: 30px;">
       <tr>
           <td>');
           if(!$inBathroom[5])
            {
               $reservationnumber = 6;
               if($checkin[5] == 0)//使用
               {
                    print('<input id = "B6" type="button" value="6" onclick="use6()" style="background-color: rgb(70, 245, 70);">');
               }
               else//預約*/
               {
                  print('<input id = "B6" type="button" value="6" onclick="greenlight6()" style="background-color: rgb(70, 245, 70);">');
               }
            }
           else
               print('<input id = "B6" type="button" value="6" onclick="redlight()" style="background-color: rgb(224, 54, 54);">');
           print('</td>
       </tr>
       <tr>
           <td>');
           if(!$inBathroom[4])
            {
               $reservationnumber = 5;
               if($checkin[4] == 0)//使用
               {
                    print('<input id = "B5" type="button" value="5" onclick="use5()" style="background-color: rgb(70, 245, 70);">');
               }
               else//預約*/
               {
                  print('<input id = "B5" type="button" value="5" onclick="greenlight5()" style="background-color: rgb(70, 245, 70);">');
               }
            }
           else
               print('<input id = "B5" type="button" value="5" onclick="redlight()" style="background-color: rgb(224, 54, 54);">');
           print('</td>
       </tr>
       <tr>
           <td>');
           if(!$inBathroom[3])
            {
               $reservationnumber = 4;
               if($checkin[3] == 0)//使用
               {
                    print('<input id = "B4" type="button" value="4" onclick="use4()" style="background-color: rgb(70, 245, 70);">');
               }
               else//預約*/
               {
                  print('<input id = "B4" type="button" value="4" onclick="greenlight4()" style="background-color: rgb(70, 245, 70);">');
               }
            }
           else
               print('<input id = "B4" type="button" value="4" onclick="redlight()" style="background-color: rgb(224, 54, 54);">');
           print('</td>
       </tr>
   </table>
   <table style="margin-left: 70px; margin-top: 30px;">
       <tr>
           <td>');
           if(!$inBathroom[9])
            {
               $reservationnumber = 10;
               if($checkin[9] == 0)//使用
               {
                    print('<input id = "B10" type="button" value="10" onclick="use10()" style="background-color: rgb(70, 245, 70);">');
               }
               else//預約*/
               {
                  print('<input id = "B10" type="button" value="10" onclick="greenlight10()" style="background-color: rgb(70, 245, 70);">');
               }
            }
           else
               print('<input id = "B10" type="button" value="10" onclick="redlight()" style="background-color: rgb(224, 54, 54);">');
           print('</td>
       </tr>   
       <tr>
           <td>');
           if(!$inBathroom[8])
            {
               $reservationnumber = 9;
               if($checkin[8] == 0)//使用
               {
                    print('<input id = "B9" type="button" value="9" onclick="use9()" style="background-color: rgb(70, 245, 70);">');
               }
               else//預約*/
               {
                  print('<input id = "B9" type="button" value="9" onclick="greenlight9()" style="background-color: rgb(70, 245, 70);">');
               }
            }
           else
               print('<input id = "B9" type="button" value="9" onclick="redlight()" style="background-color: rgb(224, 54, 54);">');
           print('</td>
       </tr>
       <tr>
           <td>');
           if(!$inBathroom[7])
            {
               $reservationnumber = 8;
               if($checkin[7] == 0)//使用
               {
                    print('<input id = "B8" type="button" value="8" onclick="use8()" style="background-color: rgb(70, 245, 70);">');
               }
               else//預約*/
               {
                  print('<input id = "B8" type="button" value="8" onclick="greenlight8()" style="background-color: rgb(70, 245, 70);">');
               }
            }
           else
               print('<input id = "B8" type="button" value="8" onclick="redlight()" style="background-color: rgb(224, 54, 54);">');
           print('</td>
       </tr>
       <tr>
           <td>');
           if(!$inBathroom[6])
            {
               $reservationnumber = 7;
               if($checkin[6] == 0)//使用
               {
                    print('<input id = "B7" type="button" value="7" onclick="use7()" style="background-color: rgb(70, 245, 70);">');
               }
               else//預約*/
               {
                  print('<input id = "B7" type="button" value="7" onclick="greenlight7()" style="background-color: rgb(70, 245, 70);">');
               }
            }
           else
               print('<input id = "B7" type="button" value="7" onclick="redlight()" style="background-color: rgb(224, 54, 54);">');
           print('</td>
       </tr>
   </table>
</div>');
}

else if($area == 'C')
{
   print('<div>
   <table style="margin-left: -300px; margin-top: 30px;">
       <tr>
           <td>');
           if(!$inBathroom[1])
            {
               $reservationnumber = 2;
               if($checkin[1] == 0)//使用
               {
                    print('<input id = "C2" type="button" value="2" onclick="use2()" style="background-color: rgb(70, 245, 70);">');
               }
               else//預約*/
               {
                  print('<input id = "C2" type="button" value="2" onclick="greenlight2()" style="background-color: rgb(70, 245, 70);">');
               }
            }
           else
               print('<input id = "C2" type="button" value="2" onclick="redlight()" style="background-color: rgb(224, 54, 54);">');
           print('</td>
       </tr>
       <tr>
           <td>');
           if(!$inBathroom[0])
            {
               $reservationnumber = 1;
               if($checkin[0] == 0)//使用
               {
                    print('<input id = "C1" type="button" value="1" onclick="use1()" style="background-color: rgb(70, 245, 70);">');
               }
               else//預約*/
               {
                  print('<input id = "C1" type="button" value="1" onclick="greenlight1()" style="background-color: rgb(70, 245, 70);">');
               }
            }
           else
               print('<input id = "C1" type="button" value="1" onclick="redlight()" style="background-color: rgb(224, 54, 54);">');
           print('</td>
       </tr>
   </table>
   <table style="margin-left: 20px; margin-top: 30px;">
       <tr>
           <td>');
           if(!$inBathroom[3])
            {
               $reservationnumber = 4;
               if($checkin[3] == 0)//使用
               {
                    print('<input id = "C4" type="button" value="4" onclick="use4()" style="background-color: rgb(70, 245, 70);">');
               }
               else//預約*/
               {
                  print('<input id = "C4" type="button" value="4" onclick="greenlight4()" style="background-color: rgb(70, 245, 70);">');
               }
            }
           else
               print('<input id = "C4" type="button" value="4" onclick="redlight()" style="background-color: rgb(224, 54, 54);">');
           print('</td>
       </tr>
       <tr>
           <td>');
           if(!$inBathroom[2])
            {
               $reservationnumber = 3;
               if($checkin[2] == 0)//使用
               {
                    print('<input id = "C3" type="button" value="3" onclick="use3()" style="background-color: rgb(70, 245, 70);">');
               }
               else//預約*/
               {
                  print('<input id = "C3" type="button" value="3" onclick="greenlight3()" style="background-color: rgb(70, 245, 70);">');
               }
            }
           else
               print('<input id = "C3" type="button" value="3" onclick="redlight4()" style="background-color: rgb(224, 54, 54);">');
           print('</td>
       </tr>
   </table>
</div>');
}

/*---------------------存使用者點了哪個登---------------------------*/
//$reservation = value;
$query = "UPDATE `id` SET `Bathroomfloor` = '".$floor."', `Bathroomarea` = '".$area."' WHERE `id`.`StudentID` = ".$ID;
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
/*---------------------存使用者點了哪個登---------------------------*/

/*for($i = 0 ; $i < $count; $i++)
   print("$number[$i]");
print("<br>");

for($i = 0 ; $i < $count; $i++)
   print("$checkin[$i]");
print("<br>");

for($i = 0 ; $i < $count; $i++)
   print("$inBathroom[$i]");
print("<br>");

for($i = 0 ; $i < $count; $i++)
   print("$T[$i]");
print("<br>");*/

?>