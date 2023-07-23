<?php
define('DIR','../../');
require_once DIR . 'config.php';
$admin = new Admin();
if(!isset($_SESSION['uid'])){
	$admin -> redirect1('../../index.html');
}

$cid = $_GET['id'];
$id = $_SESSION['uid'];

$stutus = "Accepted";
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
					<h3 class="page-title">Audited Files</h3><hr>
					<div class="panel container" style="padding:10px;">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-primary" href="aud.php">Back to audited files </a>    
												<table class="table">
				<thead class="thead-dark">
					<tr>
					<th scope="col">#</th>
					
					<th scope="col">Emplyee Name</th>
					<th scope="col">File Name</th>
					<th scope="col">Audited Date</th>
					<th width="350" scope="col" class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>

				
				<?php
					$stmt = $admin -> ret("SELECT * FROM `auditedfiles` WHERE `cat_id` = '$cid' AND `cl_id` = '$id' AND `stutus` = '$stutus' ");
					$i=0;
					while($row = $stmt-> fetch(PDO::FETCH_ASSOC))
					{ 
					
					?>
				<tr>
					<td><?php echo ++$i; ?></td>
					<td><?php $eid = $row['emp_id'];

						$astmt = $admin -> ret("SELECT * FROM `employee` WHERE `e_id` = '$eid'");
						$arow = $astmt -> fetch(PDO::FETCH_ASSOC);
						echo $arow['name'] ;

					
					?></td>
				
					<td><?php echo $row['aufname']; ?></td>
					<td><?php echo $row['date']; ?></td>
					<td>
					<a href="../../Controller/employee/download.php?id=<?php echo $row['a_id']; ?>"><button name="dlt" class="btn btn-primary">DOWNLOAD(<?= $row['fsize']?>)</button></a>
					<a href="../../Controller/client/dlt.php?dltaudfid=<?php echo $row['a_id']; ?>"><button name="dlt" class="btn btn-danger">DELETE</button></a></td>
				
				</tr>
				
				<?php
					}
				?>
				</tbody>
				<?php
				if ($i == 0) {
                            ?>
                            <tr>
                                <td colspan="100%" class="alert alert-danger text-center">
                                    No records
                                </td>
                            </tr>
                        <?php } ?>
				
				</table>

					
					
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
