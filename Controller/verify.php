<?php
define('DIR','../');
require_once DIR . 'config.php';
$admin = new Admin();


if(isset($_POST['login']))
{

    $email = $_POST['email'];  
    $pass = $_POST['pass'];

    $stmt = $admin->ret("SELECT * FROM `login` WHERE `email` = '$email'") ;
    
	$num = $stmt ->rowCount();
		
    if($num>0)
    {
            
        $row = $stmt ->fetch(PDO::FETCH_ASSOC);
        $id = $row['l_id'];
        $dbpass = $row['password'];

        if(password_verify($pass,$dbpass))
        {

           
           if($row['roll'] == "c")
           {

                $astmt = $admin -> ret("SELECT * FROM `clients` WHERE `email` = '$email'");
                $arow = $astmt -> fetch(PDO::FETCH_ASSOC);
                
                $_SESSION['uid'] = $arow['cl_id'];
                $_SESSION['name'] = $row['name'];

                $admin->redirect('../login/client/index');

           }
           elseif($row['roll'] == "e")
           {

                $astmt = $admin -> ret("SELECT `e_id` FROM `employee` WHERE `email_id` = '$email'");
                $arow = $astmt -> fetch(PDO::FETCH_ASSOC);

                $_SESSION['uid'] = $arow['e_id'];
                $_SESSION['name'] = $row['name'];

                $admin -> redirect('../login/employe/index');
                

           }
           else
           {

                $_SESSION['uid'] = $row['l_id'];
                $_SESSION['name'] = $row['name'];

                $admin -> redirect('../login/admin/index');

           }           
        }
        else
        {
            echo "<script>
            alert('You have Entered Wrong Password.');
            window.location.href='../index.php';
            </script>";
        }
        
    }
    else
    {
        echo "<script>
        alert('You are Not a Valid User.');
        window.location.href='../index.php';
        </script>";
    }

}

// rolls  assigned  for admin : a
// rolls  assigned  for employee : e
// rolls  assigned  for client : c



if(isset($_POST['Updatepassword']))
{

    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $email = $_POST['email'];

    if($pass==$cpass)
    {
        $pass=password_hash($pass, PASSWORD_BCRYPT);
        $stmt = $admin -> cud("UPDATE `login` SET `password` = '$pass' WHERE `login`.`email` = '$email'","updated");
        
        if($stmt)
        {
            echo "<script>
            alert('Password changed successfully');
            window.location.href='../login/index.php';
            </script>";
        }
        else
        {
            echo "<script>
            alert('something went wrong.');
            window.location.href='../login/newpass.php?email=$email';
            </script>";
        }

    }
    else
    {
        echo "<script>
        alert('Password is not matching.');
        window.location.href='../login/newpass.php?email=$email';
        </script>";
    }
}


?>