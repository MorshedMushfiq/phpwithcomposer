<?php 
include_once "vendor/autoload.php";
use App\Controllers\Teacher;

$teacher = new Teacher;

//get edit id and send into Teacher controller
if(isset($_GET['edit_id'])){
	$id = $_GET['edit_id'];
	$single_teacher = $teacher->editTeacher($id);
}

//get update name, email, cell, id, old_photo, new_photo, and send into Teacher controller
if(isset($_POST['update_teacher'])){
	$name = $_POST["name"];
	$email = $_POST["email"];
	$cell = $_POST["cell"];
	$id = $_GET['edit_id'];
	$old_photo = $_POST["old_photo"];
	$new_photo = $_FILES["new_photo"];
	$teacher->updateTeacher($name, $email, $cell, $id, $old_photo, $new_photo);
	$msg = $teacher->messege("Data Updated Success", "success");
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
				//alert messege
					if(isset($msg)){
						echo $msg;
					}
				?>

				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input class="form-control" name="name" value='<?php echo $single_teacher -> name?>' type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input class="form-control" name="email" value='<?php echo $single_teacher -> email?>' type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input class="form-control" name='cell' value='<?php echo $single_teacher -> cell?>' type="text">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<img style='width: 300px;' src="photos/teachers/<?php echo $single_teacher -> photo?>" alt="">
						<input class="form-control" value='<?php echo $single_teacher -> photo?>' name='old_photo' type="hidden">
						<input class="form-control" name='new_photo' type="file">
					</div>
					<div class="form-group">
						<input class="btn btn-primary" name="update_teacher" type="submit" value="Update Teacher">
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