<?php

$xml = simplexml_load_file('resume.html');
var_dump($xml->p);
$p = $xml->p;
foreach($p as $para)
{
    echo $para;
}
        


?>
