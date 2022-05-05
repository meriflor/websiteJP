<?php
if(isset($_GET["file"])){
   $file = $_GET["file"];
   $target_file = "uploads/$file";
   $content_type = mime_content_type($target_file); 
   //Used to detect what type of file is been called, an image, pdf, or any
   if(file_exists($target_file)){
      header("Content-Type: $content_type");
      header("Content-Length: " . filesize($target_file));
      header('Content-Disposition: attachment; filename="'.basename($target_file).'"');
      readfile($target_file);
   }
   else{
      exit();
   }
}
else{
   exit;
}
?>
