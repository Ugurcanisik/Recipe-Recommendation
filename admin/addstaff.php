<?php include 'header.php'; 


if(!$user->rights("staff")){
	if(!Session::check("alert")){
		Session::alert("alert","rights");
	}
	Main::direct("index"); 
}elseif(Main::inputcheck("addstaff")){



	$pictureway=DB::addpicture("img");

	

	$addstaff = new Main();


	$addstaff->adddata(array("staff","staff"),array(
		"staffname"=>Main::inputbring("name"),
		"staffsurname"=>Main::inputbring("surname"),
		"stafftitle"=>Main::inputbring("title"),
		"staffpicture"=>$pictureway,
		"staffinsta"=>Main::inputbring("insta")
	));


}




?>
<div class="right_col" role="main">


	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Staffs Add</h2>
					
					<div class="clearfix"></div>
					
				</div>

				<div class="x_content">
					<br />



					<form class="form-horizontal form-label-left" action="" method="POST" enctype="multipart/form-data">
						<div class="form-group" >
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > Staff Picture <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="file"  style="width: 100%" name="picture"  class="form-control col-md-7 col-xs-12" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > Staff name <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="name" class="form-control col-md-7 col-xs-12" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > Staff Surname  <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="surname" class="form-control col-md-7 col-xs-12" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > Staff title <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="title" class="form-control col-md-7 col-xs-12" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > Staff Insta <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="insta"  class="form-control col-md-7 col-xs-12" required>
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

								<input type="submit" name="addstaff" style="margin-left: 40%"  class="btn btn-success" value="Add">	
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>












</div>
<?php include 'footer.php'; ?>