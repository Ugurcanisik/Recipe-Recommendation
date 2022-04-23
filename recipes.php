<?php include 'header.php'; ?>



<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
	<div class="container text-center">
		<div class="row">
			<div class="col-lg-12">
				<h1>Special Menu</h1>
			</div>
		</div>
	</div>
</div>
<!-- End All Pages -->

<!-- Start Menu -->
<div class="menu-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="heading-title text-center">
					<h2>Special Menu</h2>
					
				</div>
			</div>
		</div>

		<div class="row inner-menu-box">
			<div class="col-3">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

					<a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all" role="tab" aria-controls="v-pills-all" aria-selected="true">All</a>

					<?php 

					$categoryname=new Main();

					$categoryname->databring(array("category","orderby","asc"));

					if($categoryname->counter()){
						foreach ($categoryname->data() as $key) { ?>

							<a class="nav-link" id="v-pills-<?php echo $key->categoryname ?>-tab" data-toggle="pill" href="#v-pills-<?php echo $key->categoryname ?>" role="tab" aria-controls="v-pills-<?php echo $key->categoryname ?>" aria-selected="false"><?php echo $key->categoryname; ?></a>

						<?php }


					} else{

						Main::direct("index");


					}


					?>



					







				</div>
			</div>

			<div class="col-9">
				<div class="tab-content" id="v-pills-tabContent">

					<div class="tab-pane fade show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
						<div class="row">

							<?php 
							$recipesall = new Main();
							$recipesall->databring(array("recipes","orderby","desc"));

							foreach ($recipesall->data() as $recipesallwrite) { ?>
								
								<div class="col-lg-4 col-md-6 special-grid all">
									<a href="recipes-details.php?id=<?php echo $recipesallwrite->recipesid ?>">
										<div class="gallery-single fix">
											<img src="admin/<?php echo $recipesallwrite->recipespicture ?>" class="img-fluid" alt="Image">
											<div class="why-text">
												<center><h4 style="margin-top: 50px;"><?php echo $recipesallwrite->recipesname; ?></h4></center>
											</div>
										</div>
									</a>
								</div>

							<?php  	}  ?>






						</div>

					</div>






					<?php 


					

					foreach ($categoryname->data() as $key) { ?>


						<div class="tab-pane fade" id="v-pills-<?php echo $key->categoryname ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $key->categoryname ?>-tab">
							<div class="row">


								<?php 
								$recipes = new Main();
								$recipes->databring(array("recipes","orderbyquery","categoryid","=",$key->categoryid,"desc"));

								foreach ($recipes->data() as $receip) { ?> 

									<div class="col-lg-4 col-md-6 special-grid <?php echo $key->categoryname ?>">
										<a href="recipes-details.php?id=<?php echo $receip->recipesid ?>">
											<div class="gallery-single fix">
												<img src="admin/<?php echo $receip->recipespicture ?>" class="img-fluid" alt="Image">
												<div class="why-text">
													<center><h4 style="margin-top: 50px;"><?php echo $receip->recipesname; ?></h4></center>
												</div>
											</div>
										</a>
									</div>



								<?php	}  ?>

							</div>
						</div>




					<?php }  ?>









				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Menu -->

<!-- Start QT -->
<div class="qt-box qt-background">
	<div class="container">
		<div class="row">
			<div class="col-md-8 ml-auto mr-auto text-center">
				<p class="lead ">
					" If you're not the one cooking, stay out of the way and compliment the chef. "
				</p>
				<span class="lead">Michael Strahan</span>
			</div>
		</div>
	</div>
</div>
<!-- End QT -->




<?php include 'footer.php'; ?>