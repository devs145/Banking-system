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
        $deleteQuery="DELETE FROM BRANCH WHERE (branchID=".$_POST['idToDelete'].")";
        $result = mysqli_query($conn,$deleteQuery) or die (mysql_error());

        $dID = $_POST['idToDelete'];

        echo "<p><b>Branch ID: ".$dID." has been deleted</b></p>";
        echo "<p>Redirecting back to <a href=\"branch.php\">branch page</a> in 5 sec...</p>";
        header('Refresh: 5; URL=branch.php');
    }
?>
