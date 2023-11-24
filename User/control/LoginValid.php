<?php
include("../model/mydb.php");
$logged=0;
if(isset($_REQUEST["Submit"]))
{

    if(empty($_REQUEST["uname"]))
    {
        $logged=1;
        echo "Please enter your user name";
    }
    elseif(empty($_REQUEST["password"]))
    {
        $logged=1;
        echo "Please enter your password";
    }
    else{

            $mydb= new MyDB();
            $conobj=$mydb->openCon();
            $result=$mydb->checkUser("user",$_REQUEST["uname"], $_REQUEST["password"],
            $conobj);  
            if($result->num_rows >0)
            {
                session_start();
                
                $_SESSION["uname"]=$_REQUEST["uname"];
                $_SESSION["pass"]=$_REQUEST["password"];
                

                header("Location: ../view/MyProfile.php");
            } 
            else
            {
                echo "Please correct email and password";
            }

		}
        if($logged==1){
            echo "Something is incorrect";
        }
	}
// }
?>