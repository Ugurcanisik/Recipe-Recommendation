<?php include 'header.php'; 


if(!$user->rights("recipes")){
	if(!Session::check("alert")){
		Session::alert("alert","rights");
	}
	Main::direct("index"); 
}elseif(Main::inputcheck("addrecipes")){ //EN SON EKLİYOR MU DİYE BAK.



	$pictureway=DB::addpicture("img");

	

	$addrecipes = new Main();


	$add=$addrecipes->adddata(array("recipes","recipes"),array(
		"recipesname"=>Main::inputbring("name"),
		"recipespicture"=>$pictureway,
		"categoryid"=>Main::inputbring("category"),
		"recipesdescription"=>Main::inputbring("description"),
		"orders"=>Main::inputbring("orders")
	));



}




?>
<div class="right_col" role="main">


	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Recipes Add</h2>
					
					<div class="clearfix"></div>
					
				</div>

				<div class="x_content">
					<br />



					<form class="form-horizontal form-label-left" action="" method="POST" enctype="multipart/form-data">

						<div class="form-group" >
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > Recipes Picture <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="file"  style="width: 100%" name="picture"  class="form-control col-md-7 col-xs-12" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > Recipes name <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="name" class="form-control col-md-7 col-xs-12" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > Recipes Description  <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="description" class="form-control col-md-7 col-xs-12" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > Recipes Category <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select class="form-control col-md-7 col-xs-12" name="category" required>
									<?php 
									
									$category=new Main();

									$category->databring(array("category","all"));

									if($category->counter()){

										foreach ($category->data() as $key ) { ?>
											<option value="<?php echo $key->categoryid ?>"><?php echo $key->categoryname; ?></option>
											<?php		
										}

									}else{
										Main::direct("index");
									}

									?>
								</select>
							</div>
						</div>	
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > Recipes orders <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="number" id="first-name" name="orders"  class="form-control col-md-7 col-xs-12" required>
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

								<input type="submit" name="addrecipes" style="margin-left: 40%"  class="btn btn-success" value="Add">	
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>












</div>
<?php include 'footer.php'; ?>