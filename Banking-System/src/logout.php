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
    setcookie("user", "", time() - 3600);
    setcookie("pass", "", time() - 3600);
    echo "<b> You have been logged out! Redirecting...</b>";
    header('Refresh: 5; URL=index.php');
?>
