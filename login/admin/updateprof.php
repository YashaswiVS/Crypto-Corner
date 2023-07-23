<?php
define('DIR','../../');
require_once DIR . 'config.php';
$admin = new Admin();
if(!isset($_SESSION['uid'])){
	$admin -> redirect1('../../index.html');
}

$id = $_SESSION['uid'] ;
$stmt = $admin -> ret("SELECT * FROM `clients` WHERE `cl_id` = '$id'");
$row = $stmt -> fetch(PDO::FETCH_ASSOC);
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
    
  <style>
      @import url("https://fonts.googleapis.com/css2?family=Baloo+Paaji+2:wght@400;500&display=swap");




.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    border: none;
}

.m-r-0 {
    margin-right: 0px
}

.m-l-0 {
    margin-left: 0px
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px
}

.bg-c-lite-green {
    background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #ee5a6f, #f29263)
}

.user-profile {
    padding: 20px 0
}

.card-block {
    padding: 1.25rem
}

.m-b-25 {
    margin-bottom: 25px
}

.img-radius {
    border-radius: 5px
}

h6 {
    font-size: 14px
}

.card .card-block p {
    line-height: 25px
}

@media only screen and (min-width: 1400px) {
    p {
        font-size: 14px
    }
}

.card-block {
    padding: 1.25rem
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.m-b-20 {
    margin-bottom: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.card .card-block p {
    line-height: 25px
}

.m-b-10 {
    margin-bottom: 10px
}

.text-muted {
    color: #919aa3 !important
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.f-w-600 {
    font-weight: 600
}

.m-b-20 {
    margin-bottom: 20px
}

.m-t-40 {
    margin-top: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.m-b-10 {
    margin-bottom: 10px
}

.m-t-40 {
    margin-top: 20px
}

.user-card-full .social-link li {
    display: inline-block
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out
}


.card {

  border-radius: 5px;
  align-items: center;
  box-shadow: rgba(0, 0, 0, 0.7);
background-color:white;
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
  border: 5px solid #272133;
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
					<h3 class="page-title">Profile</h3><hr>
                <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img height="150px" src="../../Controller/admin/<?= $row['profile_pic']?>" class="img-radius" alt="User-Profile-Image"> </div>
                               <h6 class="f-w-600"><?= $row['name']?></h6>
                                <p><?= $row['o_name']?></p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                           <center>
                           <form style="border:2px solid lightblue; border-radius : 10px ;padding:10px;" enctype="multipart/form-data" action="../../Controller/client/update.php" method="post">
                                <label for="" class="label-control"> Change Profile Picture</label>    
                                <input required type="file" name="propic" class="form-control"><br>
                                <input type="submit" name="changepropiccl" value="Change" class="btn ">
                            </form>
                            </center>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                <form method="POST" action="../../Controller/client/update.php">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email-id</p>
                                        <h6 class="text-muted f-w-400"><input type="text" name="email" class="form-control" value="<?= $row['email']?>"></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400"><input type="text" name="ph" maxlength="10" class="form-control" value="<?= $row['ph']?>"></h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Address</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Home Address</p>
                                        <h6 class="text-muted f-w-400"><input type="text" name="add" class="form-control" value="<?= $row['address']?>"></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Office</p>
                                        <h6 class="text-muted f-w-400"> <input type="text" name="oadd" class="form-control" value="<?= $row['o_address']?>"> </h6>
                                    </div>
                                    
                                     
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"></h6>
                                <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">GST Number</p>
                                            <h6 class="text-muted f-w-400"><input type="text" name="gst" class="form-control" maxlength="15" value="<?= $row['GSTno']?>"></h6>
                                        </div>
                                    </div>

                                   
                                 <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><input type="submit" name="cprou" value="Update" data-toggle="tooltip" data-placement="bottom" title="" style="width: 160px;font-size:20px;color:#3287b2;" onMouseOver="this.style.color='black'"
   onMouseOut="this.style.color='#3287b2'" data-original-title="facebook" data-abc="true" class="btn btn-secondary"></li>
                                      <li><a href="#"data-target="#editMezalta"
 data-toggle="modal" data-toggle="tooltip" data-placement="bottom" title="" style="width: 200px;" data-original-title="facebook" data-abc="true" class="btn btn-secondary">Change Password</a></li>
                                 <li><a href="profile.php" data-toggle="tooltip" data-placement="bottom" title="" style="width: 160px;" data-original-title="facebook" data-abc="true" class="btn btn-secondary">Back</a></li>
                                </ul>
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><div class="modal fade" id="editMezalta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Change Password</h4>
					</div>
					<div class="modal-body">
						<form action="../../Controller/client/update.php" method="POST">
						<div class="form-group">
							<label for="recipient-name" class="control-label">Enter Old Password :</label>
							<input type="text" class="form-control" name="op" id="recipient-name" required>
						</div>
                        <div class="form-group">
							<label for="recipient-name" class="control-label">Enter New Password :</label>
							<input type="text" class="form-control" name="pass" id="recipient-name" required>
						</div>
						<div class="form-group">
							<label for="message-text" class="control-label">Confirm New Password  :</label>
							<input class="form-control" name="cpass" id="message-text" required>
						</div>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="submit" name="changepassc" value="Change" class="btn">
					</div>
					</form>
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
