<?php
include_once "vendor/autoload.php";
use App\Controllers\Teacher;


//get instence of teacher class
$teacher = new Teacher;


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
				<h2>All Data</h2>
				<?php
				//show alert messeges.
					if(isset($msg)){
						echo $msg;
					}
				?>
				<a class='badge badge-primary' href="index.php">Published</a>(<?php echo $teacher-> dataCount("published");?>)
				<a class='badge badge-danger' href="trash.php">Trash</a>(<?php echo $teacher-> dataCount("trash");?>)
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
						$all_teachers = $teacher-> showTeachers(0);
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
								<a class="btn btn-sm btn-info" href="profile.php?profile_id=<?php echo $sir -> id?>">View</a>
								<a class="btn btn-sm btn-warning" href="edit.php?edit_id=<?php echo $sir -> id?>">Edit</a>
								<a class="btn btn-sm btn-danger" href="trash.php?trash_id=<?php echo $sir -> id?>">Trash</a>
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