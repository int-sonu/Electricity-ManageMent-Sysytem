<?php include "../include/config.php";
$connect = mysqli_connect('localhost','root','','electricity');

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
			<div class="col-lg-6">
				<div class="bg-light text-dark p-5 rounded">
					<h2 class="mb-4">Welcome in Admin panel!.</h2>

					<a href="../admin/insert_bill.php" class="btn btn-success btn-lg">Insert Bill</a>
					<a href="" class="btn btn-warning btn-lg">Received Complaints</a>
				</div>
			</div>
		</div>
	</div>


	

	

</body>
</html>
