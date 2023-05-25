<html>
    <head>
      <title>Lethbridge Financial</title>
      <link rel="stylesheet" href="styles.css">
  </head>
  <body>
        <div class="center-text" id="login-logo">
            <img src="Logo.png" alt="Lethbridge Financial" width=300px>
            <h2> Bank Account Information </h2>
        </div>
  </body>
</html>


<?php
    include_once 'include/dbConnect.php';

    if (checkConnectStatus()) {
        $cID = $_POST['cID'];
        $cName = $_POST['cname'];
        $cEmail= $_POST['email'];
        $cPhone= $_POST['phone'];
        $cDOB= $_POST['dob'];

        if ($_POST['phone'] == '') {
            $updateQuery="UPDATE CUSTOMER SET name = '$cName', email = '$cEmail', phone = NULL, dob = '$cDOB' WHERE customerID = '$cID'";
        } else {
            $updateQuery="UPDATE CUSTOMER SET name = '$cName', email = '$cEmail', phone = '$cPhone', dob = '$cDOB' WHERE customerID = '$cID'";
        }
        $result = mysqli_query($conn,$updateQuery) or die (mysql_error());
        echo "<p><b>Customer ID: ".$cID." updated succesfully!</b></p>";
        echo "<p>Redirecting back to <a href=\"customer.php\">customer page</a> in 5 sec...</p>";
        header('Refresh: 5; URL=customer.php');
    }
?>