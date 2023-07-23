<?php 
define('DIR','../../');
require_once DIR . 'config.php';
$admin = new Admin();
if(!isset($_SESSION['uid'])){
	$admin -> redirect1('../../index.html');
}

$cid=$_SESSION['uid'];
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

<body >
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
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
					<div class="panel container" style="padding:10px;">

						     <div class="">
        
                <a href="fromemessges.php" class="btn btn-primary">Go Back</a>
              
                                    <div class="container">
                                        <div class="">
                                            <div class="panel">
                                                <!--Heading-->
                                                <div class="panel-heading">
                                                    <div class="panel-control">
                                                        
                                                    </div>
                                                    <h3 class="panel-title"></h3>
                                                </div>
                                        
                                                <!--Widget body-->
                                                <div id="demo-chat-body" class="collapse in">
                                                    <div class="nano has-scrollbar" style="height:380px">
                                                        <div class="nano-content pad-all" tabindex="0" style="right: -17px;">
                                                            <ul class="list-unstyled media-block ">
                                                            
                                                            <?php 

                                                           $eid = $_GET['emp'];
                                                            $astmt = $admin -> ret("SELECT * FROM `employee` WHERE `e_id` = '$eid'");
                                                            $arow = $astmt -> fetch(PDO::FETCH_ASSOC);

                                                            $abstmt = $admin -> ret("SELECT * FROM `admin` WHERE `id` = '1'");
                                                            $abrow = $abstmt -> fetch(PDO::FETCH_ASSOC);

                                                       
                                                        
                                                                $stmt = $admin -> ret("SELECT * FROM `admin_msg_to_emp` WHERE `e_id` = '$eid'");
                                                                while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){ 
                                                        ?>
                                                            <?php
                                                            if($row['fromm'] == "emp"){ 
                                                            ?>
                                                                <li class="mar-btm">
                                                                     <div class="media-left">
                                                                        <img src="../../Controller/admin/<?= $arow['pro_pic']?>" class="img-circle img-sm" alt="Profile Picture">
                                                                    </div> 
                                                                    <div class="media-body pad-hor">
                                                                        <div class="speech">
                                                                         <a href="#" class="media-heading"><?= $arow['name'] ?></a>
                                                                             
                                                                            <p><?= $row['chat']?></p>
                                                                            <p class="speech-time">
                                                                                <i class="fa fa-clock-o fa-fw"></i> <?= $row['date']?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            <?php } ?>
                                                            <?php
                                                            if($row['fromm'] == "admin"){ 
                                                            ?>
                                                                <li class="mar-btm ">
                                                                    <div class="media-right">
                                                                        <img src="../../Controller/<?= $abrow['profile_pic']?>" class="img-circle img-sm" alt="Profile Picture">
                                                                    </div>
                                                                    <div class="media-body pad-hor speech-right">
                                                                        <div class="speech">
                                                                           <a href="#" class="media-heading">Admin</a>
                                                                          
                                                                            <p><?= $row['chat']?></p>
                                                                            <p class="speech-time">
                                                                                <i class="fa fa-clock-o fa-fw"></i> <?= $row['date']?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </li>

                                                                <?php } ?>
                                                                <?php
                                                                }
                                                                ?>
                                                                
                                                            </ul>
                                                        </div>
                                                    <div class="nano-pane"><div class="nano-slider" style="height: 141px; transform: translate(0px, 0px);"></div></div></div>
                                        
                                                    <!--Widget footer-->
                                                    <div class="panel-footer">
                                                         <form action="../../Controller/chat.php" method="post">
                                                        <div class="row">
                                                       
                                                            <div class="col-xs-9">
                                                                <input type="hidden"  required=" " name="emp" value="<?= $eid?>">
                                                                <input type="text" required=" " name="msg" placeholder="Enter your text" class="form-control chat-input">
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <button class="btn btn-primary btn-block" type="submit" name="fromadmintoemp">Send</button>
                                                            </div>
                                                           
                                                        </div>
                                                         </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
                                    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">


<style type="text/css">

