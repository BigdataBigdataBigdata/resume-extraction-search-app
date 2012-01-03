 <?php    
 require_once 'include/database.php';
         $uname = $_POST["username"];
         $pwd = $_POST["pwd"];
         $email = $_POST["email"];
         
$pwd= md5($pwd);
$result = mysql_query("select * from users where mail = '$email'");
if(mysql_num_rows($result) != 0)
{
        echo "email already taken <a href='register.html'>Try another email id</a>";
}
else{
echo "inside else";
    $sql = "INSERT INTO users (name,pass,mail) VALUES ('$uname','$pwd','$email')";
    var_dump(mysql_query($sql));
    echo mysql_error();
if(mysql_query($sql));
  $uid = mysql_insert_id();
$sq2 = "select * from users where mail=\"$email\"";                                                  
$rs2 = mysql_query( $sq2) or die( "Could not execute query" );
$num = mysql_numrows( $rs2 );

if( $num != 0 )
{
echo "trying to set sessions";

session_start();
    $_SESSION['uid']= $uid;
    $_SESSION['user_type'] = 'authenticated';
    $_SESSION['user_name'] = $uname;
     header( 'Location:index.php' );
}
}
?>

