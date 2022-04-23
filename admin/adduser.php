<?php include 'header.php'; 


if(!$user->rights("user")){ //user yetkisi giriş yetkisi var mı
	if(!Session::check("alert")){
		Session::alert("alert","rights");
	}
	Main::direct("index"); 
}elseif(Main::inputcheck("adduser")){ //butondan bastığımızda çalışır.


	$salt=Main::salt();

	$user->adduser(array(
		"username"=>Main::inputbring("username"),
		"usersurname"=>Main::inputbring("usersurname"),
		"usermail"=>Main::inputbring("usermail"),
		"userpassword"=>md5(Main::inputbring("userpassword")),
		"usersalt"=>$salt,
		"userrights"=>Main::inputbring("useryetki")
	));




}




?>
<div class="right_col" role="main">


	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Add User</h2>
					
					<div class="clearfix"></div>
					
				</div>

				<div class="x_content">
					<br />
					<form class="form-horizontal form-label-left" action="" method="POST">

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ad"> user name <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="username" class="form-control col-md-7 col-xs-12" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="soyad"> Soyad <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="last-name" name="usersurname"  class="form-control col-md-7 col-xs-12" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"> Email <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="email" id="first-name" name="usermail"  class="form-control col-md-7 col-xs-12" required>
							</div>
						</div>	
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="parola"> Parola <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="userpassword"  class="form-control col-md-7 col-xs-12" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="yetki"> Yetki <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select class="form-control col-md-7 col-xs-12" name="useryetki" required>
									<?php 

									$rights = new Main();

									$rights->databring(array("rights","all")); //right tablosundaki all.
									
									
									if($rights->counter()){

										foreach ($rights->data() as $key ) { ?>
											<option value="<?php echo $key->rightsid ?>"><?php echo $key->rightsname; ?></option>
											<?php

										}
									}else{
										Main::direck("index");
									}
									?>



								</select>
							</div>
						</div>	

						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

								<input type="submit" name="adduser" style="margin-left: 40%"  class="btn btn-success" value="Add">	

							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>












</div>
<?php include 'footer.php'; ?>