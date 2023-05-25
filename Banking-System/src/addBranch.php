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
        echo "<div class='table-wrapper'><form action=\"addBranch2.php\" method=\"post\">
             <br>Address: <input type=\"text\" name=\"address\" required></br>
             <br>Name: <input type=\"text\" name=\"bname\" required></br>
             <br>Manager Name: <input type=\"text\"name=\"man_name\" required></br>
             <br><input type=\"submit\"></br>
             </form>
             <form action=\"home.php\" method=\"post\">
             <button type=\"submit\">Home</button>
             </form>
             </div>";
    }
?>
