<?php
$host="localhost"; // Host name
$username="webber83"; // Mysql username
$password="fL00700029"; // Mysql password
$db_name="webber83"; // Database name
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

?>
