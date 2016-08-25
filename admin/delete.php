<?php
	session_start();
	include 'db.php';
	if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
		if($_SESSION['admin'] == "admin") {
			$id = $_GET['id'];
			$sql_delete = "DELETE FROM slider WHERE id=$id";
			$sql_get_path = "SELECT path FROM slider WHERE id=$id";
			if(mysqli_query($db_conn, $sql_get_path)) {
				if(mysqli_query($db_conn, $sql_delete)) {
					// unlink("../images/$fpath");
					header("Location:admin.php");
				}
			}
		}
	} 
?>