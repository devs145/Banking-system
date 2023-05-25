<?php

include_once 'include/dbConnect.php';

$cID = $_POST['cID'];
$cName = $_POST['cname'];
$cEmail= $_POST['email'];
$cPhone= $_POST['phone'];
$cDOB= $_POST['dob'];

$updateQuery="UPDATE CUSTOMER SET name = '$cName', email = '$cEmail', phone = '$cPhone', DOB = '$cDOB' WHERE customer_ID = '$cID'";
$result = mysqli_query($conn,$updateQuery) or die (mysql_error());
echo 'customer updated successfully.';
echo '<a href="customer.php">Customer Page</a>';
?>