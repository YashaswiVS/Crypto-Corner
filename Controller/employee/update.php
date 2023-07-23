<?php 

    define('DIR','../../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    $id = $_SESSION['uid'];



     if(isset($_POST['eprou']))
     {
    
        $email = $_POST['email'];
        $ph =  $_POST['ph'];
        $add = $_POST['add'];

        $stmt = $admin -> cud("UPDATE `employee` SET  `email_id` = '$email' , `address` = '$add', `phone` = '$ph' WHERE `employee`.`e_id` = '$id'","updated");
        
        if($stmt)
        {
             echo "<script>alert('Information Updated Successfully.');
                        window.location.href='../../login/employe/profile.php';
                   </script>";
        }
        else
        {
             echo "<script>alert('Something Went Wrong.');
                        window.location.href='../../login/employe/updatepro.php';
                   </script>";
        }   
    }




    if(isset($_POST['changepassc']))
    {
        $op =$_POST['op'];
        $pass =$_POST['pass'];
        $cpass =$_POST['cpass'];

        $stmt = $admin -> ret("SELECT `email_id` FROM `employee` WHERE `e_id` = '$id'");
        $row = $stmt -> fetch(PDO::FETCH_ASSOC);

        $email = $row['email_id'];

        $stmt = $admin -> ret("SELECT `password` FROM `login` WHERE `email` = '$email'");
        $row = $stmt -> fetch(PDO::FETCH_ASSOC);

        $dbpass = $row['password'];

        if(password_verify($op , $dbpass))
        {

            if($pass == $cpass)
            {

                if(password_verify($pass , $dbpass))
                {
                        echo "<script>alert('Your Password is same as old password Please Try Again.');
                                window.location.href='../../login/employe/profile.php';
                            </script>";
                }
                else
                {
                    
                    $pass = password_hash($pass , PASSWORD_BCRYPT);
                    $stmt = $admin -> cud("UPDATE `login` SET `password` = '$pass' WHERE `login`.`email` = '$email'","updated");
                    if($stmt)
                    {
                        echo "<script>alert('Your Password is Changed.');
                            window.location.href='../../login/employe/profile.php';
                            </script>";
                    }
                    else
                    {
                        echo "<script>alert('Something is wrong Please Try Again.');
                        window.location.href='../../login/employe/profile.php';
                        </script>";
                    }
                }

            }
            else
            {
                echo "<script>alert('Your Password is not matching Please Try Again.');
                    window.location.href='../../login/employe/profile.php';
                   </script>";
            }

        }
        else
        {
                echo "<script>alert('Your Old Password is Wrong Please Try again.');
                    window.location.href='../../login/employe/profile.php';
                   </script>";
        }
    }




     if(isset($_POST['changepropicemp']))
     {
    
        $type = $_FILES['propic']['type'];
        
        if($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg")
        {


            $stmt = $admin -> ret("SELECT * FROM `employee` WHERE `e_id` = '$id'");
            $row = $stmt -> fetch(PDO::FETCH_ASSOC);
            $oldpic = $row['pro_pic'];
            unlink("../admin/".$oldpic);

            $tartget_dir = "profilePics/";
            $proloc = $tartget_dir . basename($_FILES['propic']['name']);

            $movpath = "../admin/profilePics/";
            $conpath = $movpath . basename($_FILES['propic']['name']);
            move_uploaded_file($_FILES['propic']['tmp_name'],$conpath);


            $stmt = $admin -> cud("UPDATE `employee` SET `pro_pic` = '$proloc'  WHERE `employee`.`e_id` = '$id'","updated");
        
            if($stmt)
            {
                 echo "<script>alert('Profile Picture Updated Successfully.');
                        window.location.href='../../login/employe/profile.php';
                   </script>";
            }
            else
            {
                 echo "<script>alert('Something Went Wrong.');
                        window.location.href='../../login/employe/updatepro.php';
                   </script>";
            }   
        }
        else
        {
             echo "<script>alert('Please Select Image File in JPEG, PNG, JPG.');
                    window.location.href='../../login/employe/updatepro.php';
                </script>";  
        }
    }



?>