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
    $sql = "SELECT LPAD(customerID, 11, 0), name, email, phone, dob FROM CUSTOMER";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "
            <div class='table-wrapper'>
              <h1 class='table-title'>Customers</h1>
              <table>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>DOB</th>
              </tr>
            </div>
          ";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $cust_id = $row["LPAD(customerID, 11, 0)"];
      
        echo "<tr>
        <td>".$row["LPAD(customerID, 11, 0)"]."</td>
        <td>".$row["name"]."</td>
        <td>".$row["email"]."</td>
        <td>".$row["phone"]."</td>
        <td>".$row["dob"]."</td>
        <td>
            <form action=\"deleteCustomer.php\" method=\"post\">
            <input type=\"hidden\" name=\"idToDelete\" value=".$cust_id.">
            <button class='tablebtn' type=\"submit\">Delete</button>
            </form>
        </td>
        <td>
            <form action=\"updateCustomer.php\" method=\"post\">
            <input class='tablebtn' type=\"hidden\" name=\"idToUpdate\" value=".$cust_id.">
            <button class='tablebtn' type=\"submit\">Update</button>
            </form>
        </td>
        </tr>";
      }
      echo "</table>";
    } else {
      echo "No Customers!";
    }
    echo "
          </br>
          </br>
          <table id='bot'>
          <td><form action=\"addCustomer.php\" method=\"post\">
          <button class='tablebtn' type=\"submit\">Add Customer</button>
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