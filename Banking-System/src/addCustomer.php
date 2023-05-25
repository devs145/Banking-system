<html>
    <head>
        <title>Lethbridge Financial</title>
            <link rel="stylesheet" href="styles.css">
        <head>
    <body>
        <div class="center-text" id="login-logo">
            <img src="Logo.png" alt="Lethbridge Financial" width=300px>
        </div>
        <h1 class = "customerinfo"> Add Customer Information </h1>
</body>
</html>

<?php
    include_once 'include/dbConnect.php';

    if (checkConnectStatus()) {
        echo "<form action=\"addCustomer2.php\" method=\"post\">
        <div class = 'customerinfo'>
             <br>Name: <input type=\"text\" name=\"cname\" required></br>
             <br>Email: <input id=\"email\" name=\"email\" type=\"email\" required></br>
             <br>Phone: <input type=\"tel\" id=\"phone\" name=\"phone\" placeholder=1234567890 pattern=\"[1-9]{1}[0-9]{9}\" required></br>
             <br>DOB: <input type = \"date\" id = \"dob\" name = \"dob\" required></br>
             <br><input type=\"submit\"></br>
             </form>
             <form action=\"home.php\" method=\"post\">
             <button type=\"submit\">Home</button>
        </div>
             </form>";
    }
?>