<html>
    <head>
        <title>Lethbridge Financial</title>
            <link rel="stylesheet" href="styles.css">
        <head>
    <body>
        <div class="center-text" id="login-logo">
            <img src="Logo.png" alt="Lethbridge Financial" width=300px>
            <h2> Customer Information </h2>
        </div>
</body>
</html>

<?php
  //dbConnect file connects to DB for us. We can use $conn from this.
  include_once 'include/dbConnect.php';

  // Check connection
  if (checkConnectStatus()) {
    $sql = "SELECT LPAD(account, 12, 0), balance, type, date_opened,
            LPAD(C.customerID, 11, 0), C.name as cname, email, phone, dob,
            LPAD(B.branchID, 6, 0), address, B.name as bname, manager_name
            FROM BANK_ACCOUNT as A, CUSTOMER as C, BRANCH as B
            WHERE C.customerID = A.customerID and
            B.branchID = A.branchID
            ORDER BY account";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "
            <div class='table-wrapper'>
            <table>
            <tr>
            <th>Account</th>
            <th>Balance</th>
            <th>Type</th>
            <th>Date Opened</th>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>DOB</th>
            <th>Branch ID</th>
            <th>Address</th>
            <th>Branch Name</th>
            <th>Manager Name</th>
            </tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $cust_id = $row["LPAD(C.customerID, 11, 0)"];

        echo "<tr>
        <td>".$row["LPAD(account, 12, 0)"]."</td>
        <td>".$row["balance"]."</td>
        <td>".$row["type"]."</td>
        <td>".$row["date_opened"]."</td>
        <td>".$row["LPAD(C.customerID, 11, 0)"]."</td>
        <td>".$row["cname"]."</td>
        <td>".$row["email"]."</td>
        <td>".$row["phone"]."</td>
        <td>".$row["dob"]."</td>
        <td>".$row["LPAD(B.branchID, 6, 0)"]."</td>
        <td>".$row["address"]."</td>
        <td>".$row["bname"]."</td>
        <td>".$row["manager_name"]."</td>
        </tr>";
      }
      echo "</table>";
    } else {
      echo "No Bank Info!";
    }
    echo "<table id='bot'>
          <td><form action=\"home.php\" method=\"post\">
          <button type=\"submit\">Home</button>
          </form></td>
          <td><form action=\"logout.php\" method=\"post\">
          <button type=\"submit\">Logout</button>
          </form></td>
          </table>
          </div>";
    $conn->close();
  }
?>
