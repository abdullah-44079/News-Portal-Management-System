<?php 
include '../control/RegistrationAction.php';
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./../js/style.css">
	<title>Registration Form</title>
</head>
<body>
	<div  class="container-8">
	 <center><h2>Admin Registration Form</h2></center>
	 <center>

		<table>

	        <form method="post" action="" onsubmit="return validateForm()">

			<tr>
				 <td>Username :</td>
		         <td><input type="text" id="uname" name="uname"></td>
		         <!-- <br><br> -->
			</tr>
			<tr>
			     <td>Date of Birth :</td>
		         <td><input type="date" id="dob" name="dob">
		         <!-- <br><br> -->
			</tr>
			<tr>
				 <td>Gender :</td>
				 <td>
					 <input type="radio" name="gender" value="Male">Male
				     <input type="radio" name="gender" value="Female">Female
				 </td>
				 <!-- <br><br> -->
			</tr>
			<tr>
				 <td>E-mail:</td>
				 <td><input type="Email" id="email" name="email"></td>
                 <!-- <br><br> -->
			</tr>
			<tr>
				 <td>Phone Number :</td>
			     <td>
					<input type="text" name="country code"  value="+880" size="2"/>
			        <input type="text" id="phone" name="phone" size="11" maxlength="11"/>
				 </td>
		         <!-- <br><br> -->
			</tr>
			<tr>
				 <td>Address :</td>
				 <td><input type="text"  id="address" name="address"></td>
		         <!-- <br><br> -->
			</tr>
			<tr>
				 <td>Password:</td>
				 <td><input type="Password" id="pass" name="password"></td>
                 <!-- <br><br> -->
			</tr>
			<tr>
				 <td>Confirm Password:</td>
				 <td><input type="Password" id="cpass" name="cpass"></td>
                 <!-- <br><br> -->
			</tr>

		</table>
			<br>

			<center>
				 <td><input type="submit" value= "Submit" name="Submit"></td>
				 <td><input type="submit" value="Reset" name="Reset"></td>
				 <h4>Allready have an account?</h4>
				<a href="Login.php">Click here for Login</a>
			</center>

            </form>

    </center>
	</div>
	<?php include "footer.php"; ?>

	<script src="../js/myscript.js"></script>
	</body>

</html>