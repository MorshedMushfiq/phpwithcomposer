<?php 
include_once "vendor/autoload.php";
use App\Controllers\Teacher;

$teacher = new Teacher;

if(isset($_POST['add_teacher'])){
	$name = $_POST["name"];
	$email = $_POST["email"];
	$cell = $_POST["cell"];
	$photo = $_FILES["photo"];
	$teacher->createNew($name, $email, $cell, $photo);
	$msg = $teacher->messege("Data Insert Success", "success");
}







?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	

	<div class="wrap">
		<a class='btn btn-warning btn-sm' href="index.php">Back to Table</a>
		<br>
		<br>
		<div class="card shadow">
			<div class="card-body">
				<h2>Sign Up</h2>
				<?php
					if(isset($msg)){
						echo $msg;
					}
				?>

				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input class="form-control" name="name" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input class="form-control" name="email" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input class="form-control" name='cell' type="text">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input class="form-control" name='photo' type="file">
					</div>
					<div class="form-group">
						<input class="btn btn-primary" name="add_teacher" type="submit" value="Add Teacher">
					</div>
				</form>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>