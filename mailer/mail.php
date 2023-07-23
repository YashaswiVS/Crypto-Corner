<?php

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';
                                                                                                                                                        
require 'vendor/autoload.php';

define('DIR','../');
require_once DIR . 'config.php';
$admin = new Admin();

$mail = new PHPMailer(true);

try 
{
    //Server settings Signed out

    $mail->isSMTP();         // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'cryptocorner2021aloysius@gmail.com';                     // SMTP username
    $mail->Password   = 'lvxaonfbbgvqvsdl';                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $roll = "";
    if(isset($_GET['roll']))
    {
        $roll = $_GET['roll'];
    }
 

    if($roll == "e")
    {

        $email=$_GET['email'];
        $pass=$_GET['pass'];
        $name=$_GET['name'];
        
    //Recipients
        $mail->setFrom('cryptocorner2021aloysius@gmail.com');
        $mail->addAddress($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your Crypto-Corner Login Credentials ';
        $mail->Body    = '<h2>Hello '.$name.'</h2>Your Login Credentials are<h3>Email-ID :- '.$email.'<br>Password :- '.$pass.'</h3>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if($mail->send())
        {
            echo "<script>alert('Adding Empolyee is Successfull.');
                window.location.href='../login/admin/addemp.php';
            </script>";

        }
        
    }



     if(isset($_GET['filupsuc']) && $_GET['filupsuc'] == 1){

       $id = $_SESSION['uid'];

         $stmt = $admin -> ret("SELECT * FROM `clients` WHERE `cl_id` = '$id'");
         $row = $stmt -> fetch(PDO::FETCH_ASSOC);
         $name = $row['name'];
         $email = $row['email'];
         $ph = $row['ph'];
         $oname = $row['o_name'];
            
        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('cryptocorner2021aloysius@gmail.com', 'Crypto corner');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'A File is Uploaded';
        $mail->Body    = '<h1>From :'.$oname.'</h1><h2>a File has been Uploaded.</h2>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if($mail->send()){

            echo "<script>alert('File Uploaded Succesfully.');
                window.location.href='../login/client/upfiles.php';
            </script>";

        }

        
     }
     if(isset($_GET['audfilupsuc']) && $_GET['audfilupsuc'] == 1){

       $id = $_SESSION['uid'];

         $stmt = $admin -> ret("SELECT * FROM `employee` WHERE `e_id` = '$id'");
         $row = $stmt -> fetch(PDO::FETCH_ASSOC);
         $name = $row['name'];
         $email = $row['email_id'];
        
            
        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('cryptocorner2021aloysius@gmail.com', 'Crypto corner');

        // Content
        $mail->isHTML(true);
        $mail->Subject = $name.' Has Uploaded Audited File';
        $mail->Body    = '<h1>Empoloyee ID : '.$id.' '.$name. ' has been uploaded Audited file please Verify the File.</h1><h2>Thank You.</h2>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if($mail->send()){

            echo "<script>alert('File Uploaded Succesfully.');
                window.location.href='../login/employe/aud.php';
            </script>";

        }

        
     }

    if($roll == "c")
    {

        $email=$_GET['email'];
        $pass=$_GET['pass'];
        $name=$_GET['name'];
        
    //Recipients
        $mail->setFrom('cryptocorner2021aloysius@gmail.com', 'Crypto corner');
        $mail->addAddress($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your Crypto Corner Login Credentials ';
        $mail->Body    = '<h2>Hello '.$name.'</h2>Your Login Credentials are<h3>Email-ID :- '.$email.'<br>Password :- '.$pass.'</h3><b>Thank You for Choosing Us.</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if($mail->send())
        {

        echo "<script>alert('Adding Client is Succussfull.');
                    window.location.href='../login/admin/addcl.php';
                </script>";
        }
    }

    
     //do if mail not send's
} 
catch (Exception $e) 
{

    echo "<script>alert('Somthing Went Wrong Please check Connection.');
    </script>";

    if($roll == "c")
    {
        $stmt = $admin -> cud("DELETE FROM `clients` WHERE `clients`.`email` = '$email'","deleted");
        
        if($stmt)
        {
            $stmt = $admin -> cud("DELETE FROM `login` WHERE `login`.`email` = '$email'","D");
            if($stmt)
            {
               echo "<script>
                        window.location.href='../login/admin/addcl.php';
                    </script>";
            }
        }

    }

    if($roll == "e")
    {
         $stmt = $admin -> cud("DELETE FROM `employee` WHERE `employee`.`email_id` = '$email'","deleted");
    
        if($stmt)
        {
            $stmt = $admin -> cud("DELETE FROM `login` WHERE `login`.`email` = '$email'","D");

            if($stmt)
            {
               echo "<script>
                       window.location.href='../login/admin/addemp.php';
                    </script>";
            }
        }
    }
}
?>
