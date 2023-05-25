<?php

include_once 'include/dbConnect.php';

$deleteQuery="DELETE FROM CUSTOMER WHERE (customer_ID=".$_POST['idToDelete'].")";
$result = mysqli_query($conn,$deleteQuery) or die (mysql_error());

$tests = $_POST['idToDelete'];

echo "Customer ID: ".$tests." has been deleted";
echo '<a href="customer.php">Customer Page</a>';
?>