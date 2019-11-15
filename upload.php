<?php
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

if(isset($_FILES['file_upload'])){
      $errors= array();
      $file_name = $_FILES['file_upload']['name'];
      $file_size =$_FILES['file_upload']['size'];
      $file_tmp =$_FILES['file_upload']['tmp_name'];
      $file_type=$_FILES['file_upload']['type'];
     
      $target = "images/".$file_name;
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         chmod("images/".$file_name, 0777);
         $filename = "http://localhost/filetohex/images/".$file_name;
         $hex = unpack("H*", file_get_contents($filename));
         $hex = current($hex);
         $return = array('code'=>200,'hex'=>$hex);
      }else{
         $return = array('code'=>100);
      }

      echo json_encode($return);
   }

?>
