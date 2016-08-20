<?php
$dbname = 'dictims';
$dbuser = 'root';
$dbpass = '';
$dbhost = 'localhost';

$con = mysql_connect($dbhost, $dbuser, $dbpass) or die("数据库连接出错，请检查连接字串。"); //提示错误

// mysql_query("SET NAMES 'GBK'", $con);
mysql_query("SET NAMES 'UTF8'", $con); 
mysql_query("SET CHARACTER_SET='UTF8", $con); 
mysql_query("SET CHARACTER_SET_RESULTS='UTF8'", $con); 
mysql_query("SET CHARACTER_SET_CLIENT='UTF8'", $con); 
mysql_query("SET CHARACTER_SET_CONNECTION='UTF8'", $con); 

mysql_select_db($dbname, $con) or die("数据库连接出错，请检查连接字串。"); //提示错误

if (!session_id()) session_start(); //Undefined variable: _SESSION
?>
