<?php
include_once "vendor/autoload.php";
use App\Controllers\Teacher;

$teacher = new Teacher;

//get single profile id and send into Teachers controller
if(isset($_GET['profile_id'])){
    $id=$_GET['profile_id'];
    $teacher_single_data = $teacher->singleTeacher($id);
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
		<a class='btn btn-danger btn-sm' href="index.php">Back</a>
		<br>
		<br>
		<div class="card shadow">
            <img style='width: 300px;' src="photos/teachers/<?php echo $teacher_single_data->photo?>" alt="">
			<div class="card-body">
				<h2>All Data</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>

						</tr>
					</thead>
					<tbody>
						<tr>
                            <td><?php echo $teacher_single_data->name?></td>
                            <td><?php echo $teacher_single_data->email?></td>
                            <td><?php echo $teacher_single_data->cell?></td>
                            <td><img style="width: 150px;" src="photos/teachers/<?php echo $teacher_single_data->photo?>" alt=""></td>


						</tr>
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