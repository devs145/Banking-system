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
        $acct = $_POST['acct'];
        $cID = $_POST['cID'];
        $bID = $_POST['bID'];
        $bal = $_POST['balance'];
        $type = $_POST['type'];
        $date = $_POST['date'];
        if ($cID == '') {
            $updateQuery = "UPDATE BANK_ACCOUNT SET customerID = NULL, ";
        } else {
            $updateQuery = "UPDATE BANK_ACCOUNT SET customerID = '$cID', ";
        }
        if ($bID == '') {
            $updateQuery .= "branchID = NULL, ";
        } else {
            $updateQuery .= "branchID = '$bID', ";
        }
        if ($bal == '' or !is_numeric($bal)){
            $updateQuery .= "balance = 0, type = '$type', date_opened = '$date' WHERE account = '$acct'";
        } else {
            $updateQuery .= "balance = '$bal', type = '$type', date_opened = '$date' WHERE account = '$acct'";
        }
        $result = $conn->query($updateQuery) or die (mysql_error());
        echo "<p><b>Bank Account updated successfully!</b></p>";
        echo "<p>Redirecting to <a href=\"bank_account.php\">bank account page</a> in 5 sec...</p>";
        header('Refresh: 5; URL=bank_account.php');
    }
?>
