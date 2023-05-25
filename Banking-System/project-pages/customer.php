<?php
//dbConnect file connects to DB for us. We can use $conn from this. 
include_once 'include/dbConnect.php';

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT LPAD(customer_ID, 11, 0), name, email, phone, DOB FROM CUSTOMER";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>DOB</th>
    </tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $cust_id = $row["LPAD(customer_ID, 11, 0)"];
   
    echo "<tr>
    <td>".$row["LPAD(customer_ID, 11, 0)"]."</td>
    <td>".$row["name"]."</td>
    <td>".$row["email"]."</td>
    <td>".$row["phone"]."</td>
    <td>".$row["DOB"]."</td>" ?>
    <td>
        <form action="delete.php" method="post">
        <input type="hidden" name="idToDelete" value="<?php echo $cust_id?>">
        <button type="submit">Delete</button>
        </form>
    </td>
    <td>
        <form action="update.php" method="post">
        <input type="hidden" name="idToUpdate" value="<?php echo $cust_id?>">
        <button type="submit">Update</button>
        </form>
    </td>
    </tr>
  <?php }
  echo "</table>";
} else {
  echo "0 results";
}
echo '<a href="addCustomer.php">Add Customer Page</a>';
$conn->close();