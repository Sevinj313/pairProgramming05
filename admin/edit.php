<?php
session_start();
include 'db.php';
$result;
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
	if (isset($_SESSION['admin']) && $_SESSION['admin'] == "admin") {

		$id = $_GET['id'];
		$sql_read = "SELECT * FROM slider WHERE id=$id";
		$query = mysqli_query($db_conn, $sql_read);

		if($query) {
			global $result;
			$result = mysqli_fetch_assoc($query);
			if($result) {
?>
				<!DOCTYPE html>
				<html>
				<head>
					<title>Edit slide</title>
					<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
					<link rel="stylesheet" type="text/css" href="../css/main.css">
				</head>
				<body>
					<div class="container">
						<div class="row">
							<h2>Edit Slide</h2>
						</div><!-- row -->
						<div class="row">
							<br><br>
							<img width="200px" height="200px" src="../images/<?=$result['path']?>" class="img-responsive">
							<br>
							<form action="" method="POST" enctype="multipart/form-data">
								<div class="form-group">
								<label for="description">Description</label>
									<input type="text" name="description" class="form-control" id="description" placeholder="description" value="<?=$result['description']?>">
								</div>
								<div class="form-group">
									<label for="image">File input</label>
									<input type="file" id="image" name="image">
								</div>
								<input type="hidden" name="id" value="<?=$result['id']?>">
								<input type="submit" name="submit" class="btn btn-success" value="Update">
								<a href="admin.php" class="btn btn-default">Back</a>
							</form>
						</div><!-- row -->
						<?php
					} else {
						?>
						<div class="text-center">
							<h1>Oops! There is something wrong!</h1>
						</div>
						<?php
					}
				}
			}
		}
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
		if(!empty($_POST['description']) && !empty($_FILES['image'])) {
			$id = $_POST['id'];
			$description = $_POST['description'];
			$currentDate = date("dmYHis");
			$filetype = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
			$filename = $currentDate . ".$filetype";
			$target_file = "../images/" . $filename;

			if($filetype == "jpg" || $filetype == "png" || $filetype == "jpeg") {
				if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
					// unlink("../images/".$result['path']);
					$sql_edit = "UPDATE slider SET description='$description', path='$filename' WHERE id=$id";
					mysqli_query($db_conn, $sql_edit);
					header("Location:admin.php");
				} else {
					echo "Xəta";
				}
			} else {
				echo "Xəta";
			}
		}
	}
		?>
	</div><!-- container -->
</body>
</html>
