<html>
<head>
<title></title>


<style type="text/css">
a:link{color:black; text-decoration:none}
a:active{color:black; text-decoration:none}
a:visited{color:black; text-decoration:none}
a:hover{color:red; text-decoration:none}
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

<body bgcolor="#ffffff">


<br><br>

<table align=center border=0 cellpadding=0 cellspacing=0 width="600">
<tr>
<td>


<?php

include("db_connect.php");




if($_GET['use']==""){
} else {

$qry = mysql_query("delete from users where username='$_GET[use]'");
if($qry){
echo "Member has been successfully deleted";
} else {
echo "<font size=4>Member could not be deleted</font>";
}

}

?>

<?php

if(isset($_POST[u])){

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
	echo "<font color=red>Photo already exists.</font>";
} else {
	




$upload = move_uploaded_file($picture3,"photo/".$picture1);	
if($upload){
	
$qry = mysql_query("insert into members (accountno,studentid,fullname,email,tel,faculty,course,programme,photo,password,amount,dates) 
values ('$r1','$r2','$r3','$r4','$r5','$r6','$r7','$r8','$r9','$r10','$r11','$r12')") or die(mysql_error());
if($qry){
echo "Thanks, successfully registered";
} else {
echo "<font color=red>It could not upload, submitting data</font>";
}

} else {
echo "<font color=red>It could not upload, submitting data.</font>";
}


}





} else {
echo "<font color=red>please entry not complete</font>";
}

}

?>



<form action="<?php echo $_SERVER[PHP]; ?>" method="post" enctype="multipart/form-data">
<fieldset>
<table align=center border=0 cellpadding=5 cellspacing=0 width="600">
<tr>
<td colspan="2" align="center"><font color="#000000" size="+1">Member Submission Form</font></td>
</tr>

<tr>
<td colspan="2" align="center">&nbsp;</td>
</tr>




<tr>
<td><b>Account No</b></td>
<td><input type="text" name="accountno" value="<?php echo date("YmdHis") ?>" readonly size="15" maxlength="10"></td>
</tr>

<tr>
<td><b>Student Number</b></td>
<td><input type="text" name="studentid" size="15" maxlength="50"></td>
</tr>


<tr>
<td><b>Full Name</b></td>
<td><input type="text" name="fullname" size="15" maxlength="250"></td>
</tr>

<tr>
<td><b>Email</b></td>
<td><input type="text" name="email" size="15" maxlength="250"></td>
</tr>

<tr>
<td><b>Tel</b></td>
<td><input type="text" name="tel" onKeyPress="return numbersonly(event)" size="15" maxlength="250"></td>
</tr>


<tr>
<td><b>Faculty</b></td>
<td><input type="text" name="faculty" size="15" maxlength="250"></td>
</tr>


<tr>
<td><b>Course</b></td>
<td><input type="text" name="course" size="15" maxlength="250"></td>
</tr>

<tr>
<td><b>Programme</b></td>
<td><input type="text" name="programme" size="15" maxlength="250"></td>
</tr>


<tr>
<td><b>Initial Deposit</b></td>
<td><input type="text" name="amount" onKeyPress="return numbersonly(event)" value="20000" size="15" maxlength="250"></td>
</tr>


<tr>
<td><b>Photo</b></td>
<td><input type="file" name="photo" size="15" maxlength="250"></td>
</tr>


<tr>
<td><b>Password</b></td>
<td><input type="password" name="password" size="15" maxlength="250"></td>
</tr>


<tr>
<td><b></b></td>
<td><input type="submit" name="u" value="Register"></td>
</tr>
</table>

</fieldset>

</form>

</td>
</tr>



</table>





</body>
 </html>