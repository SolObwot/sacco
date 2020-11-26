<html>
<head>
<title></title>


<style type="text/css">
a:link{color:black; text-decoration:none}
a:active{color:black; text-decoration:none}
a:visited{color:black; text-decoration:none}
a:hover{color:red; text-decoration:none}
</style>




</head>

<body bgcolor="#ffffff">


<br><br>

<table align=center border=0 cellpadding=0 cellspacing=0 width="300">
<tr>
<td>


<?php

include("db_connect.php");




if($_GET['use']==""){
} else {

$qry = mysql_query("delete from users where username='$_GET[use]'");
if($qry){
echo "User has been successfully deleted";
} else {
echo "<font size=4>User could not be deleted</font>";
}

}

?>

<?php

if(isset($_POST[u])){

include("db_connect.php");


$r1 = $_POST['username'];
$r2 = $_POST['name'];
$r3 = $_POST['role'];
$r4 = $_POST['password'];
$r5 = md5($_POST['password']);


if($r1 and $r2 and $r3 and $r4){


$qry = mysql_query("select * from users");
if(mysql_num_rows($qry)>2000){
echo "<font color=red>Please, required number already exist</font>";
} else {




$qry = mysql_query("insert into users (username,name,role,password) values ('$r1','$r2','$r3','$r5')");
if($qry){
echo "Thanks, successfully registered";
} else {
echo "<font color=red>username already exists</font>";
}




}




} else {
echo "<font color=red>please entry not complete</font>";
}

}

?>



<form action="<?php echo $_SERVER[PHP]; ?>" method="post">
<fieldset>
<table align=center border=0 cellpadding=0 cellspacing=0 width="500">
<tr>
<td colspan="2" align="center"><font color="#000000" size="+1">User Submission Form</font></td>
</tr>

<tr>
<td colspan="2" align="center">&nbsp;</td>
</tr>

<tr>
<td><b>Username</b></td>
<td><input type="text" name="username" size="15" maxlength="8"></td>
</tr>

<tr>
<td><b>Fullname</b></td>
<td><input type="text" name="name" size="15" maxlength="25"></td>
</tr>

<tr>
<td><b>Title</b></td>
<td>


<select name="role">
<?php
include("db_connect.php");
$qryx = mysql_query("select * from users where role='CHAIRMAN'");
if(mysql_num_rows($qryx)>0){
} else {
print "<option value=\"CHAIRMAN\">CHAIRMAN</option>";
}
?>

<?php
include("db_connect.php");
$qryx = mysql_query("select * from users where role='TREASURER'");
if(mysql_num_rows($qryx)>30){
} else {
print "<option value=\"TREASURER\">TREASURER</option>";
}
?>

</select>






</td>
</tr>


<tr>
<td><b>Password</b></td>
<td><input type="password" name="password" size="15" maxlength="8"></td>
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


<tr>
<td>

<?php

echo "<font size=4><b>$_GET[upd]</b></font>";

include("db_connect.php");

$qry = mysql_query("select * from users");

$num=mysql_num_rows($qry);



if(mysql_num_rows($qry)>0){


echo "
<br><table border=0 align=center cellpadding=0 cellspacing=0 width=700>

<tr bgcolor='#000'>
<td><b><font color='#ffffff'>Username/Login</font></b></td>
<td><b><font color='#ffffff'>Fullname</font></b></td>
<td><b><font color='#ffffff'>Title</font></b></td>
<td><b><font color='#ffffff'>Change</font></b></td>
<td><b><font color='#ffffff'>Delete</font></b></td>
</tr>

";

$i=1;

while($i<=$num && list($v1,$v2,$v3) = mysql_fetch_array($qry)){

$c1 = ($i/2);
$c2 = round(($i/2),0);


if($c1==$c2){
$color="";
} else {
$color="#aef9a2";

}


if($v3=="super-admin"){
$del="&nbsp;";
} else {
$del="Delete";
}


if($v3=="super-admin"){
$upda="&nbsp;";
} else {
$upda="Update";
}


if($v3=="super-admin"){
$v1="";
$v2="";
$v3="";

} else {
$v1=$v1;
$v2=$v2;
$v3=$v3;

}



echo "
<tr bgcolor='$color'>
<td>$v1</td>
<td>$v2</td>
<td>$v3</td>
<td><a href='update users.php?usernam=$v1'>$upda</a></td>
<td><a href='".$_SERVER[PHP_SELF]."?use=$v1 && man=$v3' onclick=\"return confirm('Are you sure you want to delete')\">$del</a></td>
</tr>
";


$i++;

}

echo "</table>";

} else {
echo "<font size=4><b>No users registered yet</b></font>";
}


?>
</td>
</tr>


</table>





</body>
 </html>