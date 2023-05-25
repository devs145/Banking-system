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
        $addr = $_POST['address'];
        $bName = $_POST['bname'];
        $man = $_POST['man_name'];

        $addQuery = "INSERT INTO `BRANCH` (`branchID`, `address`, `name`, `manager_name`) VALUES (NULL, '$addr', '$bName', '$man')";
        $result = $conn->query($addQuery) or die (mysql_error());
        echo "<p><b>Branch added successfully!</b></p>";
        echo "<p>Redirecting back to <a href=\"branch.php\">branch page</a> in 5 sec...</p>";
        header('Refresh: 5; URL=branch.php');
    }
?>
