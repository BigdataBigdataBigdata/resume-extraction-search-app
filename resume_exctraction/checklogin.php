<?php

require_once('include/database.php');
$myusername=$_POST['username'];
$mypassword=$_POST['passwd'];
echo $mypassword;
// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$mypassword = md5($mypassword);


$sql="SELECT * FROM users WHERE name='$myusername' and pass='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count = mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
   $uid = mysql_fetch_object($result);
    session_start();

$_SESSION['user_name']= $myusername;
$_SESSION['user_type']="authenticated";
$_SESSION['uid'] = $uid;
//session_register("mypassword");
header("location:test.php");
}
else {
echo "Wrong Username or Password";
}

?>
