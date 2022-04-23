
<?php 

spl_autoload_register(function($class){

  require_once 'class/'.$class.'.php';
});

session_start();
ob_start();

$user = new User();

// print_r($user->data());

// exit();

if(!Session::check("users")){

  Main::direct("login");

}elseif($user->rights("panel")){

  // {"panel":1,"user":1,"settings":1,"about":1,"slider":1,"recipes":1,"category":1}


  $userr=$user->data(); // dolaylı olarak fist() aldık data nin içine attık!!









}else{
 Main::direct("../index");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Gentelella Alela! | </title>

  <!-- Bootstrap -->
  <link href="public/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="public/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="public/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="public/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="public/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="public/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="public/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="public/build/css/custom.min.css" rel="stylesheet">
  <!-- my -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="public/js/main.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
  <!-- my end -->
  
</head>

<body class="nav-md">




  <?php 

  if(Session::check("alert")){

    $alert = Session::alert("alert");

    switch ($alert) {

      case 'rights':    
      ?>
      <script type="text/javascript">
        iziToast.warning({
          title: 'Warning',
          message: 'Access Restriction',
          position:'topCenter'
        });
      </script>
      <?php
      break;


      case 'succesfull':    
      ?>
      <script type="text/javascript">
       iziToast.success({
        title: 'OK',
        message: 'well done',
        position:'topCenter'
      });
    </script>
    <?php
    break;


    case 'unsuccesfull':    
    ?>
    <script type="text/javascript">
      iziToast.error({
        title: 'Error',
        message: 'Illegal operation',
        position:'topCenter'
      });
    </script>
    <?php
    break;

    case 'login':    
    ?>
    <script type="text/javascript">
     iziToast.success({
      title: 'OK',
      message: 'Successfully inserted record!',
      position:'topCenter'
    });
  </script>
  <?php
  break;
  
  default:
        # code...
  break;
}

}

?>

































<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
          <a href="/dinner/admin" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
          <div class="profile_pic">
            <img src="public/images/img.jpg" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info">
            <span>Welcome,</span>

            <h2><?php echo $userr->username; ?></h2>   <!-- user->data()->username -->

            <h2><?php echo $user->rightsname(); ?></h2>
          </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
              <li><a href="/dinner/admin"><i class="fa fa-home"></i> Home </a></li>

              <?php 



              if($user->rights("settings")){ ?>

                <li><a href="settings.php"><i class="fa fa-users"></i> Settings</a></li>


              <?php }  ?>
              <?php 



              if($user->rights("user")){ ?>

                <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="user.php">Users</a></li>
                    <li><a href="adduser.php">Add Users</a></li>
                  </ul>
                </li>


              <?php }  ?>

              <?php 

              if($user->rights("recipes")){ ?>

                <li><a><i class="fa fa-users"></i> Recipes <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="recipes.php">Recipes</a></li>
                    <li><a href="addrecipes.php">Add Recipes</a></li>
                  </ul>
                </li>


              <?php }  ?>


              <?php 

              if($user->rights("category")){ ?>

                <li><a><i class="fa fa-users"></i> Category <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="category.php">Category</a></li>
                    <li><a href="addcategory.php">Add Category</a></li>
                  </ul>
                </li>


              <?php }  ?>

              <?php 

              if($user->rights("staff")){ ?>

                <li><a><i class="fa fa-users"></i> Staff <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="staff.php">Staff</a></li>
                    <li><a href="addstaff.php">Add Staff</a></li>
                  </ul>
                </li>



              <?php }  ?>
              <?php 

              if($user->rights("comments")){ ?>

                <li><a href="comments.php"><i class="fa fa-users"></i> Comments </a></li>


              <?php }  ?>




            </ul>
          </div>


        </div>
        <!-- /sidebar menu -->


      </div>
    </div>

    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <nav>
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>

          <ul class="nav navbar-nav navbar-right">
            <li class="">
              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <img src="public/images/img.jpg" alt=""><?php echo $userr->username; ?>
                <span class=" fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
                <li><a href="updateprofil.php"> Profile</a></li>
                <li>
                  <a href="updatepassword.php">

                    <span>Chance Password</span>
                  </a>
                </li>

                <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
              </ul>
            </li>


          </ul>
        </nav>
      </div>
    </div>
        <!-- /top navigation -->