<html>
    <head>
      <title>Lethbridge Financial</title>
      <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="center-text" id="login-logo">
            <img src="Logo.png" alt="Lethbridge Financial" width=300px>
            <h2> Branch Information </h2>
        </div>
    </body>
</html>

<?php
  //dbConnect file connects to DB for us. We can use $conn from this. 
  include_once 'include/dbConnect.php';

  // Check connection
  if (checkConnectStatus()) {
    $sql = "SELECT LPAD(branchID, 6, 0), address, name, manager_name FROM BRANCH";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "
            <div class='table-wrapper'>
            <h1 class='table-title'>Branches</h1>
            <table>
            <tr>
            <th>ID</th>
            <th>Address</th>
            <th>Name</th>
            <th>Manager Name</th>
            </tr>
            </div>
            ";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $branch_id = $row["LPAD(branchID, 6, 0)"];
      
        echo "<tr>
        <td>".$row["LPAD(branchID, 6, 0)"]."</td>
        <td>".$row["address"]."</td>
        <td>".$row["name"]."</td>
        <td>".$row["manager_name"]."</td>
        <td>
            <form action=\"deleteBranch.php\" method=\"post\">
            <input type=\"hidden\" name=\"idToDelete\" value=".$branch_id.">
            <button class='tablebtn' type=\"submit\">Delete</button>
            </form>
        </td>
        <td>
            <form action=\"updateBranch.php\" method=\"post\">
            <input type=\"hidden\" name=\"idToUpdate\" value=".$branch_id.">
            <button class='tablebtn' type=\"submit\">Update</button>
            </form>
        </td>
        </tr>";
      }
      echo "</table>";
    } else {
      echo "No Branches!";
    }
    echo "<table id='bot'>
          <td><form action=\"addBranch.php\" method=\"post\">
          <button class='tablebtn' type=\"submit\">Add Branch</button>
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