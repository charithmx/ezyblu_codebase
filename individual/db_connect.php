<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
	
$hostname_db_connect = "localhost";
$database_db_connect = "harimathena";
$username_db_connect = "root";
$password_db_connect = "ezblue_root@123";

//$db_connect = mysql_connect($hostname_db_connect, $username_db_connect, $password_db_connect) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
<?php

$con_global = mysqli_connect('localhost', 'root', 'ezblue_root@123')or die('Can not establish the connection');
mysqli_select_db($con_global, 'harimathena')or die('Can not select the Database');

$connect = new PDO("mysql:host=localhost;dbname=harimathena", "root", "ezblue_root@123");

$con_global -> set_charset("utf8");
	
?>