.panel {
    box-shadow: 0 2px 0 rgba(0,0,0,0.075);
    border-radius: 0;
    border: 0;
    margin-bottom: 24px;
}
.panel .panel-heading, .panel>:first-child {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.panel-heading {
    position: relative;
    height: 50px;
    padding: 0;
    border-bottom:1px solid #eee;
}
.panel-control {
    height: 100%;
    position: relative;
    float: right;
    padding: 0 15px;
}
.panel-title {
    font-weight: normal;
    padding: 0 20px 0 20px;
    font-size: 1.416em;
    line-height: 50px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.panel-control>.btn:last-child, .panel-control>.btn-group:last-child>.btn:first-child {
    border-bottom-right-radius: 0;
}
.panel-control .btn, .panel-control .dropdown-toggle.btn {
    border: 0;
}
.nano {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
}
.nano>.nano-content {
    position: absolute;
    overflow: scroll;
    overflow-x: hidden;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}
.pad-all {
    padding: 15px;
}
.mar-btm {
    margin-bottom: 15px;
}
.media-block .media-left {
    display: block;
    float: left;
}
.img-sm {
    width: 46px;
    height: 46px;
}
.media-block .media-body {
    display: block;
    overflow: hidden;
    width: auto;
    
}
.pad-hor {
    padding-left: 15px;
    padding-right: 15px;
}
.speech {
    position: relative;
    background: #b7dcfe;
    color: black;
    display: inline-block;
    border-radius: 0;
    padding: 12px 20px;
}
.speech:before {
    content: "";
    display: block;
    position: absolute;
    width: 0;
    height: 0;
    left: 0;
    top: 0;
    border-top: 7px solid transparent;
    border-bottom: 7px solid transparent;
    border-right: 7px solid #b7dcfe;
    margin: 15px 0 0 -6px;
}
.speech-right>.speech:before {
    left: auto;
    right: 0;
    border-top: 7px solid transparent;
    border-bottom: 7px solid transparent;
    border-left: 7px solid lightgreen;
    border-right: 0;
    margin: 15px -6px 0 0;
}
.speech .media-heading {
    font-size: 1.2em;
    color: black;
    display: block;
    border-bottom: 1px solid rgba(0,0,0,0.1);
    margin-bottom: 10px;
    padding-bottom: 5px;
    font-weight: 300;
}
.speech-time {
    margin-top: 20px;
    margin-bottom: 0;
    font-size: .8em;
    font-weight: 300;
}
.media-block .media-right {
    float: right;
}
.speech-right {
    text-align: right;
}
.pad-hor {
    padding-left: 15px;
    padding-right: 15px;
}
.speech-right>.speech {
    background: lightgreen;
    color: black;
    text-align: right;
}
.speech-right>.speech .media-heading {
    color: black;
}
.btn-primary, .btn-primary:focus, .btn-hover-primary:hover, .btn-hover-primary:active, .btn-hover-primary.active, .btn.btn-active-primary:active, .btn.btn-active-primary.active, .dropdown.open>.btn.btn-active-primary, .btn-group.open .dropdown-toggle.btn.btn-active-primary {
    background-color: #579ddb;
    border-color: #5fa2dd;
    color: #fff !important;
}
.btn {
    cursor: pointer;
    /* background-color: transparent; */
    color: inherit;
    padding: 6px 12px;
    border-radius: 0;
    border: 1px solid 0;
    font-size: 11px;
    line-height: 1.42857;
    vertical-align: middle;
    -webkit-transition: all .25s;
    transition: all .25s;
}
.form-control {
    font-size: 11px;
    height: 100%;
    border-radius: 0;
    box-shadow: none;
    border: 1px solid #e9e9e9;
    transition-duration: .5s;
}
.nano>.nano-pane {
    background-color: rgba(0,0,0,0.1);
    position: absolute;
    width: 5px;
    right: 0;
    top: 0;
    bottom: 0;
    opacity: 0;
    -webkit-transition: all .7s;
    transition: all .7s;
}
</style>


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
