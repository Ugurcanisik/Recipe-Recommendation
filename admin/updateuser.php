<?php include 'header.php'; 



if(!$user->rights("user")){
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

				if($userfind = new User($id)){


					if($userfind->counter()){
						
						$takeuser=$userfind->data();

						if(Main::inputcheck("userupdate")){
 // post ettikden sonra burası çalışıyor!!!


							$update=$user->userupdate(array("userupdate",Main::inputbring("id")),array(
								"username"=>Main::inputbring("name"),
								"usersurname"=>Main::inputbring("surname"),
								"usermail"=>Main::inputbring("email"),
								"userrights"=>Main::inputbring("rights")
							));

							// if(!$update){

							// }



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
					<h2>User Update</h2>
					
					<div class="clearfix"></div>
					

				</div>

				<div class="x_content">
					<br />
					<form class="form-horizontal form-label-left" action="" method="POST">

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > Name <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="name" value="<?php echo $takeuser->username ?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"> surname <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="last-name" name="surname" value="<?php echo $takeuser->usersurname ?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > Email <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="email" value="<?php echo $takeuser->usermail ?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>	
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > Rights <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">

								<select class="form-control col-md-7 col-xs-12" name="rights">
									

									<?php 

									$rights = new Main();

									$rights->databring(array("rights","all"));


									foreach ($rights->data() as $key) {

										if($takeuser->userrights==$key->rightsid){ ?>
											<option selected="" value="<?php echo $key->rightsid  ?>"><?php echo $key->rightsname; ?></option>

										<?php }else{ ?>
											<option  value="<?php echo $key->rightsid  ?>"><?php echo $key->rightsname; ?></option>
											<?php
										}
										
									}


									?>

								</select>
							</div>
						</div>	

						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<input type="hidden" name="id" value="<?php echo $id ?>" >
								<input type="submit" name="userupdate" style="margin-left: 40%"  class="btn btn-success" value="Update">	
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>












</div>
<?php include 'footer.php'; ?>