<?php 
require_once'include/bootstrap.php';
$first_name = $_GET['first_name'];
       $last_name = $_GET['last_name'];
       $email = $_GET['email'];
       $city = $_GET['city'];
       $state =$_GET['state'];
       $zip = $_GET['zip'];
       $degree = $_GET['degree'];
       $college =$_GET['college'];
       $skills = $_GET['skills'];
       $exp = $_GET['exp'];  
       
       $result = mysql_query("select * from resume where first_name= '$first_name', last_name '$last_name', email='$email', city = '$city',
               state = '$state', zip = '$zip', degree = '$degree', college='$college', skills ='$skills', experience ='$exp'");
var_dump($result);
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
        <script type="text/javascript" src="js/resume_search.js"></script>
        <script>

</script>
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
						<li><a href="index.php" class="current">Login</a></li>
						
         				</ul>
				</div>
			</div>
		</nav>
		<section class="adv-content">
			<div class="container">
				<ul class="breadcrumbs">
                                    <li><strong> Please select your requirement from the following list</strong></li>
				</ul>
				
			</div>
		
	</header>
	<section id="content">
		<div class="top">
			<div class="container">
				<section>
                                    <div id="add_field">
                                        <form id="search" action="search.php" method="get" >                                  	 
         <label>Select Your Requirements:</label><br><br>
    
         
                                    <br>
                                        <input type="submit" value="search" name="submit" />
                                        </form>
                                         </div>
                                    
	 </section>
				</div>
			</div>
		
	</section>
	<footer>
		
	</footer>
	

</body>
</html>