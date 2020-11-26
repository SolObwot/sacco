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
<link href='css/body.css' rel='stylesheet'>


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


</style>

</head>

<body>

<br>
<br>





<div class="container">
  <div class="row">
  <div class="col-lg-2">&nbsp;</div>
  <div class="col-lg-4" style="background-color:#ffffff">
  
  
  <br>
  


 
 <div class="row">
 <div class="col-lg-2">&nbsp;</div>
  <div class="col-lg-8">
 
 
<?php

if(isset($_POST[s])){

include("db_connect.php");

$d1 = $_POST['username'];
$d2 = $_POST['password'];
$d3 = md5($_POST['password']);
$d4 = trim($_POST['category']);


if($d1 and $d2 and $d4){



if($d4=="Administrator"){




$qry = mysql_query("select * from users where username='$d1' and password='$d3'");
if(mysql_num_rows($qry)>0){


print "<form name='xx' action='dashboard_md.php' method='post'>
<script language=\"javascript\">
document.xx.submit();
</script>
</form>";


} else {
print "<div class='alert alert-danger'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Warning: </strong> Wrong password or Username
</div>";
}





} else {
	

	

$qry = mysql_query("select * from members where studentid='$d1' and password='$d2' and approved='Y'");
if(mysql_num_rows($qry)>0){
	
while($row = mysql_fetch_array($qry)){
	$accountno = $row['accountno'];
}


$_SESSION['studentid'] = $d1;
$_SESSION['accountno'] = $accountno;


print "<form name='xx' action='mem_users.php' method='post'>
<script language=\"javascript\">
document.xx.submit();
</script>
</form>";

} else {
print "<div class='alert alert-danger'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Warning: </strong> Wrong password or Username, Not Approved
</div>";
}


	
}







} else {
print "<div class='alert alert-danger'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Warning: </strong> Please enter required data
</div>";


}

}
?>
 
 <br>
 
 <p align="center"><img src="images/logo.png" style="width:80px"></p>
 
 <h6 align="center"><b>DIGITAL FINANCIAL MANAGEMENT SYSTEM</b></h6>
<br>
  
  <form action="<?php echo $_SERVER[PHP_SELF]; ?>" method="post">

 <div class="form-group">
  <input type="text" autocomplete="off" class="form-control" style="" id="usr" name="username" Placeholder="Enter Username" required="required">
</div>


<div class="form-group">
  <input type="password"  autocomplete="off"  class="form-control" id="usr" name="password" Placeholder="Enter Password" required="required">
</div>


<div class="form-group">
  <select class="form-control" id="sel1" name="category">
  <option value="">--Select Category--</option>
    <option value="Administrator">Administrator</option>
    <option value="Member">Member</option>
  </select>
</div>


<br>
  <button type="Submit" class="btn btn-primary" style="background-color:green" name="s">Login</button>
</form>

 <br>
 
 Do you have account? <br> 
 <a href="member_register.php">Register Now</a>
 
 <br>
 <br>
 <br>
 
 
 
 </div>
 <div class="col-lg-2">&nbsp;</div>
 </div>
 
 
  
  
</div>
 <div class="col-lg-4" style="background:url(images/image2.jpg);">
 
<div class="row" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;border:0px solid; background-color:rgba(67, 104, 24, 0.9)">
<div class="col-lg-2">&nbsp;</div>
</div>
 
 
 
 
<div class="row">
  <div class="col-lg-2">&nbsp;</div>
  <div class="col-lg-8" style="padding: 100px 0;
  border: 0px solid green;">
  
  
  <font color="#fff000">
  <h5><b>Financial Management System-Faculty of Science</b></h5>
  </font>
  
  <font color="#ffffff">
  Use your Registration Number as your User ID and enter your password to login.
  </font>
 
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