<?php 
define('DIR','../../');
require_once DIR . 'config.php';
$admin = new Admin();
if(!isset($_SESSION['uid'])){
	$admin -> redirect1('../../index.html');
}

$eid=$_SESSION['uid'];
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
					<h3 class="page-title">Messages</h3><hr>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
					<div class="panel container" style="padding:10px;">


                          <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th width="100">#</th>
                                    <th>Admin</th>
                                    <th>Chat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="catres">
                      
                                <?php
                                $i = 0;
                                $stmt = $admin -> ret("SELECT 	*,COUNT(*) FROM `admin_msg_to_emp` WHERE `e_id` = '$eid'
                                        GROUP BY `e_id` 
                                        HAVING COUNT(*) >= 1 ORDER BY `e_id` DESC");
                                while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){ 
                                     
                                    
                                ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td>Admin</td>
                                    <td><?= $row['chat'] ?></td>
                                    <td>
                                        <a href="viewadminchat.php" class="btn btn-success"><i class="fa fa-envelope"></i></a>
                                   </td>
                                </tr>
                               
                                <?php
                                } ?> 
                            </tbody>
                        </table>
                                <?php if($i == 0){ ?>
                                  
                                        <div class="alert alert-danger" role="alert">
                                          <center><b>No Records...</b></center>  
                                        </div>
                                   
                               <?php }
                                ?>
					
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
