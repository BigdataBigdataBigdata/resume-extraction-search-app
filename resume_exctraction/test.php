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
				<ul class="breadcrumbs">
					<li>Home</li>
				</ul>
				
			</div>
		</section><div class="ic">More Website Templates at TemplateMonster.com!</div>
	</header>
	<section id="content">
	<div class="top">
			<div class="container">
                            <?php require_once'include/bootstrap.php';
                            
                           $result =  mysql_query("select * from users where uid = '$uid'");
                           $obj = mysql_fetch_object($result);
                           echo "Welcome user: ".$obj->name;
                           print '<br />';   
                           print '</br>';

                           
                           $result = mysql_query("select * from resume where uid = '$uid' order by time desc");
                          
                           print '<h3 >Resumes in your profile</h3>';
                          print '<table >';
                          print '
                                                      
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Address</th>
                              <th>Pnone</th>
                              <th>email</th>
                              <th>Resume</th>
                              </tr>';
                          $row = mysql_fetch_object($result);
  
  print "<tr>
       <td> ".$row->first_name."</td>
            <td>". $row->last_name."</td>
                 <td>". $row->address."</td>
                      <td>". $row->phone."</td>
                           <td>". $row->email ."</td>
      <td> <a href=". $row->location."> Click here to download</a></td>
            </tr>
  ";
  
  print'</table> </br>';
 
  

      
      print '		<form action="fileUpload.php"
enctype="multipart/form-data" method="post">

<p>
Please upload a resume:<br>
<input type="file" name="file" size="40">
</p>
<div>
<input type="submit" value="Send">
</div>
<p> Resume should follow <a href="http://office.microsoft.com/en-us/templates/basic-resume-template-TC102716871.aspx">this</a> format
    or you can use <a href="form.html">Resume Builder</a> to build your resume.
</p>
</form>';
      

                            ?>


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