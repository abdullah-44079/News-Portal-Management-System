<?php
class MyDB{

function openCon(){
$conn = new mysqli("localhost","root","","project");
return $conn;
}

function insertData($tablename, $fname,$lname,$uname, $email, $gender, $dob,
$phone, $password, $conn){
$sql="INSERT INTO $tablename (fname,lname,uname, email, gender, dob,
phone, password) VALUES ('$fname','$lname','$uname','$email','$gender','$dob',
'$phone','$password')";
$result=$conn->query($sql);
return $result;
}

function insertMessage($tablename, $fromm,$tom,$subject, $message, $conn){
$sql="INSERT INTO $tablename (fromm,tom,subject, message) VALUES ('$fromm','$tom','$subject','$message')";
$result=$conn->query($sql);
return $result;
}


function insertComment($tablename, $text,$author,$newsId ,$conn){
    $sql="INSERT INTO $tablename (text,author,newsId) VALUES ('$text','$author','$newsId')";
    $result=$conn->query($sql);
    return $result;
}
    

// function insertManager($tablename, $name, $email, $gender,$dob,
// $password, $conn){
// $sql="INSERT INTO $tablename (name, email, gender, dob, password) VALUES ('$name','$email','$gender','$dob',
// '$password')";
// $result=$conn->query($sql);
// return $result;
// }


// function insertNotice($tablename, $title, $details, $dop,$author, $conn){
// $sql="INSERT INTO $tablename ( title, details, dop, author) VALUES ('$title','$details','$dop','$author')";
// $result=$conn->query($sql);
// return $result;
// }

function checkUser($tablename, $uname, $password, $conn){
    $sql="SELECT * FROM $tablename WHERE uname='$uname' AND 
    password='$password'";
    $result=$conn->query($sql);
return $result;

}









function getUserInfo($tablename, $uname, $conn){
    $sql="SELECT * FROM $tablename WHERE uname='$uname' ";
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