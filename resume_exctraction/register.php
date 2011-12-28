 <?php    
 require_once 'include/bootstrap.php';
         $uname = $_POST["username"];
         $pwd = $_POST["pwd"];
         $email = $_POST["email"];
         
         //var_dump($uname);
 


$pwd= md5($pwd);


$sql = "INSERT INTO users (name,pass,mail) VALUES ('$uname','$pwd','$email')";
$sqlemail = "Select * from users where mail='$email'"; 
if (!mysql_query($sql))
  {
     if(!mysql_query($sqlemail))
     {
       die('Error: ' . mysql_error());  
     }
 else {
         die( 'Email id is already exists');
     }
     
  }
  $uid = mysql_insert_id();
$sq2 = "select * from users where mail=\"$email\"";                                                  
$rs2 = mysql_query( $sq2) or die( "Could not execute query" );
$num = mysql_numrows( $rs2 );

if( $num != 0 )
{
   
    $_SESSION['uid']= $uid;
    $_SESSION['user_type'] = 'authenticated';
    $_SESSION['user_name'] = $uname;
     header( 'Location:index.php' );
}
?>

