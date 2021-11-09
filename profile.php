<?php include "include/config.php";
//$connect = mysqli_connect('localhost','root','','electricity');
$log = $_SESSION['user'];

if(!isset($_SESSION['user'])){
	$data->redirect('index');
}

//$getUser = mysqli_query($connect,  "select * from registration where r_mobileno='$log'");
$getUser = $data->callingData('registration'," r_mobileno='$log' AND status='1'");

?>

<!DOCTYPE html>
<html>
<head>
	<title>user profile</title>
</head>
<body>
	<?php include "include/header.php";?>
			<div class='container-fluid mt-5'>
				<div class='row pt-5'>
					<div class='col-lg-3' >
						<div class='card'> 
							<div class='card-body'>
								<h1 class='h5 text-center text-dark'>Consumer no:- <?= $getUser[0]['r_id'];?></h1>
								<h1 class='h5 text-center text-dark'> <?= $getUser[0]['r_name'];?></h1>
								<p class='small text-center text-dark'><?= $getUser[0]['r_mobileno'];?> </p>
							</div>
						</div>
					</div>
					<div class="col-lg-9">
						<div class="card">
							<div class="card-header">
								BILL
							</div>
							<div class="card-body">
								
								<table class="table table-striped">
									<tr>
										<th>#bill no</th>
										<th>Month</th>
										<th>Reading Unit</th>
										<th>Monthly Unit</th>
										<th>Monthly Amount</th>
										<th>Discount</th>
										<th>Total Amount</th>
										<th>Due date</th>
										<th>Status</th>
									</tr>
									<?php 
								 		$r_id = $getUser[0]['r_id'];
								 		$bill = $data->callingData('bill JOIN registration ON bill.c_id = registration.r_id',"c_id='$r_id'");
								 		foreach ($bill as $bl): 
									?>
									<tr>
										<td><?= $bl['b_id'];?></td>
										<td><?= $bl['month'];?></td>
										<td><?= $bl['current_reading'];?></td>
										<td><?= $bl['unit'];?></td>
										<td><?= $bl['unit']*$bl['charge_per_unit'];?></td>
										<td><?= $bl['discount'];?></td>
										<td><?= $bl['unit']*$bl['charge_per_unit']-$bl['discount'];?></td>
										<td><?= $bl['due_date'];?></td>
										
											<?php 
											$b_id =$bl['b_id'];
											if($bl['b_status'] == '1'){
												echo "<td><button class='btn btn-success' disabled>Paid</button></td>";
											}
											else{
												echo "<td><a href='payment.php?b_id=$b_id' class='btn btn-danger'>Pay</a></td>";
											}

											?>
										
										
									
									</tr>
									<?php endforeach;?>
								</table>
								
							</div>
						</div>
					</div>
				</div>
			</div>


<?php include "include/footer.php";?>
</body>
</html>