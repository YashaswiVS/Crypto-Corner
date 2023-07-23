<?php

   include '../encdec.php';
    define('DIR','../../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    $eid = $_SESSION['uid'];
    

    if(isset($_POST['uploadfile']))
    {

        $cl_id = $_POST['cl_id'];

         $stmt = $admin -> ret("SELECT * FROM `clients` WHERE `cl_id` = '$cl_id'");
         $row = $stmt -> fetch(PDO::FETCH_ASSOC);
         $name = $row['name'];
         $email = $row['email'];
         $ph = $row['ph'];

         $name = substr($name,0,-3);
         $email = substr($email,4,-2);
         $ph = substr($ph,3,6);
         $key = $name.$ph.$email;


        $ffname = $_POST['fname'];
        $fcid = $_POST['fcid'];

        $target_dir = "audFiles/";

        $fil_loc = $target_dir . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'],$fil_loc);

        $date = date("Y-M-d");

        $fname = basename($_FILES['file']['name']);
         $fsize = basename($_FILES['file']['size']);

     
        $filename = $cl_id. "-" . $ffname . "-" . $date . "-" . $fname;

        opendir($target_dir);

        rename($target_dir.$fname,$target_dir.$filename);

         $fil_loc = $target_dir . $filename  ;

        
        
        $endecry = new AES_CBC();
        $endecry -> encryptFile($key, $fil_loc, $fil_loc.".enc");
        unlink($fil_loc);
        $fil_loc = $fil_loc.".enc";
       
        

        function readableBytes($bytes)
         {
            $i = floor(log($bytes) / log(1024));
            $sizes = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');

            return sprintf('%.02F', $bytes / pow(1024, $i)) * 1 . ' ' . $sizes[$i];
         }  

         $fsize =  readableBytes($fsize);

         $stutus = "Pending";


        $stmt = $admin -> cud("UPDATE `auditedfiles` SET `stutus` = '$stutus' WHERE `auditedfiles`.`a_id` = '$id'  ","updated");
           

   
         $stmt = $admin -> cud("INSERT INTO `auditedfiles` ( `cl_id`, `emp_id`, `cat_id`, `aufname`, `aud_file`, `fsize`,`stutus` ,`date`) VALUES
         ('".$cl_id."','".$eid."','".$fcid."','".$ffname."','".$fil_loc."','".$fsize."','".$stutus."',NOW())","saved");

         if($stmt)
         {

           $admin -> redirect1('../../mailer/mail.php?audfilupsuc=1');

         }

         // $endecry -> decryptFile($key, $fil_loc.".enc", $fil_loc);

    }



?>