<html>
    <head>
        <title>Lethbridge Financial</title>
            <link rel="stylesheet" href="styles.css">
        <head>
    <body>
        <div class="center-text" id="login-logo">
            <img src="Logo.png" alt="Lethbridge Financial" width=300px>
        </div>
</body>
</html>

<?php
    include_once 'include/dbConnect.php';

    if (checkConnectStatus()) {
        echo "<div class='table-wrapper'>
              <h1 class='table-title'>Find Bank Accounts by Customer</h1>
              <form action=\"customer_accounts2.php\" method=\"post\">
              <br>Customer ID: <select id=\"cID\" name=\"cID\" required>";
        $sql = "SELECT LPAD(customerID, 11, 0) FROM CUSTOMER";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value = ".$row['LPAD(customerID, 11, 0)'].">".$row['LPAD(customerID, 11, 0)']."</option>";
            }
        }
        echo "</select></br>
              <br><input type=\"submit\"></br>
              </form>
              <form action=\"home.php\" method=\"post\">
              <button type=\"submit\">Home</button>
              </form></div>";
    }
?>
