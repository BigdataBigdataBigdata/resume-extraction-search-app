 <?php    
         $uname = $_POST["username"];
         $pwd = $_POST["pwd"];
         $email = $_POST["email"];
         
         //var_dump($uname);
 

$con = mysql_connect("localhost", "root","" );
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
@mysql_select_db("resume_extraction", $con) or die( "Could not select database" );
//echo "connected";
$pwd= md5($pwd);

$sql = "INSERT INTO users (name,pass,mail) VALUES ('$uname','$pwd','$email')";
//mysql_query( $sql ) or die( "Could not execute query" );
if (!mysql_query($sql,$con))
  {
     die('Error: ' . mysql_error());
  }
$sq2 = "select * from users where mail=\"$email\"";                                                  
$rs2 = mysql_query( $sq2) or die( "Could not execute query" );
$num = mysql_numrows( $rs2 );
if( $num != 0 )
{
     header( 'Location:index.html' );
}
?>

