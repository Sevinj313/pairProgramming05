<?php
	session_start();
	include 'db.php';
	if(isset($_SESSION['admin']) && $_SESSION['admin'] == "admin") {
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add slide</title>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="text" name="description" placeholder="description" required>
		<input type="file" name="image" required>
		<input type="submit" name="submit" value="ADD">
	</form>
</body>
</html>

<?php 
	}

	if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['submit'] && $_SESSION['admin'] == "admin") {
		if(isset($_POST['description']) && !empty($_FILES['image'])) {
			$description = $_POST['description'];
			$currentDate = date("dmYHis");
			$filetype = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
			$filename = $currentDate . ".$filetype";
			$target_file = "../images/" . $filename;

			if($filetype == "jpg" || $filetype == "png" || $filetype == "jpeg") {
				if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
					$sql_insert = "INSERT INTO slider (description, path) VALUES ('$description', '$filename')";
					if(mysqli_query($db_conn, $sql_insert)){
						header("Location:admin.php");
					} else {
						echo "Xəta";
					}
				} else {
					echo "Xəta";
				}
			} else {
				echo "Xəta";
			}
		}
	}
?>