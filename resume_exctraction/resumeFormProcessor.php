<?php
require_once'include/bootstrap.php';
require_once 'Resume.php';

?>
<!DOCTYPE HTML >
<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/grid.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/jquery-ui-1.8.5.custom.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/jquery-ui-1.8.16.custom.css" type="text/css" media="all">
        <script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
        <script type="text/javascript" src="js/resume-builder.js" ></script>
        <script type="text/javascript" src="js/jquery.cycle.all.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.5.custom.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
        <script>
            $(function() {
                $( "#accordion" ).accordion();
            });
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
                        <li><a href="index.php" class="current">Logout</a></li>

                    </ul>
                </div>
            </div>
        </nav>
        <section class="adv-content">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><strong>Resume Builder</strong></li>
                </ul>

            </div>

    </header>
    <section id="content">
        <div class="top">
            <div class="container">
                <section>

<?php
require_once'include/bootstrap.php';
require_once 'Resume.php';
$res = new Resume($uid);
if($_POST['first-name'] != null)
{

    $res->firstname = $_POST['first-name'];
}
if($_POST['last-name']!= null)
{

    $res->lastname = $_POST['last-name'];
}

if(isset($_POST['address']) != null)
{
    $res->address = $_POST['address'];
}
if(isset($_POST['city'])!= null)
{
    $res->city = $_POST['city'];
}
if(isset($_POST['state'])!= null)
{
    $res->state= $_POST['state'];
}

if(isset($_POST['zip'])!= null)
{
    $res->zip = $_POST['zip'];
}


if(isset($_POST['phone'])!= null)
{
    $res->phone = $_POST['phone'];
}

if(isset($_POST['email'])!= null)
{
    $res->email = $_POST['email'];
}

if(isset($_POST['company-name'])!= null)
{
    $company['company_name'] = $_POST['company-name'];
}

if(isset($_POST['experience'])!= null)
{
    $company['years'] = $_POST['experience'];
}

if(isset($_POST['job-title'])!= null)
{
    $company['job_title'] = $_POST['job-title'];
}


if(isset($_POST['job-description'])!= null)
{
    $company['job_description'] = $_POST['job-description'];
}

if(isset($_POST['education'])!= null)
{
    $school['degree'] = $_POST['education'];
}

if(isset($_POST['school'])!= null)
{
    $school['school'] = $_POST['school'];
}

if(isset($_POST['school-dates'])!= null)
{
    $school['dates'] = $_POST['school-dates'];
}


    $format = $_POST['format'];


$res->skills[] = $_POST["skills"];

$res->company = $company;
$res->school = $school;
$link = $res->buildResume($format);


echo "<a href='$link'>click here to dowbnload your resume</a>";
?>

    </section>
</div>
</div>

</section>
<footer>

</footer>

</body>
</html>
