<?php
require_once 'parseDocx.php';
require_once 'parseDoc.php';
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  echo "Type: " . $_FILES["file"]["type"] . "<br />";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  
  $file_name_explode_array = explode(".",$_FILES["file"]["name"]);
  $file_extention = $file_name_explode_array[1];
  echo $file_extention;
  
  move_uploaded_file($_FILES["file"]["tmp_name"],
      "files/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      
      if($file_extention === 'docx')
      {
          echo "docx";
      $parser = new parseDocx("files/" . $_FILES["file"]["name"]);
      }
      if($file_extention === 'doc')
      {
          echo "doc";
          $parse = new parseDoc("files/" . $_FILES["file"]["name"]);
      }
  
  
?> 