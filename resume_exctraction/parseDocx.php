<?php
class parseDocx
{
    
    public $firstname = '';
    public $lastname = '';
    public $address = '';
    public $city = '';
    public $state = '';
    public $zip = 0;
    public $phone = '';
    public $email = '';
    public $company = array();
    public $school = array();
    public $awards = array();
    public $skills = array();
    
    
     function __construct($xmlFile) {
       

        $this->parse($xmlFile);
    }
    private function parse($xmlFile)
    {
        
    
$doc = new DOMDocument();
$xml = $doc->load($xmlFile);
$xpath = new DOMXPath($doc);
$xpath->registerNamespace('w', "http://schemas.openxmlformats.org/wordprocessingml/2006/main");


$name_node = $xpath->query("//w:body/w:p/w:pPr/w:pStyle[@w:val='Name']");
$name = $name_node->item(0)->parentNode->parentNode->nodeValue;
$name = trim($name);
$name_array = explode(' ',$name);
$this->firstname = $name_array[0];
$this->lastname = $name_array[1];


$address_node = $xpath->query("//w:body/w:p/w:pPr/w:pStyle[@w:val='Address']");
$street_address = $address_node->item(0)->parentNode->parentNode->nodeValue;
$street_address  = trim($street_address);
$this->address = $street_address;

//echo "street address" . $street_address;
$city_zip_state = $address_node->item(1)->parentNode->parentNode->nodeValue;
$city_zip_state_array = explode(',',$city_zip_state);
$this->city = $city_zip_state_array[0];
$this->zip = $city_zip_state_array[2];
$this->state = $city_zip_state_array[1];
//echo "street address" . $city_zip_state;
$phone = $address_node->item(2)->parentNode->parentNode->nodeValue;
$this->phone = $phone;
$phone = trim($phone);
//echo "street address" . $phone;
$email = $address_node->item(3)->parentNode->parentNode->nodeValue;
$this->email = $email;
$email = trim($email);
//echo "street address" . $email;

$headings = $xpath->query("//w:body/w:p/w:pPr/w:pStyle[@w:val='BusinessNameDates']");
foreach ($headings as $heading) {

    $company_name_dates_node = $heading->parentNode->parentNode;
    $company_name_dates = trim($company_name_dates_node->nodeValue);
    $company_name_dates_array = explode(",", $company_name_dates);
     $this->company[]['company_name']= $company_name_dates_array[0];
     $this->company[]['years'] = $company_name_dates_array[1];
    $job_title_dicription = $company_name_dates_node->nextSibling->nodeValue;
$job_title_dicription_array = explode(',',$job_title_dicription);
    $this->company[]['job_title'] = $job_title_dicription_array[0];
     $this->company[]['job_description'] = $job_title_dicription_array[1];
}

$resume_headings_list = $xpath->query("//w:body/w:p/w:pPr/w:pStyle[@w:val='ResumeHeadings']");


if($resume_headings_list->length == 0)
{
   $resume_headings_list = $xpath->query("//w:body/w:p/w:pPr/w:pStyle[@w:val='Resume Headings']");


foreach($resume_headings_list as $heading)
{

   $heading_node = $heading->parentNode->parentNode;


   if(trim($heading_node->nodeValue) === 'Education')
   {

       $next_node = $heading_node->nextSibling->nextSibling;
       $degreeSchool =  $next_node->nodeValue;
       $degreeSchoolArray = explode(",",$degreeSchool);
       $this->school['degree'] = trim($degreeSchoolArray[0]);
       $this->school['school'] = trim($degreeSchoolArray[1]);
       $second_next_node = $next_node->nextSibling;
        $this->school['dates'] =  trim($second_next_node->nodeValue);
   }

   if(trim($heading_node->nodeValue) === 'Achievements/Awards')
   {

       $next_node = $heading_node->nextSibling;
       $next_node = $next_node->nextSibling;
       while(trim($next_node->nodeValue) != 'Skills')
       {
           $this->awards[] = trim($next_node->nodeValue);

           $next_node = $next_node->nextSibling;
       }
   }

   if(trim($heading_node->nodeValue) === 'Skills')
   {
       $next_node = $heading_node->nextSibling;
       $next_node = $next_node->nextSibling;
        $next_node->nodeValue;
       while(trim($next_node->nodeValue) != null)
       {
           $this->skills[]= trim($next_node->nodeValue);

           if($next_node->nodeName === 'w:p'){
        $next_node = $next_node->nextSibling;
                  }
 else {
    $next_node= null;
}
       }
   }

}
}
else
{
foreach($resume_headings_list as $heading)
{
   
   $heading_node = $heading->parentNode->parentNode;

 
   if(trim($heading_node->nodeValue) === 'Education')
   {

       $next_node = $heading_node->nextSibling;
       $degreeSchool =  $next_node->nodeValue;
       $degreeSchoolArray = explode(",",$degreeSchool);
       $this->school['degree'] = $degreeSchoolArray[0];
       $this->school['school'] = $degreeSchoolArray[1];
       $second_next_node = $next_node->nextSibling;
       $this->school['dates'] =  $second_next_node->nodeValue;
   }
   
   if(trim($heading_node->nodeValue) === 'Achievements/Awards')
   {
       
       $next_node = $heading_node->nextSibling;
       $next_node_style = $next_node->firstChild->firstChild->getAttributeNS("http://schemas.openxmlformats.org/wordprocessingml/2006/main","val");
       while($next_node_style === 'Overviewbullets' && $next_node_style!= 'ResumeHeading')
       {
           $this->awards[] = $next_node->nodeValue;
           
           $next_node = $next_node->nextSibling;
       $next_node_style = $next_node->firstChild->firstChild->getAttributeNS("http://schemas.openxmlformats.org/wordprocessingml/2006/main","val");
       }
   }
   
   if(trim($heading_node->nodeValue) === 'Skills')
   {
       $next_node = $heading_node->nextSibling;
       $next_node_style = $next_node->firstChild->firstChild->getAttributeNS("http://schemas.openxmlformats.org/wordprocessingml/2006/main","val");
       while($next_node_style === 'Overviewbullets' && $next_node_style!= 'ResumeHeading')
       {
           $this->skills[]= $next_node->nodeValue;
           
           $next_node = $next_node->nextSibling;
         
           if($next_node->nodeName === 'w:p'){
       $next_node_style = $next_node->firstChild->firstChild->getAttributeNS("http://schemas.openxmlformats.org/wordprocessingml/2006/main","val");
                  }
 else {
    $next_node_style= null;
}
       }
   }
   
}
}
    }
}


?>
