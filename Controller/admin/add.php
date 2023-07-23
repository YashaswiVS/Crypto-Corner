<?php

    define('DIR','../../');
    require_once DIR . 'config.php';
    $admin = new Admin();

															
    if(isset($_POST['addemp']))
    {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $name = $_POST['name'];
        $add = $_POST['address'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];
        $roll = "e";


        $type = $_FILES['propic']['type'];
        if($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg")
        {

            $tartget_dir = "profilePics/";
            $proloc = $tartget_dir . basename($_FILES['propic']['name']);
            move_uploaded_file($_FILES['propic']['tmp_name'],$proloc);

            $stmt = $admin -> ret("SELECT `email_id` FROM `employee` WHERE `email_id` = '$email'");
         
            $num = $stmt -> rowcount();
            if($num>0)
            {
                echo "<script>alert('Employee is aleady Registered');
                window.location.href='../../login/admin/addemp.php';
                </script>";
            }
            else
            {
                $stmt = $admin -> cud("INSERT INTO `employee` (`name`, `email_id`, `address`,
                 `phone`, `date`, `gender`, `pro_pic` ,`r_date`) VALUES ('".$name."','".$email."','".$add."','".$phone."','".$date."','".$gender."','".$proloc."',NOW())","saved");

                if($stmt)
                {                    
                    $hpass = password_hash($pass,PASSWORD_BCRYPT);
                    
                    $admin -> cud("INSERT INTO `login` ( `name`,`email`, `password`, `roll`, `created_at`) VALUES ('".$name."','".$email."','".$hpass."','".$roll."',NOW())","saved");

                   echo "<script>window.location.href='../../mailer/mail.php?email=$email&pass=$pass&roll=$roll&name=$name';
                 </script>";
                }
                else
                {
                    echo "<script>alert('Something Went Wrong');
                        window.location.href='../../login/admin/addemp.php';
                    </script>";
                }
            }
            
        }
        else
        {
             echo "<script>alert('Please Select Image File in JPEG, PNG, JPG.');
                    window.location.href='../../login/admin/addemp.php';
                </script>";
        }
    }





     if(isset($_POST['addclient']))
    {

        $email = $_POST['email'];
        $pass = $_POST['password'];
        $name = $_POST['name'];
        $oadd = $_POST['oadress'];
        $add = $_POST['address'];
        $oname = $_POST['oname'];
        $gnum = $_POST['gnum'];
        $phone = $_POST['phone'];
        $roll="c";


        $type = $_FILES['propic']['type'];
        if($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg")
        {

            $tartget_dir = "profilePics/";
            $proloc = $tartget_dir . basename($_FILES['propic']['name']);
            move_uploaded_file($_FILES['propic']['tmp_name'],$proloc);

            $stmt = $admin -> ret("SELECT `email` FROM `clients` WHERE  `email` = '$email' ");

            $num = $stmt -> rowcount();
            
            if($num>0)
            {
                    echo "<script>alert('Client is aleady Registered');
                    window.location.href='../../login/admin/addcl.php';
                    </script>";
            }
            else
            {
                $stmt = $admin -> cud("INSERT INTO `clients` ( `name`, `email`, `address`, `o_name`, `o_address`, `GSTno`, `ph`,`profile_pic`,`c_date`) VALUES
                    ('".$name."','".$email."','".$add."','".$oname."','".$oadd."','".$gnum."','".$phone."','".$proloc."',NOW())","saved");
                
                    if($stmt)
                    {
                        $hpass = password_hash($pass,PASSWORD_BCRYPT);

                        $admin -> cud("INSERT INTO `login` ( `name`,`email`, `password`, `roll`, `created_at`) VALUES ('".$name."','".$email."','".$hpass."','".$roll."',NOW())","saved");
                    
                        echo "<script>window.location.href='../../mailer/mail.php?email=$email&pass=$pass&roll=$roll&name=$name';
                             </script>";
                    }
                    else
                    {
                        echo "<script>alert('Something Went Wrong');
                            window.location.href='../../login/admin/addcl.php';
                        </script>";
                    }                    
            }
        }
        else
        {
             echo "<script>alert('Please Select Image File in JPEG, PNG, JPG.');
                    window.location.href='../../login/admin/addcl.php';
                </script>";
        }               
    }






    if(isset($_POST['asscltoemp']))
    {
        $e_id = $_POST['emp_id'];
        $c_id = $_POST['cl_id'];

        $stmt = $admin -> ret("SELECT * FROM `assignclienttoemp` WHERE `cl_id` = '$c_id'");
    
        $num = $stmt -> fetch(PDO::FETCH_ASSOC);

        if($num > 0)
        {
            echo "<script>alert('Employee is already assigned to this client.');
                        window.location.href='../../login/admin/asscltoemp.php';
                  </script>";
        }
        else
        {                        
            $stmt = $admin -> cud("INSERT INTO `assignclienttoemp` ( `emp_id`, `cl_id`) VALUES  ('".$e_id."','".$c_id."')","saved");
        
            if($stmt)
            {
                echo "<script>alert('Successfully Assigned.');
                        window.location.href='../../login/admin/asscltoemp.php';
                       </script>";

            }
            else
            {          
                echo "<script>alert('Something Went Wrong');
                        window.location.href='../../login/admin/asscltoemp.php';
                      </script>";

            }
        }

    }





        if(isset($_POST['addflilecatt']))
        {

            $cat = $_POST['cat'];
            $desc = $_POST['desc'];

            $stmt = $admin -> ret("SELECT * FROM `file_category` WHERE `cat_name` = '$cat'");
            
            $num = $stmt -> rowCount();
            
            if($num > 0)
            {

                echo "<script>alert('File category is already added.');
                    window.location.href='../../login/admin/filecat.php';
                    </script>";

            }
            else
            {
                $stmt = $admin -> cud("INSERT INTO `file_category` ( `cat_name`, `description`, `c_date`) VALUES ('".$cat."','".$desc."',NOW())","saved");
                
                if($stmt)
                {
                    echo "<script>alert('File category is added successfully.');
                            window.location.href='../../login/admin/filecat.php';
                        </script>";
                }
                else
                {
                    echo "<script>alert('Something Went Wrong.');
                            window.location.href='../../login/admin/filecat.php';
                        </script>";
                }
            }

        }




        if(isset($_POST['rep']))
        {
            $q_id = $_POST['qid'];
            $c_id = $_POST['cid'];
            $message = $_POST['message'];
                    
            $stmt = $admin -> cud("INSERT INTO `replay` ( `q_id`, `c_id`, `message`, `date`) VALUES ('".$q_id."','".$c_id."','".$message."',NOW())","saved");
        
            if($stmt)
            {
                echo "<script>alert('Replied Succussfully.');
                            window.location.href='../../login/admin/query.php';
                        </script>";
            }
            else
            {
                echo "<script>alert('Something Went Wrong.');
                            window.location.href='../../login/admin/query.php';
                        </script>";
            }
                        
        }





    if(isset($_POST['empmsgrep']))
    {
        $m_id = $_POST['mid'];
        $e_id = $_POST['eid'];
        $message = $_POST['message'];
                    
        $stmt = $admin -> cud("INSERT INTO `emp_message_reply` (`e_id`, `m_id` ,`message_replay`, `mr_date`) VALUES
                                                                ('".$e_id."','".$m_id."','".$message."',NOW())","saved");
        if($stmt)
        {
            echo "<script>alert('Replied Succussfully.');
                            window.location.href='../../login/admin/fromemessges.php';
                        </script>";
        }
        else
        {
            echo "<script>alert('Something Went Wrong.');
                            window.location.href='../../login/admin/fromemessges.php';
                        </script>";
        }
    }
                    




    if(isset($_POST['clmsgrep']))
    {
        $m_id = $_POST['mid'];
        $c_id = $_POST['cid'];
        $message = $_POST['message'];
                    
        $stmt = $admin -> cud("INSERT INTO `cl_message_reply` (`m_id`, `c_id`, `message_replay`, `mr_date`) VALUES
                                                                ('".$m_id."','".$c_id."','".$message."',NOW())","saved");
        if($stmt)
        {
            echo "<script>alert('Replied Succussfully.');
                           window.location.href='../../login/admin/fromcmessges.php';
                    </script>";
        }
        else
        {
            echo "<script>alert('Something Went Wrong.');
                           window.location.href='../../login/admin/fromcmessges.php';
                </script>";
        }
    }





    if(isset($_POST['empmsg']))
    {
        $e_id = $_POST['emp_id'];
        $message = $_POST['message'];
                    
        $stmt = $admin -> cud("INSERT INTO `msg_from_admin_to_emp` (`e_id`, `message`, `date`) VALUES 
                                                                ('".$e_id."','".$message."',NOW())","saved");
        if($stmt)
        {
            
            echo "<script>alert('Message Sent Successfully.');
                           window.location.href='../../login/admin/sendmessges.php';
                    </script>";
        }
        else
        {
            echo "<script>alert('Something Went Wrong.');
                           window.location.href='../../login/admin/sendmessges.php';
                        </script>";
        }
    } 





    if(isset($_POST['clmsg']))
    {
        $c_id = $_POST['cl_id'];
        $message = $_POST['message'];
                    
        $stmt = $admin -> cud("INSERT INTO `msg_from_admin_to_cl` (`c_id`, `message`, `date`) VALUES 
                                                                ('".$c_id."','".$message."',NOW())","saved");
        if($stmt)
        {
            echo "<script>alert('Message Sent Successfully.');
                           window.location.href='../../login/admin/sendmessges.php';
                        </script>";
        }
        else
        {
            echo "<script>alert('Something Went Wrong.');
                           window.location.href='../../login/admin/sendmessges.php';
                        </script>";
        }                     
    }  

                



    if(isset($_POST['addnewTodo']))
    {
        $tname = $_POST['tname'];
        $tdesc = $_POST['tdesc'];
        $tdate = $_POST['tdate'];
                    
        $stmt = $admin -> cud("INSERT INTO `to_do_list` (`todo_name`, `to_do_desc`, `date`) VALUES
                                                                ('".$tname."','".$tdesc."','".$tdate."')","saved");
        if($stmt)
        {
            echo "<script>alert('New TODO List Added Successfully.');
                           window.location.href='../../login/admin/index.php';
                        </script>";
        }
        else
        {
            echo "<script>alert('Something Went Wrong.');
                          window.location.href='../../login/admin/index.php';
                        </script>";
        }
    }

?>