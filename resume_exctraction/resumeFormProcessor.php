<?php
require_once 'Resume.php';
var_dump($_POST);
$res = new Resume();
$res->firstname = $_POST(first-name);
$res->lastname = $_POST(last-name);
$res->address = $_POST(address);
$res->city = $_POST(city);
$res->state = $_POST(state);
$res->zip = $_POST(zip);
$res->phone = $_POST(phone);
$res->email = $_POST(email);
$res->company[][companyname]=$_POST(company-name);
$res->company[][experience]=$_POST(experience-years);
$res->company[][jobtitle]=$_POST(job-title);
$res->company[][jobdesc]=$_POST(job-discription);
$res->school[][education]=$_POST(education);
$res->school[][schoolname]=$_POST(school);
$res->school[][attandance]=$_POST(school-atandance);
$res->awards[][] = $_POST(awards);
$res->skills[][] = $_POST(skills);

?>
