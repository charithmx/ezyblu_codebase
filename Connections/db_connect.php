<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_db_connect = "localhost";
$database_db_connect = "ezblu_final";
$username_db_connect = "root";
$password_db_connect = "";
$db_connect = mysqli_connect($hostname_db_connect, $username_db_connect, $password_db_connect) or trigger_error(mysqli_error($db_connect),E_USER_ERROR); 
?>
<?php


$con_global = mysqli_connect('localhost', 'root', '')or die('Can not establish the connection');
mysqli_select_db($con_global, 'ezblu_final')or die('Can not select the Database');

$conn = mysqli_connect($hostname_db_connect, $username_db_connect, $password_db_connect, $database_db_connect);
	
?>