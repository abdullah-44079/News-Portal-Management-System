<?php

$fname=$lname=$uname=$email=$gender=$dob=$phone=$password="";
$mydb= new MyDB();
$conobj=$mydb->openCon();
$result=$mydb->getUserInfo("user", $_SESSION["uname"], $conobj);
if($result->num_rows > 0)
{
    
    while($row=$result->fetch_assoc()){
        $fname=$row["fname"];
        $lname=$row["lname"];
        $uname=$row["uname"];
        $email=$row["email"];
        $gender=$row["gender"];
        $dob=$row["dob"];
        $phone=$row["phone"];
        $password=$row["password"];
    }
}

?>