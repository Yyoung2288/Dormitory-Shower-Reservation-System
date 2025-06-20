<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "utf-8">
        <title>宿舍洗澡預約系統</title>
        <!--links start-->

        <link href="../assets/css/main.css" rel="stylesheet">
        <script src="//code.jquery.com/jquery-2.1.4.min.js" ></script>
        <script src="../assets/js/light.js"></script>
        <script>
        function progress() {
            var floor = $("#floor").val();
        var area = $("#area").val();
	    $.ajax({
		url: "roomstate.php",
		data: {
		   floor: floor,
           area: area
	        },
		type: "POST",
		datatype: "html",
	        success: function( output ) {
		   $( "#out" ).html(output);
	        },
		error : function(){
		    alert( "Request failed." );
		}
	    });
	}

        </script>
        <!--links end-->
     </head>
     <body style="background-color: #A5DEE4;">
        <section id="head">
            <div id="welcome">
                <?php
                    foreach ($_COOKIE as $key => $value )
                    $ID = $value;
                    print("<h1 style=\"color:#f0bbbb; font-size:35px; font-weight:200;\">Hello,".$ID."</h1>");
                ?>
            </div>
            <div id="header">
                <h1 style="text-align:center; margin-top:14px; color:#f0bbbb; font-size:50px ;font-weight:200;">
                    宿舍洗澡預約系統
                </h1>
            </div>
        </section>
        <section style = "margin-top:-270px;">
            <div id="pick">
                <h1>想在哪裡洗澡呢?</h1>
                <form style = "margin-top:-100px;">
                <div style="width:8%;">    
                <select id = "floor" name = "floor" class = "selection">
                    <option selected>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
	            </select>
                    <h1 style="font-size:30x; font-weight: 200;">樓</h1>
                </div>
                <div style="width:8%;">
                <select id = "area" name = "area" class = "selection">
                    <option selected>A</option>
                    <option>B</option>
                    <option>C</option>
	            </select>
                    <h1>區</h1>
                </div>
                <div style = "margin-left: 10px; margin-top: 100px;">
                    <input id = "submit" type="button" value = "V" onclick="progress()">
                </div>  <!--Ajax Function-->
                </form>
                <div id = "out"></div><!--顯示TABLE-->
                <div id = "light"></div><!--顯示預約確認>
            </div>
        </section>
     </body>
</html>

