<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['value']) && isset($_GET['id'])) {
		if (isset($_SESSION['admin']) && $_SESSION['admin'] == "admin") {
			include 'db.php';
			$publish = $_GET['value'];
			$id = $_GET['id'];
			$sql_publish = "UPDATE slider SET publish='$publish' WHERE id='$id'";
			$query = mysqli_query($db_conn, $sql_publish);

			if($query) {
				header("Location:admin.php");
			} else {
				echo "Xəta!";
			}
		} else {
			echo "Daxil olmaq üçün icazəniz yoxdur!";
		}
	} else {
		echo "Daxil olmaq üçün icazəniz yoxdur!";
	}
?>