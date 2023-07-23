<?php
    define('DIR','../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    if(isset($_POST['saveprofileadmin']))
    {
    	$name = $_POST['name'];
    	$email = $_POST['email'];
    	$phone = $_POST['ph'];


    	$stmt = $admin -> cud("INSERT INTO `admin` ( `id`, `name`, `email`, `phone_number`) VALUES ('1','".$name."','".$email."','".$phone."')","inserted");

    	if($stmt)
        {
    		 echo "<script>
            alert('Profile Saved Successfully.');
            window.location.href='../login/admin/profile.php';
            </script>";

    	}
        else
        {

    		 echo "<script>
            alert('You have Entered Wrong detailes.');
            window.location.href='../login/admin/profile.php';
            </script>";
    	}

    }




     if(isset($_POST['adminupdate']))
     {
    	$name = $_POST['name'];
    	$email = $_POST['email'];
    	$phone = $_POST['ph'];


    	$stmt = $admin -> cud("UPDATE `admin` SET `phone_number` = '$phone',`name`='$name', `email` = '$email' WHERE `admin`.`id` = '1'","updated");

    	$stmt = $admin -> cud("UPDATE `login` SET `email` = '$email', `name` = '$name' WHERE `login`.`l_id` = 1","updated");


    	if($stmt)
        {
    		 echo "<script>
            alert('Profile Updated Successfully.');
            window.location.href='../login/admin/profile.php';
            </script>";

    	}
        else
        {

    		 echo "<script>
            alert('You have Entered Wrong detailes.');
            window.location.href='../login/admin/profile.php';
            </script>";
    	}

    }




     if(isset($_POST['changepropiccl']))
     {
    	
        $type = $_FILES['propic']['type'];
        if($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg")
        {
    	   $movpath = "files/";
            $propic = $movpath . basename($_FILES['propic']['name']);
            move_uploaded_file($_FILES['propic']['tmp_name'],$propic);



    	   $stmt = $admin -> cud("UPDATE `admin` SET  `profile_pic` = '$propic' WHERE `admin`.`id` = '1'","updated");

    	   if($stmt)
            {
    		   echo "<script>
                    alert('Profile Picture Saved Successfully.');
                        window.location.href='../login/admin/profile.php';
                        </script>";

    	    }
            else
            {

        		 echo "<script>
                alert('You have Entered Wrong detailes.');
                window.location.href='../login/admin/profile.php';
                </script>";
        	}
        }
        else
        {
             echo "<script>alert('Please Select Image File in JPEG, PNG, JPG.');
                    window.location.href='../login/admin/profile.php';
                </script>";
        }


    }





    if(isset($_POST['changepassc']))
    {
        $op =$_POST['op'];
        $pass =$_POST['pass'];
        $cpass =$_POST['cpass'];

        $stmt = $admin -> ret("SELECT `password` FROM `login` WHERE `l_id` = '1'");
        $row = $stmt -> fetch(PDO::FETCH_ASSOC);

        $dbpass = $row['password'];

        if(password_verify($op , $dbpass))
        {

            if($pass == $cpass)
            {

                if(password_verify($pass , $dbpass))
                {
                        echo "<script>alert('Your Password is same as old password Please Try Again.');
                            window.location.href='../login/admin/profile.php';
                            </script>";
                }
                else
                {
                    
                    $pass = password_hash($pass , PASSWORD_BCRYPT);
                    $stmt = $admin -> cud("UPDATE `login` SET `password` = '$pass' WHERE `login`.`l_id` = '1'","updated");
                    if($stmt)
                    {
                        echo "<script>alert('Your Password is Changed.');
                                window.location.href='../login/admin/profile.php';
                            </script>";
                    }
                    else
                    {
                        echo "<script>alert('Something is wrong Please Try Again.');
                                window.location.href='../login/admin/profile.php';
                            </script>";
                    }
                }

            }
            else
            {
                echo "<script>alert('Your Password is not matching Please Try Again.');
                 window.location.href='../login/admin/profile.php';
                   </script>";
            }

        }
        else
        {
                echo "<script>alert('Your Old Password is Wrong Please Try again.');
            window.location.href='../login/admin/profile.php';
                   </script>";
        }
    }


?>


