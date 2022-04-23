<?php include 'header.php'; 


if(!$user->rights("settings")){
	if(!Session::check("alert")){
		Session::alert("alert","rights");
	}
	Main::direct("index"); 
}else{


	$settings = new Main();


	if(Main::inputcheck("updatesettings")){


		$update=$settings->updatedata(array("settings"),array("settings","settingsid","1"),array(
			"companyname"=>Main::inputbring("companyname"),
			"title"=>Main::inputbring("title"),
			"description"=>Main::inputbring("description"),
			"keywords"=>Main::inputbring("keywords"),
			"author"=>Main::inputbring("author"),
			"telephone"=>Main::inputbring("telephone"),
			"email"=>Main::inputbring("email"),
			"address"=>Main::inputbring("address"),
			"face"=>Main::inputbring("facebook"),
			"twitter"=>Main::inputbring("twitter"),
			"insta"=>Main::inputbring("instagram"),
			"google"=>Main::inputbring("google")
		));



		// if($update){ 

		// 	if(!Session::check("alert")){
		// 		Session::alert("alert","succesfull");
		// 	}


		// }elseif(!$update){ 
		// 	if(!Session::check("alert")){
		// 		Session::alert("alert","rights");
		// 	}
		// }

	}




}





$settings->databring(array("settings","all"));

$setwrite=$settings->data();

// print_r($setwrite);

// exit();




?>
<div class="right_col" role="main">


	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Settings</h2>
					
					<div class="clearfix"></div>
					
				</div>

				<div class="x_content">
					<br />


					<form class="form-horizontal form-label-left" action="" method="POST">


						<div class="form-group ">

							<label class="control-label col-md-3 " > Company Name <span class="required">*</span>
							</label>
							<div class="col-md-3 ">
								<input type="text" name="companyname" value="<?php echo $setwrite->companyname ?>" class="form-control " required>
							</div>
							<label class="control-label "> Title <span class="required">*</span>
							</label>
							<div class="col-md-3 ">
								<input type="text"  name="title" value="<?php echo $setwrite->title ?>"  class="form-control " required>
							</div>
						</div>


						<div class="form-group ">

							<label class="control-label col-md-3 "> Description <span class="required">*</span>
							</label>
							<div class="col-md-3 ">
								<input type="text" value="<?php echo $setwrite->description ?>"  name="description" class="form-control" required>
							</div>
							<label class="control-label "> Keywords <span class="required">*</span>
							</label>
							<div class="col-md-3 ">
								<input type="text"  name="keywords" value="<?php echo $setwrite->keywords ?>"  class="form-control " required>
							</div>
						</div>
						<div class="form-group ">

							<label class="control-label col-md-3 "> Author <span class="required">*</span>
							</label>
							<div class="col-md-3 ">
								<input type="text"  name="author" value="<?php echo $setwrite->author ?>" class="form-control " required>
							</div>
							<label class="control-label "> Telephone <span class="required">*</span>
							</label>
							<div class="col-md-3 ">
								<input type="text"  name="telephone" value="<?php echo $setwrite->telephone ?>"  class="form-control " required>
							</div>
						</div>
						<div class="form-group ">

							<label class="control-label col-md-3 "> Email <span class="required">*</span>
							</label>
							<div class="col-md-3 ">
								<input type="text"  name="email" value="<?php echo $setwrite->email ?>" class="form-control " required>
							</div>
							<label class="control-label "> Address <span class="required">*</span>
							</label>
							<div class="col-md-3 ">
								<input type="text"  name="address"  value="<?php echo $setwrite->address ?>" class="form-control " required>
							</div>
						</div>
						<div class="form-group ">

							<label class="control-label col-md-3 "> Facebook <span class="required">*</span>
							</label>
							<div class="col-md-3 ">
								<input type="text" name="facebook"  value="<?php echo $setwrite->face ?>" class="form-control " required>
							</div>
							<label class="control-label "> Twittter <span class="required">*</span>
							</label>
							<div class="col-md-3 ">
								<input type="text"  name="twitter"  value="<?php echo $setwrite->twitter ?>"  class="form-control " required>
							</div>
						</div>
						<div class="form-group ">

							<label class="control-label col-md-3 "> Instagram <span class="required">*</span>
							</label>
							<div class="col-md-3 ">
								<input type="text" name="instagram"   value="<?php echo $setwrite->insta ?>" class="form-control " required>
							</div>
							<label class="control-label "> Google <span class="required">*</span>
							</label>
							<div class="col-md-3 ">
								<input type="text"  name="google"  value="<?php echo $setwrite->google ?>" class="form-control " required>
							</div>
						</div>
						<div class="form-group ">

							<label class="control-label col-md-3 "> About <span class="required">*</span>
							</label>
							<div class="col-md-8 ">
								<textarea style="width: 612px; height: 200px"><?php echo $setwrite->about; ?></textarea>
							</div>
							
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

								<input type="submit" name="updatesettings" style="margin-left: 40%"  class="btn btn-success" value="Update">	

							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>












</div>
<?php include 'footer.php'; ?>