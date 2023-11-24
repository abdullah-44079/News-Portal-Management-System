<?php
// include "navbar.php";
// include("../model/mydb.php");


$text = $author = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_REQUEST["text"]) && !empty($_REQUEST["author"]))  
        {  
          $mydb= new MyDB();
          $conobj= $mydb->openCon();
          $result=$mydb->insertComment("comment",$_REQUEST["text"],$_REQUEST["author"], $_REQUEST["newsId"],$conobj);
          if($result===TRUE)
          {
              echo "Success";
          }
          else
          {
              echo "Error".$conobj->error;
          }   
             
        }  
     }    
    
?>