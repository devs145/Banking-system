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
        echo
              "<h1 class='table-title'>Find Bank Accounts by Branch</h1>
              <div class = 'loginWrapper'>
              <form action=\"branch_accounts2.php\" method=\"post\">
              <br>Branch ID: <select id=\"bID\" name=\"bID\" required></div>";
        $sql = "SELECT LPAD(branchID, 6, 0) FROM BRANCH";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value = ".$row['LPAD(branchID, 6, 0)'].">".$row['LPAD(branchID, 6, 0)']."</option>";
            }
        }
        echo "</select></br>
              <br><input type=\"submit\"></br>
              </form>
              <form action=\"home.php\" method=\"post\">
              <button type=\"submit\">Home</button>
              </form>";
    }
?>
