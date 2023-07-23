<?php

   define('DIR','../../');
    require_once DIR . 'config.php';
    $admin = new Admin();



 if(isset($_GET['dltrep']))
 {
      $id = $_GET['dltrep'];
       
      $stmt = $admin -> cud("DELETE FROM `emp_message_reply` WHERE `emp_message_reply`.`mr_id` = '$id'","saved");
      if($stmt)
      {
           echo "<script>alert('Deleted Successfully.');
              window.location.href='../../login/employe/replayfa.php';
           </script>";
      }
      else
      {
           echo "<script>alert('Something Went Wrong.');
              window.location.href='../../login/employe/replayfa.php';
           </script>";
      }
  } 



        if(isset($_GET['dlttodo']))
        {
            $id = $_GET['dlttodo'];
            $stmt = $admin -> cud("DELETE FROM `emp_to_do_list` WHERE `emp_to_do_list`.`t_id` = '$id'","deleted");
          
          if($stmt)
          {
            echo "<script>alert('Deleted Successfully.');
                        window.location.href='../../login/employe/index.php';
                    </script>";
          }
          else
          {
                    echo "<script>alert('Something Went Wrong Please Try Again.');
                       window.location.href='../../login/employe/index.php';
                    </script>";
          }
        }
?>