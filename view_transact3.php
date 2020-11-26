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






 
 
<h4 align="center"><b>Members General Transaction Details</b></h4>

<?php



include("db_connect.php");

$qry1 = mysql_query("select sum(amount) as tot from transaction where dep_with='Deposit'group by accountno");
if($qry1){
	while(list($d1) = mysql_fetch_array($qry1)){
		$sum = $d1;
	}
}




echo "<br><table border=0 align=center cellpadding=0 cellspacing=0 width=100% id='customers'>";



$qry = mysql_query("select * from transaction where dep_with='Deposit'");
if(mysql_num_rows($qry)>0){
	
echo "<tr bgcolor='#000'>

<td><b><font color='#ffffff'>Dep./Withdrawal</font></b></td>
<td><b><font color='#ffffff'>Amount (Ush)</font></b></td>
<td><b><font color='#ffffff'>Tran/Type</font></b></td>
<td><b><font color='#ffffff'>Tran/Date</font></b></td>
</tr>";

$i=1;

while(list($v1,$v2,$v3,$v4,$v5,$v6) = mysql_fetch_array($qry)){


echo "
<tr>
<td>&nbsp;</td>
<td>$v4</td>
<td>$v5</td>
<td>$v6</td>
</tr>";


}

echo "
<tr>
<td><b>Total Deposit:</b></td>
<td><b>".number_format($sum,2)."</b></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>";

} else {
echo "<font size=4><b>No transaction</b></font>";
}




echo "<tr>
<td colspan='5'>&nbsp;</td>
</tr>";



$qry2 = mysql_query("select sum(amount) as tot from transaction where dep_with='Withdrawal' group by accountno");
if($qry2){
	while(list($d2) = mysql_fetch_array($qry2)){
		$sum2 = $d2;
	}
}



$qryw = mysql_query("select * from transaction where dep_with='Withdrawal'");
if(mysql_num_rows($qry)>0){
	
while(list($h1,$h2,$h3,$h4,$h5,$h6) = mysql_fetch_array($qryw)){


echo "
<tr>
<td>&nbsp;</td>
<td>$h4</td>
<td>$h5</td>
<td>$h6</td>
</tr>";


}

echo "
<tr>
<td><b>Total Withdrawal:</b></td>
<td><b>".number_format($sum2,2)."</b></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>";

} else {
echo "<font size=4><b>No transanction</b></font>";
}


echo "<tr>
<td colspan='5'>&nbsp;</td>
</tr>";

$totran = ($sum-$sum2);

echo "
<tr>
<td><b>Total:</b></td>
<td><b>".number_format($totran,2)."</b></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>";


print "</table>";

?>
 
  



</body>
</html>

<?php
include("database.php");
?>