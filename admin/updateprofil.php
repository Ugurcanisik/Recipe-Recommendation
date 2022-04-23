<?php include 'header.php'; 



if(Main::inputcheck("userprofilupdate")){


	$update=$user->userupdate(array("userprofil",$userr->usersalt),array(
		"username"=>Main::inputbring("name"),
		"usersurname"=>Main::inputbring("surname"),
		"usermail"=>Main::inputbring("email")));

	// if(!$update){
	// 	// sweat alert gelecek buraya!!

	// }

}


?>
<div class="right_col" role="main">


	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Profile Update</h2>

					<div class="clearfix"></div>
					
				</div>

				<div class="x_content">
					<br />
					<form class="form-horizontal form-label-left" action="" method="POST">

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > name <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="name" value="<?php echo $userr->username ?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > surname <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="last-name" name="surname" value="<?php echo $userr->usersurname ?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > Email <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="email" value="<?php echo $userr->usermail ?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>	
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="yetki"> rights <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" class="form-control" value="<?php echo $user->rightsname(); ?>" name="yetki" disabled>
							</div>
						</div>	

						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<input type="submit" name="userprofilupdate" style="margin-left: 40%"  class="btn btn-success" value="Update">	
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>

</div>
<?php include 'footer.php'; ?>