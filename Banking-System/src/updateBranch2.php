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
        $bID = $_POST['bID'];
        $addr = $_POST['address'];
        $bName= $_POST['bname'];
        $man= $_POST['man_name'];

        $updateQuery="UPDATE BRANCH SET address = '$addr', name = '$bName', manager_name = '$man' WHERE branchID = '$bID'";
        $result = mysqli_query($conn,$updateQuery) or die (mysql_error());
        echo "<p><b>Branch ID: ".$bID." updated succesfully!</b></p>";
        echo "<p>Redirecting back to <a href=\"branch.php\">branch page</a> in 5 sec...</p>";
        header('Refresh: 5; URL=branch.php');
    }
?>
