<?php include 'header.php'; 


if(!$user->rights("category")){
	if(!Session::check("alert")){
		Session::alert("alert","rights");
	}
	Main::direct("index"); 
}elseif(Main::inputcheck("addcategory")){


	$addcategory = new Main();

	$try=$addcategory->adddata(array("category","category"),array(
		"categoryname"=>Main::inputbring("name"),
		"desk"=>Main::inputbring("desk")
	));



	
}




?>
<div class="right_col" role="main">


	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Add Category</h2>
					
					<div class="clearfix"></div>
					
				</div>

				<div class="x_content">
					<br />
					<form class="form-horizontal form-label-left" action="" method="POST">

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ad"> Name <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="name" class="form-control col-md-7 col-xs-12" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="soyad"> Desk <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="last-name" name="desk"  class="form-control col-md-7 col-xs-12" required>
							</div>
						</div>


						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

								<input type="submit" name="addcategory" style="margin-left: 40%"  class="btn btn-success" value="Add">	

							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>












</div>
<?php include 'footer.php'; ?>