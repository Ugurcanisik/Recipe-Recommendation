<?php include 'header.php'; ?>



<?php 

if(Main::inputcheck("changepassword")){


	if($userview->userpassword==md5(Main::inputbring("currentpassword"))){


		if(Main::inputbring("newpassword")==Main::inputbring("newpasswordagain")){

			$pasupdate=$user->userupdate(array("pasupdatefront",$userview->usersalt),array(
				"userpassword"=>md5(Main::inputbring("newpassword"))));

			
		}else{
			// pw tekrar hatalı
		}


	}else{
		// mecut pw hatalı
	}

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
				<form method="POST" action="">
					<div class="row">

						<div class="col-md-12">
							<div class="form-group">
								<input type="text" class="form-control"  placeholder="current password" required  id="name" name="currentpassword"  >
								<div class="help-block with-errors"></div>
							</div>                                 
						</div>


						<div class="col-md-12">
							<div class="form-group">
								<input type="text" id="email"  placeholder="New password" required  class="form-control" name="newpassword"  >
								<div class="help-block with-errors"></div>
							</div> 
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<input type="text" id="email"  placeholder="New Password Again" required  class="form-control" name="newpasswordagain"  >
								<div class="help-block with-errors"></div>
							</div> 
						</div>

						<div class="col-md-12">
							
							<div class="submit-button text-center">
								<input type="submit" class="btn btn-common" id="submit" name="changepassword" value="Update">
								
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

