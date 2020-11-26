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



a:link{color:white; text-decoration:none}
a:active{color:white; text-decoration:none}
a:visited{color:white; text-decoration:none}
a:hover{color:yellow; text-decoration:none}


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
<div class="col-lg-12">

<br>
<br>

<a href="index.php"><b>Home</b></a>




</div>
</div>
 
 

 </div>
  <div class="col-lg-8" style="background-color:#ffffff">
  
  
  <br>
  


 <div class="row">
 <div class="col-lg-2">&nbsp;</div>
 <div class="col-lg-8">
 
 
<h5 align="center"><b>Members Registration Form</b></h5>

<?php

if(isset($_POST[s])){

include("db_connect.php");


$r1 = $_POST['accountno'];
$r2 = $_POST['studentid'];
$r3 = $_POST['fullname'];
$r4 = $_POST['email'];
$r5 = $_POST['tel'];
$r6 = $_POST['faculty'];
$r7 = $_POST['course'];
$r8 = $_POST['programme'];
$r9 = $_FILES['photo']['name'];
$r10 = $_POST['password'];
$r11 = $_POST['amount'];
$r12 = date("Y-m-d");



$picture1 = $_FILES['photo']['name'];
$picture2 = $_FILES['photo']['size'];
$picture3 = $_FILES['photo']['tmp_name'];
$picture4 = $_FILES['photo']['type'];



if($r1 and $r2 and $r3 and $r4 and $r5 and $r6 and $r7 and $r8 and $r9 and $r10 and $r11){



if(file_exists("photo/$picture1")){
	
	
	print "<div class='alert alert-danger'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Warning: </strong> Photo already exists.
</div>";
} else {
	




$upload = move_uploaded_file($picture3,"photo/".$picture1);	
if($upload){
	
$qry = mysql_query("insert into members (accountno,studentid,fullname,email,tel,faculty,course,programme,photo,password,amount,dates,approved) 
values ('$r1','$r2','$r3','$r4','$r5','$r6','$r7','$r8','$r9','$r10','$r11','$r12','No')") or die(mysql_error());
if($qry){
	
print "<div class='alert alert-success alert-dismissible'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
Success:  Successfully Submitted
</div>";

} else {


print "<div class='alert alert-danger'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Warning: </strong> It could not upload, submitting data
</div>";

}

} else {

print "<div class='alert alert-danger'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Warning: </strong> It could not upload, submitting data.
</div>";
}


}


} else {

print "<div class='alert alert-danger'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Warning: </strong> please entry not complete
</div>";
}

}

?>
 
 
 
<br>
  
  <form action="<?php echo $_SERVER[PHP_SELF]; ?>" method="post" enctype="multipart/form-data">

 <div class="form-group">
  <input type="text" class="form-control" name="accountno" value="<?php echo date("YmdHis") ?>" readonly  required="required">
</div>


<div class="form-group">
  <input type="text"  autocomplete="off"  class="form-control"  name="studentid" Placeholder="Enter Student ID"  required="required">
</div>

<div class="form-group">
  <input type="text"  autocomplete="off"  class="form-control"  name="fullname" Placeholder="Enter Fullname"  required="required">
</div>

<div class="form-group">
  <input type="text"  autocomplete="off"  class="form-control"  name="email" Placeholder="Enter Email"  required="required">
</div>

<div class="form-group">
  <input type="text"  autocomplete="off"  class="form-control"  name="tel" Placeholder="Enter Telephone" onKeyPress="return numbersonly(event)"  required="required">
</div>

<div class="form-group">
  <input type="text"  autocomplete="off"  class="form-control"  name="faculty" Placeholder="Enter Faculty"  required="required">
</div>

<div class="form-group">
  <input type="text"  autocomplete="off"  class="form-control"  name="course" Placeholder="Enter Course"  required="required">
</div>

<div class="form-group">
  <input type="text"  autocomplete="off"  class="form-control"  name="programme" Placeholder="Enter Programme"  required="required">
</div>

<div class="form-group">
  <input type="text"  autocomplete="off"  class="form-control"  name="amount"  Placeholder="Enter Member Fee" onKeyPress="return numbersonly(event)"  required="required">
</div>

<div class="form-group">
  <input type="file"  autocomplete="off"  class="form-control"  name="photo" required="required">
</div>

<div class="form-group">
  <input type="password"  autocomplete="off"  class="form-control"  name="password" Placeholder="Enter Password"  required="required">
</div>


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