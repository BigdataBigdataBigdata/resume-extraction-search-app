<?php session_start();
if(isset($_SESSION['uid']))
header("location:test.php");
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
						 <?php
                                            if(isset($_SESSION['user_type']))
                                            {
                                            print '<li><a href="logout.php" class="current">logout</a></li>';

                                            }
                                           
                                            ?>
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
                                  <?php if(isset($_SESSION['user_type']))
                                            {
                                    print'   Click <a href="test.php"> here </a> to submit resume';
                                   }
                                   else{
                                       print  '<form method="POST" action="checklogin.php" enctype="application/x-www-form-urlencoded">
	 <p>Username: <input type="text" name="username" id="username" size="25" required/></p>
	 <p>Password: <input type="password" name="passwd" id="passwd" size="25" required/></p>
	 <p>
	 <input type="submit" name="submit" id="submit" value="Login"/>
         <p> <a href="register.html"> Register here </a>
	 </p>
	 </form>';
                                   }
                                   ?>
	
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