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
        echo "<div class = 'loginWrapper'>
              <a href=\"customer.php\"><button> <p>View Customer Information</p></button></a> <br>
              <a href=\"branch.php\"><button> <p>View Branch Information</p> </button></a> <br>
              <a href=\"bank_account.php\"><button> <p>View Bank Account Information</p> </button></a> <br>
              <a href=\"customer_accounts.php\"><button> <p>Find Bank Accounts by Customer</p> </button></a> <br>
              <a href=\"branch_accounts.php\"><button> <p>Find Bank Accounts by Branch</p> </button></a> <br>
              <a href=\"bank_info.php\"><button> <p>View All Bank Account Information</p> </button></a> <br>
              <form action=\"logout.php\" method=\"post\">
              <p><button id='logoutbtn' type=\"submit\">Logout</button></p>
            </div>
              </form>";
    }
?>