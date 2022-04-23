<?php 


spl_autoload_register(function($class){

  require_once 'admin/class/'.$class.'.php';
});

session_start();


if(Session::check("users")){
  Main::direct("index");
}


if(Main::inputcheck("login")){



  $user= new User();
  $try=$user->login(Main::inputbring("username"),Main::inputbring("password"));


  
  // if(!$try){


  //   echo "id veya pw hatalı";


  // }


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

  <title>Fo & Co</title>

  <!-- Bootstrap -->
  <link href="admin/public/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="admin/public/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="admin/public/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="admin/public/vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="admin/public/build/css/custom.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="admin/public/style.css">
  <!-- my start -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
  <!-- my end -->
</head>


<body class="login" background="images/slider-03.jpg">




  <?php 

  if(Session::check("alert")){

    $alert = Session::alert("alert");

    switch ($alert) {

      case 'fault':    
      ?>
      <script type="text/javascript">
        iziToast.warning({
          title: 'Warning',
          message: 'id pw hatalı',
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















  <div>


    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form action="" method="POST">
            <h1>Login Form</h1>
            <div>
              <input type="text" class="form-control" name="username" placeholder="Username" required="" />
            </div>
            <div>
              <input type="password" class="form-control" name="password" placeholder="Password" required="" />
            </div>
            <div>
              <input type="submit" style="margin-left:145px;" class="btn btn-primary" name="login" value="Log in">

            </div>

            <div class="clearfix"></div>

          </form>
        </section>
      </div>


    </div>
  </div>
</body>
</html>
