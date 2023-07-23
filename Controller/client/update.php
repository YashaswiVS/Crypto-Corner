<?php

    define('DIR','../../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    $id = $_SESSION['uid'];

    if(isset($_POST['cprou']))
    {
    
        $email = $_POST['email'];
        $ph =  $_POST['ph'];
        $add = $_POST['add'];
        $oadd =  $_POST['oadd'];
        $gst = $_POST['gst'];

        $stmt = $admin -> cud("UPDATE `clients` SET `GSTno` = '$gst', `email` = '$email' , `address` = '$add', `o_address` = '$oadd', `ph` = '$ph' WHERE `clients`.`cl_id` = '$id'","updated");
        if($stmt)
        {
             echo "<script>alert('Information Updated Succesfully.');
                        window.location.href='../../login/client/profile.php';
                   </script>";
        }
        else
        {
             echo "<script>alert('Something Went Wrong.');
                        window.location.href='../../login/client/updatepro.php';
                   </script>";
        }   
    }


    if(isset($_POST['changepropiccl']))
    {
    
        $type = $_FILES['propic']['type'];
        
        if($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg")
        {


            $stmt = $admin -> ret("SELECT * FROM `clients` WHERE `cl_id` = '$id'");
            $row = $stmt -> fetch(PDO::FETCH_ASSOC);
            $oldpic = $row['profile_pic'];
            unlink("../admin/".$oldpic);

            $tartget_dir = "profilePics/";
            $proloc = $tartget_dir . basename($_FILES['propic']['name']);

            $movpath = "../admin/profilePics/";
            $conpath = $movpath . basename($_FILES['propic']['name']);
            move_uploaded_file($_FILES['propic']['tmp_name'],$conpath);


            $stmt = $admin -> cud("UPDATE `clients` SET `profile_pic` = '$proloc'  WHERE `clients`.`cl_id` = '$id'","updated");
            if($stmt)
            {
                 echo "<script>alert('Profile Picture Updated Successfully.');
                        window.location.href='../../login/client/profile.php';
                   </script>";
            }
            else
            {
             echo "<script>alert('Something Went Wrong.');
                        window.location.href='../../login/client/updatepro.php';
                   </script>";
            }   
        }
        else
        {
             echo "<script>alert('Please Select Image File in JPEG, PNG, JPG.');
                    window.location.href='../../login/client/updatepro.php';
                </script>";  
        }
    }
    




    if(isset($_POST['changepassc']))
    {
        $op =$_POST['op'];
        $pass =$_POST['pass'];
        $cpass =$_POST['cpass'];

        $stmt = $admin -> ret("SELECT `email` FROM `clients` WHERE `cl_id` = '$id'");
        $row = $stmt -> fetch(PDO::FETCH_ASSOC);

        $email = $row['email'];

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
                                window.location.href='../../login/client/profile.php';
                            </script>";
                }
                else
                {
                    
                    $pass = password_hash($pass , PASSWORD_BCRYPT);
                    $stmt = $admin -> cud("UPDATE `login` SET `password` = '$pass' WHERE `login`.`email` = '$email'","updated");
                    if($stmt)
                    {
                        echo "<script>alert('Your Password is Changed.');
                            window.location.href='../../login/client/profile.php';
                            </script>";
                    }
                    else
                    {
                        echo "<script>alert('Something is wrong Please Try Again.');
                            window.location.href='../../login/client/profile.php';
                        </script>";
                    }
                }
            }
            else
            {
                echo "<script>alert('Your Password is not matching Please Try Again.');
                    window.location.href='../../login/client/profile.php';
                   </script>";
            }

        }
        else
        {
                echo "<script>alert('Your Old Password is Wrong Please Try again.');
                    window.location.href='../../login/client/profile.php';
                   </script>";
        }    
    }


?>