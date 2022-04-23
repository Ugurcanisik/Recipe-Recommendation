<?php include 'header.php';

if(!$user->rights("user")){ 			// admin hariç girişi engelledik !!!!
	if(!Session::check("alert")){
		Session::alert("alert","rights");
	}
	Main::direct("index");
}

?>

<div class="right_col" role="main">

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Users</small></h2>
				
				<div class="clearfix"></div>
				<p>

				</p>
			</div>
			<div class="x_content">
				
				<table id="datatable" class="table table-striped table-bordered">
					<thead>
						<tr>

							<th style="text-align: center;">Name</th>
							<th style="text-align: center;">Surname</th>
							<th style="text-align: center;">Email</th>
							<th style="text-align: center;">Rights</th>

							<th style="text-align: center;">Update</th>
							<th style="text-align: center;">Delete</th>
						</tr>
					</thead>


					<tbody>
						
						<?php 

						$userData = new Main();

						$userData->databring(array("users","all"));



						if($userData->counter()){




							
							foreach ($userData->data() as $key) {

								if($userr->usermail==$key->usermail){
									
									continue;

								}else{ ?>
									<tr id="<?php echo $key->userid; ?>">
										<td style="text-align: center;"><?php echo $key->username; ?></td>
										<td style="text-align: center;" ><?php echo $key->usersurname;  ?> </td>
										<td style="text-align: center;" ><?php echo $key->usermail ?> </td>
										
										<?php 

										$rights = new Main();

										$rights->databring(array("rights","query","rightsid","=",$key->userrights));



										?>
										<td style="text-align: center;"><?php echo $rights->data()->rightsname;  ?></td>

										<td style="text-align: center;" ><a href="updateuser.php?id=<?php echo $key->usersalt ?>"><input type="button" class="btn btn-success" name="update" value="update"></a></td>

										<td style="text-align: center;" >
											<input type="button" onclick="$.del('users',<?php echo $key->userid; ?>)" class="btn btn-danger" name="delete" value="delete"></td>
										</tr>

									<?php	}

								}

							}else{
								Main::direct("index");
							}





							?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<?php include 'footer.php' ?>