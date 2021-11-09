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

				                

				              


		
                     <!--  form ---->
		            <form action="insert_bill.php" method="post">
					
					<div class="mb-3">
						<label>Customer Id</label>
						<select name="c_id" class="form-control">
							<option disabled selected>Select Customer</option>
							<?php
							$customer_calling = $data->callingData('registration',"status='1'");
							foreach($customer_calling as $cus):
							?>
							<option value="<?= $cus['r_id'];?>"><?= $cus['r_name'];?></option>
						    <?php endforeach;?>
						</select>
					</div>

					<div class="mb-3">
						<label>Current Reading</label>
						<input type="text" name="current_reading" class="form-control" value="">

					</div>

					<div class="mb-3">
						<label>Month</label>
						<select class="form-control" name="month">
							<option disabled selected>Select month</option>
							<option>January</option>
							<option>February</option>
							<option>March</option>
							<option>April</option>
							<option>May</option>
							<option>June</option>
							<option>July</option>
							<option>August</option>
							<option>September</option>
							<option>October</option>
							<option>November</option>
							<option>December</option>
						</select>
						

					</div>
					
					<div class="mb-3">
						<label>Unit</label>
						<input type="text" name="unit" class="form-control">
					</div>

					<div class="mb-3">
						<label>Charge per Unit</label>
						<input type="text" name="charge_per_unit" class="form-control">
					</div>

					<div class="mb-3">
						<label>Discount</label>
						<input type="text" name="discount" class="form-control">
					</div>

		
					<div class="mb-3">
						<label>Due date</label>
						<input type="date" name="due_date" class="form-control">
					</div>
					
					<div class="mb-3">
						<input type="submit" name="insert_bill" class="btn btn-success btn-block" >
					</div>

				</form>
				 <!--  Data base insertion-->
				                <?php
				                if (isset($_POST['insert_bill'])) {
				                	$c_id = $_POST['c_id'];
									$current_reading = $_POST['current_reading'];
									$month = $_POST['month'];
									$unit = $_POST['unit'];
									$charge_per_unit = $_POST['charge_per_unit'];
									$discount = $_POST['discount'];
									$due_date = $_POST['due_date'];

									

									$query = "(c_id,current_reading,month,unit,charge_per_unit,discount,due_date) value ('$c_id','$current_reading','$month','$unit','$charge_per_unit','$discount','$due_date')";

		                            $data->insertData('bill',$query);
				                }
				                ?> 
			</div>
		</div>
	</div>

</body>
</html>
