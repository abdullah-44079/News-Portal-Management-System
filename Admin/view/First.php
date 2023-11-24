
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include "header.php";

?>
<center>


<?php
if(isset($_SESSION["email"]) && isset($_SESSION["pass"])){
    echo '<h3>The News Wave</h3>
    <h4>Successfully Logged In</h4>';
}

?>


</center>
   <?php include "footer.php"; ?>
</body>
</html>