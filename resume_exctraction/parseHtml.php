<?php

$doc = new DOMDocument;
$xml = $doc->loadHTMLFile('resume.html');
$xpath = new DOMXPath($doc);
$ele = $xpath->query('body/node()');

foreach ($ele as $el)
{
//   var_dump($el->nodeValue)."<br />";
   if(trim($el->nodeValue) === 'Work Experience')
   {
       echo "true";
       var_dump($el->nextSibling->nextSibling->nextSibling->nextSibling->nodeName);
       $next = $el->nextSibling;
       while($next->nodeName != 'p')
       {
           $next = $next->nextSibling;
         
       }
       echo $next->nodeValue;
       while($next->nodeName != 'ul')
       {
           $next = $next->nextSibling;
        
       }
        echo $next->nodeValue;
}
}
////echo 'name is'. $ele->nodeValue ."<br/>";
//$ele = $xpath->query('body/p')->item(1);
//echo "address is $ele->nodeValue <br/>";
//$ele = $xpath->query('body/p')->item(2);
//echo "city state zip is $ele->nodeValue <br/>";
//$ele = $xpath->query('body/p/span')->item(3);
//echo "phone is $ele->nodeValue <br/>";
//$ele = $xpath->query('body/p/span')->item(4);
//echo "email is $ele->nodeValue <br/>";
//$ele = $xpath->query('body/p/span')->item(5);
//echo $ele->nodeValue;
// if($ele->nodeValue === 'Work Experience')
// { 
//    
//     
//   
//    
//    //var_dump($xpath->query("$path")->item(0)->nextSibling->getNodePath());
////     $ele = $xpath->query('body/p/span')->item(6); 
////     echo " is $ele->nodeValue <br/>";
//     
// }
 
         
        


?>
