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
$id= $title= $details= $dop= $author="";
$message= $error ="";

 // select or read data start
    include "../model/mydb.php";
$mydb= new MyDB();
$conobj=$mydb->openCon();
$result=$mydb->getAllUsers("notice", $conobj);
 
 
 if ($result->num_rows > 0) {
        // output data of each row
     while($row = $result->fetch_assoc()) {
        
            $id= $row["id"];
            $title= $row["title"];
            $details= $row["details"];
			$dop= $row["dop"];
            $author= $row["author"];

     }
 } else {
     echo "0 results";
 }
 



?>



<section class="container-6">

                <p>Update Notice</p>

                <form id="regForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">  


                <label class="form-label" for="form3Example1c">Title</label>
                      <input type="text" id="form3Example1c" value="<?php echo $title?>" name="title" />
                      <br><br>

                      <label class="form-label" for="form3Example1d">Details</label>

                      <input type="text" id="form3Example3d" value="<?php echo $details?>" name="details"/>

                  

                    <input type="hidden" name="dop" value="<?php echo $dop?>" > 
                    <input type="hidden" name="author" value="<?php echo $author?>" >

<br><br>
                      <button type="submit" name="submit">Submit</button>

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
$title = $_POST['title'];
$details = $_POST['details'];
$dop = $_POST['dop'];
$author = $_POST['author'];


$sql = "UPDATE notice SET title='$title', details = '$details',dop='$dop', author='$author'WHERE id= '$id' ";

if ($conn->query($sql) === TRUE) {
  echo "Record Updated successfully <br>";
  $_SESSION['user']=$name;

  //header("Refresh:0");
  // select or read data start
header("Location: AllNotice.php");
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