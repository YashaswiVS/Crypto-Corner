<?php
define('DIR','../../');
require_once DIR . 'config.php';
$admin = new Admin();


if(!isset($_SESSION['uid'])){
	$admin -> redirect1('../../index.php');
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
					<h3 class="page-title">Audited Files</h3><hr>
						<div class="panel container" style="padding:10px;">

                <button data-target="#editMezalta" class="btn btn-primary btn-sm" data-toggle="modal">Upload Audited File</button>

				<div class="modal fade" id="editMezalta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Upload New Audited File</h4>
					</div>
					<div class="modal-body">
						<form action="../../Controller/employee/files.php" enctype="multipart/form-data" method="POST">
						   <div class="form-group">
                                <label for="message-text" class="control-label">Client :</label>
                                <select class="form-control" name="cl_id" id="" required>
                                    <option value="">Select Client</option>
                                    <?php 
                                    $astmt = $admin -> ret("SELECT * FROM `assignclienttoemp` WHERE `emp_id` = '$id'");
                                    while($arow = $astmt -> fetch(PDO::FETCH_ASSOC)){
                                    $cl_id = $arow[cl_id];
                                   
                                    $stmt = $admin -> ret("SELECT * FROM `clients` WHERE `cl_id` = '$cl_id'");
                                    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){ 
                                    
                                    ?>
                                    <option value="<?= $row['cl_id']?>"><?= $row['name'] ." | Office : ".$row['o_name']?></option>
                                <?php 
                                    }
                                }
                                
                                ?>
                                </select>
                                <small>Client Name : Client Office</small>
                            </div>
                            <div class="form-group ">
                         <label for="">Select File Categary</label>
                                <select name="fcid" class="form-control">
                                <option selected>Select File Categary</option>
                                <?php
                            
                            $stmp = $admin -> ret("SELECT * FROM `file_category`");
                            
                            while($row = $stmp ->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <option value="<?php echo $row['c_id'];?>"> <?php echo $row['cat_name'] ;?>  </option>

                                <?php  }
                            
                            ?>
                              </select>
                                </div>
						<div class="form-group">
							<label for="message-text" class="control-label">Audited File Name :</label>
							<input type="text" class="form-control" name="fname" id="message-text" required>
						</div>
                        
                        <div class="form-group">
							<label for="message-text" class="control-label">Audited File :</label>
							<input type="file" class="form-control" name="file" id="message-text" required>
						</div>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						<input type="submit" name="uploadfile" value="Upload File" class="btn btn-primary">
					</div>
					</form>
					</div>
				</div>
				</div>

				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
					

				<table class="table">
				<thead class="thead-dark">
					<tr>
					<th scope="col">#</th>
					<th width="" scope="col">Client Name</th>
					<th width="" scope="col">Client Office</th>
					<th width="" scope="col">Audited File Name</th>
					<th width="" scope="col">File Category</th>
					<th width="" scope="col">Status</th>
					<th scope="col">date</th>
					<th width="100" scope="col">Action</th>
					</tr>
				</thead>
				<tbody>

				
				<?php
					$stmt = $admin -> ret("SELECT * FROM `auditedfiles` WHERE `emp_id` = '$id'");
					$i=0;
					while($row = $stmt-> fetch(PDO::FETCH_ASSOC))
					{ 
                        $cl_id = $row['cl_id'];
                        $c_id = $row['cat_id'];
                        

                        $astmt = $admin -> ret("SELECT * FROM `clients` WHERE `cl_id` = '$cl_id'");
						$arow = $astmt-> fetch(PDO::FETCH_ASSOC);
						$abstmt = $admin -> ret("SELECT * FROM `file_category` WHERE `c_id` = '$c_id'");
						$abrow = $abstmt-> fetch(PDO::FETCH_ASSOC);

					?>
				<tr>
					<td><?php echo ++$i; ?></td>
					<td><?php echo $arow['name']; ?></td>
					<td><?php echo $arow['o_name'] ;  ?></td>
					<td><?php echo $row['aufname'] ;  ?></td>
					<td><?php echo $abrow['cat_name'] ;  ?></td>
					<td><?php echo $row['stutus'] ;  ?></td>
					<td><?php echo $row['date'] ;  ?></td>
					<td><a href="../../Controller/employee/download.php?id=<?php echo $row['a_id']; ?>&from=audfiles"><button name="dlt" class="btn btn-success">DOWNLOAD(<?= $row['fsize']?>)</button></a>
				</td>
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
		<?php include 'footer.php' ;?>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
