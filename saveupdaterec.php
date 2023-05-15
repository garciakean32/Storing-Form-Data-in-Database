<?php
$conn = mysqli_connect("localhost", "root", "", "garcia");

// Check connection
if ($conn === false) {
  die("ERROR: Could not connect. "
    . mysqli_connect_error());
}

$bid = $_REQUEST['bid'];
$bname = $_REQUEST['bname'];
$address = $_REQUEST['address'];
$email = $_REQUEST['email'];
$cre = $_REQUEST['cre'];
$ddate = date('d-m-y H:i:s');

$sql = "UPDATE data SET id=$bid,name='$bname',address='$address',email='$email', created='$cre', updated='$ddate'   WHERE id=$bid";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
header("Location:index.php");
?>