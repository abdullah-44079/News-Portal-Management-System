<!DOCTYPE HTML>  
<html>
<head>
<link rel="stylesheet" href="./../js/style.css">
</head>
<body>  
<?php
include "header.php";
include "../control/CreateNoticeAction.php";
?>


<center>
<div class="container-4">
<h2>Create Notice</h2>
<?php //session_start(); ?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Title: <input type="text" name="title">

  <br><br>
  <label for="details">Notice Details:</label>
    <br> 
  <textarea id="details" name="details" rows="4" cols="50"></textarea>

 
   
  <br><br>
  Date of Post:
  <input readonly="readonly"  value="<?php echo date("Y/m/d") ?>" name="dop" > 
  <br><br>
  Author: <input readonly="readonly" value="<?php 
  if(isset($_SESSION['email'])){
    echo $_SESSION['email'];
  }else{
    echo "";
  }
  ?>" name="author">


<br><br>

<input type="submit" name="submit" value="Submit">  
</form>
</div>
</center>

</body>
</html>