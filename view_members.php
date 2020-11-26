<html>
<head>
<title></title>


<style type="text/css">
a:link{color:black; text-decoration:none}
a:active{color:black; text-decoration:none}
a:visited{color:black; text-decoration:none}
a:hover{color:red; text-decoration:none}


#customers {
  font-family: "cambria", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 5px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 5px;
  padding-bottom: 5px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>


<SCRIPT src="js/PopBox.js" type="text/javascript"></SCRIPT>


</head>

<body bgcolor="#ffffff">


<br><br>

<table align=center border=0 cellpadding=0 cellspacing=0 width="100%">
<tr>
<td>


<?php
include("db_connect.php");

if($_GET['use']==""){
} else {

$qry = mysql_query("delete from users where username='$_GET[use]'");
if($qry){
echo "Member has been successfully deleted";
} else {
echo "<font size=4>Member could not be deleted</font>";
}
}
?>
</td>
</tr>


<tr>
<td>

<h3 align="center">Members with registration status details</h3>

<?php

echo "<font size=4><b>$_GET[upd]</b></font>";
include("db_connect.php");


if($_GET[app]){
	mysql_query("update members set approved='Y' where accountno='$_GET[accountno]'");	
} else {	
}

if($_GET[apps]){
	mysql_query("update members set approved='N' where accountno='$_GET[accountno]'");	
} else {	
}




$qry = mysql_query("select * from members");
$num=mysql_num_rows($qry);

if(mysql_num_rows($qry)>0){
echo "
<br><table border=0 align=center cellpadding=0 cellspacing=0 width=100% id='customers'>

<tr bgcolor='#000'>
<td><b><font color='#ffffff'>Acc</font></b></td>
<td><b><font color='#ffffff'>Stud. ID</font></b></td>
<td><b><font color='#ffffff'>Fullname</font></b></td>
<td><b><font color='#ffffff'>Email</font></b></td>
<td><b><font color='#ffffff'>Tel</font></b></td>
<td><b><font color='#ffffff'>Faculty</font></b></td>
<td><b><font color='#ffffff'>Course</font></b></td>
<td><b><font color='#ffffff'>prog.</font></b></td>
<td><b><font color='#ffffff'>photo.</font></b></td>
<td><b><font color='#ffffff'>Pass</font></b></td>
<td><b><font color='#ffffff'>M/F</font></b></td>
<td><b><font color='#ffffff'>Date</font></b></td>
<td><b><font color='#ffffff'>Approve</font></b></td>
<td><b><font color='#ffffff'></font></b></td>
</tr>

";

$i=1;

while($i<=$num && list($v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10,$v11,$v12,$v13,$v14) = mysql_fetch_array($qry)){


echo "
<tr>
<td>$v2</td>
<td>$v3</td>
<td>$v4</td>
<td>$v5</td>
<td>$v6</td>
<td>$v7</td>
<td>$v8</td>
<td>$v9</td>
<td><IMG onclick=Pop(this,50,null); style=\"FLOAT: left; WIDTH: 20px; HEIGHT: 20px; border:1px\" alt=\"\" src=\"photo/$v10\" pbshowrevertimage=\"true\" pbreverttext=\"Photo\"></td>
<td>$v11</td>
<td>$v12</td>
<td>$v13</td>
<td>[$v14], 

<a href='".$_SERVER[PHP_SELF]."?accountno=$v2 && app=yes' onclick=\"confirm('Are you sure you want to approve')\">Y</a> | 
<a href='".$_SERVER[PHP_SELF]."?accountno=$v2 && apps=No' onclick=\"confirm('Are you sure you want to Reject')\">N</a>

</td>
<td><a href='".$_SERVER[PHP_SELF]."?use=$v1 && man=$v3' onclick=\"return confirm('Are you sure you want to delete')\"></a></td>
</tr>
";


$i++;

}

echo "</table>";

} else {
echo "<font size=4><b>No member registered yet</b></font>";
}


?>
</td>
</tr>


</table>





</body>
 </html>