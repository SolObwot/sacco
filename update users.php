<?php


include("db_connect.php");



$usernam = $_GET['usernam'];

$u1 = $_GET['username'];
$u2 = $_GET['password'];
$u3 = md5($_GET['password']);

if($u1 and $u2){


$qry = mysql_query("update users set username='$u1', password='$u3' where username='$usernam'");

if($qry){

header("Location: other users register.php?upd=User Successfully updated");
exit;


} else {
}

} else {
$h.="<font color=red>Please fill in data to be updated</font>";
}


?>










<html>
<head>

<title>Users Update Form</title>

</head>

<body bgcolor="white">




<table border=0 align=center cellpadding=0 cellspacing=0>
<tr>
<td>

<?php echo $h; ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
<fieldset>
<legend>Update Form</legend>
<table>

<tr>
<td><b>Username</b></td>
<td><input type="text" name="username" maxlength="8">
<input type="hidden" name="usernam" value="<?php echo $usernam; ?>">
</td>
</tr>


<tr>
<td><b>Password</b></td>
<td><input type="password" name="password" maxlength="8"></td>
</tr>


<tr>
<td><input type="submit" name="u" value="Update" onclick="return confirm('Are sure you want to update user?')"></td>
<td><input type="reset" value="Reset"></td>
</tr>


</table>
</fieldset>
</form>





</td>
</tr>

<tr>
<td><a href="other users register.php">Click Back</a></td>
</tr>
</table>


</body>
</html>