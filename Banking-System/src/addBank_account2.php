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
        $cID = $_POST['cID'];
        $bID = $_POST['bID'];
        $bal = $_POST['balance'];
        $type = $_POST['type'];
        $date = $_POST['date'];
        if ($cID == ''){
            $addQuery = "INSERT INTO `BANK_ACCOUNT` (`account`, `customerID`, `branchID`, `balance`, `type`, `date_opened`) VALUES (NULL, NULL, ";
        } else {
            $addQuery = "INSERT INTO `BANK_ACCOUNT` (`account`, `customerID`, `branchID`, `balance`, `type`, `date_opened`) VALUES (NULL, '$cID', ";
        }
        if ($bID == ''){
            $addQuery .= "NULL, ";
        } else {
            $addQuery .= "'$bID', ";
        }
        if ($bal == '' or !is_numeric($bal)){
            $addQuery .= "0, '$type', '$date')";
        } else {
            $addQuery .= "'$bal', '$type', '$date')";
        }
        $result = $conn->query($addQuery) or die (mysql_error());
        echo "<p><b>Bank Account added successfully!</b></p>";
        echo "<p>Redirecting back to <a href=\"bank_account.php\">bank account page</a> in 5 sec...</p>";
        header('Refresh: 5; URL=bank_account.php');
    }
?>
