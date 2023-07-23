<?php

   define('DIR','../../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    $id = $_SESSION['uid'];

    if(isset($_POST['msgforadminfromemp']))
    {
        $message = $_POST['message'];
               
        $stmt = $admin -> cud("INSERT INTO `emp_message` (`e_id`, `message`, `date`) VALUES 
                                                                ('".$id."','".$message."',NOW())","saved");
        if($stmt)
        {
                        echo "<script>alert('Message Sent Successfully.');
                           window.location.href='../../login/employe/sendmessges.php';
                        </script>";
        }
        else
        {
                        echo "<script>alert('Something Went Wrong.');
                           window.location.href='../../login/employe/sendmessges.php';
                        </script>";
        }
    } 




    if(isset($_POST['addnewTodo']))
    {
        $tname = $_POST['tname'];
        $tdesc = $_POST['tdesc'];
        $tdate = $_POST['tdate'];
                    
        $stmt = $admin -> cud("INSERT INTO `emp_to_do_list` (`emp_id`,`todo_name`, `to_do_desc`, `date`) VALUES
                                                                ('".$id."','".$tname."','".$tdesc."','".$tdate."')","saved");
        if($stmt)
        {
                        echo "<script>alert('New TODO List Added Successfully.');
                           window.location.href='../../login/employe/index.php';
                        </script>";
        }
        else
        {
                        echo "<script>alert('Something Went Wrong.');
                          window.location.href='../../login/employe/index.php';
                        </script>";
        }
    }


?>