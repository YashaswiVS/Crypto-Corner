<?php
    define('DIR','../../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    $id = $_SESSION['uid'];

    if(isset($_POST['qui']))
    {
        $sub = $_POST['sub'];
        $desc = $_POST['desc'];

        $stmt = $admin -> cud("INSERT INTO `query` ( `cl_id`, `subject`, `date`, `description`) VALUES 
                                        ('".$id."','".$sub."',NOW(),'".$desc."')","saved");

        if($stmt)
        {
             echo "<script>alert('Your Query is Submitted – we will get back to you soon.');
                    window.location.href='../../login/client/query.php';
                   </script>";
        }
        else
        {
             echo "<script>alert('Something is wrong Please Try Again.');
                    window.location.href='../../login/client/query.php';
                   </script>";
        }
    }



    if(isset($_POST['pay']))
    {
        $price = $_POST['price'];
        $trID = $_POST['trID'];

        $stmt = $admin -> cud("INSERT INTO `payment` (`cl_id`, `ammount`, `date`, `transaction_id`) VALUES
                                     ('".$id."','".$price."',NOW(),'".$trID."') ","saved");

        if($stmt)
        {
             echo "<script>alert('Thank You For Payment.');
                    window.location.href='../../login/client/payment.php';
                   </script>";
        }
        else
        {
             echo "<script>alert('Something is wrong Please Try Again.');
                    window.location.href='../../login/client/payment.php';
                   </script>";
        }
    }



    if(isset($_POST['msgforadminfromcl']))
    {

        $c_id = $_POST['cl_id'];
        $message = $_POST['message'];
                    
        $stmt = $admin -> cud("INSERT INTO `client_messages` (`c_id`, `message`, `m_date`) VALUES 
                                                                ('".$c_id."','".$message."',NOW())","saved");
        if($stmt)
        {
                        echo "<script>alert('Message Sent Successfully.');
                           window.location.href='../../login/client/sendmessges.php';
                        </script>";
        }
        else
        {
                        echo "<script>alert('Something Went Wrong.');
                           window.location.href='../../login/client/sendmessges.php';
                        </script>";
        }
    }




    if(isset($_POST['addnewTodo']))
    {
        $tname = $_POST['tname'];
        $tdesc = $_POST['tdesc'];
        $tdate = $_POST['tdate'];
                    
        $stmt = $admin -> cud("INSERT INTO `cl_to_do_list` (`cl_id`,`todo_name`, `to_do_desc`, `date`) VALUES
                                                                ('".$id."','".$tname."','".$tdesc."','".$tdate."')","saved");
        if($stmt)
        {
                        echo "<script>alert('New TODO List Added Successfully.');
                           window.location.href='../../login/client/index.php';
                        </script>";
        }
        else
        {
                        echo "<script>alert('Something Went Wrong.');
                          window.location.href='../../login/client/index.php';
                        </script>";
       }
    }


?>