<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  
<?php include "../control/AdminCommentAction.php" ?>
<h2>Create a Message</h2>
<?php ?>
<form method="post" action="">

  From: <input type="text" value="<?php echo $_SESSION
  ['uname'] ?>" name="fromm">
  To: <input type="text" value="<?php echo "Admin"; ?>" name="tom">


  Subject: <input type="text" name="subject">
  <br><br>
  <label >Message:</label>
    <br> 
  <textarea id="message" name="message" rows="4" cols="60"></textarea>


<br><br>

<input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>