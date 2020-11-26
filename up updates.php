<html>
<head>
<title></title>


<style type="text/css">

BODY{
scrollbar-face-color:white;
scrollbar-arrow-color: black;
scrollbar-track-color:white;
scrollbar-shadow-color:white;
scrollbar-highlight-color:white;
scrollbar-3dlight-color:white;
scrollbar-darkshadow-Color:white;
}

</style>




<style type="text/css">

a:link{color:yellow; text-decoration:none}
a:active{color:yellow; text-decoration:none}
a:visited{color:yellow; text-decoration:none}
a:hover{color:white; text-decoration:underline}


</style>





</head>

<body bgcolor="white">



<marquee direction="up" height="170" scrollamount="3" scrollamount="3"  behavior="scroll" onmouseover="this.stop();" onmouseout="this.start();">




<table border=0 cellpadding=0 cellspacing=0>
<tr>
<td>



<?php

include("db_connect.php");

$qry = mysql_query("select * from master_table where categories='updates' and head='News'");

if(mysql_num_rows($qry)>0){

echo "<table border=0>
<tr>
<td colspan=2><font color=white size=+1><b>News</b></font></td>
</tr>

<tr>";

while(list($v1,$v2,$v3,$v4,$v5,$v6) = mysql_fetch_array($qry)){

echo "
<td><img src='image/ball.png' width='5' heigth='5'></td>
<td><a href='DISPLAY DATA.php?id=$v1' target='d'>".wordwrap($v6,35,'<br>')."</a></td>";

}

echo "</tr>
</table>";


} else {
}

?>





</td>
</tr>

<tr>
<td>





<?php

include("db_connect.php");

$qry = mysql_query("select * from master_table where categories='updates' and head='Activities'");

if(mysql_num_rows($qry)>0){

echo "<table border=0>
<tr>
<td colspan=2><font color=white size=+1><b>Activities</b></font></td>
</tr>

<tr>";

while(list($v1,$v2,$v3,$v4,$v5,$v6) = mysql_fetch_array($qry)){

echo "
<td><img src='image/ball.png' width='5' heigth='5'></td>
<td><a href='DISPLAY DATA.php?id=$v1' target='d'>".wordwrap($v6,35,'<br>')."</a></td>";

}

echo "</tr>
</table>";


} else {
}

?>




</td>
</tr>



</table>



</marquee>

</body>
</html>
