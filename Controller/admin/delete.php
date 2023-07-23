<?php

    define('DIR','../../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    if(isset($_GET['assignid']))
    {
        $id = $_GET['assignid'];
        $stmt = $admin -> cud("DELETE FROM `assignclienttoemp` WHERE `assignclienttoemp`.`as_id` = '$id'","deleted");
        
        if($stmt)
        {
            echo "<script>alert('Deleted Successfully.');
                        window.location.href='../../login/admin/asscltoemp.php';
                    </script>";
        }
        else
        {
                    echo "<script>alert('Something Went Wrong Please Try Again.');
                        window.location.href='../../login/admin/asscltoemp.php';
                    </script>";
        }

    }





    if(isset($_GET['empdlid']))
    {
        $id = $_GET['empdlid'];

        $stmt = $admin->ret("SELECT * FROM `employee` WHERE `e_id`= '$id'");
        $row = $stmt -> fetch(PDO::FETCH_ASSOC);
        $email = $row['email_id'];

        $admin -> cud("DELETE FROM `login`  WHERE `login`.`email` = '$email'","updated");

        $stmt = $admin->ret("SELECT * FROM `assignclienttoemp` WHERE `emp_id`= '$id'");
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC))
        { 
            $admin -> cud("DELETE FROM `assignclienttoemp`  WHERE `assignclienttoemp`.`emp_id` = '$id'","updated");
        }
        
        $stmt = $admin -> cud("DELETE FROM `employee` WHERE `employee`.`e_id` = '$id'","deleted");
            
        if($stmt)
        {
                echo "<script>alert('Deleted Successfully.');
                            window.location.href='../../login/admin/vemp.php';
                        </script>";
        }
        else
        {
                        echo "<script>alert('Something Went Wrong Please Try Again.');
                        window.location.href='../../login/admin/vemp.php';
                        </script>";
        }

    }




    if(isset($_GET['dltclt']))
    {
        $id = $_GET['dltclt'];
        $stmt = $admin->ret("SELECT * FROM `clients` WHERE `cl_id`= '$id'");
        $row = $stmt -> fetch(PDO::FETCH_ASSOC);
        $email = $row['email'];

        $admin -> cud("DELETE FROM `login`  WHERE `login`.`email` = '$email'","updated");         

        $stmt = $admin -> ret("SELECT * FROM `files` WHERE `cl_id` = '$id'");
            while($row = $stmt -> fetch(PDO::FETCH_ASSOC))
            { 
                $fid = $row['f_id'];
                $file = $row['file'];
                unlink("../client/".$file);

                $admin -> cud("DELETE FROM `files` WHERE `files`.`f_id` = '$fid'","deleted");
            }
           


        $stmt = $admin -> cud("DELETE FROM `clients` WHERE `clients`.`cl_id` = '$id'","deleted");
        if($stmt)
        {
           
            echo "<script>alert('Deleted Successfully.');
                      window.location.href='../../login/admin/vcl.php';
                    </script>";
        }
        else
        {
                    echo "<script>alerts('Something Went Wrong Please Try Again.');
                      window.location.href='../../login/admin/vcl.php';
                    </script>";
        }

    }





    if(isset($_GET['dltfilecatid']))
    {
        $id = $_GET['dltfilecatid'];
        
        $stmt = $admin -> cud("DELETE FROM `file_category` WHERE `file_category`.`c_id` = '$id'","deleted");
        
        if($stmt)
        {
            echo "<script>alert('Deleted Successfully.');
                        window.location.href='../../login/admin/filecat.php';
                    </script>";
        }
        else
        {
                    echo "<script>alert('Something Went Wrong Please Try Again.');
                       window.location.href='../../login/admin/filecat.php';
                    </script>";
        }
    }


// if(isset($_GET['dltaudfid']))
//     {

//         $id = $_GET['dltaudfid'];

