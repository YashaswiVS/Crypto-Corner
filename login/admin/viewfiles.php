<?php
define('DIR','../../');
require_once DIR . 'config.php';
$admin = new Admin();
if(!isset($_SESSION['uid'])){
	$admin -> redirect1('../../index.php');
}

$uid = $_GET['uid'];

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
					<h3 class="page-title">VIEW CLIENT FILES</h3><hr>

					<div class="panel container" style="padding:10px;">
			

  <style>
    
        .cwrapper {
        display: grid;
        grid-template-columns: 350px 350px 350px;
        grid-gap: 10px;
        background-color: #fff;
        color: #444;
        }

        .box {
        background-color: #4da6ff;
        color: #fff;
        border-radius: 5px;
        padding: 20px;
        font-size: 150%;
        
        }
            
    
    </style>
        <center>
                    <div class="cwrapper">
                    <?php
					$i = 0;
                    $stmp = $admin -> ret("SELECT * FROM `file_category`");
                    while($row = $stmp->fetch(PDO::FETCH_ASSOC)){
						$i++;


                      ?>

                     <a href="vfiles.php?cid=<?php echo $row['c_id'] ; ?>&uid=<?= $uid?>"><div class="box a"><?php echo $row['cat_name'];?></div></a>
                    

                      <?php

                    }
                    
                    ?>	
                  </div>
				  <?php
				if ($i == 0) {
                            ?>
                            <div class="alert alert-danger text-center">
                               
                                    No records
                                
                            </div>
                        <?php } ?>
                  </center>



            
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
