<?php
class parseDocx
{
    
    
    
    
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
echo $name;

$address_node = $xpath->query("//w:body/w:p/w:pPr/w:pStyle[@w:val='Address']");
$street_address = $address_node->item(0)->parentNode->parentNode->nodeValue;
echo "street address" . $street_address;
$city_zip_state = $address_node->item(1)->parentNode->parentNode->nodeValue;
echo "street address" . $city_zip_state;
$phone = $address_node->item(2)->parentNode->parentNode->nodeValue;
echo "street address" . $phone;
$email = $address_node->item(3)->parentNode->parentNode->nodeValue;
echo "street address" . $email;

$headings = $xpath->query("//w:body/w:p/w:pPr/w:pStyle[@w:val='BusinessNameDates']");
foreach ($headings as $heading) {
    $company_name_dates_node = $heading->parentNode->parentNode;
    $company_name_dates = $company_name_dates_node->nodeValue;
    $job_title_dicription_node = $company_name_dates_node->nextSibling->nodeValue;
    echo $job_title_dicription_node;
}

$resume_headings_list = $xpath->query("//w:body/w:p/w:pPr/w:pStyle[@w:val='ResumeHeadings']");

foreach($resume_headings_list as $heading)
{
   
   $heading_node = $heading->parentNode->parentNode;

 
   if(trim($heading_node->nodeValue) === 'Education')
   {

       $next_node = $heading_node->nextSibling;
       echo $next_node->nodeValue;
       
       $second_next_node = $next_node->nextSibling;
       echo $second_next_node->nodeValue;
   }
   
   if(trim($heading_node->nodeValue) === 'Achievements/Awards')
   {
       
       $next_node = $heading_node->nextSibling;
       $next_node_style = $next_node->firstChild->firstChild->getAttributeNS("http://schemas.openxmlformats.org/wordprocessingml/2006/main","val");
       echo $next_node_style;
       while($next_node_style === 'Overviewbullets' && $next_node_style!= 'ResumeHeading')
       {
           echo $next_node->nodeValue;
           
           $next_node = $next_node->nextSibling;
       $next_node_style = $next_node->firstChild->firstChild->getAttributeNS("http://schemas.openxmlformats.org/wordprocessingml/2006/main","val");
       }
   }
   
   if(trim($heading_node->nodeValue) === 'Skills')
   {
       $next_node = $heading_node->nextSibling;
       $next_node_style = $next_node->firstChild->firstChild->getAttributeNS("http://schemas.openxmlformats.org/wordprocessingml/2006/main","val");
       echo $next_node_style;
       while($next_node_style === 'Overviewbullets' && $next_node_style!= 'ResumeHeading')
       {
           echo $next_node->nodeValue;
           
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


?>