<?php
include "header.php";

$nameErr= $nameErr2 = $emailErr = $genderErr = $dobErr = $passErr= "";
$name = $email = $gender = $dob = $password  = "";
$message= $error ="";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

     if (empty($_POST["date"])) {
        $dobErr = "date is required";
      } else if(!empty($_POST["date"])){
        $dob = ($_POST["date"]);
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
    }

?>



<?php

$nameErr="";
$del=$_SESSION['del'];
    $name2= "";
    $email2= "";
    $gender2= "";
    $dob2= "";
    $password2= "";
    //session_start();
    
    $name2= $name;
    $email2= $email;
    $gender2= $gender;
    $dob2= $dob;
    $password2= $password;

    if(!empty($del)){
        $file = file_get_contents('../data/managerdata.json');
        $assoc = json_decode($file, true);
        //var_dump($assoc);
        foreach($assoc as $file){
            if($file["name"]==$del){
                $name = $del;
                $email=$file['email'];
                $gender=$file['gender'];
                $dob=$file['dob'];
                $password=$file['password'];
            }
        }
      }
      else{
        echo "<h2>First Logged In</h2>";
      }



      if(file_exists('../data/managerdata.json') && isset($_POST['submit']))  
      {

      $data = file_get_contents('../data/managerdata.json');
      $json = json_decode($data);
     // $array = (array) $json[0];
  
      for($i=0;$i<count($json);$i++){
          $array = (array) $json[$i];
              if($array['name']==$del){
                echo $del;
                  unset($json[$i]);
              }
          
      }
      $json = json_encode($json, JSON_PRETTY_PRINT);
      file_put_contents('../data/managerdata.json', $json);
        
          if(!empty($name) && !empty($email) && !empty($gender) && !empty($dob) && !empty($password)){
            $current_data = file_get_contents('../data/managerdata.json');  
            $array_data = json_decode($current_data,true);
            //echo $name;
          
            $extra = array(  
              'name'     =>     $name2,
              'email'   =>     $email2,
              //'username' =>     $_POST["username"],
              'gender'   =>     $gender2,
              'dob'      =>     $dob2,
              'password' =>     $password2,
              //'confirm_password' => $_POST["confirm_password"] 
         ); 
      } 
         $array_data[] = $extra;
         $final_data = json_encode($array_data,JSON_PRETTY_PRINT); 
         if(file_put_contents('../data/managerdata.json', $final_data))  
         {  
              echo "File Appended Successfully"; 
              header("location: ManagerList.php");
         }  
        
      }     

?>