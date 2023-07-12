<?php
include_once "vendor/autoload.php";
use App\Controllers\Teacher;

$teacher = new Teacher;

//get trash id and send to controller
if(isset($_GET['trash_id'])){
	$id= $_GET['trash_id'];
	$teacher->trashTeacher($id);
	$msg = $teacher->messege("Data Trashed success", "danger");
}



//get restore id and send to controller
if(isset($_GET['restore_id'])){
	$id = $_GET['restore_id'];
	$teacher->restoreData($id);
	$msg = $teacher->messege("Data Restore Success", "success");
}

//get delete id and send to controller
if(isset($_GET['delete_id'])){
	$id= $_GET['delete_id'];
	$teacher->deleteData($id);
	$msg = $teacher->messege("Data Deleted Success", "danger");
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
	
	

	<div class="wrap-table">
		<a class='btn btn-primary btn-sm' href="add_teacher.php">Add New Teacher</a>
		<br>
		<br>
		<div class="card shadow">
			<div class="card-body">
				<h2>All Trash Data</h2>
				<?php
					if(isset($msg)){
						echo $msg;
					}
				?>
				<a class='badge badge-primary' href="index.php">Published</a>(<?php 
				//get the numbers of row of the publishes data.
				echo $teacher-> dataCount("published");?>)
				<a class='badge badge-danger' href="trash.php">Trash</a>(<?php
				//get the numbers of row of the trashes data.
				echo $teacher-> dataCount("trash");?>)
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						//all teachers show
						$all_teachers = $teacher-> showTeachers(1);
						$i=1;
						while($sir = $all_teachers->fetch_object()):

						?>

						<tr>
							<td><?php echo $i; $i++;?></td>
							<td><?php echo $sir -> name?></td>
							<td><?php echo $sir -> email?></td>
							<td><?php echo $sir -> cell?></td>
							<td><img src="photos/teachers/<?php echo $sir -> photo?>" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="?restore_id=<?php echo $sir -> id?>">Restore Data</a>
								<a class="btn btn-sm btn-warning" href="?delete_id=<?php echo $sir -> id?>">Delete Permanently</a>
							</td>
						</tr>
						<?php
							endwhile;
						?>
						
					</tbody>
				</table>
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