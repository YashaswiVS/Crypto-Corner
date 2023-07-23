<?php 
    define('DIR','../');
    require_once DIR . 'config.php';
    $admin = new Admin();

    include 'encdec.php';

    $fid = $_GET['id'];

    $stmt = $admin -> ret("SELECT * FROM `files` WHERE `f_id` = '$fid'");
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    $file = $row['file'];
    $uid = $row['cl_id'];

    $fpath = "client/".$file;

    $dFile = substr($file , 12 , -4);
    



     $stmt = $admin -> ret("SELECT * FROM `clients` WHERE `cl_id` = '$uid'");
         $row = $stmt -> fetch(PDO::FETCH_ASSOC);

         $name = $row['name'];
         $email = $row['email'];
         $ph = $row['ph'];

         $name = substr($name,0,-3);
         $email = substr($email,4,-2);
         $ph = substr($ph,3,6);
         $key = $name.$ph.$email;
         
        $admin -> cud("UPDATE `files` SET `stutus` = 'downloaded' WHERE `files`.`f_id` = '$fid'","updated");
        
        $endecry = new AES_CBC();
        $stutus = $endecry -> decryptFile($key, $fpath, "downloads/".$dFile);
        if($stutus)
        {
            $f = "downloads/".$dFile; 
            if(file_exists($f)) 
            {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($f).'"');
                header('Expires: 0');
                header('Pragma: public');
                header('Content-Length: ' . filesize($f));
            //   Clear output buffer
            flush();
            readfile($f);
            unlink($f);
             exit();
            }
            else
            {
                echo "File not found.";
            }
        
        }

        
        
    // check if file exist in server
    


?>