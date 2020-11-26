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



<script type="text/javascript">
function numbersonly(e){
var unicode=e.charCode? e.charCode : e.keyCode
if (unicode!=8)
if (unicode!=46)
if (unicode<48||unicode>57)
return false
}
</script>


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
 
 
<h5 align="center"><b>User Loan Application Form</b></h5>

<?php

if($_POST[acc]){
print "<div class='alert alert-success alert-dismissible'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
Success:  Successfully Submitted
</div>";
	
}

if(isset($_POST[s])){
	
	

	

include("db_connect.php");

$d1 = $_POST['accountno'];
$d2 = $_POST['amount'];
$d3 = $_POST['reasons'];
$d4 = date("Y-m-d");




if($d1 and $d2 and $d3){






###################
$dep = mysql_query("select sum(amount) as amt from transaction where dep_with='Deposit' and accountno='$d1' group by dep_with");
if(mysql_num_rows($dep)>0){
	while(list($dp) = mysql_fetch_array($dep)){
		$cdep = $dp;
	}
} else {
	$cdep = 0;
}


$depw = mysql_query("select sum(amount) as amt from transaction where dep_with='Withdrawal' and  accountno='$r1' group by dep_with");
if(mysql_num_rows($depw)>0){
	while(list($dpw) = mysql_fetch_array($depw)){
		$with = $dpw;
	}
} else {
	$with = 0;
}
################


$total = ($cdep-$with);



if($total>=200000){







$qry = mysql_query("select * from loan_application where accountno='$d1' and approved='no'");
if(mysql_num_rows($qry)>0){
print "<div class='alert alert-danger'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Warning: </strong> Your loan application not yet approved
</div>";
} else {


####loan application
$qry = mysql_query("insert into loan_application (accountno,amount,reasons,dates,approved) 
values ('$d1','$d2','$d3','$d4','N')") or die(mysql_error());
if($qry){
print "<form name='xx' action='".$_SERVER[PHP_SELF]."' method='post'>
<input type='hidden' name='acc' value='data'>
<script language=\"javascript\">
document.xx.submit();
</script>
</form>";	
} else {
echo "<font color=red>It could not submit data</font>";
}
####loan application

}





} else {
	print "<div class='alert alert-danger'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Warning: </strong> Please you have less than 2000000 Ugx.
</div>";
	
}
















} else {
print "<div class='alert alert-danger'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Warning: </strong> Please enter required data.
</div>";
}



}
?>
 
 
 
<br>
  
  <form action="<?php echo $_SERVER[PHP_SELF]; ?>" method="post">

 <div class="form-group">
  <input type="text" readonly class="form-control" style="" id="usr" value="<?php echo $_SESSION['accountno']; ?>" name="accountno" required="required">
</div>


<div class="form-group">
  <input type="text"  autocomplete="off"  class="form-control" id="usr" name="amount" Placeholder="Enter Amount" onKeyPress="return numbersonly(event)" required="required">
</div>


<div class="form-group">
    <textarea class="form-control"  id="usr"cols="30" rows="3" placeholder="Enter Reason" name="reasons" required></textarea>
</div>


<br>
  <button type="Submit" class="btn btn-primary" style="background-color:green" name="s">Submit</button>
</form>

 <br>
 <br>
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