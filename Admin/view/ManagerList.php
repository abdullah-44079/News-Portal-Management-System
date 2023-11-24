<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../js/style.css">
</head>
<body>

<?php
include "header.php";
?>
<h1 class="list">Manager List</h1>
    <?php
    include "../model/mydb.php";

    include "../control/ManagerDeleteAction.php";
$mydb= new MyDB();
$conobj=$mydb->openCon();
$result=$mydb->getAllUsers("manager", $conobj);
if($result->num_rows > 0)
{

    echo '

<div class="container-3">
    <table>
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Date of Birth</th>
          <th>Delete</th>
          <th>Update</th>
        </tr>
      </thead>
      <tbody>
      <tr>
    ';

     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo '
         
        
        <tr>
          <th>'.$row["id"].'</th>
          <td>'.$row["name"].'</td>
          <td>'.$row["email"].'</td>
          <td>'.$row["gender"].'</td>
          <td>'.$row["dob"].'</td>
          <form action="" method="post">
          <input type="number" hidden name="id" value="'.$row['id'].'" >
          <td> <button class="btn"><input  type="submit" name="delete" value="Delete"> </button></td>
          <td><button class="btn"><input  type="submit" name="update" value="Update"></button></td>
         
        </form>
        </tr>
         ';
        
 
     }
     echo '</tbody>
      </table>
      </div>';
}else {
    echo "0 results";
}


        
?>
<?php

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $_SESSION['id']=$id;

    // header('location:UpdateNotice.php');
    echo '<script>window.location.href="UpdateManager.php"</script>';

}

?>
<script src="./../js/getManager.js"></script>
</body>
</html>