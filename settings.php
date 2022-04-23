<?php include 'header.php'; ?>



<?php 

if(Main::inputcheck("updatesettings")){



	$update=$user->userupdate(array("userprofilfront",$userview->usersalt),array(
		"username"=>Main::inputbring("name"),
		"usersurname"=>Main::inputbring("surname"),
		"usermail"=>Main::inputbring("email")
	));

	

	

}


?>



<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
	<div class="container text-center">
		<div class="row">
			<div class="col-lg-12">
				<h1>Settings</h1>
			</div>
		</div>
	</div>
</div>
<!-- End All Pages -->

<!-- Start Contact -->
<div class="contact-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="heading-title text-center">
					<h2>Settings</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<form  method="POST" action="">
					<div class="row">

						<div class="col-md-12">
							<div class="form-group">
								<input type="text" class="form-control" value="<?php echo $userview->username; ?>" id="name" name="name"  required >
								<div class="help-block with-errors"></div>
							</div>                                 
						</div>

						<div class="col-md-12">

							<div class="form-group">
								<input type="text" id="email" value="<?php echo $userview->usersurname; ?>" class="form-control" name="surname"  required >
								<div class="help-block with-errors"></div>
							</div> 
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<input type="text" id="email" value="<?php echo $userview->usermail; ?>"  class="form-control" name="email" required >
								<div class="help-block with-errors"></div>
							</div> 
						</div>

						<div class="col-md-12">
							
							<div class="submit-button text-center">
								<input type="submit" class="btn btn-common" id="submit" name="updatesettings" value="Update">
								<div class="clearfix"></div> 
							</div>
						</div>
					</div>            
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Contact -->






<?php include 'footer.php'; ?>

