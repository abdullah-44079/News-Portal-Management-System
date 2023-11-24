<?php
include("../model/mydb.php");

$haserror=0;

if(isset($_REQUEST["Submit"])){


  if (empty($_POST["fname"])) {
    $nameErr = "First Name is required";
  } else if(!empty($_POST["fname"])) {
    $fname = ($_POST["fname"]);
   if (!preg_match("/[a-zA-Z]/",$fname))
    {
      $fnameErr = "Must start with a letter";
    }
  
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";
    }
  }


  if (empty($_POST["lname"])) {
    $lnameErr = "Last Name is required";
  } else if(!empty($_POST["lname"])) {
    $lname = ($_POST["lname"]);
   if (!preg_match("/[a-zA-Z]/",$lname))
    {
      $lnameErr = "Must start with a letter";
    }
  
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
    }
  }


  if (empty($_POST["uname"])) {
    $unameErr = "User Name is required";
  } else if(!empty($_POST["uname"])) {
    $uname = ($_POST["uname"]);
   if (!preg_match("/[a-zA-Z]/",$uname))
    {
      $unameErr = "Must start with a letter";
    }
  
    if (!preg_match("/^[a-zA-Z-' ]*$/",$uname)) {
      $unameErr = "Only letters and white space allowed";
    }
  }



    if (empty($_REQUEST["email"])) {
        echo "Please enter Email".'<br>';
        $haserror=1;
    } else if(isset($_REQUEST["email"])) {
        echo ($_REQUEST["email"]).'<br>';
  
      if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$_REQUEST["email"]))
        {
            echo "please enter a valid email address".'<br>';
            $haserror=1;
        }
    }
    if (empty($_REQUEST["gender"])) {
        echo "Please Choose a Gender".'<br>';
        $haserror=1;
    } else if (isset($_REQUEST["gender"])){
        echo ($_REQUEST["gender"]).'<br>';
    }

    if (empty($_REQUEST["dob"])) {
        echo "Please enter date of birth".'<br>';
        $haserror=1;
      } else if(isset($_REQUEST["dob"])){
        echo ($_REQUEST["dob"]).'<br>';
      }

	  if (empty($_REQUEST["phone"])) {
		echo "Please enter Phone Number".'<br>';
    $haserror=1;
	  } else if (isset($_REQUEST["phone"])){
		echo ($_REQUEST["phone"]).'<br>';
        if(strlen($_REQUEST["phone"])!=10){
            echo "Phone number must be in 10 number".'<br>';
            $haserror=1;
        }
	  }

      if(empty($_REQUEST["password"]))  
      {  
        echo "Please enter password".'<br>';  
        $haserror=1;
      } 
      else if(strlen($_REQUEST["password"])<6){

        echo "password must be greater then 6".'<br>';
        $haserror=1;
      }else if(isset($_REQUEST["password"])){
        echo ($_REQUEST["password"]).'<br>';
      }



      
      if($haserror==0)
      {
        $mydb= new MyDB();
        $conobj= $mydb->openCon();
        $result=$mydb->insertData("user",$_REQUEST["fname"],$_REQUEST["lname"],
        $_REQUEST["uname"],$_REQUEST["email"],$_REQUEST["gender"],$_REQUEST["dob"],$_REQUEST["phone"],$_REQUEST["password"], $conobj);
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