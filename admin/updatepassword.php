<?php include 'header.php'; 

if(Main::inputcheck("userpasupdate")){




	if($userr->userpassword==md5(Main::inputbring("current_password"))){


		if(Main::inputbring("new_pas")==Main::inputbring("new_pas_again")){

			$pasupdate=$user->userupdate(array("pasupdate",$userr->usersalt),array(
				"userpassword"=>md5(Main::inputbring("new_pas"))));

			// if(!$pasupdate){

			// }
		}else{
			// pw tekrar hatalı
		}


	}else{
		// mecut pw hatalı
	}

	
	
	
	




}


?>
<div class="right_col" role="main">


	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Password Update</h2>
					<div class="clearfix"></div>
					
				</div>

				<div class="x_content">
					<br />
					<form class="form-horizontal form-label-left" action="" method="POST">

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > current password <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="current_password" class="form-control col-md-7 col-xs-12" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > New Password <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="last-name" name="new_pas" class="form-control col-md-7 col-xs-12" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > new Password Again  <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="new_pas_again"  class="form-control col-md-7 col-xs-12" required>
							</div>
						</div>	
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<input type="submit" name="userpasupdate" style="margin-left: 40%"  class="btn btn-success" value="Update">	
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>












</div>
<?php include 'footer.php'; ?>