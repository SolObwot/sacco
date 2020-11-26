<?php

if(isset($_GET[u])){

include("db_connect.php");



$u1 = $_GET['del'];
$u2 = $_GET['data'];

if($u1 and $u2){


$qry = mysql_query("update pictures  set title='$u2' where id='$u1'");

if($qry){

header("Location: view images.php");
exit;


} else {
}

} else {
$h.="<font color=red>Please fill in data to be updated</font>";
}

}

?>










<html>
<head>

<title>Picture Update Form</title>

</head>

<body bgcolor="#FFFFFF">




<table border=0 align=center cellpadding=0 cellspacing=0>
<tr>
<td>

<?php echo $h; ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
<fieldset>
<legend>Picture Update Form</legend>
<table>

<tr>
<td><b></b></td>
<td><input type="hidden" name="del" value="<?php echo $_GET[del]; ?>"></td>
</tr>


<tr>
<td><b>Text</b></td>
<td><textarea name="data" rows="15" cols="30"><?php echo $_GET[data]; ?></textarea></td>
</tr>


<tr>
<td><input type="submit" name="u" value="Update" onClick="return confirm('Are sure you want to update text?')"></td>
<td><input type="reset" value="Reset"></td>
</tr>


</table>
</fieldset>
</form>





</td>
</tr>
</table>


</body>
</html>