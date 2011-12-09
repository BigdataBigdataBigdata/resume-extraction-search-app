<?php
require_once 'parseDocx.php';
require_once 'parseDoc.php';
require_once 'ToDocx.php';
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
 
  $file_name_explode_array = explode(".",$_FILES["file"]["name"]);
  $file_extention = $file_name_explode_array[1];  
  
  
  echo $file_extention;
   if($file_extention === 'docx')
      {
          echo "docx";
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "files/1.zip");
      
      
      $zip = new ZipArchive;
     $res = $zip->open('files/1.zip');
     if ($res === TRUE) {
         $zip->extractTo('files/unzipped/');
         $zip->close();
         echo 'ok';
         $parser = new parseDocx('files/unzipped/word/document.xml');
     } else {
         echo 'failed';
     }
      }
     
     if($file_extention === 'rtf')
     {
         echo "extention is rtf";
         move_uploaded_file($_FILES["file"]["tmp_name"],"files/1.rtf");
         convertToDocx("files/1.rtf",".rtf");
         $zip = new ZipArchive;
     $res = $zip->open('files/resume.zip');
     if ($res === TRUE) {
         $zip->extractTo('files/unzipped/');
         $zip->close();
         echo 'ok';
         $parser = new parseDoc('files/unzipped/word/document.xml');
     } else {
         echo 'failed';
     }
     }
     
     if($file_extention === 'doc')
     {
         echo "extention is doc";
         move_uploaded_file($_FILES["file"]["tmp_name"],"files/1.doc");
         convertToDocx("files/1.doc",".doc");
         $zip = new ZipArchive;
     $res = $zip->open('files/resume.zip');
     if ($res === TRUE) {
         $zip->extractTo('files/unzipped/');
         $zip->close();
         echo 'ok';
         $parser = new parseDoc('files/unzipped/word/document.xml');
     } else {
         echo 'failed';
     }
         
     
     
     
      }
      
      
    
  
?> 