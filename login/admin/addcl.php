<?php
session_start();

if(!isset($_SESSION['uid'])){
	$admin -> redirect1('../../index.php');
}


?>
<!doctype html>
<html lang="en">

<head>
	<title>CRYPTO - CORNER</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../../images/cryptocorner.jpg">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<?php include 'navbar.php' ; 
		include 'sidebar.php' ;
		?>
		
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">ADD CLIENT</h3><hr>
						<div class="panel container" style="padding:10px;">

			 <form action="../../Controller/admin/add.php" method="post" enctype="multipart/form-data">
               <div class="form-group ">
						<label for="exampleInputEmail1">Name</label>
						<input type="text" class="form-control" name="name"  placeholder="Enter Name" autocomplete="off" required>
						
					</div>
					<div class="form-group ">
						<label for="exampleInputEmail1">Email-ID</label>
						<input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" autocomplete="off" required>

					</div>
					<div class="form-group ">
						<label for="exampleInputEmail1">Phone Number</label>
						<input type="text" maxlength="10" class="form-control" name="phone" aria-describedby="emailHelp" placeholder="Enter Phone Number" autocomplete="off" required>

					</div>


					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" name="password" readonly 
										<?php 
										
											  $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
												$pass = array(); //remember to declare $pass as an array
												$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
												for ($i = 0; $i < 10; $i++) 
												{
													$n = rand(0, $alphaLength);
													$pass[] = $alphabet[$n];
												}
										?>
									placeholder="Enter Password" value="<?=  implode($pass); ?>" required autocomplete="off">
								</div>



					<div class="form-group ">
						<label for="exampleInputEmail1">Address</label>
						<textarea name="address" placeholder="Enter Address" class="form-control" id="" cols="30" rows="3" autocomplete="off" required></textarea>
					</div>



					<div class="form-group ">
						<label for="exampleInputEmail1">Office Name</label>
						<input type="text" class="form-control" name="oname"  placeholder="Enter Office Name" autocomplete="off" required>
						
					</div>
					<div class="form-group ">
						<label for="exampleInputEmail1">Office Address</label>
						<textarea name="oadress" class="form-control" id="" cols="30" rows="3" autocomplete="off" required></textarea>
					</div>
					<div class="form-group ">
						<label for="exampleInputEmail1">GST Number</label>
						<input type="text" maxlength="15" class="form-control" name="gnum"  placeholder="Enter GST number" autocomplete="off" required>
						
					</div>
					<div class="form-group ">
									<label for="exampleInputEmail1"> Profile Picture</label>
									<input type="file"  class="form-control" name="propic" required >
								</div>
					
					<button type="submit" name="addclient" class="btn btn-primary">ADD CLIENT</button>

        	</form>

					
					
				</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<?php include 'footer.php'; ?>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
