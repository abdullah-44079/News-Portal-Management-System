<?php

include "header.php";


$fname=$lname=$uname = $email = $gender = $dob = $phone  = "";
$haserror=0;
if(isset($_REQUEST["update"]))
{



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






  if (empty($_REQUEST["uname"])) {
		echo "Name is required"."<br><br>";
    $haserror=1;
		
	  } else if(!empty($_REQUEST["uname"])) {
		$uname = ($_REQUEST["uname"]);
        echo $uname."<br><br>";
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
      echo $email."<br><br>";
  
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
      echo $gender."<br><br>";
    }

    if (empty($_REQUEST["dob"])) {
        echo "Date is required"."<br><br>";
        $haserror=1;
      } else if(!empty($_REQUEST["dob"])){
        $dob = ($_REQUEST["dob"]);
        echo $dob."<br><br>";
      }

	  if (empty($_REQUEST["phone"])) {
		echo "Phone number is required"."<br><br>";
    $haserror=1;
	  } else if (!empty($_REQUEST["phone"])){
		$phone = ($_REQUEST["phone"]);
        echo $phone."<br><br>";
	  }



 
}
?>



<?php

include ("../model/mydb.php");

$selected="";
$uname=$_SESSION["uname"];


$mydb = new Mydb();
$conobj = $mydb->openCon();
$result=$mydb->getUserInfo("user", $name, $conobj);

if($result->num_rows>0)
{
    while($row = $result->fetch_assoc())
{
    $fname=$row["fname"];
    $lname=$row["lname"];
    $uname=$row["uname"];
    $email=$row["email"];
    $gender=$row["gender"];
    $dob=$row["dob"];
    $phone=$row["phone"];
    $password= $row["password"];

}

}
if(isset($_REQUEST["update"]))
{

$mydb = new Mydb();
$conobj = $mydb->openCon();
$result=$mydb->updateUser("user", $conobj,
$_REQUEST["fname"],
$_REQUEST["lname"],
$_REQUEST["uname"],
$_REQUEST["gender"],
$_REQUEST["dob"],
$_REQUEST["phone"],
 $password, $email);
}


?>