<?php
include("../control/RegistrationValid.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form</title>
	<link rel="stylesheet" href="./../js/style.css">
</head>
<body>
	<div class="registration">
<center>
      <h2>User Registration Form</h2>
	        <form method="post" action="" onsubmit="return validateForm()">

                <label>First Name :</label>
		         <input type="text" id="fname" name="fname">
		         <br><br>

                 <label>Last Name :</label>
		         <input type="text" id="lname" name="lname">
		         <br><br>

				 <label>Username :</label>
		         <input type="text" id="uname" name="uname">
		         <br><br>

		         <label>Date of Birth :</label>
		         <input type="date" id="dob" name="dob">
		         <br><br>

		         <label for="email">E-mail:</label>
                 <input type="Email" id="email" name="email">
                 <br><br>

		         <label>Phone Number :</label>

				<select name="code">
				<option value="+880">+880</option>
				<option value="+884">+884</option>
				<option value="+883">+883</option>
				</select>
				 
				 <input type="text" id="phone" name="phone"/>
		         <br><br>

                <label>Gender :</label> 
                <select name="gender" id="gender">
                <option value="male">male</option>
                <option value="female">Female</option>
                </select>


				 <br><br>
		         <label for="pass">Password:</label>
                 <input type="Password" id="pass" name="password">
                 <br><br>

		         <input type="submit"  value= "Submit" name="Submit">
            </form>
			<br><br>
			<a href="login.php">Click here for Log In</a></center>
			</center>
			</div>
	</body>

</html>