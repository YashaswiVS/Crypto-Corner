<?php
define('DIR','../../');
require_once DIR . 'config.php';
$admin = new Admin();


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
					<h3 class="page-title">Send Message</h3><hr>
                    
						<div class="panel container" style="padding:10px;">
                               
                                <div class="row">
                                    
                                    <div class="col-lg-6">
                                        <h2 class="text-center">To Employee</h2><hr>
                                        <form action="../../Controller/admin/add.php" method="post">
                                            <div class="form-group">
                                                <label class="lable-control" for="">Select Employee</label>
                                                  <select class="form-control" name="emp_id" id="" required> 
                                                        <option value="">Select Employee</option>
                                                        <?php 
                                                        $stmt = $admin -> ret("SELECT * FROM `employee`");
                                                        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){ 
                                                        
                                                        ?>
                                                        <option value="<?= $row['e_id']?>"><?= " ID : ". $row['e_id'] ." | ".$row['name']?></option>
                                                    <?php }?>
                                                    </select>
                                             </div>
                                            <div class="form-group">
                                                <label for="">Message</label>
                                                <textarea required name="message" rows="5" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="form-control btn btn-primary" name="empmsg" value="Send">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-6">
                                        <h2 class="text-center">To Client</h2><hr>
                                                 <form  method="post" action="../../Controller/admin/add.php">
                                            <div class="form-group">
                                                <label class="lable-control" for="">Select Client</label>
                                                  <select class="form-control" name="cl_id" id="" required>
                                                    <option value="">Select Client</option>
                                                    <?php 
                                                    $stmt = $admin -> ret("SELECT * FROM `clients`");
                                                    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){ 
                                                    
                                                    ?>
                                                    <option value="<?= $row['cl_id']?>"><?= $row['name'] ." | Office : ".$row['o_name']?></option>
                                                <?php }?>
                                                </select>
                                             </div>
                                            <div class="form-group">
                                                <label for="">Message</label>
                                                <textarea required name="message" rows="5" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="form-control btn btn-primary" name="clmsg" value="Send">
                                            </div>
                                        </form>
                                    </div>
                                 </div>


						</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
