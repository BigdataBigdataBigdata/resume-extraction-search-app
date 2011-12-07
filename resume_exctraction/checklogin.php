<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="resume_extraction"; // Database name

$myusername=$_POST['username'];
$mypassword=$_POST['passwd'];
echo $mypassword;
// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$mypassword = md5($mypassword);
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$sql="SELECT * FROM users WHERE name='$myusername' and pass='$mypassword'";
$result=mysql_query($sql);
var_dump($result);
// Mysql_num_row is counting table row
$count = mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
    session_start();
$_SESSION['user_type']="authenticated";
//session_register("mypassword");
header("location:test.php");
}
else {
echo "Wrong Username or Password";
}

?>
