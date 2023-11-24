<?php

include("../model/mydb.php");

$uname = $email = $gender = $dob = $phone = $address = $password = $cpassword = "";
$haserror=0;
if(isset($_REQUEST["Submit"]))
{

  if (empty($_REQUEST["uname"])) {
		echo "Name is required"."<br><br>";
    $haserror=1;
		
	  } else if(!empty($_REQUEST["uname"])) {
		$uname = ($_REQUEST["uname"]);
        // echo $uname."<br><br>";
	   if (!preg_match("/[a-zA-Z0-9]/",$uname))
		{

			echo "Must start with a letter"."<br><br>";
      $haserror=1;
		}

		if (!preg_match("/^[a-zA-Z0-9-' ]*$/",$uname)) {
			echo "Only letters and white space allowed"."<br><br>";
      $haserror=1;
		}
	  }

    if (empty($_REQUEST["email"])) {
        echo "Email is required"."<br><br>";
        $haserror=1;
    } else if(!empty($_REQUEST["email"])) {
      $email = ($_REQUEST["email"]);
      // echo $email."<br><br>";
  
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format"."<br><br>";
        $haserror=1;

      }
    }
    if (empty($_REQUEST["gender"])) {
        echo "Gender is required"."<br><br>";
        $haserror=1;
    } else if (!empty($_REQUEST["gender"])){
      $gender = ($_REQUEST["gender"]);
      // echo $gender."<br><br>";
    }

    if (empty($_REQUEST["dob"])) {
        echo "Date is required"."<br><br>";
        $haserror=1;
      } else if(!empty($_REQUEST["dob"])){
        $dob = ($_REQUEST["dob"]);
        // echo $dob."<br><br>";
      }

	  if (empty($_REQUEST["phone"])) {
		echo "Phone number is required"."<br><br>";
    $haserror=1;
	  } else if (!empty($_REQUEST["phone"])){
		$phone = ($_REQUEST["phone"]);
        // echo $phone."<br><br>";
	  }

      if(empty($_REQUEST["password"]))  
      {  
        echo "Enter a password"."<br><br>";  
        $haserror=1;
      } 
      else if( strlen($_REQUEST["password"])<8){

        echo "Password should be grether then 8"."<br><br>";
        $haserror=1;
      }else if(!empty($_REQUEST["password"])){
        $password = ($_REQUEST["password"]);
        // echo $password."<br><br>";
      }

	  if(empty($_REQUEST["cpass"]))  
      {  
        echo "Enter confirm password";  
        $haserror=1;
      } 
      else if($_REQUEST["cpass"]!= $_REQUEST["password"]){
        echo "Password didn't match with previous one"."<br><br>";
        $haserror=1;
      }else if(!empty($_REQUEST["cpass"]) && $_REQUEST["cpass"]== $_REQUEST["password"]){
        $cpassword = ($_REQUEST["cpass"]);
        // echo $cpassword."<br><br>";
      }


      if($haserror==0)
      {

        $mydb= new MyDB();
$conobj= $mydb->openCon();
$result=$mydb->insertData("admin",$_REQUEST["uname"],$_REQUEST["email"],
$_REQUEST["gender"],$_REQUEST["dob"],$_REQUEST["phone"],$_REQUEST["password"], $conobj);
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