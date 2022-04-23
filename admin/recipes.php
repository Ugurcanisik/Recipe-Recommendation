<?php include 'header.php';

if(!$user->rights("recipes")){
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
				<h2>Recipes</small></h2>
				
				<div class="clearfix"></div>
				<p>

				</p>
			</div>
			<div class="x_content">
				
				<table id="datatable" class="table table-striped table-bordered">
					<thead>
						<tr>

							<th style="text-align: center;">Name</th>
							<th style="text-align: center;">Picture</th>
							<th style="text-align: center;">Category</th>
							<th style="text-align: center;">Description</th>
							<th style="text-align: center;">Update</th>
							<th style="text-align: center;">Delete</th>
						</tr>
					</thead>

					<!-- desk = kategori sıra -->
					<tbody>
						
						<?php 

						$recipes = new Main();

						$recipes->databring(array("recipes","all"));


						if($recipes->counter()){



							foreach ($recipes->data() as $key) { ?>
								<tr id="<?php echo $key->recipesid; ?>">
									<td style="text-align: center;"><?php echo $key->recipesname; ?></td>
									<td style="text-align: center;" ><img width="100px" height="100px"   src="<?php echo $key->recipespicture;  ?>"></td> 
									
									<?php 

									$categoryname = new Main(array("category","categoryid",$key->categoryid));

									?>

									<td style="text-align: center;" ><?php echo $categoryname->data()->categoryname  ?> </td>

									<td style="text-align: center;" ><?php echo $key->recipesdescription;  ?> </td>

									
									<td style="text-align: center;" ><a href="updaterecipes.php?id=<?php echo $key->recipesid ?>"><input type="button" class="btn btn-success" name="update" value="update"></a></td>

									<td style="text-align: center;">

										<input type="button" class="btn btn-danger" onclick="$.del('recipes',<?php echo $key->recipesid; ?>)" name="delete" value="delete">
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