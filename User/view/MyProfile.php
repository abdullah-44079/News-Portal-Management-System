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
include "navbar.php";
include "../control/MyProfileAction.php";
?>
    <?php
     
    if(!empty($_SESSION['uname']) && !empty($_SESSION['pass'])){

            if($_SESSION['uname']==$uname && $_SESSION['pass']==$password){
              echo '

              <div class="profile">

                            <h5 Name: >'.$uname.'</h5>
                            <p> Email: '.$email.'</p>
                            <p >Fullname: '. $fname.' '.$lname.'</p>
                            <p>Birthday: '. $dob.'</p>
                            <p>Phone: '. $phone.'</p>
                            <p>Gender: '. $gender.'</p>
                            
              </div>
              ';

            }
        }
      
      else{
        echo "<h2>First Logged In</h2>";
      }
?>

</body>
</html>