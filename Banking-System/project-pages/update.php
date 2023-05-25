<html>
    <h1>Update Customer Info</h1>
    </html>

<?php

    include_once 'include/dbConnect.php';

    $sql = "SELECT LPAD(customer_ID, 11, 0), name, email, phone, DOB FROM CUSTOMER WHERE (customer_ID=".$_POST['idToUpdate'].")";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo "<table>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>DOB</th>
    </tr>";
    echo "<tr>
    <td>".$row["LPAD(customer_ID, 11, 0)"]."</td>
    <td>".$row["name"]."</td>
    <td>".$row["email"]."</td>
    <td>".$row["phone"]."</td>
    <td>".$row["DOB"]."</td>";
    echo "</table>";
    
?>

<html>
<head>
 <title>DB Project</title>
</head>

<form action="update2.php" method="post">
    <input type ="hidden" name="cID" value=<?php echo $_POST['idToUpdate']; ?>>
Name: <input type="text" name="cname"><br>
Email: <input type="text" name="email"><br>
Phone: <input type="text" name="phone"><br>
DOB: <input type="text" name="dob"><br>
<input type="submit">
</form>

</body>
</html>