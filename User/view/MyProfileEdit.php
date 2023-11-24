<?php
ob_start();
?>
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="./../js/style.css">
    
</head>
<body class="home">  
<?php
include "navbar.php";
include "conn.php";


$nameErr= $nameErr2 = $emailErr = $genderErr = $dobErr = $passErr= "";
$fname=$lname=$uname = $email = $gender = $phone = $dob = $password=$id  = "";
$message= $error ="";

 // select or read data start
    // include "../model/mydb.php";
$mydb= new MyDB();
$conobj=$mydb->openCon();
$result=$mydb->getAllUsers("user", $conobj);
 
 
 if ($result->num_rows > 0) {
        // output data of each row
     while($row = $result->fetch_assoc()) {
         if($_SESSION['uname']==$row['uname'] && $_SESSION['pass']=$row['password']){

            $id= $row["id"];
			$fname= $row["fname"];
			$lname= $row["lname"];
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



<section class="profileEdit" >


                <h2>Update Profile</h2>
                <br>

                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">  


				<div>

                      <input type="text" id="form3Example1c" value="<?php echo $fname?>" name="fname" />
                      <label class="form-label" for="form3Example1c">Your FIrst Name</label>
<br><br>
                      <input type="text" id="form3Example1d" value="<?php echo $lname?>" name="lname" />
                      <label class="form-label" for="form3Example1d">Your Last Name</label>

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

                      <input type="text" id="form3Exampi" value="<?php echo $email?>" name="email"/>
                      <label for="form3Exampi">Email</label>

                      <br><br>

                      <input type="text" id="form3Exampl"  value="<?php echo $phone?>" name="phone"/>
                      <label for="form3Exampl">Phone</label>
                      <br><br>
                  <input type="hidden" name="password" value="<?php echo $password?>" > 
				  <input type="hidden" name="uname" value="<?php echo $uname?>" > 
          <br><br><br>
                    <button type="submit" name="submit" class="button">Submit</button>


                </form>

</section>  






<?php
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
// insert start

if(isset($_POST['submit'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
$uname = $_POST['uname'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$sql = "UPDATE user SET fname='$fname',lname='$lname', uname='$uname', email = '$email',dob='$dob', gender='$gender', phone='$phone',password='$password' WHERE id= $id";

if ($conn->query($sql) === TRUE) {
  echo "Record Updated successfully <br>";
  $_SESSION['uname']=$uname;

  //header("Refresh:0");
  // select or read data start
header("Location: MyProfile.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
// insert end



}
$conn->close();
}


?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>