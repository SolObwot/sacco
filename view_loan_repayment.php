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
  
<script type='text/javascript' src='js/jquery.min.js'></script>
<script type='text/javascript' src='js/bootstrap.min.js'></script>
<link href='css/bootstrap.min.css' rel='stylesheet'>
<SCRIPT src="js/PopBox.js" type="text/javascript"></SCRIPT>


<style>

body {
	
    width:100%;
    height: 100%;
    background-image: url("images/image6.jpg");
    background-position: center;
    background-size: 100% 100%;
    background-repeat: no-repeat;
	background-attachment: fixed;
}



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

<body>

<br>
<br>





<div class="container">
  <div class="row">
  <div class="col-lg-1">&nbsp;</div>
   <div class="col-lg-3" style="background:url(images/image2.jpg);">
 
<div class="row" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;border:0px solid; background-color:rgba(67, 104, 24, 0.9)">
<div class="col-lg-2">&nbsp;</div>
</div>
 
<br>
<?php include("menu.php"); ?>
<br>

 </div>
  <div class="col-lg-8" style="background-color:#ffffff">
  
  
  <br>
  


 
 <div class="row">
 <div class="col-lg-12">
 
 
<h4 align="center"><b>Members Loan Repayment Details</b></h4>

<?php


include("db_connect.php");

$qry1 = mysql_query("select sum(amount) as tot from transaction where dep_with='Deposit' group by accountno");
if($qry1){
	while(list($d1) = mysql_fetch_array($qry1)){
		$sum = $d1;
	}
}




echo "<br><table border=0 align=center cellpadding=0 cellspacing=0 width=100% id='customers'>";



$qry = mysql_query("select * from repayment where accountno='$_SESSION[accountno]'");
if(mysql_num_rows($qry)>0){
	
echo "<tr bgcolor='#000'>
<td><b><font color='#ffffff'>Principal</font></b></td>
<td><b><font color='#ffffff'>Amount</font></b></td>
<td><b><font color='#ffffff'>Paid</font></b></td>
<td><b><font color='#ffffff'>Date</font></b></td>
</tr>";

$i=1;

while(list($v1,$v2,$v3,$v4,$v5,$v6,$v7) = mysql_fetch_array($qry)){


echo "
<tr>

<td>$v3</td>
<td>$v5</td>
<td>$v6</td>
<td>$v7</td>
</tr>";


}



} else {
echo "<font size=4><b>No transaction</b></font>";
}




print "</table>";

?>
 
  
 <br>
 <br>
 
 
 </div>
 </div>
 
 
  
  
</div>

 <div class="col-lg-2">&nbsp;</div>
</div>
</div>
















</body>
</html>

<?php
include("database.php");
?>