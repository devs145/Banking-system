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
        $sql = "SELECT LPAD(account, 12, 0), LPAD(customerID, 11, 0), LPAD(branchID, 6, 0), balance, type, date_opened FROM BANK_ACCOUNT WHERE (account=".$_POST['accountToUpdate'].")";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $account = $row["LPAD(account, 12, 0)"];
        echo "<div class='table-wrapper'>
              <table>
              <tr>
              <th>Account</th>
              <th>Customer ID</th>
              <th>Branch ID</th>
              <th>Balance</th>
              <th>Type</th>
              <th>Date Opened</th>
              </tr>";
        echo "<tr>
              <td>".$row["LPAD(account, 12, 0)"]."</td>
              <td>".$row["LPAD(customerID, 11, 0)"]."</td>
              <td>".$row["LPAD(branchID, 6, 0)"]."</td>
              <td>".$row["balance"]."</td>
              <td>".$row["type"]."</td>
              <td>".$row["date_opened"]."</td>
              </tr>";
        echo "</table>";
        echo "<form action=\"updateBank_account2.php\" method=\"post\">
             <input type=\"hidden\" name=\"acct\" value=".$account.">
             <br>Customer ID: <select id=\"cID\" name=\"cID\" required>";
        $sql = "SELECT LPAD(customerID, 11, 0) FROM CUSTOMER";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value = ".$row['LPAD(customerID, 11, 0)'].">".$row['LPAD(customerID, 11, 0)']."</option>";
            }
        }
        echo "</select></br>
             <br>Branch ID: <select id=\"bID\" name=\"bID\" required>";
        $sql = "SELECT LPAD(branchID, 6, 0) FROM BRANCH";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value = ".$row['LPAD(branchID, 6, 0)'].">".$row['LPAD(branchID, 6, 0)']."</option>";
            }
        }
        echo "</select></br>
             <br>Balance: <input type=\"text\"name=\"balance\"></br>
             <br>Type: <select id=\"type\"name=\"type\" required>
                <option value = \"CH\">CH</option>
                <option value = \"SV\">SV</option>
             </select></br>
             <br>Date Opened: <input type = \"date\" id = \"date\" name = \"date\" required></br>
             <br><input type=\"submit\"></br>
             </form>
             <form action=\"home.php\" method=\"post\">
             <button type=\"submit\">Home</button>
             </form>
             </div>";
    }
?>
