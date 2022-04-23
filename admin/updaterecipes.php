<?php include 'header.php'; 



if(!$user->rights("recipes")){
	if(!Session::check("alert")){
		Session::alert("alert","rights");
	}
	Main::direct("index"); 
}else{

	if(!Main::inputcheck(null,"get")){

		Main::direct("index");
	}else{

		$id=Main::inputbring("id");
		if(!$id){
			Main::direct("index");
		}else{
			$a=Main::getcheck($id);
			if($a){
				Main::direct("index");
			}else{

				$recipes = new Main(array("recipes","recipesid",$id));

				if($recipes->counter()){

					$recewrite=$recipes->data();

					if(Main::inputcheck("updaterecipes")){

						// resim yok ise 

						if(empty($_FILES['picture']['name'])){

							$update=$recipes->updatedata(array("update","updaterecipes",$id),array("recipes","recipesid",$id),array(
								"recipesname"=>Main::inputbring("name"),
								"categoryid"=>Main::inputbring("category"),
								"recipesdescription"=>Main::inputbring("description"),
								"orders"=>Main::inputbring("orders")
							));

							if(!$update){
								// hata
							}

						}elseif(isset($_FILES['picture']['name'])){

							// resim var ise

							$pictureway=DB::addpicture("img");

							$update=$recipes->updatedata(array("update","updaterecipes",$id),array("recipes","recipesid",$id),array(
								"recipespicture"=>$pictureway,
								"recipesname"=>Main::inputbring("name"),
								"categoryid"=>Main::inputbring("category"),
								"recipesdescription"=>Main::inputbring("description"),
								"orders"=>Main::inputbring("orders")
							));

							if(!$update){
								// hata
							}
							
						}

					}


					
				}else{

					Main::direct("index");

				}

			}
		}
	}
}
?>
<div class="right_col" role="main">


	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Recipes Update</h2>

					<div class="clearfix"></div>
					
				</div>

				<div class="x_content">
					<br />


					<form class="form-horizontal form-label-left" action="" method="POST" enctype="multipart/form-data">


						<div class="form-group" style="margin-left: 12px;">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > Old Recipes Picture <span class="required">*</span>
							</label>
							<img width="400px" height="160px" src="<?php echo $recewrite->recipespicture; ?>"  />
						</div>


						<div class="form-group" >
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="resim"> Recipes Picture <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="file"  style="width: 100%" name="picture"  class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"> Recipes Name <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="name" value="<?php echo $recewrite->recipesname ?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="urun_fiyat"> Recipes Description <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="description" value="<?php echo $recewrite->recipesdescription ?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="urun_kategori"> Recipes Category <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select class="form-control col-md-7 col-xs-12" name="category">
									<?php 

									$category = new Main();

									$category->databring(array("category","all"));
									
									if($category->counter()){

										
										foreach ($category->data() as $key) {							
											if($key->categoryid==$recewrite->categoryid){ ?>
												<option selected="" value="<?php echo $key->categoryid  ?>"><?php echo $key->categoryname; ?></option>

											<?php }else{ ?>
												<option value="<?php echo $key->categoryid  ?>"><?php echo $key->categoryname; ?></option>
												<?php
											}
											
										}

									}else{
										Main::direct("index");
									}
									
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"> orders <span class="required">*</span> <!-- //query -->
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="last-name" name="orders" value="<?php echo $recewrite->orders ?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>

						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<input type="hidden" name="id" value="<?php echo $id ?>" >
								<input type="submit" name="updaterecipes" style="margin-left: 40%"  class="btn btn-success" value="Update">	
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>












</div>
<?php include 'footer.php'; ?>