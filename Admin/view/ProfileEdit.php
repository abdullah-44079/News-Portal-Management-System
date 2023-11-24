<?php
ob_start();
?>
<!DOCTYPE HTML>  
<html>
<head>
<title>Document</title>
<link rel="stylesheet" href="./../js/style.css">
</head>
<body class="home">  
<?php
include "header.php";
include "conn.php";


$nameErr= $nameErr2 = $emailErr = $genderErr = $dobErr = $passErr= "";
$uname = $email = $gender = $phone = $dob = $password=$id  = "";
$message= $error ="";

 // select or read data start
    include "../model/mydb.php";
$mydb= new MyDB();
$conobj=$mydb->openCon();
$result=$mydb->getAllUsers("admin", $conobj);
 
 
 if ($result->num_rows > 0) {
        // output data of each row
     while($row = $result->fetch_assoc()) {
         if($_SESSION['email']==$row['email'] && $_SESSION['pass']=$row['password']){

            $id= $row["id"];
            $uname= $row["uname"];
            $email= $row["email"];
			$gender= $row["gender"];
            $dob= $row["dob"];
            $phone= $row["phone"];
            $password= $row["password"];

         }
     }
 } else {
     echo "0 results";
 }
 



?>



<div class="container-10">
 <center>
                <h3>Update Profile</h3>

                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">  


                      <input type="text" id="form3Example1c" value="<?php echo $uname?>" name="uname" />
                      <label class="form-label" for="form3Example1c">Your Name</label>
  
                      <br><br>
                      <input type="email" id="form3Example3c" value="<?php echo $email?>" name="email" hidden/>


                      <br><br>
                      <input type="date" id="form3Example3c" value="<?php echo $dob?>" name="dob"/>
                      <label class="form-label" for="form3Example3c">Date of Birth</label>

              


                      <br><br>


                    <?php
                    if($gender=="male"){
                      echo'
                      <input type="radio" name="gender" value="female"> Female
                      <input type="radio" name="gender" checked value="male"> Male
                      <input type="radio" name="gender" value="other"> Other
                      ';
                    }
                    if($gender=="female"){
                      echo'
                      <input type="radio" name="gender" checked value="female"> Female
                      <input type="radio" name="gender" value="male"> Male
                      <input type="radio" name="gender" value="other"> Other
                      ';
                    }
                    if($gender=="other"){
                      echo'
                      <input type="radio" name="gender" value="female"> Female
                      <input type="radio" name="gender"  value="male"> Male
                      <input type="radio" name="gender" checked value="other"> Other
                      ';
                    }
                    ?>
                  <br><br>
                    <label class="form-label" for="form3Example4c">Gender</label>



                    <br><br>
                      <input type="text" id="form3Exampl" value="<?php echo $phone?>" name="phone"/>
                      <label class="form-label" for="form3Exampl">Phone</label>


                  <input type="hidden" name="password" value="<?php echo $password?>" > 
                  <br><br>
                    <button type="submit" name="submit">Submit</button>


                </form>


                <center>
      </div>  






<?php
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
// insert start

if(isset($_POST['submit'])){
$uname = $_POST['uname'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$sql = "UPDATE admin SET uname='$uname', email = '$email',dob='$dob', gender='$gender', phone='$phone',password='$password' WHERE id= $id";

if ($conn->query($sql) === TRUE) {
  echo "Record Updated successfully <br>";
  $_SESSION['user']=$name;

  //header("Refresh:0");
  // select or read data start
header("Location: AdminProfile.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
// insert end



}
$conn->close();
}


?>

</body>
</html>