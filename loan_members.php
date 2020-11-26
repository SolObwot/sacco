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


<h3 align="center">Members Loan Application and Disbursement Details</h3>

<?php

$_SESSION[accountno];

echo "<font size=4><b>$_GET[upd]</b></font>";
include("db_connect.php");

$qrys = mysql_query("select * from members");
$num=mysql_num_rows($qrys);

if(mysql_num_rows($qrys)>0){
echo "
<br><table border=0 align=center cellpadding=0 cellspacing=0 width=90% id='customers'>

<tr bgcolor='#000'>
<td><b><font color='#ffffff'>Accountno</font></b></td>
<td><b><font color='#ffffff'>Stud. ID</font></b></td>
<td><b><font color='#ffffff'>Fullname</font></b></td>
<td><b><font color='#ffffff'>Loan Application</font></b></td>
<td><b><font color='#ffffff'>Loan Disbursement</font></b></td>
<td><b><font color='#ffffff'>Loan Repayment</font></b></td>
</tr>";

$i=1;

while($i<=$num && list($v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10,$v11,$v12,$v13) = mysql_fetch_array($qrys)){

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
<td>";


$qry = mysql_query("select count(accountno) as tol from loan_application where accountno='$v2' and approved='N' group by accountno");
if(mysql_num_rows($qry)>0){
	while($row = mysql_fetch_array($qry)){
		$count = $row['tol'];
		print "<a href='view_loan_application.php?accountno=$v2'>Click ($count)</a>";
	}
} else {
	print "<a href='view_loan_application.php?accountno=$v2'>Click</a>";
}

echo "</td>
<td>";




$qryx = mysql_query("select count(accountno) as tolx from loan_application where accountno='$v2' and approved='Y' group by accountno");
if(mysql_num_rows($qryx)>0){
	while($row = mysql_fetch_array($qryx)){
		$countx = $row['tolx'];
		print "<a href='view_loan_disbursement.php?accountno=$v2'>Click ($countx)</a>";
	}
} else {
	print "<a href='view_loan_disbursement.php?accountno=$v2'>Click</a>";
}





print "</td>
<td><a href='view_loan_repayment2.php?accountno=$v2'>Click</a></td>
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