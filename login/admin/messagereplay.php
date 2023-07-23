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
	<title>CRYPTO - CORNER </title>
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
					<h3 class="page-title">Reply</h3><hr>
                <div class="panel container" style="padding:10px;">
                                                                
                        <?php
                        if(isset($_GET['user']) && $_GET['user'] == "emp" && isset($_GET['id']) && isset($_GET['eid'])  ){
                            $getmID = $_GET['id'];
                            $eid = $_GET['eid'];

                            ?>
                            
                        
                        <div class="container">
                        <form action="../../Controller/admin/add.php" method="POST">
                        <textarea required name="message" placeholder="Enter Replay Message" class="form-control" cols="30" rows="8"></textarea><br>
          
                        <input type="hidden" name="eid" value="<?php echo $eid; ?>" />
                        <input type="hidden" name="mid" value="<?php echo $getmID; ?>" />
                        <input type="submit" class="btn btn-primary" name="empmsgrep" value="Send">

                        </form>

                        </div>
                        



                        <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Employee Name</th>
                            <th scope="col">Replaied Message</th>
                            <th scope="col">Date</th>
                            <th  scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $stmt = $admin -> ret("SELECT * FROM `emp_message_reply` WHERE `e_id` = '$eid'");
                            $i=0;
                            while($row = $stmt-> fetch(PDO::FETCH_ASSOC))
                            {   
                                 $astmt = $admin -> ret("SELECT * FROM `employee` WHERE `e_id` = '$eid'");
                                 $arow = $astmt-> fetch(PDO::FETCH_ASSOC);
                            ?>
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td><?php echo $arow['name'] ; ?></td>
                            <td><?php echo $row['message_replay'] ; ?></td>
                            <td><?php echo $row['mr_date'] ; ?></td>
                        
                            <td><a href="../../Controller/admin/delete.php?repid=<?php echo $row['r_id']; ?>&qid=<?php echo $row['q_id'];?>"><button name="dlt" class="btn btn-danger">DELETE</button></a></td>
                        
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
                    <?php  }?>

                                         <?php
                        if(isset($_GET['user']) && $_GET['user'] == "client" && isset($_GET['id']) && isset($_GET['clid'])  ){
                            $getmID = $_GET['id'];
                            $cid = $_GET['clid'];

                            ?>
                            
                        
                        <div class="container">
                        <form action="../../Controller/admin/add.php" method="POST">
                        <textarea required name="message" placeholder="Enter Replay Message" class="form-control" cols="30" rows="8"></textarea><br>
          
                        <input type="hidden" name="cid" value="<?php echo $cid; ?>" />
                        <input type="hidden" name="mid" value="<?php echo $getmID; ?>" />
                        <input type="submit" class="btn btn-primary" name="clmsgrep" value="Send">

                        </form>

                        </div>
                        



                        <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col"> Name</th>
                            <th scope="col">Office Name</th>
                            <th scope="col">Replaied Message</th>
                            <th scope="col">Date</th>
                            <th  scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $stmt = $admin -> ret("SELECT * FROM `cl_message_reply` WHERE `c_id` = '$cid'");
                            $i=0;
                            while($row = $stmt-> fetch(PDO::FETCH_ASSOC))
                            {   
                                 $astmt = $admin -> ret("SELECT * FROM `clients` WHERE `cl_id` = '$cid'");
                                 $arow = $astmt-> fetch(PDO::FETCH_ASSOC);
                            ?>
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td><?php echo $arow['name'] ; ?></td>
                            <td><?php echo $arow['o_name'] ; ?></td>
                            <td><?php echo $row['message_replay'] ; ?></td>
                            <td><?php echo $row['mr_date'] ; ?></td>
                        
                            <td><a href="../../Controller/admin/delete.php?repid=<?php echo $row['r_id']; ?>&qid=<?php echo $row['q_id'];?>"><button name="dlt" class="btn btn-danger">DELETE</button></a></td>
                        
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
                    <?php  }?>



					
					
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
