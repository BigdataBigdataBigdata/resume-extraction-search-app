<?php
require_once 'include/database.php';
$myusername=$_POST['username'];
$mypassword=$_POST['passwd'];
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

$_SESSION['uid'] = $uid->uid;

header("location:test.php");
}
else {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/grid.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/jquery-ui-1.8.5.custom.css" type="text/css" media="all">
	<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
	<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.5.custom.min.js"></script>
	<!--[if lt IE 9]>
		<script type="text/javascript" src="js/html5.js"></script>
	<![endif]-->
</head>

<body>
	<header>
		<nav>
			<div class="container">
				<div class="wrapper">
					<h1><a href="index.php"><strong>Resume Extraction</strong></a></h1>
					<ul>
</ul>
				</div>
			</div>
		</nav>
		<section class="adv-content">
			<div class="container">
				<ul class="breadcrumbs">
					<li>Home</li>
				</ul>

			</div>

	</header>
	<section id="content">
		<div class="top">
			<div class="container">
				<section>
                                 Please provide the correct username/password <a href="index.php">Here</a><br>
                                 If you are not yet registered please <a href='register.html'> register here</a>
	
	 </section>
				</div>
			</div>

	</section>
	<footer>

	</footer>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.pics').cycle({
				fx: 'toss',
				next:	 '#next',
				prev:	 '#prev'
			});

			// Datepicker
			$('#datepicker').datepicker({
				inline: true
			});

		});
	</script>
</body>
</html>
<?php
}
?>