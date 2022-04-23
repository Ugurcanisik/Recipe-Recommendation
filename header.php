
<?php 

spl_autoload_register(function($class){

	require_once 'admin/class/'.$class.'.php';
});





date_default_timezone_set('Europe/Istanbul'); 

session_start();
ob_start();

if(Session::check("users")){

	$user = new User(Session::bring("users"));

	if($user->counter()){
		$userview = $user->data();
	}



}





$settings = new Main();
$settings->databring(array("settings","all"));

$setwrite=$settings->data();



?>


<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">   

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Site Metas -->
	<title><?php echo $setwrite->title; ?></title>  
	<meta name="keywords" content="<?php echo $setwrite->keywords ?>">
	<meta name="description" content="<?php echo $setwrite->description ?>">
	<meta name="author" content="<?php echo $setwrite->author ?>">

	<!-- Site Icons -->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
	<link rel="stylesheet" href="css/style.css">    
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

	<!-- my start -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
	<script src="js/likemain.js"></script>
	<!-- my end -->

</head>

<body>



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
					message: 'Successfully inserted record!',
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



























	
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="/proje">
					<p style="color: red; font-size: 60px;">Fo&Co</p>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item "><a class="nav-link" href="/proje">Home</a></li> <!-- aktive özelliği -->
						<li class="nav-item"><a class="nav-link" href="recipes.php">Recipes</a></li>
						<li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
						<li class="nav-item"><a class="nav-link" href="staff.php">Staff</a></li>
						<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>

						<?php 


						if(Session::check("users")){ ?>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"><?php echo $userview->username; ?></a>
								<div class="dropdown-menu" aria-labelledby="dropdown-a">

									<?php 

									if($user->rights("panel")){ ?>
										<a class="dropdown-item" href="admin/" target="_blank">Yönetim Paneli</a>
									<?php } ?>



									<a class="dropdown-item" href="settings.php">Settings</a>
									<a class="dropdown-item" href="updatepassword.php">Chance Password</a>
									<a class="dropdown-item" href="logout.php">Logout</a>
									<!-- <a class="dropdown-item" href="gallery.html">Gallery</a> -->
								</div>
							</li>
						<?php	}else{  ?>

							<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
							<li class="nav-item"><a class="nav-link" href="signup.php">Sign Up</a></li>
						<?php	}  ?>




					</ul>


				</div>

			</div>

			<?php 

			if(Main::inputcheck("recipes")){
				$name =  Main::inputbring("search");



				$search = new Main();

				$search->databring(array("recipes","query","recipesname","=",$name));


				if($search->counter()){

					$id=$search->data()->recipesid;
					


					// echo "location:receips-details.php?id=$id";



					header("location:recipes-details.php?id=$id");






				}else{

				}
			}


			?>


			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-8 col-2 blog-sidebar" style="margin-right: 50px">
				<form action="" method="POST">
					<div class="right-side-blog">
						<h3>Search</h3>
						<div class="blog-search-form">
							<input name="search" placeholder="Search blog" type="text">
							<button class="search-btn" name="recipes" type="submit" value="recipes">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
			
		</nav>

	</header>

	<!-- End header -->