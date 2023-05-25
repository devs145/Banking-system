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
        $sql = "SELECT LPAD(branchID, 6, 0), address, name, manager_name FROM BRANCH WHERE (branchID=".$_POST['idToUpdate'].")";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $branchID = $row["LPAD(branchID, 6, 0)"];
        echo "<div class='table-wrapper'>
            <table>
            <tr>
            <th>ID</th>
            <th>Address</th>
            <th>Name</th>
            <th>Manager Name</th>
            </tr>";
        echo "<tr>
            <td>".$row["LPAD(branchID, 6, 0)"]."</td>
            <td>".$row["address"]."</td>
            <td>".$row["name"]."</td>
            <td>".$row["manager_name"]."</td>";
        echo "</table>";
        echo "<form action=\"updateBranch2.php\" method=\"post\">
            <input type =\"hidden\" name=\"bID\" value=".$branchID.">
            <br>Address: <input type=\"text\" name=\"address\" required></br>
            <br>Name: <input type=\"text\" name=\"bname\" required></br>
            <br>Manager Name: <input type=\"text\" name=\"man_name\" required></br>
            <br><input type=\"submit\"></br>
            </form>
            <form action=\"home.php\" method=\"post\">
            <button type=\"submit\">Home</button>
            </form>
            </div>";
    }
?>
