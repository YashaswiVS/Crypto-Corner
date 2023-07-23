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
					<h3 class="page-title">QUERY</h3><hr>
						<div class="panel container" style="padding:10px;">
						<table class="table">
						<thead class="thead-dark">
							<tr>
							<th scope="col">#</th>
							<th scope="col">Client Name</th>
							<th scope="col">Client Office Name</th>
							<th scope="col">Subject</th>
							<th scope="col">Date</th>
							<th scope="col">Description</th>
							<th width="250" scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$stmt = $admin -> ret("SELECT * FROM `query`");
							$i=0;
							while($row = $stmt-> fetch(PDO::FETCH_ASSOC))
							{
								$clid = $row['cl_id'];
								$qid = $row['q_id'];
								$subject = $row['subject'];
								$date = $row['date'];
								$desc = $row['description'];
							?>
						<tr>
							<td><?php echo ++$i; ?></td>
									<?php
								$qstmt = $admin -> ret("SELECT * FROM `clients` WHERE `cl_id` = '$clid'");
								$qrow = $qstmt-> fetch(PDO::FETCH_ASSOC);
								$clid = $qrow['cl_id'];
								$clName = $qrow['name'];
								$oName = $qrow['o_name'];
								?>
							<td><?php echo $clName; ?></td>
							<td><?php echo $oName; ?></td>
							<td><?php echo $subject; ?></td>
							<td><?php echo $date; ?></td>
							<td><?php echo $desc; ?></td>
							<td><a href="replay.php?id=<?php echo $qid; ?>&clid=<?php echo $clid; ?>"><button name="dlt" class="btn btn-primary">Reply</button></a>
						<a href="../../Controller/admin/delete.php?dltqid=<?php echo $qid; ?>"><button name="dlt" class="btn btn-danger">Delete</button></a></td>
						
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
