<?php
include("../model/mydb.php");
$logged=0;
if(isset($_REQUEST["Submit"]))
{

    if(empty($_REQUEST["email"]))
    {
        $logged=1;
        echo "Please enter your email address";
    }
    elseif(empty($_REQUEST["password"]))
    {
        $logged=1;
        echo "Please enter your password";
    }
    else{
        // $filedata=file_get_contents("../data/jsondata.json");
        // $phpobj=json_decode($filedata);
        // foreach($phpobj as $myobj)
        // {
		// if($myobj->email==$_REQUEST["email"] && $myobj->password==$_REQUEST["password"])
		// {
            $mydb= new MyDB();
            $conobj=$mydb->openCon();
            $result=$mydb->checkUser("admin",$_REQUEST["email"], $_REQUEST["password"],
            $conobj);  
            if($result->num_rows >0)
            {
                session_start();
                
                $_SESSION["email"]=$_REQUEST["email"];
                $_SESSION["pass"]=$_REQUEST["password"];
                
        if(!empty($_POST['remember'])){
    
                $cookie_name="email";
                $cookie_value=$_SESSION['email'];
                $cookie_name2="password";
                $cookie_value2=$_SESSION['pass'];
            
                setcookie($cookie_name, $cookie_value, time() + (60*60*24* 30), "/"); 
                setcookie($cookie_name2, $cookie_value2, time() + (60*60*24* 30), "/"); 
            
                //print_r($_COOKIE);
            
              }
                header("Location: ../view/First.php");
            } 
            else
            {
                echo "Please correct email and password";
            }
            // $logged=1;
            // session_start();

            // $_SESSION['email']=$_REQUEST["email"];
            // $_SESSION['pass']=$_REQUEST["password"];

            // if(!empty($_POST['remember'])){
    
            //     $cookie_name="email";
            //     $cookie_value=$_SESSION['email'];
            //     $cookie_name2="password";
            //     $cookie_value2=$_SESSION['pass'];
            
            //     setcookie($cookie_name, $cookie_value, time() + (60*60*24* 30), "/"); 
            //     setcookie($cookie_name2, $cookie_value2, time() + (60*60*24* 30), "/"); 
            
            //     //print_r($_COOKIE);
            
            //   }



			// header("Location: ../view/First.php");
		// }

		}
        if($logged==1){
            echo "Something is incorrect";
        }
	}
// }
?>