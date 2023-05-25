<?php
	// Hide unnecessary errors
	ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(E_ALL);
	
	$conn = NULL;
	if ($conn == NULL) {
		try {
			if (empty($_COOKIE["pass"])) {
				$conn = new mysqli("localhost", $_COOKIE["user"], "", "db_proj");
			} else {
				$conn = new mysqli("localhost", $_COOKIE["user"], $_COOKIE["pass"], "db_proj");
			}
		} catch (Exception $e) {
			$conn = NULL;
		}
	}
	function checkConnectStatus() {
		if (isset($_COOKIE["user"])) {
			try {
				if (empty($_COOKIE["pass"])) {
					$connection = new mysqli("localhost", $_COOKIE["user"], "", "db_proj");
				} else {
					$connection = new mysqli("localhost", $_COOKIE["user"], $_COOKIE["pass"], "db_proj");
				}
			} catch (Exception $e) {
				echo "<p>You need to <a href=\"index.php\"> login</a> to view this page!</p>";
				return false;
			}
			return true;
		} else {
			echo "<p>You need to <a href=\"index.php\"> login</a> to view this page!</p>";
			return false;
		}
	}
?>
