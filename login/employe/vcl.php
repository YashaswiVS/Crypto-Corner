<?php
define('DIR','../../');
require_once DIR . 'config.php';
$admin = new Admin();


if(!isset($_SESSION['uid'])){
	$admin -> redirect1('../../index.php');
}
$eid = $_SESSION['uid'];

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
					<h3 class="page-title">VIEW CLIENTS</h3><hr>
						<div class="panel container" style="padding:10px;">

                            <style>
      @import url("https://fonts.googleapis.com/css2?family=Baloo+Paaji+2:wght@400;500&display=swap");



.card {

  height: 400px;
  border-radius: 5px;
  display: flex;
  flex-direction: column;
  align-items: center;
  box-shadow: rgba(0, 0, 0, 0.7);
 
  border-radius:10px;
}

.card__name {
  margin-top: 6px;
  font-size: 1.5em;

}

.card__image {
  height: 130px;
  width: 130px;
  border-radius: 50%;
  margin-top: 20px;
  box-shadow: 0 10px 50px blue;
}


.draw-border {
  box-shadow: inset 0 0 0 4px #58cdd1;
  color: #58afd1;
  -webkit-transition: color 0.25s 0.0833333333s;
  transition: color 0.25s 0.0833333333s;
  position: relative;
}

.draw-border::before,
.draw-border::after {
  border: 0 solid transparent;
  box-sizing: border-box;
  content: '';
  pointer-events: none;
  position: absolute;
  width: 0rem;
  height: 0;
  bottom: 0;
  right: 0;
}

.draw-border::before {
  border-bottom-width: 4px;
  border-left-width: 4px;
  border-radius : 10px;
}

.draw-border::after {
  border-top-width: 4px;
  border-right-width: 4px;
  border-radius : 10px;
}

.draw-border:hover {
  color: #ffe593;
}

.draw-border:hover::before,
.draw-border:hover::after {
  border-color: #eb196e;
  -webkit-transition: border-color 0s, width 0.25s, height 0.25s;
  transition: border-color 0s, width 0.25s, height 0.25s;
  width: 100%;
  height: 100%;
  border-radius : 10px;
}

.draw-border:hover::before {
  -webkit-transition-delay: 0s, 0s, 0.25s;
  transition-delay: 0s, 0s, 0.25s;
  border-radius : 10px;
}

.draw-border:hover::after {
  -webkit-transition-delay: 0s, 0.25s, 0s;
  transition-delay: 0s, 0.25s, 0s;
  border-radius : 10px;
}

.btn {
  background: none;
  border: none;
  cursor: pointer;
  line-height: 1.5;
  font: 700 1.2rem 'Roboto Slab', sans-serif;
  padding: 10px;
  letter-spacing: 0.05rem;
  margin: 6px;
  width: 13rem;
  border-radius : 10px;
}

.btn:focus {
  outline: 2px dotted #55d7dc;
  border-radius : 10px;
  
}

.grid-container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-gap: 20px;
  font-size: 1.2em;
}
.col-xs-2{
	margin : 10px;	
}
  </style>
	<div class="container">
						<div class="row">

              <?php

              $astmt = $admin -> ret("SELECT * FROM `assignclienttoemp` WHERE `emp_id` = '$eid'");
               $i = 0; 

               while($arow = $astmt -> fetch(PDO::FETCH_ASSOC)){ 
                $Cid=$arow['cl_id'];
               $stmt = $admin -> ret("SELECT * FROM `clients` WHERE `cl_id` = '$Cid'");
                
                $row = $stmt -> fetch(PDO::FETCH_ASSOC);
                  $i++;
              ?>

							<div class="col-xs-2">
								<div class="card">
									<img src="../../Controller/admin/<?= $row['profile_pic']?>" alt="Person" class="card__image">
									<p class="card__name"><?= $row['name']?></p>
									  	<?= $row['o_name']?>
									<a href="viewfiles.php?uid=<?= $row['cl_id']?>" class="btn draw-border">VIEW FILES</a>
								</div>
							</div>
              

            <?php } ?>
               <?php
            	if ($i == 0) {
                            ?>
                           <center>
                                <div style="width:90%;" class="alert alert-danger text-center">
                                    No records
                                </div>
                        </center>
                        <?php } ?>
						</div>
            
          
        			</div>
        			</div>


					
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

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  