<?php
    define('DIR','../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    if(isset($_POST['Forget']))
    {

    	$email = $_POST['email'];
    	$date = $_POST['date'];

    	$stmt = $admin -> ret("SELECT * FROM login WHERE `email` = '$email' AND `created_at` = '$date'");
    	$num = $stmt -> rowCount();
    	if($num>0)
    	{
    		echo "<script>
            
            window.location.href='../login/newpass.php?email=$email';
            </script>";

    	}
    	else
    	{
    		 echo "<script>
            alert('You have Entered Wrong detailes.');
            window.location.href='../login/index.php';
            </script>";
    	}
    }


    ?>