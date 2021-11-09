<?php include "../include/config.php";

if(!isset($_SESSION['admin_log'])){
	$data->redirect('login'); 
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add electricity Bill </title>
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
						<th>Bill ID</th>
						<th>Name</th>
						<th>Contact</th>
						<th>Month</th>
						<th>Total Amount</th>
						<th>Action</th>
					</tr>
					<?php
					$user = $data->callingData('bill JOIN registration ON bill.c_id = registration.r_id');
					foreach($user as $u):
					?>

					<tr>
						<td><?= $u['b_id'];?></td>
						<td><?= $u['r_name'];?></td>
						<td><?= $u['r_mobileno'];?></td>
						<td><?= $u['month'];?></td>
						<td><?= $u['unit']*$u['charge_per_unit']-$u['discount'];?></td>

						<td>
							<div class="form-inline">

							<?php 
							if($u['b_status'] == 0): ?>
						 	<a href="bill_status.php?id=<?= $u['b_id'];?>&change_status=<?= $u['b_status'];?>" class="btn btn-danger ml-2">Due</a>

						 	<?php elseif($u['b_status'] == 1): ?>
						 	<button class="btn btn-success" disabled>Paid</button>
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
	$b_id = $_GET['id'];
	$data->updateData('bill',"b_status='1'","b_id='$b_id'");
	$data->redirect('bill_status');

}

 ?>