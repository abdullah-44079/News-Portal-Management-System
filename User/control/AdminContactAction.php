<?php
include "navbar.php";

$nameErr= $emailErr = "";
$from=$to=$subject = $message = "";
$message= $error ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["subject"])) {
      $nameErr = "subject is required";
    } else if(!empty($_POST["subject"])) {
      $subject = ($_POST["subject"]);
     if (!preg_match("/[a-zA-Z]/",$subject))
      {
        $nameErr = "Must start with a letter";
      }
    
      if (!preg_match("/^[a-zA-Z-' ]*$/",$subject)) {
        $nameErr = "Only letters and white space allowed";
      }
    }
  
    if (empty($_POST["message"])) {
      $emailErr = "message is required";
    } else if(!empty($_POST["message"])) {
      $message = ($_POST["message"]);
    }

    if (empty($_POST["fromm"])) {
        $emailErr = "From is required";
      } else if(!empty($_POST["fromm"])) {
        $from = ($_POST["fromm"]);
      }

      if (empty($_POST["tom"])) {
        $emailErr = "To is required";
      } else if(!empty($_POST["tom"])) {
        $to = ($_POST["tom"]);
      }




        if(!empty($subject) && !empty($message))  
        {  
          $mydb= new MyDB();
          $conobj= $mydb->openCon();
          $result=$mydb->insertMessage("message",$_REQUEST["fromm"],$_REQUEST["tom"],
          $_REQUEST["subject"],$_REQUEST["message"], $conobj);
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