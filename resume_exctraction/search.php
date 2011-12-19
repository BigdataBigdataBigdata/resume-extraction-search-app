<?php require_once'include/bootstrap.php';
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
						 <?php
                                            if(isset($_SESSION['user_type']))
                                            {
                                            print '<li><a href="logout.php" class="current">logout</a></li>';

                                            }

                                            if($_SESSION['uid'] == 1)
                                            {
                                            print '<li><a href="search_form.php" class="current">Search Resumes</a></li>';

                                            }
                                            ?>
						
         				</ul>
				</div>
			</div>
		</nav>
		<section class="adv-content">
			<div class="container">
				
				
			</div>
		
	</header>
	<section id="content">
		<div class="top">
			<div class="container">
				<section>
                                    <div id="add_field">
                                       <?php
require_once'include/bootstrap.php';
$first_name = trim($_GET['first_name']);
       $last_name = $_GET['last_name'];
       $email = $_GET['email'];
       $city = $_GET['city'];
       $state =$_GET['state'];
       $zip = $_GET['zip'];
       $degree = $_GET['degree'];
       $college =$_GET['college'];
       $skills = $_GET['skills'];
       $exp = $_GET['exp'];

       $query = "select * from resume ";
//       if(isset($first_name))
//       {
//           $query .= " first_name = '$first_name' ";
//       }
//        if(isset($last_name))
//       {
//           $query .= " last_name = '$last_name', ";
//       }

//       echo $query;
       $result = mysql_query($query);
       print '<table><tr><th>First Name</th>
           <th>Last Name</th>
           <th>Email</th>
           <th>City</th>
           <th>State</th>
           <th>Download Resume</th></tr>';
       while($row = mysql_fetch_array($result))
       {
           print "<tr><td>".$row['first_name']."</td>
               <td>".$row['last_name']."</td>
                   <td>".$row['email']."</td>
                       <td>".$row['city']."</td>
                           <td>".$row['state']."</td>
                                 <td><a href='".$row['location']."'
                                     > Dowonload here </a></td>
               </tr>";
       }
?>
                                         </div>
                                    
	 </section>
				</div>
			</div>
		
	</section>
	<footer>
		
	</footer>
	

</body>
</html>