<?php include 'header.php';

if(!$user->rights("category")){
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
				<h2>Category</small></h2>
				
				<div class="clearfix"></div>
				<p>

				</p>
			</div>
			<div class="x_content">
				
				<table id="datatable" class="table table-striped table-bordered">
					<thead>
						<tr>

							<th style="text-align: center;">Name</th>
							<th style="text-align: center;">Orders</th>
							<th style="text-align: center;">Update</th>
							<th style="text-align: center;">Delete</th>
						</tr>
					</thead>


					<tbody>
						
						<?php 

						$category = new Main();

						$category->databring(array("category","all"));


						if($category->counter()){



							
							foreach ($category->data() as $key) { ?>
								<tr id="<?php echo $key->categoryid ?>">

									<td style="text-align: center;"><?php echo $key->categoryname; ?></td>
									<td style="text-align: center;" ><?php echo $key->orders;  ?> </td> <!-- desk = kategori sıra -->



									<td style="text-align: center;" ><a href="updatecategory.php?id=<?php echo $key->categoryid ?>"><input type="button" class="btn btn-success" name="update" value="update"></a></td>

									<td style="text-align: center;" >


										<input type="button" class="btn btn-danger" onclick="$.del('category',<?php echo $key->categoryid; ?>)" name="delete" value="delete">


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