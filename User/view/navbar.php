<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    

    include "../model/mydb.php";
    $fname=$lname=$uname=$email=$gender=$dob=$phone=$password="";
    $mydb= new MyDB();
    $conobj=$mydb->openCon();
    $result=$mydb->getUserInfo("user", $_SESSION["uname"], $conobj);
    if($result->num_rows > 0)
    {
        
        while($row=$result->fetch_assoc()){
            $fname=$row["fname"];
            $lname=$row["lname"];
            $uname=$row["uname"];
            $email=$row["email"];
            $gender=$row["gender"];
            $dob=$row["dob"];
            $phone=$row["phone"];
            $password=$row["password"];
        }
    }







    if(!empty($_SESSION['uname']) && !empty($_SESSION['pass'])){
        $uname= $_SESSION['uname'];
        $password=$_SESSION['pass'];
        $mydb= new MyDB();
        $conobj=$mydb->openCon();
        $result=$mydb->getUserInfo("user", $_SESSION["uname"], $conobj);
        if($result->num_rows > 0)
        {
            
            while($row=$result->fetch_assoc()){
            if($row["uname"]==$uname && $row["password"]==$password){



               echo '
               <nav>
               
                   <ul>
                       <div class="navbar">
                       <button>
                       <a class="nav-link active" aria-current="page" href="MyProfile.php">View Profile</a>
                       </button>
                       <button>
                       <a class="nav-link active" aria-current="page" href="MyProfileEdit.php">Profile Edit</a>
                       </button>
                       <button>
                       <a class="nav-link active" aria-current="page" href="Logout.php">Log Out</a>
                       </button>
                       <button>
                       <a class="nav-link active" aria-current="page" href="NewsList.php">News List</a>
                       </button>
                       <button>
                       <a class="nav-link active" aria-current="page" href="AdminContact.php">Contact Us</a>
                       </button>
                       <button>
                       <a class="nav-link active" aria-current="page" href="MessageList.php">Message List</a>
                       </button>
                      
                   </ul>

                   <div class="navbar">
               </nav>
               ';
            }
        }
    }
}

        
?>

</body>
</html>

