<?php
include("../model/mydb.php");

$nameErr= $nameErr2 = $emailErr = $genderErr = $dobErr = $passErr= "";
$name = $email = $gender = $dob = $password = "";
$message= $error ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // echo "Hello";

    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else if(!empty($_POST["name"])) {
      $name = ($_POST["name"]);
      $wcount = str_word_count($name);
     if($wcount<2){
          $nameErr="Minimum 2 words required";
      }
     if (!preg_match("/[a-zA-Z]/",$name))
      {
        $nameErr = "Must start with a letter";
      }
    
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }
  
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else if(!empty($_POST["email"])) {
      $email = ($_POST["email"]);
  
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";

      }
    }
    if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
    } else if (!empty($_POST["gender"])){
      $gender = ($_POST["gender"]);
    }

    if (empty($_POST["dob"])) {
        $dobErr = "date is required";
      } else if(!empty($_POST["dob"])){
        $dob = ($_POST["dob"]);
      }
      if(empty($_POST["password"]))  
      {  
           $passErr = "Enter a password";  
      } 
      else if( strlen($_POST["password"])<8){

          $passErr = "password should be grether then 8";
      }else if(!empty($_POST["password"])){
        $password = ($_POST["password"]);
      }

      // echo $name.$email.$gender.;

      if(!empty($name) && !empty($email) && !empty($gender) && !empty($dob) && !empty($password)){

              $mydb= new MyDB();
              $conobj= $mydb->openCon();
              $result=$mydb->insertManager("manager",$_REQUEST["name"],$_REQUEST["email"],
              $_REQUEST["gender"],$_REQUEST["dob"],$_REQUEST["password"], $conobj);
              if($result===TRUE)
              {
                  echo "Registration Success";
              }
              else
              {
                  echo "Error".$conobj->error;
              } 
          }
             
        }  

      
?>