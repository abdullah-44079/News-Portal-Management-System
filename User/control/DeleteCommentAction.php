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
if (isset($_REQUEST["delete"])) {
  $id = ($_POST["id"]);
// sql to delete a record
$mydb= new MyDB();
$conobj= $mydb->openCon();
$result=$mydb->deleteUser("comment", $conobj,$id);

if ($result === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

}


?>



</body>
</html>