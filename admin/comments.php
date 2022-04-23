<?php include 'header.php';

if(!$user->rights("comments")){
	if(!Session::check("alert")){
		Session::alert("alert","rights"); //session adı alert değeri rights
	}
	Main::direct("index");
}

?>

<div class="right_col" role="main">

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Comments</small></h2>
				
				<div class="clearfix"></div>
				<p>

				</p>
			</div>
			<div class="x_content">
				
				<table id="datatable" class="table table-striped table-bordered">
					<thead>
						<tr>

							<th style="text-align: center;">User Name</th>
							<th style="text-align: center;">Recipe Category</th>
							<th style="text-align: center;">Descriptions</th>
							<th style="text-align: center;">Recipe Name</th>
							<th style="text-align: center;">Time</th>
							<th style="text-align: center;">Admin Comment</th>
							<th style="text-align: center;">Update</th>
							<th style="text-align: center;">Delete</th>
						</tr>
					</thead>


					<tbody>
						
						<?php 

						$comments = new Main();

						$comments->databring(array("comment","all"));


						if($comments->counter()){



							
							foreach ($comments->data() as $key) { ?>
								<tr id="<?php echo $key->commentid; ?>">
									<?php 

									$username = new User($key->usersalt);

									if(!$username->counter()){
										Main::direct("index");
									}

									$recipesname = new Main();
									$recipesname->databring(array("recipes","query","recipesid","=",$key->recipesid));


									if(!$recipesname->counter()){
										Main::direct("index");
									}

									$categoryname = new Main();
									$categoryname->databring(array("category","query","categoryid","=",$recipesname->data()->categoryid));

									if(!$categoryname->counter()){
										Main::direct("index");
									}


									?>
									<td style="text-align: center;"><?php echo $username->data()->username; ?></td>
									<td style="text-align: center;"><?php echo $categoryname->data()->categoryname; ?></td>
									<td style="text-align: center;"><?php echo $key->description ?></td>
									<td style="text-align: center;" ><?php echo $recipesname->data()->recipesname  ?> </td> <!-- desk = kategori sıra -->
									
									<td style="text-align: center;"><?php echo $key->time; ?></td>
									<td style="text-align: center;"><?php echo $key->admincomment; ?></td>
									<td style="text-align: center;" ><a href="updatecomments.php?id=<?php echo $key->commentid ?>"><input type="button" class="btn btn-success" name="update" value="update"></a></td>

									<td style="text-align: center;" >
										<input type="button" onclick="$.del('comment',<?php echo $key->commentid; ?>)" class="btn btn-danger" name="delete" value="delete">
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