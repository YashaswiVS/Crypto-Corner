<?php
    define('DIR','../../');
    require_once DIR . 'config.php';
    $admin = new Admin();

      if(isset($_GET['dltfileid']))
      {

        $id = $_GET['dltfileid'];

        $stmt = $admin -> ret("SELECT * FROM `files`  WHERE `f_id` = '$id' ");
        $row = $stmt -> fetch(PDO::FETCH_ASSOC);
        $file = $row['file'];
        unlink($file);
        $stmt = $admin -> cud("DELETE FROM `files` WHERE `files`.`f_id` = '$id'","saved");

        if($stmt)
        {
             echo "<script>alert('Deleting File Successfully.');
                   window.location.href='../../login/client/vfiles.php';
                   </script>";
        }
        else
        {
             echo "<script>alert('Something is wrong Please Try Again.');
                   window.location.href='../../login/client/vfiles.php';
                   </script>";
        }
      }   
    
    


    if(isset($_GET['dltaudfid']))
    {

        $id = $_GET['dltaudfid'];

        $stmt = $admin -> ret("SELECT * FROM `auditedfiles`  WHERE `a_id` = '$id' ");
        $row = $stmt -> fetch(PDO::FETCH_ASSOC);
        $file = $row['aud_file'];
        unlink("../employee/".$file);
        $stmt = $admin -> cud("DELETE FROM `auditedfiles` WHERE `auditedfiles`.`a_id` = '$id'","saved");

        if($stmt)
        {
             echo "<script>alert('Deleting File Successfully.');
                   window.location.href='../../login/client/aud.php';
                   </script>";
        }
        else
        {
             echo "<script>alert('Something is wrong Please Try Again.');
                   window.location.href='../../login/client/aud.php';
                   </script>";
        }
    }  



    if(isset($_GET['dltclmsg'])){

        $id = $_GET['dltclmsg'];

        $stmt = $admin -> cud("DELETE FROM `msg_from_admin_to_cl` WHERE `msg_from_admin_to_cl`.`id` = '$id'","saved");

        if($stmt){
             echo "<script>alert('Deleting Message Successfully.');
                   window.location.href='../../login/client/replyfa.php';
                   </script>";
        }else{
             echo "<script>alert('Something is wrong Please Try Again.');
                   window.location.href='../../login/client/replyfa.php';
                   </script>";
        }
    } 

    if(isset($_GET['dltmsg']))
    {

        $id = $_GET['dltmsg'];

        $stmt = $admin -> cud("DELETE FROM `cl_message_reply` WHERE `cl_message_reply`.`mr_id` = '$id'","saved");

        if($stmt)
        {
             echo "<script>alert('Deleting Message Successfully.');
                   window.location.href='../../login/client/replayfa.php';
                   </script>";
        }
        else
        {
             echo "<script>alert('Something is wrong Please Try Again.');
                   window.location.href='../../login/client/replayfa.php';
                   </script>";
        }
    } 




      if(isset($_GET['dltq']))
      {

        $id = $_GET['dltq'];

        $stmt = $admin -> cud("DELETE FROM `replay` WHERE `replay`.`r_id` = '$id'","saved");

        if($stmt)
        {
             echo "<script>alert('Deleting Successfully.');
                   window.location.href='../../login/client/resq.php';
                   </script>";
        }
        else
        {
             echo "<script>alert('Something is wrong Please Try Again.');
                   window.location.href='../../login/client/resq.php';
                   </script>";
        }
    } 
    



    if(isset($_GET['dltpayemt']))
    {

        $id = $_GET['dltpayemt'];

        $stmt = $admin -> cud("DELETE FROM `payment` WHERE `payment`.`pay_id` = '$id'","saved");

        if($stmt)
        {
             echo "<script>alert('Deleting Successfully.');
                   window.location.href='../../login/client/vpay.php';
                   </script>";
        }
        else
        {
             echo "<script>alert('Something is wrong Please Try Again.');
                   window.location.href='../../login/client/vpay.php';
                   </script>";
        }
    }





      if(isset($_GET['dlttodo']))
      {
        $id = $_GET['dlttodo'];
        $stmt = $admin -> cud("DELETE FROM `cl_to_do_list` WHERE `cl_to_do_list`.`t_id` = '$id'","deleted");
        
        if($stmt)
        {
            echo "<script>alert('Deleted Successfully.');
                        window.location.href='../../login/client/index.php';
                    </script>";
        }
        else
        {
                    echo "<script>alert('Something Went Wrong Please Try Again.');
                       window.location.href='../../login/client/index.php';
                    </script>";
        }

      }




    ?>