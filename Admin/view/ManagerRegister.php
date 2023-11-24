<!DOCTYPE HTML>  
<html>
<head>

<title>Document</title>
    <link rel="stylesheet" href="./../js/style.css">
    
<style>


</style>
</head>
<body>  
<?php
include "header.php";
include "../control/ManagerRegisterAction.php";
?>
<div class="container-2">
<center>
<h2>Register A Manager</h2>
<p><span class="error">* Required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>

  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>


  <br /><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  
  Date of Birth:
  <input type="date" name="dob" > 
  <br><br>
  Password: 
  <input type="password" name="password">
  <span class="error">* <?php echo $passErr;?></span>
  <br><br><br>

<input type="submit" name="submit" value="Submit">  
</form>
</center>
</div>



</body>
</html>