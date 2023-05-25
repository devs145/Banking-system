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
  //dbConnect file connects to DB for us. We can use $conn from this. 
  include_once 'include/dbConnect.php';

  // Check connection
  if (checkConnectStatus()) {
    $sql = "SELECT LPAD(account, 12, 0), LPAD(customerID, 11, 0), LPAD(branchID, 6, 0), balance, type, date_opened FROM BANK_ACCOUNT";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "
            <div class='table-wrapper'>
            <h1 class='table-title'>Bank Accounts</h1>
            <table>
            <tr>
            <th>Account</th>
            <th>Customer ID</th>
            <th>Branch ID</th>
            <th>Balance</th>
            <th>Type</th>
            <th>Date Opened</th>
            </tr>
            </div>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $acct = $row["LPAD(account, 12, 0)"];
      
        echo "<tr>
        <td>".$row["LPAD(account, 12, 0)"]."</td>
        <td>".$row["LPAD(customerID, 11, 0)"]."</td>
        <td>".$row["LPAD(branchID, 6, 0)"]."</td>
        <td>".$row["balance"]."</td>
        <td>".$row["type"]."</td>
        <td>".$row["date_opened"]."</td>
        <td>
            <form action=\"deleteBank_account.php\" method=\"post\">
            <input type=\"hidden\" name=\"accountToDelete\" value=".$acct.">
            <button class='tablebtn' type=\"submit\">Delete</button>
            </form>
        </td>
        <td>
            <form action=\"updateBank_account.php\" method=\"post\">
            <input type=\"hidden\" name=\"accountToUpdate\" value=".$acct.">
            <button class='tablebtn' type=\"submit\">Update</button>
            </form>
        </td>
        </tr>";
      }
      echo "</table>";
    } else {
      echo "No Bank Accounts!";
    }
    echo "<table id='bot'>
          <td><form action=\"addBank_account.php\" method=\"post\">
          <button class='tablebtn' type=\"submit\">Add Bank Account</button>
          </form></td>
          <td><form action=\"home.php\" method=\"post\">
          <button class='tablebtn' type=\"submit\">Home</button>
          </form></td>
          <td><form action=\"logout.php\" method=\"post\">
          <button class='tablebtn' type=\"submit\">Logout</button>
          </form></td>
          </table>";
    $conn->close();
  }
?>