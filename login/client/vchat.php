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
        
                <a href="chat.php" class="btn btn-primary">Go Back</a>
              
                                    <div class="container">
                                        <div class="">
                                            <div class="panel">
                                                <!--Heading-->
                                                <div class="panel-heading">
                                                    <div class="panel-control">
                                                        
                                                    </div>
                                                    <h3 class="panel-title"></h3>
                                                </div>
                                        
                                                <!--Widget body-->
                                                <div id="demo-chat-body" class="collapse in">
                                                    <div class="nano has-scrollbar" style="height:380px">
                                                        <div class="nano-content pad-all" tabindex="0" style="right: -17px;">
                                                            <ul class="list-unstyled media-block">
                                                            
                                                            <?php 

                                                            $recid = $_GET['recid'];
                                                           
                                                            $astmt = $admin -> ret("SELECT * FROM `seeker` WHERE `id` = '$sid'");
                                                            $arow = $astmt -> fetch(PDO::FETCH_ASSOC);

                                                            $bstmt = $admin -> ret("SELECT * FROM `recruter_details` WHERE `rd_id` = '$recid' ORDER BY `name` ASC");
                                                            $brow = $bstmt -> fetch(PDO::FETCH_ASSOC);
                                                        
                                                                $stmt = $admin -> ret("SELECT * FROM `chats` WHERE `seeker_id` = '$sid' AND `rec_id` = '$recid'");
                                                                while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){ 
                                                        ?>
                                                            <?php
                                                            if($row['from'] == "Recruter"){ 
                                                            ?>
                                                                <li class="mar-btm">
                                                                    <div class="media-left">
                                                                        <img src="Controller/<?= $arow['profile_pic']?>" class="img-circle img-sm" alt="Profile Picture">
                                                                    </div>
                                                                    <div class="media-body pad-hor">
                                                                        <div class="speech">
                                                                         <a href="#" class="media-heading"><?= $brow['name']?></a>
                                                                             
                                                                            <p><?= $row['chat']?></p>
                                                                            <p class="speech-time">
                                                                                <i class="fa fa-clock-o fa-fw"></i> <?= $row['c_date']?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            <?php } ?>
                                                            <?php
                                                            if($row['from'] == "seeker"){ 
                                                            ?>
                                                                <li class="mar-btm">
                                                                    <div class="media-right">
                                                                        <img src="Controller/<?= $brow['profile_pic']?>" class="img-circle img-sm" alt="Profile Picture">
                                                                    </div>
                                                                    <div class="media-body pad-hor speech-right">
                                                                        <div class="speech">
                                                                           <a href="#" class="media-heading"><?= $arow['f_name'] ." ".$arow['l_name'] ?></a>
                                                                          
                                                                            <p><?= $row['chat']?></p>
                                                                            <p class="speech-time">
                                                                                <i class="fa fa-clock-o fa-fw"></i> <?= $row['c_date']?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <?php } ?>
                                                                <?php
                                                                }
                                                                ?>
                                                                
                                                            </ul>
                                                        </div>
                                                    <div class="nano-pane"><div class="nano-slider" style="height: 141px; transform: translate(0px, 0px);"></div></div></div>
                                        
                                                    <!--Widget footer-->
                                                    <div class="panel-footer">
                                                         <form action="Controller/chat.php" method="post">
                                                        <div class="row">
                                                       
                                                            <div class="col-xs-9">
                                                            <input type="hidden" name="recid" value="<?= $recid?>">
                                                                <input type="text" name="msg" placeholder="Enter your text" class="form-control chat-input">
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <button class="btn btn-primary btn-block" type="submit" name="fromseekerchat1">Send</button>
                                                            </div>
                                                           
                                                        </div>
                                                         </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
                                    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">


<style type="text/css">

