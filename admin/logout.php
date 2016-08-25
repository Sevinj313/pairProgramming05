<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] === "GET" && $_SESSION['admin'] == "admin") {
		if ($_GET['value'] == "sdefregrerefe156465sdsa") {
			unset($_SESSION['admin']);
			session_destroy();
			header("Location:index.php");
		}
	}
?>