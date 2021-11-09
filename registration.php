
<?php include "include/config.php"; 

$r_nameError = $r_emailError = $r_fathernameError = $r_mobilenoError = $r_addressError = $r_passwordError = $r_retypepasswordError = "";




?>

<?php

if (isset($_POST['create_account'])){
	$r_name = $_POST['r_name'];
	$r_email = $_POST['r_email'];
	$r_fathername = $_POST['r_fathername'];
	$r_mobileno = $_POST['r_mobileno'];
	$r_address = $_POST['r_address'];
	$r_password = $_POST['r_password'];

	if(!preg_match("/^[A-z ]{3,}$/", $r_name)){
		$r_nameError = "<p class = 'text-danger small my-0'>Name is Invalid</p>";
	}

	elseif(!preg_match('/^([A-z0-9]*@[a-z]+\.+[a-z]{2,3})/',$r_email)){
		$r_emailError = "<p class = 'text-danger small my-0'>email is Invalid</p>"; 
	}

	elseif(!preg_match("/^[A-z ]{3,}$/", $r_fathername)){
		$r_fatherError = "<p class = 'text-danger small my-0'>please fill valid data</p>";
	}

	elseif(!preg_match("/^[0-9]{10}$/", $r_mobileno)){
		$r_mobilenoError = "<p class = 'text-danger small my-0'>contact is Invalid it shpuld be in 10 digit</p>";
	}

	elseif(!preg_match("/^[A-z0-9 ]{5,}$/", $r_address)){
		$r_addressError = "<p class = 'text-danger small my-0'>Address invalid</p>";
	}
	
	elseif(strlen($r_password)< 6){
		$r_passwordError = "<p class = 'text-danger small my-0'>password must be more than 6 character</p>";
	}
	elseif($r_password != $_POST['r_retypepassword']){
		$r_retypepasswordError = "<p class =  'text-danger small my-0'>confirm password doesnt matched</p>";
	}

	else{
	    $encrypted_r_password = sha1($r_password);

		

		$query = "(r_name,r_email,r_fathername,r_mobileno,r_address,r_password) value ('$r_name','$r_email','$r_fathername','$r_mobileno','$r_address','$encrypted_r_password')";

		$data->insertData('registration',$query);
		}
}
?>



<html>
<head>
	<title>Registration of new connection</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<?php include_once("include/header.php");?>

	<div class="container mt-3">
		<div class="row">
			<div class="col-lg-6 mt-5">
				<div class="jumbotron">
					<h2 class="h2" id="head">Welcome to NORTH BIHAR POWER SUPPLY!</h2>
				    <h2 class="h5" id="para">Create an account and Get a new connection</h2>
				    <ul>
					   <li>Bill Payment</li>
					   <li>Generate Bill</li>
					   <li>Local Supplier of Electricty</li>
				    </ul>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card mt-5">
					<div class="card-body">
						<h2 class="text-uppercase h5 text-primary ml-5">Registration form of new Consumer..</h2>

						<form action="registration.php" method="post" class="">

							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="r_name" id="r_name" class="form-control" value="">
								<?= $r_nameError;?>
							</div>

							<div class="form-group">
								<label for="name">Email</label>
								<input type="text" name="r_email" id="r_email" class="form-control" value="">
								<?= $r_emailError;?>
							</div>

							<div class="form-group">
								<label for="name">Father's Name</label>
								<input type="text" name="r_fathername" id="r_fathername" class="form-control" value="">
								<?= $r_fathernameError;?>
							</div>

							<div class="form-group">
								<label for="name">Mobile Number</label>
								<input type="text" name="r_mobileno" id="r_mobileno" class="form-control" value="">
								<?= $r_mobilenoError;?>
							</div>

							<div class="form-group">
								<label for="name">Address</label>
								<textarea rows="5" name="r_address" class="form-control"></textarea>
								<?= $r_addressError;?>
							</div>

							<div class="form-group">
								<label for="name">Password</label>
								<input type="password" name="r_password" class="form-control">
								<?= $r_passwordError;?>
							</div>

							<div class="form-group">
								<label for="re_password">Retype Password</label>
								<input type="password" name="r_retypepassword" id="" class="form-control">
								<?= $r_retypepasswordError;?>
							</div>

							<div class="form-group">
								<input type="submit" name="create_account"  class="btn btn-success btn-block">
							</div>


						</form>

						
					</div>
				</div>
			</div>
		</div>
	</div>


<?php require_once('include/footer.php');?>
</body>
</html>


