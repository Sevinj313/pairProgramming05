<?php
	include 'db.php';
	session_start();
	if (isset($_SESSION['admin']) && $_SESSION['admin'] = "admin") {

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<a href="add.php" class="btn btn-success">Add Slide</a>
			<table class="table table-striped table-bordered">
				<thead>
					<th>ID</th>
					<th>Image</th>
					<th>Description</th>
					<th>Action</th>
				</thead>
				<tbody>		
				<?php
					if($db_conn) {
					$sql_all = "SELECT * FROM slider";
					$query = mysqli_query($db_conn, $sql_all);
					while ($row = mysqli_fetch_assoc($query)) {
						$id = $row['id'];
				?>
						<tr>
							<td><?= $id?></td>
							<td><?= $row['description']?> </td>
							<td><a href="../images/<?=$row['path']?>"><img width="100px" height"100px" src="../images/<?=$row['path']?>"></a></td>
							<td>
								<a href="delete.php?id=<?=$id?>" class="btn btn-danger">Delete</a>
								<a href="edit.php?id=<?=$id?>" class="btn btn-success">Edit</a>
				<?php
								if($row['publish'] == "p") {
				?>
									<a class="btn btn-warning" href="publish.php?id=<?=$id?>&value=u">Unpublish</a>
				<?php
								} else {
				?>
									<a class="btn btn-success" href="publish.php?id=<?=$id?>&value=p">Publish</a>
				<?php
								}
				?>
						</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
<?php
				}
			}
		} else {
			unset($_SESSION['admin']);
			echo "Access denied!";
		}
	mysqli_close($db_conn);
?>