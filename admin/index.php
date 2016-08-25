<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<form action="" method="POST">
					<div class="form-group">
						<input type="text" name="username" class="form-control" placeholder="Username" required>
						<input type="password" name="password" class="form-control" placeholder="Password" required>
						<input type="submit" name="submit" class="btn btn-success btn-login" value="Login">
					</div>
				</form>
				<?php 
					session_start();
					if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['submit']) {
						if(strtolower($_POST['username']) == "admin" && $_POST['password'] == "admin") {
							$_SESSION['admin'] = "admin";
							header("Location:admin.php");
						} else {
							$_SESSION['error'] = "Username və ya password səhvdir!";
							header("Location:index.php");
						}
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>