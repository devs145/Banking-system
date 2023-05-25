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
    include_once 'include/dbConnect.php';

    if (checkConnectStatus()) {
        $sql = "SELECT LPAD(customerID, 11, 0), name, email, phone, dob FROM CUSTOMER WHERE (customerID=".$_POST['idToUpdate'].")";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $custID = $row["LPAD(customerID, 11, 0)"];
        echo "
            <div class='table-wrapper'>
            <table>
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>DOB</th>
            </tr>";
        echo "<tr>
            <td>".$row["LPAD(customerID, 11, 0)"]."</td>
            <td>".$row["name"]."</td>
            <td>".$row["email"]."</td>
            <td>".$row["phone"]."</td>
            <td>".$row["dob"]."</td>";
        echo "</table>";
        echo "<form action=\"updateCustomer2.php\" method=\"post\">
            <br><input type =\"hidden\" name=\"cID\" value=".$custID.">
            <br>Name: <input type=\"text\" name=\"cname\" required></br>
            <br>Email: <input id=\"email\" name=\"email\" type=\"email\" required></br>
            <br>Phone: <input type=\"tel\" id=\"phone\" name=\"phone\" placeholder=1234567890 pattern=\"[1-9]{1}[0-9]{9}\" required></br>
            <br>DOB: <input type=\"date\" id=\"dob\" name=\"dob\" required></br>
            <br><input type=\"submit\"></br>
            </form>
            <form action=\"home.php\" method=\"post\">
            <button type=\"submit\">Home</button>
            </form>
            </div>";
    }
?>
