<?php
include("../model/mydb.php");
$nameErr= $emailErr = "";
$title = $details = $dob = $user = "";
$message= $error ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["title"])) {
      $nameErr = "title is required";
    } else if(!empty($_POST["title"])) {
      $title = ($_POST["title"]);
     if (!preg_match("/[a-zA-Z]/",$title))
      {
        $nameErr = "Must start with a letter";
      }
    
      if (!preg_match("/^[a-zA-Z-' ]*$/",$title)) {
        $nameErr = "Only letters and white space allowed";
      }
    }
  
    if (empty($_POST["details"])) {
      $emailErr = "details is required";
    } else if(!empty($_POST["details"])) {
      $details = ($_POST["details"]);
    }
    if(!empty($title) && !empty($details))  
        {  
          $mydb= new MyDB();
          $conobj= $mydb->openCon();
          $result=$mydb->insertNotice("notice",$_REQUEST["title"],$_REQUEST["details"],
          $_REQUEST["dop"],$_REQUEST["author"],$conobj);
          if($result===TRUE)
          {
              echo "Success";
          }
          else
          {
              echo "Error".$conobj->error;
          }
          
             
        }  
    }
?>