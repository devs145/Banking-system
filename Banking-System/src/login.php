<html>
    <head><title>Lethbridge Financial</title></head>
</html>

<?php
    try {
        $conn = new mysqli("localhost", $_POST["username"], $_POST["password"], "db_proj");
        $user = $_POST["username"];
        $pass = $_POST["password"]; 
        setcookie("user",$user,time()+900);
        setcookie("pass",$pass,time()+900);
        header('Location:home.php');
    } catch (Exception $e) {
        echo "<p><b>Login failed!</b> Please <a href=\"index.php\">try again.</a></p>";
    }
?>