.panel {
    box-shadow: 0 2px 0 rgba(0,0,0,0.075);
    border-radius: 0;
    border: 0;
    margin-bottom: 24px;
}
.panel .panel-heading, .panel>:first-child {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.panel-heading {
    position: relative;
    height: 50px;
    padding: 0;
    border-bottom:1px solid #eee;
}
.panel-control {
    height: 100%;
    position: relative;
    float: right;
    padding: 0 15px;
}
.panel-title {
    font-weight: normal;
    padding: 0 20px 0 20px;
    font-size: 1.416em;
    line-height: 50px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.panel-control>.btn:last-child, .panel-control>.btn-group:last-child>.btn:first-child {
    border-bottom-right-radius: 0;
}
.panel-control .btn, .panel-control .dropdown-toggle.btn {
    border: 0;
}
.nano {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
}
.nano>.nano-content {
    position: absolute;
    overflow: scroll;
    overflow-x: hidden;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}
.pad-all {
    padding: 15px;
}
.mar-btm {
    margin-bottom: 15px;
}
.media-block .media-left {
    display: block;
    float: left;
}
.img-sm {
    width: 46px;
    height: 46px;
}
.media-block .media-body {
    display: block;
    overflow: hidden;
    width: auto;
}
.pad-hor {
    padding-left: 15px;
    padding-right: 15px;
}
.speech {
    position: relative;
    background: #b7dcfe;
    color: #317787;
    display: inline-block;
    border-radius: 0;
    padding: 12px 20px;
}
.speech:before {
    content: "";
    display: block;
    position: absolute;
    width: 0;
    height: 0;
    left: 0;
    top: 0;
    border-top: 7px solid transparent;
    border-bottom: 7px solid transparent;
    border-right: 7px solid #b7dcfe;
    margin: 15px 0 0 -6px;
}
.speech-right>.speech:before {
    left: auto;
    right: 0;
    border-top: 7px solid transparent;
    border-bottom: 7px solid transparent;
    border-left: 7px solid #ffdc91;
    border-right: 0;
    margin: 15px -6px 0 0;
}
.speech .media-heading {
    font-size: 1.2em;
    color: #317787;
    display: block;
    border-bottom: 1px solid rgba(0,0,0,0.1);
    margin-bottom: 10px;
    padding-bottom: 5px;
    font-weight: 300;
}
.speech-time {
    margin-top: 20px;
    margin-bottom: 0;
    font-size: .8em;
    font-weight: 300;
}
.media-block .media-right {
    float: right;
}
.speech-right {
    text-align: right;
}
.pad-hor {
    padding-left: 15px;
    padding-right: 15px;
}
.speech-right>.speech {
    background: #ffda87;
    color: #a07617;
    text-align: right;
}
.speech-right>.speech .media-heading {
    color: #a07617;
}
.btn-primary, .btn-primary:focus, .btn-hover-primary:hover, .btn-hover-primary:active, .btn-hover-primary.active, .btn.btn-active-primary:active, .btn.btn-active-primary.active, .dropdown.open>.btn.btn-active-primary, .btn-group.open .dropdown-toggle.btn.btn-active-primary {
    background-color: #579ddb;
    border-color: #5fa2dd;
    color: #fff !important;
}
.btn {
    cursor: pointer;
    /* background-color: transparent; */
    color: inherit;
    padding: 6px 12px;
    border-radius: 0;
    border: 1px solid 0;
    font-size: 11px;
    line-height: 1.42857;
    vertical-align: middle;
    -webkit-transition: all .25s;
    transition: all .25s;
}
.form-control {
    font-size: 11px;
    height: 100%;
    border-radius: 0;
    box-shadow: none;
    border: 1px solid #e9e9e9;
    transition-duration: .5s;
}
.nano>.nano-pane {
    background-color: rgba(0,0,0,0.1);
    position: absolute;
    width: 5px;
    right: 0;
    top: 0;
    bottom: 0;
    opacity: 0;
    -webkit-transition: all .7s;
    transition: all .7s;
}
</style>


          </div>
    </section>
    <!-- ***** Features Item End ***** -->
   
    <!-- ***** Footer Start ***** -->
    <?php include 'include/footer.php'; ?>
  </body>
</html>