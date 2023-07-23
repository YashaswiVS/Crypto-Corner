<?php include 'include/header.php'; ?>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">Job Portal<em>  </em></a>
                         <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php" >Home</a></li>
                            <li><a href="jobs.php">Jobs</a></li>
                            <li><a href="blog.php" >Blog</a></li>
                            <li><a href="about.php" >About</a></li>
                            <li><a href="contact.php" >Contact</a></li> 
                            <?php 
                            if(!isset($_SESSION['id'])){
                            ?>
                            <li><a href="" data-toggle="modal" data-target="#myModal">Login</a></li> 
                            <li><a href="register.php">Register</a></li> 
                            <?php
                            }else{ ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle active"  data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profile</a>
                              
                               <div class="dropdown-menu">
                                    <a class="dropdown-item" href="notification.php">Notification</a>
                                    <a class="dropdown-item" href="profile.php">Profile</a>
                                    <a class="dropdown-item" href="chat.php">Chats</a>
                                    <a class="dropdown-item" href="Controller/logout.php">Logout</a>
                                </div>
                            </li>
                           <?php }
                            ?>
                            
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>

     <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="Controller/logreg.php" method="post">
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" name="uname" placeholder="Enter Email-id or Username" id="">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="pass" placeholder="Enter Password" id="">
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" name="login" class="btn btn-success">Login</button>
        </div>
        </form>
        
      </div>
    </div>
  </div>
    <!-- ***** Header Area End ***** -->

    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2><em>Notification</em></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Features Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
        <br>
        <br>
            <div class="">
          <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th width="100">#</th>
                                    <th>From</th>
                                    <th>Chat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="catres">
                      
                                <?php
                                $i = 0;
                                $stmt = $admin -> ret("SELECT 	*,COUNT(*) FROM `chats` WHERE `seeker_id` = '$sid'
                                        GROUP BY `rec_id` 
                                        HAVING COUNT(*) >= 1 ORDER BY `c_id` DESC");
                                while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){ 
                                     $rec_id = $row['rec_id'];
                                    $astmt = $admin -> ret("SELECT * FROM `recruter_details` WHERE `rd_id` = '$rec_id'");
                                    $arow = $astmt -> fetch(PDO::FETCH_ASSOC);
                                ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td><?= $arow['name'] ?></td>
                                    <td><?= $row['chat'] ?></td>
                                    <td>
                                        <a href="vchat.php?recid=<?= $row['rec_id']?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                   </td>
                                </tr>
                               
                                <?php
                                } ?> 
                            </tbody>
                        </table>
                                <?php if($i == 0){ ?>
                                  
                                        <div class="alert alert-danger" role="alert">
                                          <center><b>No Records...</b></center>  
                                        </div>
                                   
                               <?php }
                                ?>
          </div>
    </section>
    <!-- ***** Features Item End ***** -->
   
    <!-- ***** Footer Start ***** -->
    <?php include 'include/footer.php'; ?>
  </body>
</html>