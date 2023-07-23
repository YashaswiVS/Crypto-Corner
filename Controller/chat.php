<?php
    define('DIR','../');
    require_once DIR . 'config.php';
    $admin = new Admin();

$cid=$_SESSION['uid'];



 if(isset($_POST['fromadmintoclient']))
{
	$msg = $_POST['msg'];
	$cid = $_POST['cl'];
	$stmt = $admin -> cud("INSERT INTO `admin_msg_to_client` (`c_id`, `chat`, `from`, `date`) VALUES('".$cid."','".$msg."','admin',NOW())","saved");


	echo "<script>window.location.href='../login/admin/viewclientmsg.php?client=$cid';</script>";

	
}


if(isset($_POST['fromemptoadmin']))
{
	$msg = $_POST['msg'];
	$stmt = $admin -> cud("INSERT INTO `admin_msg_to_emp` (`e_id`, `chat`, `fromm`, `date`) VALUES('".$cid."','".$msg."','emp',NOW())","saved");


	echo "<script>window.location.href='../login/employe/viewadminchat.php';</script>";

	
}


if(isset($_POST['fromemptoclient']))
{
	$msg = $_POST['msg'];
	$ccid = $_POST['cid'];
	$stmt = $admin -> cud("INSERT INTO `emp_msg_to_client` (`c_id`,`e_id`, `chat`, `from`, `date`) VALUES('".$ccid."','".$cid."','".$msg."','employee',NOW())","saved");


	echo "<script>window.location.href='../login/employe/viewclientchat.php?cl=$ccid';</script>";

	
}


if(isset($_POST['fromadmintoemp']))
{
	$msg = $_POST['msg'];
	$eid = $_POST['emp'];
	$stmt = $admin -> cud("INSERT INTO `admin_msg_to_emp` (`e_id`, `chat`, `fromm`, `date`) VALUES('".$eid."','".$msg."','admin',NOW())","saved");


	echo "<script>window.location.href='../login/admin/viewempmsg.php?emp=$eid';</script>";

	
}




 if(isset($_POST['fromclient']))
{
	$msg = $_POST['msg'];
	$stmt = $admin -> cud("INSERT INTO `admin_msg_to_client` (`c_id`, `chat`, `from`, `date`) VALUES('".$cid."','".$msg."','client',NOW())","saved");

	$admin -> redirect('../login/client/viewadminchat');
}



 if(isset($_POST['fromclienttoemp']))
{
	$msg = $_POST['msg'];
	$empid = $_POST['empid'];
	$stmt = $admin -> cud("INSERT INTO `emp_msg_to_client` (`c_id`, `e_id`,`chat`, `from`, `date`) VALUES('".$cid."','".$empid."','".$msg."','client',NOW())","saved");

	echo "<script>window.location.href='../login/client/viewempchat.php?emp=$empid';</script>";
}

?>