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


if($_POST['opx']){
	print $_POST['opx'];
}

print "<br><br>";

if(isset($_POST[u])){

include("db_connect.php");


$r1 = $_POST['accountno'];
$r2 = $_POST['dep_with'];
$r3 = $_POST['amount'];
$r4 = $_POST['tran_type'];
$r5 = date("Y-m-d, H:i:s");




if($r1 and $r2 and $r3 and $r4 and $r5){



###################
$dep = mysql_query("select sum(amount) as amt from transaction where dep_with='Deposit' and accountno='$r1' group by dep_with");
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




if($r2 == "Withdrawal"){
	
	
if($r3 >= $total){
		
####withdrawal failed
print "<form name='xx' action='".$_SERVER[PHP_SELF]."' method='post'>
<input type='hidden' name='opx' value='Thanks, you can not withdraw (Less cash: $total)'>
<input type='hidden' name='accountno' value='$r1'>
<script language=\"javascript\">
document.xx.submit();
</script>
</form>";	
####withdrawal failed		
		
} else {
		
		
####withdrawal
$qry = mysql_query("insert into transaction (accountno,dep_with,amount,tran_type) 
values ('$r1','$r2','$r3','$r4')") or die(mysql_error());
if($qry){
print "<form name='xx' action='".$_SERVER[PHP_SELF]."' method='post'>
<input type='hidden' name='opx' value='Thanks, $r2 successfully Submitted'>
<input type='hidden' name='accountno' value='$r1'>
<script language=\"javascript\">
document.xx.submit();
</script>
</form>";	
} else {
echo "<font color=red>It could not submit data</font>";
}
####withdrawal
		
}
	
	
} else {
	
	
####deposit
$qry = mysql_query("insert into transaction (accountno,dep_with,amount,tran_type) 
values ('$r1','$r2','$r3','$r4')") or die(mysql_error());
if($qry){
print "<form name='xx' action='".$_SERVER[PHP_SELF]."' method='post'>
<input type='hidden' name='opx' value='Thanks, $r2 successfully Submitted'>
<input type='hidden' name='accountno' value='$r1'>
<script language=\"javascript\">
document.xx.submit();
</script>
</form>";	
} else {
echo "<font color=red>It could not submit data</font>";
}
####deposit

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
<td colspan="2" align="center"><font color="#000000" size="+1">Deposit/Withdrawal Submission Form</font></td>
</tr>

<tr>
<td colspan="2" align="center">&nbsp;</td>
</tr>




<tr>
<td><b>Account No</b></td>
<td><input type="text" required name="accountno"  value="<?php echo $_GET[accountno]; echo $_POST[accountno];  ?>" readonly size="15" maxlength="10"></td>
</tr>

<tr>
<td><b>Deposit/Withdrawal</b></td>
<td>

<select name="dep_with" required>
<option value="">--Select--</option>
<option value="Deposit">Deposit</option>
<option value="Withdrawal">Withdrawal</option>
</select>

</td>
</tr>


<tr>
<td><b>Amount</b></td>
<td><input type="text" name="amount" onKeyPress="return numbersonly(event)" size="15" maxlength="15"></td>
</tr>


<tr>
<td><b>Transaction Type</b></td>
<td>

<select name="tran_type" required>
<option value="">--Select--</option>
<option value="Cash">Cash</option>
<option value="Mobile">Mobile</option>
<option value="Online">Online</option>
</select>

</td>
</tr>


<tr>
<td><b></b></td>
<td><input type="submit" name="u" value="Submit"></td>
</tr>
</table>

</fieldset>

</form>

</td>
</tr>



</table>





</body>
 </html>