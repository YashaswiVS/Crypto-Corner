<?php

    define('DIR','../../');
    require_once DIR . 'config.php';
    $admin = new Admin();


    if(isset($_GET['stutus']) && $_GET['stutus'] == "Accepted" )
    {

        $stutus = $_GET['stutus'];
        $id = $_GET['id'];

             
        $stmt = $admin -> cud("UPDATE `auditedfiles` SET `stutus` = '$stutus' WHERE `auditedfiles`.`a_id` = '$id'  ","updated");
    
        if($stmt)
        {
          echo "<script>alert('File Status Changed to Accept Successfully.');
                  window.location.href='../../login/admin/verifyaf.php';
               </script>";
        }
        else
        {
               echo "<script>alert('Something Went Wrong.');
                  window.location.href='../../login/admin/verifyaf.php';
               </script>";
        }
    } 
    
    
    
    if(isset($_GET['stutus']) && $_GET['stutus'] == "Rejected" )
    {
        $stutus = $_GET['stutus'];
        $id = $_GET['id'];

             
        $stmt = $admin -> cud("UPDATE `auditedfiles` SET `stutus` = '$stutus' WHERE `auditedfiles`.`a_id` = '$id'  ","updated");
           
        if($stmt)
        {
               echo "<script>alert('File Status Changed to Reject  Successfully.');
                  window.location.href='../../login/admin/verifyaf.php';
               </script>";
        }
        else
        {
               echo "<script>alert('Something Went Wrong.');
                  window.location.href='../../login/admin/verifyaf.php';
               </script>";
        }
    }


    ?>