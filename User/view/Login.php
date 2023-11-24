<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" href="./../js/style.css">
</head>
<body>
	<div class="login">
	 <center><h2>User Login Form</h2></center>
	 <center>

	 <table>
	        <form method="post" action="../control/LoginValid.php">

			<tr>
			     <td>User name :</td>
		         <td><input type="text" name="uname" value="<?php 
    if(isset($_COOKIE['uname'])){
      echo $_COOKIE['uname'];
    }
    else{
      echo "";
    }
     
    ?>" ></td>
		         <!-- <br><br> -->
			</tr>
			<tr>
		         <td>Password:</td>
                 <td><input type="Password" id="pass" name="password" value="<?php 
    if(isset($_COOKIE['password'])){
      echo $_COOKIE['password'];
    }
    else{
      echo "";
    }
     
    ?>" ></td>
                 <!-- <br><br> -->
			</tr>



			<tr>
			     <td>Remember Me :</td>
		         <td><input type="checkbox" checked="checked" name="remember"></td>
		         <!-- <br><br> -->
			</tr>


			<table>
				<br>

				<center><input type="submit" value= "Log In" name="Submit">
				<h4>Don't have an account?</h4>
			<a href="Registration.php">Click here for Registration</a></center>

            </form>

    </center>
	</div>
</body>
</html>