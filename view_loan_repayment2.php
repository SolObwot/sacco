<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>DIGITAL FINANCIAL MANAGEMENT SYSTEM</title>
  

<style>


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




@media screen and (max-width: 600px) {	
tr{
  display: block;
}
td{
  display: block;
}
}


</style>

</head>

<body bgcolor="#ffffff">

<br>
<br>




 
<h4 align="center"><b>Members Loan Repayment Details</b></h4>

<?php

include("db_connect.php");


if($_GET[id]){
	mysql_query("update repayment set paid='Paid' where id='$_GET[id]'");
} else {
}




echo "<br><table border=0 align=center cellpadding=0 cellspacing=0 width=400px id='customers'>";



$qry = mysql_query("select * from repayment where accountno='$_GET[accountno]'");
if(mysql_num_rows($qry)>0){
	
echo "<tr bgcolor='#000'>
<td><b><font color='#ffffff'>Principal</font></b></td>
<td><b><font color='#ffffff'>Amount</font></b></td>
<td><b><font color='#ffffff'>Paid</font></b></td>
<td><b><font color='#ffffff'>Date</font></b></td>
<td><b><font color='#ffffff'>Repay</font></b></td>
</tr>";

$i=1;

while(list($v1,$v2,$v3,$v4,$v5,$v6,$v7) = mysql_fetch_array($qry)){


echo "
<tr>

<td>$v3</td>
<td>$v5</td>
<td>$v6</td>
<td>$v7</td>
<td><a href='".$_SERVER[PHP_SELF]."?accountno=$_GET[accountno] && id=$v1' onclick=\"return confirm('Are you sure you want to repay loan?')\">Click</td>
</tr>";


}



} else {
echo "<font size=4><b>No transaction</b></font>";
}




print "</table>";

?>
 
  
 <br>
 <br>
 
</body>
</html>
