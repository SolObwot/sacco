<?php
$db = mysql_connect("localhost", "root", "");
if(!$db) die("no db");
if(!mysql_select_db("sacco",$db))
 	die("No database selected.");

?>