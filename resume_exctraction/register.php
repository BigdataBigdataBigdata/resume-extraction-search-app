 <?php    
 require_once 'include/bootstrap.php';
         $uname = $_POST["username"];
         $pwd = $_POST["pwd"];
         $email = $_POST["email"];
         
$pwd= md5($pwd);


function userTaken($uname,$email)
{
    $result = mysql_query("select * from users where name = '$uname'");
    if(mysql_num_rows($result) != 0)
        return true;
    $result = mysql_query("select * from users where mail = '$email'");
if(mysql_num_rows($result) != 0)
    return true;
}




if(userTaken($uname,$email))
{
    echo "username or email is already taken <a href='register.html'>Try another email id and username</a>";
}
    
    else
    {

    $sql = "INSERT INTO users (name,pass,mail) VALUES ('$uname','$pwd','$email')";
  
if(mysql_query($sql))
{
  $uid = mysql_insert_id();
$sq2 = "select * from users where uid=\"$uid\"";                                                  
$rs2 = mysql_query( $sq2) or die( "Could not execute query" );
$num = mysql_numrows( $rs2 );

if( $num != 0 )
{
echo "trying to set sessions";

    $_SESSION['uid']= $uid;
    $_SESSION['user_type'] = 'authenticated';
    $_SESSION['user_name'] = $uname;
    var_dump($_SESSION);
     header( 'Location:index.php' );
}

}

}
?>

