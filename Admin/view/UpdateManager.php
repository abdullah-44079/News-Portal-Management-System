<?php
ob_start();
?>
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<title>Document</title>
    <link rel="stylesheet" href="./../js/style.css">
</head>
<body class="home">  
<?php
include "header.php";
include "conn.php";

$nameErr= $nameErr2 = $emailErr = $genderErr = $dobErr = $passErr= "";
$id= $name= $email= $gender= $dob="";
$message= $error ="";

 // select or read data start
    include "../model/mydb.php";
$mydb= new MyDB();
$conobj=$mydb->openCon();
$result=$mydb->getAllUsers("manager", $conobj);
 
 
 if ($result->num_rows > 0) {
        // output data of each row
     while($row = $result->fetch_assoc()) {
        
            $id= $row["id"];
            $name= $row["name"];
            $email= $row["email"];
			$gender= $row["gender"];
            $dob= $row["dob"];

     }
 } else {
     echo "0 results";
 }
 



?>



<div class="registerForm">
 

                <p>Update Manager</p>

                <form id="regForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">  

                <label for="form3Example1c">Name</label>
                      <input type="text" id="form3Example1c" value="<?php echo $name?>" name="name" />
                      
<br>
<br> <label class="form-label" for="form3Example3d">Email</label>
                      <input type="text" id="form3Example3d"  value="<?php echo $email?>" name="email"/>
                     


                      <br><br>
                      <label for="form3Example1e">Date of Birth</label>
                      <input type="date" id="form3Example3e" value="<?php echo $dob?>" name="dob"/>
                      <br><br>

                      <br><br>
                 
                      <input type="text" hidden id="form3Example3e" value="<?php echo $gender?>" name="gender"/>
                      <br><br>


                      <br>

                    <button type="submit" name="submit" class="btn-2">Submit</button>

                </form>

</div>  






<?php
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
// insert start

if(isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];


$sql = "UPDATE manager SET name='$name', email = '$email',gender='$gender', dob='$dob'WHERE id= '$id' ";

if ($conn->query($sql) === TRUE) {
  echo "Record Updated successfully <br>";
//   $_SESSION['user']=$name;

  //header("Refresh:0");
  // select or read data start
header("Location: ManagerList.php");
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