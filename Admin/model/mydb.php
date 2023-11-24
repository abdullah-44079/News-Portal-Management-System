<?php
class MyDB{

function openCon(){
$conn = new mysqli("localhost","root","","project");
return $conn;
}

function insertData($tablename, $uname, $email, $gender, $dob,
$phone, $password, $conn){
$sql="INSERT INTO $tablename (uname, email, gender, dob,
phone, password) VALUES ('$uname','$email','$gender','$dob',
'$phone','$password')";
$result=$conn->query($sql);
return $result;
}

function insertManager($tablename, $name, $email, $gender,$dob,
$password, $conn){
$sql="INSERT INTO $tablename (name, email, gender, dob, password) VALUES ('$name','$email','$gender','$dob',
'$password')";
$result=$conn->query($sql);
return $result;
}


function insertNotice($tablename, $title, $details, $dop,$author, $conn){
$sql="INSERT INTO $tablename ( title, details, dop, author) VALUES ('$title','$details','$dop','$author')";
$result=$conn->query($sql);
return $result;
}

function checkUser($tablename, $email, $password, $conn){
    $sql="SELECT * FROM $tablename WHERE email='$email' AND 
    password='$password'";
    $result=$conn->query($sql);
return $result;

}









function getUserInfo($tablename, $email, $conn){
    $sql="SELECT * FROM $tablename WHERE email='$email' ";
    $result = $conn->query($sql);
    return $result;
}

function getAllUsers($tablename, $conn)
{
    $sql="SELECT * FROM $tablename";
    $result = $conn->query($sql);
    return $result;
}


function updateUser($tablename, $conn, $uname, $email, $password, $gender,
$dob, $phone)
{
$sql= "UPDATE $tablename SET uname='$uname', email='$email', gender='$gender',
dob='$dob',
phone='$phone'
password='$password',
WHERE email = '$email' ";
$result = $conn->query($sql);
 return $result;
}


function deleteUser($tablename, $conn, $id){
$sql = "DELETE FROM $tablename WHERE id= '$id' ";
$result=$conn->query($sql);
return $result;
}


}

?>