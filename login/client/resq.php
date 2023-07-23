<?php 
define('DIR','../../');
require_once DIR . 'config.php';
$admin = new Admin();
if(!isset($_SESSION['uid'])){
	$admin -> redirect1('../../index.html');
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
					<h3 class="page-title">Replies</h3><hr>
					<div class="panel container" style="padding:10px;">


                           <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Date</th>
                            <th width="100" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                             $cid =$_SESSION['uid'];
                            $stmt = $admin -> ret("SELECT * FROM `replay` WHERE c_id = '$cid' ");
                            $i=0;
                            while($row = $stmt-> fetch(PDO::FETCH_ASSOC))
                            {
                                $qid = $row['q_id'];
                            ?>
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <?php
                                $qstmp = $admin-> ret("SELECT `subject` FROM `query` WHERE cl_id = '$cid' AND q_id = '$qid' ");
                                $qrow = $qstmp->fetch(PDO::FETCH_ASSOC);
                                $sub = $qrow['subject']; 
                            
                            
                            ?>

                            <td><?php echo $sub; ?></td>
                            <td><?php echo $row['message'] ; ?></td>
                            <td><?php echo $row['date'] ; ?></td>
                            <td><a href="../../Controller/client/dlt.php?dltq=<?= $row['r_id']?>" class="btn btn-danger">Delete</a></td>
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
