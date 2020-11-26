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
  width: 80%;
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

echo "<font size=4><b>$_GET[upd]</b></font>";
include("db_connect.php");

$qry = mysql_query("select * from members");
$num=mysql_num_rows($qry);

if(mysql_num_rows($qry)>0){
echo "
<br><table border=0 align=center cellpadding=0 cellspacing=0 width=100% id='customers'>

<tr bgcolor='#000'>
<td><b><font color='#ffffff'>Accountno/Login</font></b></td>
<td><b><font color='#ffffff'>Stud. ID</font></b></td>
<td><b><font color='#ffffff'>Fullname</font></b></td>
<td><b><font color='#ffffff'>Email</font></b></td>
<td><b><font color='#ffffff'>Deposite/Withdrawal</font></b></td>
<td><b><font color='#ffffff'>View Trans.</font></b></td>
</tr>

";

$i=1;

while($i<=$num && list($v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10,$v11,$v12,$v13) = mysql_fetch_array($qry)){

$c1 = ($i/2);
$c2 = round(($i/2),0);


if($c1==$c2){
$color="";
} else {
$color="#dddddd";

}



echo "
<tr bgcolor='$color'>
<td>$v2</td>
<td>$v3</td>
<td>$v4</td>
<td>$v5</td>
<td><a href='dep_withdrawal.php?accountno=$v2'>Click</a></td>
<td><a href='view_transact2.php?accountno=$v2'>Click</a></td>
</tr>";


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