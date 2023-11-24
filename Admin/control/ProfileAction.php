<?php
include "../model/mydb.php";
$uname=$email=$gender=$dob=$phone=$password="";

$mydb= new MyDB();
$conobj=$mydb->openCon();
$result=$mydb->getUserInfo("admin", $_SESSION["email"], $conobj);
if($result->num_rows > 0)
{
    while($row=$result->fetch_assoc()){
        $uname=$row["uname"];
        $email=$row["email"];
        $gender=$row["gender"];
        $dob=$row["dob"];
        $phone=$row["phone"];
        $password=$row["password"];
    }
}

?>