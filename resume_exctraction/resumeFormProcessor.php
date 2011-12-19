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

$res->skills[] = $_POST["skills"];

$res->company = $company;
$res->school = $school;

var_dump($res);

$res->buildResume("doc");
?>
