<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../js/style.css">
    <title>Document</title>
</head>
<body>
    <style>
        table, th, td {
            border:1px solid black;
        }
        .list{
            text-align: center;
        }
        .post{
            padding-left: 8rem;
        }
    </style>
<?php
include "navbar.php";
?>
<h1 class="list">Message List</h1>
    <?php




 $mydb= new MyDB();
 $conobj=$mydb->openCon();
$result=$mydb->getAllUsers("message", $conobj);
if($result->num_rows > 0)
{


     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo '<div class="messageList">';
        echo '

            
            <h4> To: '.$row["tom"].'</h4>
            <p> From: '.$row["fromm"].'</p>
        ';
        echo '<h4>  '.$row["subject"].'</h4>';
        echo '<p>'.$row["message"].'</p>';

        echo "</div>";
        
 
     }
}else {
    echo "0 results";
}

        
?>


</body>
</html>