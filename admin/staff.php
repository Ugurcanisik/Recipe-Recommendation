<?php include 'header.php';

if(!$user->rights("staff")){
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
				<h2>Staffs</small></h2>
				
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
							<th style="text-align: center;">Title</th>
							<th style="text-align: center;">Picture</th>
							<th style="text-align: center;">Instagram</th>
							<th style="text-align: center;">Update</th>
							<th style="text-align: center;">Delete</th>
						</tr>
					</thead>

					<!-- desk = kategori sıra -->
					<tbody>
						
						<?php 

						$staff = new Main();

						$staff->databring(array("staff","all"));

						// print_r($stuff->data());
						// exit();


						if($staff->counter()){



							foreach ($staff->data() as $key) { ?>
								<tr id="<?php echo $key->staffid; ?>">
									<td style="text-align: center;"><?php echo $key->staffname; ?></td>
									
									

									<td style="text-align: center;" ><?php echo $key->staffsurname  ?> </td>
									<td style="text-align: center;" ><?php echo $key->stafftitle  ?> </td>
									<td style="text-align: center;" ><img width="100px" height="100px"   src="<?php echo $key->staffpicture;  ?>"></td> 
									

									<td style="text-align: center;" ><?php echo $key->staffinsta;  ?> </td>

									
									<td style="text-align: center;" ><a href="updatestaff.php?id=<?php echo $key->staffid ?>"><input type="button" class="btn btn-success" name="update" value="update"></a></td>

									<td style="text-align: center;">

										<input type="button" class="btn btn-danger" onclick="$.del('staff',<?php echo $key->staffid; ?>)" name="delete" value="delete">
									</td>
								</tr>

							<?php	}

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