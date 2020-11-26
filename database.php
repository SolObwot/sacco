<?php

//localhost privileges
mysql_connect('localhost','root','');

//creating database using mysql script
mysql_query("create database sacco");

//localhost database connection string
include("db_connect.php");

//insert super-admin users default username and password
$qry = mysql_query("select * from users where role='super-admin'");
if(mysql_num_rows($qry)>0){
} else {
mysql_query("insert into users (username,name,role,password) values ('SACCO','administrator','super-admin','".md5(money)."')");
}

//creating users table with mysql script
mysql_query("create table users (username varchar(50) NOT NULL primary key,
name varchar(50) NOT NULL,
role varchar(50) NOT NULL,
password varchar(50) NOT NULL)TYPE=MyISAM");


//creating items table with mysql script
mysql_query("create table members (id int NOT NULL primary key auto_increment,
accountno varchar(50) NOT NULL,
studentid varchar(50) NOT NULL,
fullname varchar(50) NOT NULL,
email varchar(50) NOT NULL,
tel varchar(50) NOT NULL,
faculty varchar(50) NOT NULL,
course varchar(50) NOT NULL,
programme varchar(50) NOT NULL,
photo varchar(250) NOT NULL,
password varchar(50) NOT NULL,
amount varchar(50) NOT NULL,
dates varchar(50) NOT NULL,
approved varchar(50) NOT NULL)TYPE=MyISAM");


//creating transaction table with mysql script
mysql_query("create table transaction (id int NOT NULL primary key auto_increment,
accountno varchar(50) NOT NULL,
dep_with varchar(50) NOT NULL,
amount varchar(50) NOT NULL,
tran_type varchar(50) NOT NULL,
dates datetime NOT NULL)TYPE=MyISAM");


//creating loan_application table with mysql script
mysql_query("create table loan_application (id int NOT NULL primary key auto_increment,
accountno varchar(50) NOT NULL,
amount varchar(50) NOT NULL,
reasons text NOT NULL,
approved varchar(50) NOT NULL,
dates date NOT NULL)TYPE=MyISAM");


//creating disburment table with mysql script
mysql_query("create table disburment (id int NOT NULL primary key auto_increment,
accountno varchar(50) NOT NULL,
amount varchar(50) NOT NULL,
installment varchar(50) NOT NULL,
interest varchar(50) NOT NULL,
dates date NOT NULL)TYPE=MyISAM");


//creating loan_application table with mysql script
mysql_query("create table repayment (id int NOT NULL primary key auto_increment,
accountno varchar(50) NOT NULL,
principal  varchar(50) NOT NULL,
interest varchar(50) NOT NULL,
amount varchar(50) NOT NULL,
paid varchar(10) NOT NULL,
dates date NOT NULL,
sessions varchar(50) NOT NULL)TYPE=MyISAM");


?>