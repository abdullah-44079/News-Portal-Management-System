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
 
<?php
include "navbar.php";
include "../control/CreateCommentAction.php";
include "../control/DeleteCommentAction.php";
?>
<h1 class="list">News List</h1>
    <?php


$newsId1="";

 $mydb= new MyDB();
 $conobj=$mydb->openCon();
$result=$mydb->getAllUsers("news", $conobj);
if($result->num_rows > 0)
{


     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo '<div class="NewsList">';
        echo '
        <div>
            <div>

            </div>
            <div>
            <h4> Author: '.$row["author"].'</h4>
            <p> Date: '.$row["date"].'</p>.
            <p hidden> Date: '.$newsId1=$row["id"].'</p>.
           
            </div>
        </div>
        ';
        echo '<h4>  '.$row["title"].'</h4>';
        echo '<p >'.$row["details"].'</p>';

       
echo "<h2>Comment List</h2>";
        $mydb= new MyDB();
        $conobj=$mydb->openCon();
       $result=$mydb->getAllUsers("comment", $conobj);
       if($result->num_rows > 0)
       {
       
       
            // output data of each row
            while($com = $result->fetch_assoc()) {
                if($com['newsId']==$row['id']){
                    echo '<div class="comment">';
        
                    echo '<h4 >  '.$com["text"].'</h4>';
                    echo '<p >'.$com["author"].'</p>';

                    echo '<form action="" method="post">
                    <input type="number" hidden name="id" value="'.$com['id'].'" >
                    <td> <button class="button"><input  type="submit" name="delete" value="Delete"></button></td>
                    </form>';



                    echo "</div>";
                }

            }
        }



       echo '<form method="post" action="">';
      
        echo 'Text: <input type="text" name="text">';
        echo '<br><br>';
        echo 'Author: <input type="text" value="'.$_SESSION
        ['uname'] .'" name="author">';

        echo '<input type="text" hidden name="newsId" value="'.$newsId1.'">';

      echo '<br><br>';
      
      echo '<input type="submit" name="submit" value="Submit">';
      echo '</form>';
      echo "</div>";


     }
}else {
    echo "0 results";
}

        
?>


</body>
</html>