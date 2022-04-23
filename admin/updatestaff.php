<?php include 'header.php'; 



if(!$user->rights("staff")){
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

				$staff = new Main(array("staff","staffid",$id));

				if($staff->counter()){

					$staffwrite=$staff->data();

					if(Main::inputcheck("updatestaff")){

						// resim yok ise 

						if(empty($_FILES['picture']['name'])){

							$update=$staff->updatedata(array("update","updatestaff",$id),array("staff","staffid",$id),array(
								"staffname"=>Main::inputbring("name"),
								"staffsurname"=>Main::inputbring("surname"),
								"stafftitle"=>Main::inputbring("title"),
								"staffinsta"=>Main::inputbring("insta")
							));

							if(!$update){
								// hata
							}

						}elseif(isset($_FILES['picture']['name'])){

							// resim var ise

							$pictureway=DB::addpicture("img");

							$update=$staff->updatedata(array("update","updatestaff",$id),array("staff","staffid",$id),array(
								"staffpicture"=>$pictureway,
								"staffname"=>Main::inputbring("name"),
								"staffsurname"=>Main::inputbring("surname"),
								"stafftitle"=>Main::inputbring("title"),
								"staffinsta"=>Main::inputbring("insta")
							));

							// if(!$update){
							// 	// hata
							// }
							
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
					<h2>Staff Update</h2>

					<div class="clearfix"></div>
					
				</div>

				<div class="x_content">
					<br />


					<form class="form-horizontal form-label-left" action="" method="POST" enctype="multipart/form-data">


						<div class="form-group" style="margin-left: 12px;">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > Old Staff Picture <span class="required">*</span>
							</label>
							<img width="400px" height="160px" src="<?php echo $staffwrite->staffpicture; ?>"  />
						</div>


						<div class="form-group" >
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="resim"> Staff Picture <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="file"  style="width: 100%" name="picture"  class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"> Staff Name <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="name" value="<?php echo $staffwrite->staffname ?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"> Staff Surname <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="surname" value="<?php echo $staffwrite->staffsurname ?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="urun_fiyat"> Staff Title <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="title" value="<?php echo $staffwrite->stafftitle ?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="urun_fiyat"> Staff İnstagram <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="insta" value="<?php echo $staffwrite->staffinsta ?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						

						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<input type="hidden" name="id" value="<?php echo $id ?>" >
								<input type="submit" name="updatestaff" style="margin-left: 40%"  class="btn btn-success" value="Update">	
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>












</div>
<?php include 'footer.php'; ?>