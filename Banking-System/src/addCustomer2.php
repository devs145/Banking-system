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
        $cName = $_POST['cname'];
        $cEmail = $_POST['email'];
        $cPhone = $_POST['phone'];
        $cDOB = $_POST['dob'];

        if ($cPhone == '') {
            $addQuery = "INSERT INTO `CUSTOMER` (`customerID`, `name`, `email`, `phone`, `dob`) VALUES (NULL, '$cName', '$cEmail', NULL, '$cDOB')";
        } else {
            $addQuery = "INSERT INTO `CUSTOMER` (`customerID`, `name`, `email`, `phone`, `dob`) VALUES (NULL, '$cName', '$cEmail', '$cPhone', '$cDOB')";
        }
        $result = $conn->query($addQuery) or die (mysql_error());
        echo "<p><b>Customer added successfully!</b></p>";
        echo "<p>Redirecting back to <a href=\"customer.php\">customer page</a> in 5 sec...</p>";
        header('Refresh: 5; URL=customer.php');
    }
?>
