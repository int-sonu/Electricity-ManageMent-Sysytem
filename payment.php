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
								BILL PAYMENT
							</div>
							<div class="card-body">
								<div class="row">
			
		        <div class="container-fluid d-flex justify-content-center">
		            <div class="col-sm-12 col-md-12 mx-auto">
		                <div class="card">
		                    <div class="card-header">
		                        <div class="row">
		                            <div class="col-md-6"> <span>CREDIT/DEBIT CARD PAYMENT</span> </div>
		                            <div class="col-md-6 text-right" style="margin-top: -5px;"> <img src="https://img.icons8.com/color/36/000000/visa.png"> <img src="https://img.icons8.com/color/36/000000/mastercard.png"> <img src="https://img.icons8.com/color/36/000000/amex.png"> </div>
		                        </div>
		                    </div>
		                    <div class="card-body" style="height: 350px">
		                        <div class="form-group"> <label for="cc-number" class="control-label">CARD NUMBER</label> <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••"> </div>
		                        <div class="row">
		                            <div class="col-md-6">
		                                <div class="form-group"> <label for="cc-exp" class="control-label">CARD EXPIRY</label> <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="•• / ••" > </div>
		                            </div>
		                            <div class="col-md-6">
		                                <div class="form-group"> <label for="cc-cvc" class="control-label">CARD CVC</label> <input id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="••••" > </div>
		                            </div>
		                        </div>
		                        <div class="form-group"> <label for="numeric" class="control-label">CARD HOLDER NAME</label> <input type="text" class="input-lg form-control"> </div>
		                        <div class="form-group">
		                  <form method="post">       	 
				            <input value="MAKE PAYMENT" type="submit" name="payment" class="btn btn-success btn-lg form-control" style="font-size: .8rem;">
				          </form> 
				          
		                        	<?php
		                        	
		                        	if(isset($_POST['payment'])){
		                        		$b_id = $_GET['b_id'];	
											$data->updateData('bill',"b_status='1'","b_id='$b_id'");
											$data->redirect('payment');
										}
		                        	?>

		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    
		    </div>
							</div>
						</div>
					</div>
				</div>
			</div>


<?php include "include/footer.php";?>
</body>
</html>