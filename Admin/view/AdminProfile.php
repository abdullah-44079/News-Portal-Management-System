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
include "../control/ProfileAction.php";
?>
    <?php
     
    if(!empty($_SESSION['email']) && !empty($_SESSION['pass'])){

            if($_SESSION['email']==$email && $_SESSION['pass']==$password){
              echo '

              <div class="container-1">
              
              <h3 class="hello">Hello '.$_SESSION['email'].'</h3>
                            <h5> Name: '.$uname.'</h5>
                            <p> Email: '.$email.'</p>
                           
                       
                              
                            
 
                              <p>Birthday: '. $dob.'</p>
                              <p>Phone: '. $phone.'</p>
                              <p>Gender: '. $gender.'</p>
              
                            
                      <button ><a href="ProfileEdit.php">Profile Edit</a></button>
           
              
              </div>
              ';

            }
        }
      
      else{
        echo "<h2>First Logged In</h2>";
      }
?>

<?php include "footer.php"; ?>
</body>
</html>