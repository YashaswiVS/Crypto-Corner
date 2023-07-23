<?php
define('DIR','../../');
require_once DIR . 'config.php';
$admin = new Admin();

if(!isset($_SESSION['uid'])){
	$admin -> redirect1('../../index.php');
}

$cllid = $_SESSION['uid'];




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
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
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
			<?php include 'navbar.php' ?>
			<?php include 'sidebar.php' ?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Welcome <?= $_SESSION['name']?></h3>
							<p class="panel-subtitle">Today: <?php echo date("D - d - M - Y"); ?></p>
						</div>
						<div class="panel-body">
							<div class="row">
								<!-- <div class="col-md-3">
									<a href="#">	<div class="metric">
										<span class="icon"><i class="fa fa-download"></i></span>
										<p>
											<span class="number"><?php
											// $stmt = $admin -> ret("SELECT COUNT(*) FROM `assignclienttoemp` WHERE `cl_id` = '$cllid' ");
											// $row = $stmt -> fetch(PDO::FETCH_ASSOC);
											
											// echo implode($row);
											// $stmt = $admin -> ret("SELECT * FROM `assignclienttoemp` WHERE `emp_id` = '$emp_id' ");
											// $row = $stmt -> fetch(PDO::FETCH_ASSOC);
											// $chcl = $row['cl_id'];
											
											?></span>
											<span class="title">Clients</span>
										</p>
									</div></a>
								</div>
								<div class="col-md-3">
								<a href="#">		<div class="metric">
										<span class="icon"><i class="fa fa-shopping-bag"></i></span>
										<p>
											<span class="number"><?php
											// $stmt = $admin -> ret("SELECT COUNT(*) FROM `employee`");
											// $row = $stmt -> fetch(PDO::FETCH_ASSOC);
											// echo implode($row);
											
											?></span>
											<span class="title">Employee's</span>
										</p>
									</div></a>
								</div> -->
								
								<div class="col-md-3">
									<a href="vfiles.php">	<div class="metric">
										<span class="icon"><i class="fa fa-files-o"></i></span>
										<p>
											<span class="number"><?php
											$stmt = $admin -> ret("SELECT COUNT(*) FROM `files` WHERE `cl_id` = '$cllid'");
											$row = $stmt -> fetch(PDO::FETCH_ASSOC);
											echo implode($row);
											
											?></span>
											<span class="title">Files</span>
										</p>
									</div></a>
								</div>

								<div class="col-md-3">
									<a href="vfiles.php">	<div class="metric">
										<span class="icon"><i class="fa fa-files-o"></i></span>
										<p>
											<span class="number"><?php
											$stmt = $admin -> ret("SELECT COUNT(*) FROM `auditedfiles` WHERE `cl_id` = '$cllid'");
											$row = $stmt -> fetch(PDO::FETCH_ASSOC);
											echo implode($row);
											
											?></span>
											<span class="title">Audited Files</span>
										</p>
									</div></a>
								</div>
							</div>
							
						</div>
					</div>
					<!-- END OVERVIEW -->
					<div class="row">
						<div class="col-md-6">
							<!-- RECENT PURCHASES -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"><b>Audited Files</b></h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Client Office</th>
												<th>Audited File Name</th>
												<th>Date </th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$stmt = $admin -> ret("SELECT * FROM `auditedfiles` WHERE `cl_id` = '$cllid' ORDER BY `a_id` DESC LIMIT 10");
												$i=0;
												while($row = $stmt-> fetch(PDO::FETCH_ASSOC))
												{ 
													$i++;
													$cl_id = $row['cl_id'];
													$stutus = $row['stutus'];
												
													$astmt = $admin -> ret("SELECT * FROM `clients` WHERE `cl_id` = '$cl_id'");
													$arow = $astmt-> fetch(PDO::FETCH_ASSOC);
												

												?>
											<tr>
												<td><?= $arow['o_name']?></td>
												<td><?= $row['aufname']?></td>
												<td><?= $row['date']?></td>
												<?php
													if($stutus == "Pending"){ 
												?>
												<td><span class="label label-warning">Pending</span></td>
												<?php 
													}
												?>
												<?php
													if($stutus == "Accepted"){ 
												?>
												<td><span class="label label-success">Accepted</span></td>
												<?php 
													}
												?>
												<?php
													if($stutus == "Rejected"){ 
												?>
												<td><span class="label label-danger">Rejected</span></td>
												<?php 
													}
												?>
											</tr>
											<?php
												}
											?>



											<!-- <tr>
												<td><a href="#">763649</a></td>
												<td>Amber</td>
												<td>$62</td>
												<td>Oct 21, 2016</td>
												<td><span class="label label-warning">PENDING</span></td>
											</tr>
											<tr>
												<td><a href="#">763650</a></td>
												<td>Michael</td>
												<td>$34</td>
												<td>Oct 18, 2016</td>
												<td><span class="label label-danger">FAILED</span></td>
											</tr>
											<tr>
												<td><a href="#">763651</a></td>
												<td>Roger</td>
												<td>$186</td>
												<td>Oct 17, 2016</td>
												<td><span class="label label-success">SUCCESS</span></td>
											</tr>
											<tr>
												<td><a href="#">763652</a></td>
												<td>Smith</td>
												<td>$362</td>
												<td>Oct 16, 2016</td>
												<td><span class="label label-success">SUCCESS</span></td>
											</tr> -->
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
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"><span class="panel-note"> </span></div>
										<div class="col-md-6 text-right"><a href="aud.php" class="btn btn-primary">View All Audited Files</a></div>
									</div>
								</div>
							</div>
							<!-- END RECENT PURCHASES -->
						</div>
						<div class="col-md-6">
							<!-- MULTI CHARTS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"><b>To-Do List</b></h3>
									<div class="right">
										<input type="button" value="ADD TO-DO-LIST" data-target="#editMezalta" class="btn btn-info" data-toggle="modal" style="color:black;">&nbsp;&nbsp;

											<div class="modal fade" id="editMezalta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="exampleModalLabel">Create New To-Do</h4>
												</div>
												<div class="modal-body">
													<form action="../../Controller/client/add.php" method="POST">
														<div class="form-group">
															<label for="" class="label-control">To Do Name : </label>
															<input type="text" required=" " name="tname" class="form-control" id="">
														</div>
														<div class="form-group">
															<label for="" class="label-control">To Do Description : </label>
															<textarea type="text" required=" " name="tdesc" class="form-control" rows="5" id=""></textarea>
														</div>
														<div class="form-group">
															<label for="" class="label-control">To Do Date : </label>
															<input type="date" required=" " name="tdate" class="form-control" id="">
														</div>
												</div>
												<div class="modal-footer">
													<input type="button" name="close" value="close" class="btn btn-primary" data-dismiss="modal">
													<input type="submit" name="addnewTodo" value="Add" class="btn btn-primary">
												</div>
													</form>
												</div>
											</div>
											</div>

											<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

											<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
												
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body">
									<ul class="list-unstyled todo-list">
									<?php
												$stmt = $admin -> ret("SELECT * FROM `cl_to_do_list` WHERE `cl_id` = '$cllid' ORDER BY `t_id` DESC");
												$i=0;
												while($row = $stmt-> fetch(PDO::FETCH_ASSOC))
												{ 
													$i++;
												?>
										<li>
											<label class="control-inline fancy-checkbox">
												<input type="checkbox"><span></span>
											</label>
											<p>
												<span class="title"><?= $row['todo_name']?></span>
												<span class="short-description"><?= $row['to_do_desc']?></span>
												<span class="date"><?= $row['date']?></span>
											</p>
											<div class="controls">
												<a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
											</div>
											<a href="../../Controller/client/dlt.php?dlttodo=<?= $row['t_id']?>"><img height="30px" src="./../../images/delete.png" alt=""></a>
										</li>

										<?php
												}
										?>
											<?php
											if ($i == 0) {
											?>
											
												<div colspan="100%" class="alert alert-danger text-center">
													No records
												</div>
										
									<?php } ?>
								
									</ul>
								</div>
							</div>
							<!-- END MULTI CHARTS -->
						</div>
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
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script>
	$(function() {
		var data, options;

		// headline charts
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[23, 29, 24, 40, 25, 24, 35],
				[14, 25, 18, 34, 29, 38, 44],
			]
		};

		options = {
			height: 300,
			showArea: true,
			showLine: false,
			showPoint: false,
			fullWidth: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
		};

		new Chartist.Line('#headline-chart', data, options);


		// visits trend charts
		data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [{
				name: 'series-real',
				data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
			}, {
				name: 'series-projection',
				data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
			}]
		};

		options = {
			fullWidth: true,
			lineSmooth: false,
			height: "270px",
			low: 0,
			high: 'auto',
			series: {
				'series-projection': {
					showArea: true,
					showPoint: false,
					showLine: false
				},
			},
			axisX: {
				showGrid: false,

			},
			axisY: {
				showGrid: false,
				onlyInteger: true,
				offset: 0,
			},
			chartPadding: {
				left: 20,
				right: 20
			}
		};

		new Chartist.Line('#visits-trends-chart', data, options);


		// visits chart
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[6384, 6342, 5437, 2764, 3958, 5068, 7654]
			]
		};

		options = {
			height: 300,
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#visits-chart', data, options);


		// real-time pie chart
		var sysLoad = $('#system-load').easyPieChart({
			size: 130,
			barColor: function(percent) {
				return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
			},
			trackColor: 'rgba(245, 245, 245, 0.8)',
			scaleColor: false,
			lineWidth: 5,
			lineCap: "square",
			animate: 800
		});

		var updateInterval = 3000; // in milliseconds

		setInterval(function() {
			var randomVal;
			randomVal = getRandomInt(0, 100);

			sysLoad.data('easyPieChart').update(randomVal);
			sysLoad.find('.percent').text(randomVal);
		}, updateInterval);

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

	});
	</script>
</body>

</html>
