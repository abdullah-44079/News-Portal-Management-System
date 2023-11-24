<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./../js/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <style>
        .navbar{
            margin-bottom: 1.2rem;
        }
    </style>
</head>
<body>
<div class="container">


    <?php
    session_start();
  
    
    if(!empty($_SESSION['email']) && !empty($_SESSION['pass'])){
        // $email= $_SESSION['email'];
        // $password= $_SESSION['pass'];
            


               echo '
               <nav class="header">
 
                   <ul class="headerContainer">
                       
                       <button class="headbutton">
                       <a href="AdminProfile.php">View Profile</a>
                       </button>
                       <button class="headbutton">
                       <a href="ManagerRegister.php">Manager Registration</a>
                       </button>
                       <button class="headbutton">
                       <a href="ManagerList.php">Manager List</a>
                       </button>
                       <button class="headbutton">
                       <a href="CreateNotice.php">Create Notice</a>
                       </button>
                       <button class="headbutton">
                       <a href="AllNotice.php">All Notice</a>
                       </button>
                       <button class="headbutton">
                       <a href="Logout.php">Log out</a>
                       </button>
                      
                   </ul>
               </nav>
               ';



    }
        
?>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

