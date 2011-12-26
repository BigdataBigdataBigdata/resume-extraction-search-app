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
//$first_name = trim($_GET['first_name']);
  //     $last_name = $_GET['last_name'];
    //   $email = $_GET['email'];
      // $city = $_GET['city'];
       //$state =$_GET['state'];
       //$zip = $_GET['zip'];
       //$degree = $_GET['degree'];
       //$college =$_GET['college'];
       $skills = $_GET['skills'];
       $exp = $_GET['exp'];

       $query = '';
       if(!$_GET['first_name'] == null)
       {
         $query = "first_name = '$_GET[first_name]'";
       }

       if(!$_GET['last_name'] == null)
       {
           if($query == null)
         $query = "last_name = '$_GET[last_name]'";
           else
               $query .= "and last_name = '$_GET[last_name]'";
       }

          if(!$_GET['email'] == null)
       {
           if($query == null)
         $query = "email = '$_GET[email]'";
           else
               $query .= " and email = '$_GET[email]'";
       }

          if(!$_GET['city'] == null)
       {
           if($query == null)
         $query = "city = '$_GET[city]'";
           else
               $query .= " and city = '$_GET[city]'";
       }


          if(!$_GET['state'] == null)
       {
           if($query == null)
         $query = "state = '$_GET[state]'";
           else
               $query .= " and state = '$_GET[state]'";
       }


          if(!$_GET['zip'] == null)
       {
           if($query == null)
         $query = "zip = '$_GET[zip]'";
           else
               $query .= " and zip = '$_GET[zip]'";
       }


          if(!$_GET['degree'] == null)
       {
           if($query == null)
         $query = "degree = '$_GET[degree]]'";
           else
               $query .= " and degree = '$_GET[degree]'";
       }


          if(!$_GET['college'] == null)
       {
           if($query == null)
         $query = "college = '$_GET[college]'";
           else
               $query .= " and college = '$_GET[college]'";
       }


          if(!$_GET['skills'] == null)
       {
           if($query == null)
         $query = "skills like '%$_GET[skills]%'";
           else
               $query .= " and skills like '%$_GET[skills]%'";
       }

          if(!$_GET['exp'] == null)
       {
           if($query == null)
         $query = "experience = '$_GET[exp]'";
           else
               $query .= " and experience = '$_GET[exp]'";
       }
       $query = "select * from resume where ".$query;

       var_dump($query);
    $result = mysql_query($query);
  
    if($result === false)
    {
        echo 'there are no results for your search. Please try another search <a href="search_form.php" >here</a>';
    }
    else{
       if(mysql_num_rows($result) == 0)
       {
           echo "0 matching resumes found";
       }
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
       print'  <a href="search_form.php" >Click here for another search</a>';
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