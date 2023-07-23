<?php
define('DIR','../../');
require_once DIR . 'config.php';
$admin = new Admin();
if(!isset($_SESSION['uid'])){
	$admin -> redirect1('../../index.html');
}

$id = $_SESSION['uid'];

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
					<h3 class="page-title">Payment</h3><hr>
					<!-- <marquee behavior="" direction="">
						<span style="font-size:24px; font-weight:bold ;color:red;">Pay Every Month</span>
					</marquee> -->
					<div class="panel container" style="padding:10px;">




                    <form action="../../Controller/client/add.php" method="post">
                    
                   
                    <div class="form-group ">
                        <label for="exampleInputEmail1">Scan QR code To Payment</label><br>
                       <center> <img src="../../images/pqcode.jpg" height="400px" alt=""></center>
                    </div>
                    <div class="form-group ">
                        <label for="exampleInputEmail1">Enter Price</label>
                        <input type="text" class="form-control" name="price"   placeholder="Enter Price" required>
                    </div>
                    <div class="form-group ">
                        <label for="exampleInputEmail1">Enter Transation ID</label>
                        <input type="text" max-length="18" class="form-control" name="trID"  placeholder="Enter Transaction ID" required>
                    </div>
                    <input type="submit" name="pay" value="PAY" class="btn btn-primary">
                    
                    </form>

                   
					
					
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
			<?php include 'footer.php' ; ?>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
