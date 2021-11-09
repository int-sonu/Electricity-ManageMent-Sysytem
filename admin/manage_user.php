<?php include "../include/config.php";
//$connect = mysqli_connect('localhost','root','','electricity');

if(!isset($_SESSION['admin_log'])){
	$data->redirect('login'); 
}



?> 
<!DOCTYPE html>
<html>
<head>
	<title>Bijli power Bihar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

	<?php include "nav.php";?>


	<div class="container mt-3">
		<div class="row">
			<div class="col-lg-3">
				<?php include "side.php";?>
			</div>

			<div class="col-lg-9">
				<table class="table table-striped">
					<tr>
						<th>#ID</th>
						<th>Name</th>
						<th>Contact</th>
						<th>Action</th>
					</tr>

					<?php
   					//$user = mysqli_query($connect,  "select * from registration");

					$user = $data->callingData('registration');

					foreach($user as $u):
					?>

					<tr>
						<td><?= $u['r_id'];?></td>
						<td><?= $u['r_name'];?></td>
						<td><?= $u['r_mobileno'];?></td>

						<td>
							<div class="form-inline">
							<a href="" class="btn btn-success btn-sm">View</a>

							<?php 
							if($u['status'] == 0): ?>
						 	<a href="manage_user.php?id=<?= $u['r_id'];?>&change_status=<?= $u['status'];?>" class="btn btn-danger ml-2">pending</a>

						 	<?php elseif($u['status']==1): ?>
						 	<a href="manage_user.php?id=<?= $u['r_id'];?>&change_status=<?= $u['status'];?>" class="btn btn-success ml-2">Active</a>
						 <?php endif; ?>
						</div>
						</td>
					
					</tr>
				<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>


	


</body>
</html>


<?php 
if(isset($_GET['change_status'])){
	$status = $_GET['change_status'];
	$r_id = $_GET['id'];
	if($status=="1"){
		$fields =  "status='0'";
	}
	else{
		$fields = "status='1'";
	}

	$data->updateData('registration',$fields,"r_id='$r_id'");

	$data->redirect('manage_user');

}

 ?>