//         $stmt = $admin -> ret("SELECT * FROM `auditedfiles`  WHERE `a_id` = '$id' ");
//         $row = $stmt -> fetch(PDO::FETCH_ASSOC);
//         $file = $row['aud_file'];
//         unlink("../employee/".$file);
//         $stmt = $admin -> cud("DELETE FROM `auditedfiles` WHERE `auditedfiles`.`a_id` = '$id'","saved");

//         if($stmt)
//         {
//              echo "<script>alert('Deleting File Successfully.');
//                    window.location.href='../../login/admin/vfiles.php';
//                    </script>";
//         }
//         else
//         {
//              echo "<script>alert('Something is wrong Please Try Again.');
//                    window.location.href='../../login/client/aud.php';
//                    </script>";
//         }
//     }  


    if(isset($_GET['dltpayid']))
    {
        $id = $_GET['dltpayid'];
        $stmt = $admin -> cud("DELETE FROM `payment` WHERE `payment`.`pay_id` = '$id'","deleted");

        if($stmt)
        {
            echo "<script>alert('Deleted Successfully.');
                        window.location.href='../../login/admin/payment.php';
                    </script>";
        }
        else
        {
            echo "<script>alert('Something Went Wrong Please Try Again.');
                       window.location.href='../../login/admin/payment.php';
                    </script>";
        }

    } 




    if(isset($_GET['dltqid']))
    {
        $id = $_GET['dltqid'];
        $stmt = $admin -> cud("DELETE FROM `query` WHERE `query`.`q_id` = '$id'","deleted");
        
        if($stmt)
        {
            echo "<script>alert('Deleted Successfully.');
                        window.location.href='../../login/admin/query.php';
                    </script>";
        }
        else
        {
                    echo "<script>alert('Something Went Wrong Please Try Again.');
                       window.location.href='../../login/admin/query.php';
                    </script>";
        }

    }




    if(isset($_GET['repid']))
    {
        $id = $_GET['repid'];
        $stmt = $admin -> cud("DELETE FROM `replay` WHERE `replay`.`r_id` = '$id'","deleted");
        
        if($stmt)
        {
            echo "<script>alert('Deleted Successfully.');
                        window.location.href='../../login/admin/replay.php';
                    </script>";
        }
        else
        {
                    echo "<script>alert('Something Went Wrong Please Try Again.');
                       window.location.href='../../login/admin/replay.php';
                    </script>";
        }

    } 



    
    if(isset($_GET['dltfromemessges']))
    {
        $id = $_GET['dltfromemessges'];
        $stmt = $admin -> cud("DELETE FROM `emp_message` WHERE `emp_message`.`em_id` = '$id'","deleted");
        
        if($stmt)
        {
            echo "<script>alert('Deleted Successfully.');
                        window.location.href='../../login/admin/fromemessges.php';
                    </script>";
        }
        else
        {
                    echo "<script>alert('Something Went Wrong Please Try Again.');
                       window.location.href='../../login/admin/fromemessges.php';
                    </script>";
        }

    }



    if(isset($_GET['dltfromcmessges']))
    {
        $id = $_GET['dltfromcmessges'];
        $stmt = $admin -> cud("DELETE FROM `client_messages` WHERE `client_messages`.`m_id` = '$id'","deleted");
        if($stmt)
        {
            echo "<script>alert('Deleted Successfully.');
                        window.location.href='../../login/admin/fromcmessges.php';
                    </script>";
        }
        else
        {
                    echo "<script>alert('Something Went Wrong Please Try Again.');
                       window.location.href='../../login/admin/fromcmessges.php';
                    </script>";
        }

    }



    if(isset($_GET['dlttodo']))
    {
        $id = $_GET['dlttodo'];
        $stmt = $admin -> cud("DELETE FROM `to_do_list` WHERE `to_do_list`.`t_id` = '$id'","deleted");
        
        if($stmt)
        {
            echo "<script>alert('Deleted Successfully.');
                        window.location.href='../../login/admin/index.php';
                    </script>";
        }
        else
        {
                    echo "<script>alert('Something Went Wrong Please Try Again.');
                       window.location.href='../../login/admin/index.php';
                    </script>";
        }
    }

?>