<?php

include_once 'include/dbConnect.php';

$cName = $_POST['cname'];
$cEmail= $_POST['email'];
$cPhone= $_POST['phone'];
$cDOB= $_POST['dob'];

$addQuery="INSERT INTO `CUSTOMER` (`customer_ID`, `name`, `email`, `phone`, `dob`) VALUES (NULL, '$cName', '$cEmail', '$cPhone', '$cDOB')";
$result = mysqli_query($conn,$addQuery) or die (mysql_error());
echo 'customer added successfully.';
echo '<a href="customer.php">Customer Page</a>';
?>
