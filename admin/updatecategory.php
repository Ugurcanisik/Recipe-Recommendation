<?php include 'header.php'; 



if(!$user->rights("category")){
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

				if($find = new Main(array("category","categoryid",$id))){


					if($find->counter()){
						
						$take=$find->data();

						if(Main::inputcheck("categoryupdate")){



							$update=$find->updatedata(array("update","updatecategory",$id),array("category","categoryid",$id),
								array(
									"categoryname"=>Main::inputbring("name"),
									"desk"=>Main::inputbring("desk")));

							if(!$update){
								// hata geliyor
							}



						}



					}else{
						Main::direct("index"); 
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
					<h2>Category Update</h2>
					
					<div class="clearfix"></div>
					

				</div>

				<div class="x_content">
					<br />
					<form class="form-horizontal form-label-left" action="" method="POST">

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > Name <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="name" value="<?php echo $take->categoryname ?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"> Desk <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="last-name" name="desk" value="<?php echo $take->desk ?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>

						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<input type="hidden" name="id" value="<?php echo $id ?>" >
								<input type="submit" name="categoryupdate" style="margin-left: 40%"  class="btn btn-success" value="Update">	
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>












</div>
<?php include 'footer.php'; ?>