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
        $deleteQuery="DELETE FROM BANK_ACCOUNT WHERE (account=".$_POST['accountToDelete'].")";
        $result = mysqli_query($conn,$deleteQuery) or die (mysql_error());

        $acct = $_POST['accountToDelete'];

        echo "<p><b>Account: ".$acct." has been deleted</b></p>";
        echo "<p>Redirecting to <a href=\"bank_account.php\">bank account page</a> in 5 sec...</p>";
        header('Refresh: 5; URL=bank_account.php');
    }
?>
