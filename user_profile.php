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
 <div class="col-lg-2">&nbsp;</div>
 <div class="col-lg-8">
 
 
<h4 align="center"><b>User Profile</b></h4>

<?php

echo "<font size=4><b>$_GET[upd]</b></font>";
include("db_connect.php");

$qry = mysql_query("select * from members where studentid='$_SESSION[studentid]'");
$num=mysql_num_rows($qry);

if(mysql_num_rows($qry)>0){
echo "
<br><table border=0 align=center cellpadding=0 cellspacing=0 width=100% id='customers'>";

$i=1;

while($i<=$num && list($v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10,$v11,$v12,$v13) = mysql_fetch_array($qry)){


echo "
<tr>
<td><b><font color='#000000'>Accountno/Login</font></b></td>
<td>$v2</td>
</tr>

<tr>
<td><b><font color='#000000'>Stud. ID</font></b></td>
<td>$v3</td>
</tr>

<tr>
<td><b><font color='#000000'>Fullname</font></b></td>
<td>$v4</td>
</tr>

<tr>
<td><b><font color='#000000'>Email</font></b></td>
<td>$v5</td>
</tr>

<tr>
<td><b><font color='#000000'>Tel</font></b></td>
<td>$v6</td>
</tr>

<tr>
<td><b><font color='#000000'>Faculty</font></b></td>
<td>$v7</td>
</tr>

<tr>
<td><b><font color='#000000'>Course</font></b></td>
<td>$v8</td>
</tr>

<tr>
<td><b><font color='#000000'>prog.</font></b></td>
<td>$v9</td>
</tr>

<tr>
<td><b><font color='#000000'>photo.</font></b></td>
<td><IMG onclick=Pop(this,50,null); style=\"FLOAT: left; WIDTH: 20px; HEIGHT: 20px; border:1px\" alt=\"\" src=\"photo/$v10\" pbshowrevertimage=\"true\" pbreverttext=\"Photo\"></td>
</tr>

<tr>
<td><b><font color='#000000'>Password</font></b></td>
<td>$v11</td>
</tr>

<!-- <tr>
<td><b><font color='#000000'>Edit</font></b></td>
<td><a href='".$_SERVER[PHP_SELF]."?use=$v1 && man=$v3' onclick=\"return confirm('Are you sure you want to delete')\"><font color='#000000'>Click</font></a></td>
</tr>-->


";


$i++;

}

echo "</table>";

} else {
echo "<font size=4><b>No member registered yet</b></font>";
}


?>
 
 
  
 <br>
 <br>
 
 
 </div>
 <div class="col-lg-2">&nbsp;</div>
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