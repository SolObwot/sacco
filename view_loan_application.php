<?php
session_start();
?>
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

<table align=center border=0 cellpadding=0 cellspacing=0 width="90%">
<tr>
<td>

<?php

include("db_connect.php");


if($_GET[app]){
	mysql_query("update loan_application set approved='Y' where accountno='$_GET[accountno]'");	
} else {	
}

if($_GET[apps]){
	mysql_query("update loan_application set approved='N' where accountno='$_GET[accountno]'");	
} else {	
}




$qrys = mysql_query("select * from loan_application where accountno='$_GET[accountno]'");
$num=mysql_num_rows($qrys);

if(mysql_num_rows($qrys)>0){
echo "
<br><table border=0 align=center cellpadding=0 cellspacing=0 width=90% id='customers'>

<tr bgcolor='#000'>
<td><b><font color='#ffffff'>Accountno/Login</font></b></td>
<td><b><font color='#ffffff'>Fullname</font></b></td>
<td><b><font color='#ffffff'>Amount</font></b></td>
<td><b><font color='#ffffff'>Reasons</font></b></td>
<td><b><font color='#ffffff'>Approved</font></b></td>
<td><b><font color='#ffffff'>Dates</font></b></td>
</tr>";

$i=1;

while($i<=$num && list($v1,$v2,$v3,$v4,$v5,$v6) = mysql_fetch_array($qrys)){



echo "
<tr>
<td>$v2</td>
<td>";

$qry = mysql_query("select fullname from members where accountno='$v2' or accountno='$_GET[accountno]'");
if(mysql_num_rows($qry)>0){
	while($row = mysql_fetch_array($qry)){
	print $names = $row['fullname'];
	}
} else {
}


print "
</td>
<td>$v3</td>
<td>$v4</td>
<td>($v5) &nbsp;&nbsp; <a href='".$_SERVER[PHP_SELF]."?accountno=$v2 && app=yes' onclick=\"confirm('Are you sure you want to approve')\">Approve</a> | 
<a href='".$_SERVER[PHP_SELF]."?accountno=$v2 && apps=No' onclick=\"confirm('Are you sure you want to Reject')\">Reject</a>
</td>
<td>$v6</td>
</tr>";


$i++;

}

echo "</table>";

} else {
echo "<font size=4><b>No loan application yet</b></font>";
}


?>
</td>
</tr>


</table>





</body>
 </html>