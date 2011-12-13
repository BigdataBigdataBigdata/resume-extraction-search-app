 <?php
require_once('include/bootstrap.php');
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
					<h1><a href="index.php"><strong>Resume Extractor</strong></a></h1>
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
				<form action="" id="search-form">
					<fieldset>
						<input type="text" value=""><input type="submit" value="">
					</fieldset>
				</form>
			</div>
		</section><div class="ic">More Website Templates at TemplateMonster.com!</div>
	</header>
	<section id="content">
	<div class="top">
			<div class="container">
		<form action="fileUpload.php"
enctype="multipart/form-data" method="post">

<p>
Please specify a file, or a set of files:<br>
<input type="file" name="file" size="40">
</p>
<div>
<input type="submit" value="Send">
</div>
</form>
</div>
</div>
	</section>
	<footer>
		<div class="container">
			<div class="wrapper">
				<div class="copy"></div>
				
			</div>
		</div>
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