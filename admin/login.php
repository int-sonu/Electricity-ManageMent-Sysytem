<?php include "../include/config.php";

if(isset($_SESSION['admin_log'])){
	$data->redirect('index'); 
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Bizli power</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

	<?php include "nav.php";?>

	

	<div class="container">
		<div class="row">
			<div class="col-lg-3 mx-auto">

			<form action="login.php" method="post">
				<div class="mb-3">
					<label>Username</label>
					<input type="text" class="form-control" name="username">
				</div>
				<div class="mb-3">
					<label>Password</label>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="mb-3">
					<input type="submit" class="btn btn-success btn-block" value="submit" name="admin_login">
				</div>
				
			</form>	

			<?php
	if (isset($_POST['admin_login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query=$data->checkData('admin',"username='$username' AND password='$password'");

	    if ($query==true){
		   $_SESSION['admin_log'] = $username;
		   $data->redirect('index');
		}
	    else{
			echo "fail";
	    }
	}
	?>

			</div>	
        </div>	
	</div>
</body>
</html>