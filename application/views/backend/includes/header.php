<!DOCTYPE html>
<html>
    <head>
    <title>Administrator</title>
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="<?php echo base_url('assets/front/images/favicon.png');?>">
    <link rel="apple-touch-icon" href="<?php echo base_url('assets/front/images/favicon.png');?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <link href="<?php echo base_url('assets/backend/css/bootstrap-datetimepicker.min.css');?>" rel="stylesheet" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css').CSS_JS_VER;?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css').CSS_JS_VER;?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/themify-icons/css/themify-icons.css').CSS_JS_VER;?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/selectFX/css/cs-skin-elastic.css').CSS_JS_VER;?>">
    <link href="<?php echo base_url('assets/vendors/assets/css/select2.min.css').CSS_JS_VER;?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/backend/js/jquery-ui-1.12.1/jquery-ui.min.css').CSS_JS_VER;?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/assets/css/style.css').CSS_JS_VER;?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/pagination.css').CSS_JS_VER;?>">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- New Theme -->
    <script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js').CSS_JS_VER;?>"></script>
    <script src="<?php echo base_url('assets/vendors/popper.js/dist/umd/popper.min.js').CSS_JS_VER;?>"></script>
    <script src="<?php echo base_url('assets/vendors/popper.js/dist/umd/popper.min.js').CSS_JS_VER;?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/backend/js/pagination.js');?>" type="text/javascript"></script>

   
<style>

.loader {

  width: 60px;
  height: 60px;
  border: 3px dotted #FFF;
  border-radius: 50%;
  display: inline-block;
  position: relative;
  box-sizing: border-box;
  animation: rotation 2s linear infinite;
  background: #0f7643;

}

.loader::after {
  content: '';  
  box-sizing: border-box;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin: auto;
  border: 3px dotted #fbaf42;
  border-style: solid solid dotted;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  animation: rotationBack 1s linear infinite;
  transform-origin: center center;
}

    

@keyframes rotation {

  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }

} 

@keyframes rotationBack {

  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(-360deg);
  }

} 

</style>

</head>
    <body class="body">
        <aside id="left-panel" class="left-panel foo foo--inside">
        <nav class="navbar navbar-expand-lg navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/" target="_blnak"><img src="<?php echo base_url('assets/backend/images/logo.png');?>" alt="Logo"></a>
                <a class="navbar-brand hidden" href="/" target="_blnak"><img src="<?php echo base_url('assets/backend/images/logo.png');?>" alt="Logo"></a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                  
                    <?php if($this->session->userdata('b_role') == '1'){ ?>
                
                    
                    <?php } ?>
                   <!--  <li class="">
                        <a href="<?php echo base_url(BACKEND_FOLDER.'/enquiries');?>"> 
                            <i class="fa fa fa-user-secret"></i>
                            Enquiries
                        </a>
                    </li> -->
                   
                    <li class="">
                        <a href="<?php echo base_url(BACKEND_FOLDER.'/pages');?>"> 
                            <i class="menu-icon fa fa fa-gift"></i>
                            Pages
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url(BACKEND_FOLDER.'/blog-posts/categories');?>"> 
                            <i class="menu-icon fa fa fa-gift"></i>
                            Post Categories
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url(BACKEND_FOLDER.'/blog-posts');?>"> 
                            <i class="menu-icon fa fa fa-gift"></i>
                            Posts
                        </a>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url(BACKEND_FOLDER.'/orders');?>"> 
                            <i class="menu-icon fa fa fa-user"></i>
                            Orders
                        </a>
                    </li>
                    
                     <li class="">
                        <a href="<?php echo base_url(BACKEND_FOLDER.'/users');?>"> 
                            <i class="menu-icon fa fa fa-user"></i>
                            Student
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url(BACKEND_FOLDER.'/tutors');?>"> 
                            <i class="menu-icon fa fa fa-user"></i>
                            Tutors
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url(BACKEND_FOLDER.'/blog-stories');?>"> 
                            <i class="menu-icon fa fa fa-user"></i>
                            Stories
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url(BACKEND_FOLDER.'/blog-stories/categories');?>"> 
                            <i class="menu-icon fa fa fa-gift"></i>
                            Story Categories
                        </a>
                    </li>
                    
                </ul>
            </div>
        </nav>
    </aside>
    <div id="right-panel" class="right-panel">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12" style="position: fixed;left: 50%;top: 10px;z-index: 12;">
                <span class="loader" style="display:none"></span>
            </div>
        </div>
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-lg-5 col-md-5 col-12 column-6 order-2 order-md-1 lftHeader ">
                    <div class="header-left">
                       
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="loginUsers">
                        <ul id="active_user_list">
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-12 column-3 order-1 order-md-2">
                    <div class="user-area dropdown usrName">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  
                        <a class="nav-link" href="<?php echo base_url(BACKEND_FOLDER.'/profile/logout');?>" style="color:#fff;"><i class="fa fa-power-off"></i> Logout</a>
                            <!--<img class="user-avatar rounded-circle" src="<?php echo base_url('assets/backend/images/user.png');?>"><span><?php echo $this->session->userdata('portal_first_name');?> <?php echo $this->session->userdata('portal_last_name');?> </span>-->
                        </a>
                        <div class="user-menu dropdown-menu">
                           <!-- <a class="nav-link" href="javascript:void(0)"><b><?php echo $this->session->userdata('user_short_role');?> ID: <?php echo $this->session->userdata('portal_user_unique_id');?></b></a>
                            <a class="nav-link profile newLayoutcboxElement" href="<?php echo base_url(BACKEND_FOLDER.'/profile');?>"><i class="fa fa-user"></i> My Profile</a>
                            <a class="nav-link profile newLayoutcboxElement" href="<?php echo base_url(BACKEND_FOLDER.'/profile/change-password');?>"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a>              
                            <a class="nav-link" href="<?php echo base_url(BACKEND_FOLDER.'/profile/logout');?>"><i class="fa fa-power-off"></i> Logout</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </header>


 