<html>
<head>
	<title>Client Form</title>



<style type="text/css">
a:link{color:black; text-decoration:none}
a:active{color:black; text-decoration:none}
a:visited{color:black; text-decoration:none}
a:hover{color:blue; text-decoration:underline}
</style>




<?php

include("db_connect.php");

if($_GET['use']=="" and $_GET['man']==""){
} else {

if($_GET['man']=="manager"){
echo "<font size=4>Please, manager can only be updated or contact IT personnel</font>";
} else {


if($_GET['use']==""){
} else {

$qry = mysql_query("delete from users where username='$_GET[use]'");
if($qry){
echo "User has been successfully deleted";
} else {
echo "<font size=4>User could not be deleted</font>";
}

}
}
}
?>




</head>

<body  background="image/bgfront.png">




<table border=0 align=center cellpadding=0 cellspacing=0 width=600>
<tr>
<td>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input type="submit" value="Refresh">
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
<br><table border=0 align=center cellpadding=0 cellspacing=0 width=600>

<tr bgcolor='#333333'>
<td><b><font color='#ffffff'>Username</font></b></td>
<td><b><font color='#ffffff'>Name(s)</font></b></td>
<td><b><font color='#ffffff'>Role</font></b></td>
<td><b><font color='#ffffff'>Edit</font></b></td>
<td><b><font color='#ffffff'>Remove</font></b></td>
</tr>

";

$i=1;

while($i<=$num && list($v1,$v2,$v3) = mysql_fetch_array($qry)){

$c1 = ($i/2);
$c2 = round(($i/2),0);


if($c1==$c2){
$color="";
} else {
$color="#dddddd";

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


</body>
</html>