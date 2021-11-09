<?php include "include/config.php";
	if(isset($_SESSION['user'])){
		$data->redirect('profile');
	} 
	$loginContactError = $loginPasswordError = "";

	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bizli generation system</title>
	
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- google fonts-->

	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Roboto+Condensed&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&family=Squada+One&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
	
</head>
<body>
	<?php include_once("include/header.php");?>

	<header>	
				<div class="img">
					<img src="image/img1.jpg" class="img_carousel">
					<div class="container">
						<div class="imgContent">
							<h1 class="text-left">NORTH BIHAR POWER SUPPLY!</h1>
							<p class="text-left">North bihar power supply throughout in whole area of bihar getting electricity through our setup <br> You can Register using Your details to get the benefits of electricity in BIHAR in cheapest rate.</p>

							<h3 class="text-left">NEW CONSUMER REGISTRATION </h3>
							<a href="registration.php" id="imgBtn">Click Here</a>
						</div>
					</div>
				</div>
	

<?php require_once('include/footer.php');?>
</body>
</html>



<!--  login section-->


<?php

if(isset($_POST['login'])){
	$r_mobileno = $_POST['r_mobileno'];
	$password = $_POST['r_password'];

	if(!preg_match("/^[0-9]{10}$/", $r_mobileno)){
		$loginContactError = "<p class = 'text-danger small my-0'>contact is Invalid it should be in 10 digit</p>";
	}
	
	elseif(strlen($password)< 6){
		$loginPasswordError = "<p class = 'text-danger small my-0'>password must be more than 6 character</p>";
	}
	else{
		$password = sha1($password);

	$result = $data->checkData('registration',"r_mobileno='$r_mobileno' AND r_password='$password' AND status='1'");

	if ($result==true): 
		$_SESSION['user'] = $r_mobileno;
		$data->redirect('profile');
	else:
		echo "<script>alert('Either your userid or password is incorrect.. , Or  Your account is pending condition')</script>";
	endif;
    
    }
}

?>
