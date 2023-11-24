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
<h1 class="list">Notice List</h1>
    <?php
    include "../model/mydb.php";
    include "../control/NoticeDeleteAction.php";


 $mydb= new MyDB();
 $conobj=$mydb->openCon();
$result=$mydb->getAllUsers("notice", $conobj);

// include dirname(__FILE__).'/conn.php';
// // select or read data start
// $sql = "SELECT id, title,details,dop,author FROM notice";
// $result = $conn->query($sql);
if($result->num_rows > 0)
{


     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo '<div class="container-5">';
        echo '
        <div >
            <div>
            <i></i>
            </div>
            <div>
            <h4> '.$row["author"].'</h4>
            <p>'.$row["dop"].'</p>.
            </div>
        </div>
        ';
        echo '<h4>  '.$row["title"].'</h4>';
        echo '<p>'.$row["details"].'</p>';
        
        echo '<form action="" method="post" >
        <input type="number" hidden name="id" value="'.$row['id'].'" >
        <td><button class="btn-3"> <input type="submit" name="delete" value="Delete"></button></td>
        <td><button class="btn-3"><input type="submit" name="update" value="Update"></button></td>
       
      </form>';
        echo "</div>";
        
 
     }
}else {
    echo "0 results";
}

        
?>
<?php

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $_SESSION['id']=$id;

    // header('location:UpdateNotice.php');
    echo '<script>window.location.href="UpdateNotice.php"</script>';

}

?>
<script src="./../js/getNotice.js"></script>

</body>
</html>