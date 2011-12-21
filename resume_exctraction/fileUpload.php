<?php
require_once 'include/bootstrap.php';
require_once 'parseDocx.php';
require_once 'parseDoc.php';
require_once 'ToDocx.php';
require_once 'Resume.php';
require_once 'readPdf.php';


$sucess = false;
$path = '';
$uid;
$file_name = $_FILES["file"]["name"];
$file_name = str_replace(" ", '_', $file_name);

if ($_FILES["file"]["error"] > 0) {
    echo "Error: " . $_FILES["file"]["error"] . "<br />";
}

$file_name_explode_array = explode(".", $file_name);
$file_extention = $file_name_explode_array[1];
if ($file_extention === 'docx') {

    $path = 'files';

    $upload_path = $path . '/' . session_id() . $file_name;
    @move_uploaded_file($_FILES["file"]["tmp_name"], $upload_path);



    @copy($upload_path, "files/1.zip");


    $zip = new ZipArchive;
    $res = $zip->open('files/1.zip');
    if ($res === TRUE) {
        $zip->extractTo('files/unzipped/');
        $zip->close();

        $parser = new parseDocx('files/unzipped/word/document.xml');

        $sucess = persist_resume($parser, $upload_path, $uid);
    } else {
        $failed = true;
    }
}

if ($file_extention === 'rtf') {
    $path = 'files';

    $upload_path = $path . '/' . session_id() . $file_name;
    move_uploaded_file($_FILES["file"]["tmp_name"], $upload_path);
    copy($upload_path, "files/1.rtf");
    @convertToDocx("files/1.rtf", ".rtf");
    $zip = new ZipArchive;
    $res = $zip->open('files/resume.zip');
    if ($res === TRUE) {
        $zip->extractTo('files/unzipped/');
        $zip->close();

        $parser = new parseDoc('files/unzipped/word/document.xml');
        $sucess = persist_resume($parser, $upload_path, $uid);
    } else {
        $failed = true;
    }
}

if ($file_extention === 'doc') {
    $path = 'files';

    $upload_path = $path . '/' . session_id() . $file_name;
    move_uploaded_file($_FILES["file"]["tmp_name"], $upload_path);
    copy($upload_path, "files/1.doc");
    convertToDocx("files/1.doc", ".doc");
    $zip = new ZipArchive;
    $res = $zip->open('files/resume.zip');
    if ($res === TRUE) {
        $zip->extractTo('files/unzipped/');
        $zip->close();
        echo 'ok';
        $parser = new parseDoc('files/unzipped/word/document.xml');

        $sucess = persist_resume($parser, $upload_path, $uid);
    } else {
        $failed = true;
    }
}



if ($file_extention === 'pdf') {
    $path = 'files';

    $upload_path = $path . '/' . session_id() . $file_name;
    move_uploaded_file($_FILES["file"]["tmp_name"], $upload_path);
    $sucess = readPdf($upload_path, $uid);
}

else
{
    $error = "not a supported file format please upload one of the following file formats : .docx,.rtf,.doc,.pdf";
}

function persist_resume($parser, $path, $uid) {

    $res = new Resume($uid);
    $res->firstname = $parser->firstname;
    $res->lastname = $parser->lastname;
    $res->address = $parser->address;
    $res->city = $parser->city;
    $res->state = $parser->state;
    $res->zip = $parser->zip;
    $res->phone = $parser->phone;
    $res->email = $parser->email;
    $res->company = $parser->company;
    $res->school = $parser->school;
    $res->awards = $parser->awards;
    $res->skills = $parser->skills;


    $parser->skills;

    if (mysql_query("insert into resume (uid) values ($res->uid)")) {
        $rid = mysql_insert_id();
        $school = $res->school;





        $college_dates = $res->school['dates'];
        $degree = $res->school['degree'];
        $school = $res->school['school'];
        $awardString = "";
        foreach ($res->awards as $award) {

            $awardString.= $award;
            $awardString.='|';
        }
        $awardString.=';';

        $skillsString = "";

        $res->skills;
        foreach ($res->skills as $skills) {

            $skillsString.= $skills;
            $skillsString.=',';
        }
        $skillsString.=';';

        $sucess = mysql_query("update resume set first_name = '$res->firstname',last_name = '$res->lastname',address = '$res->address'
        ,city = '$res->city',state = '$res->state', zip = '$res->zip', phone = '$res->phone', email = '$res->email', degree = '$degree',
        college = '$school', college_dates = '$college_dates', awards = '$awardString', skills = '$skillsString'
        where rid = '$rid'");




        $exp = 0;
        foreach ($res->company as $company) {
            foreach ($company as $key => $comp)
                if ($key === 'years') {
                    $exp += $comp;
                }



            //  var_dump($company);
//    $job_title = $company['job_title'];
//    $job_des = $company['job_description'];
//    var_dump(mysql_query("insert into resume_experience (rid,company_name,job_title,job_description) values ($rid,$company_name,$job_title,$job_des)"));
        }

        $sucess = mysql_query("update resume set experience = '$exp' where rid = '$rid'");
        $comp = serialize($res->company);
        $sucess = mysql_query("insert into experience (rid,experience) values ('$rid','$comp')");

        $sucess = mysql_query("update resume set location='$path' where rid = '$rid'");


        if ($sucess)
            return true;
        else
            return false;
    }
}
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
if (isset($_SESSION['user_type'])) {
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
<?php
if ($sucess)
    print'	Thanks for submitting your resume. <a href="test.php" > Click here to Submit more resumes</a>';
else
    print $error;
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


