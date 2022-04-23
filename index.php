		<?php include 'header.php';
		include 'recommendationengine.php';



		?>

		

		<!-- Start slides -->
		<div id="slides" class="cover-slides">
			<ul class="slides-container">


				<?php 


				// echo count($recommendation);


				if(!Session::check("users") || empty($recommendation)){



					$recipes = new Main();

					$recipes->databring(array("recipes","all"));


					foreach ($recipes->data() as $key ) { ?>

						<li class="text-left">
							<img src="admin/<?php echo $key->recipespicture ?>" alt="">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<h1 class="m-b-20">You May Also Be Interested In</h1>
										<a href="recipes-details.php?id=<?php echo $key->recipesid; ?>"><p class="m-b-40"><?php echo $key->recipesname; ?></p></a>
									</div>
								</div>
							</div>
						</li>
						
						
					<?php 	}

					
					


				}else{
					


					foreach ($recommendation as $recipeid ) {


						$recipe = new Main();

						$recipe->databring(array("recipes","query","recipesid","=",$recipeid));  ?>



						<li class="text-left">
							<img src="admin/<?php echo $recipe->data()->recipespicture ?>" alt="">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<h1 class="m-b-20">You May Also Be Interested In</h1>
										<a href="recipes-details.php?id=<?php echo $recipe->data()->recipesid; ?>"><p class="m-b-40"><?php echo $recipe->data()->recipesname; ?></p></a>
									</div>
								</div>
							</div>
						</li>


						<?php 

					}



				}





				?>













			</ul>
			<div class="slides-navigation">
				<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
				<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
			</div>
		</div>
		<!-- End slides -->




















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



		<!-- Start Gallery -->
		<div class="gallery-box">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading-title text-center">
							<h2>Gallery</h2>

						</div>
					</div>
				</div>
				<div class="tz-gallery">
					<div class="row">
						<div class="col-sm-12 col-md-4 col-lg-4">
							<a class="lightbox" href="images/gallery-img-01.jpg">
								<img class="img-fluid" src="images/gallery-img-01.jpg" alt="Gallery Images">
							</a>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-4">
							<a class="lightbox" href="images/gallery-img-02.jpg">
								<img class="img-fluid" src="images/gallery-img-02.jpg" alt="Gallery Images">
							</a>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-4">
							<a class="lightbox" href="images/gallery-img-03.jpg">
								<img class="img-fluid" src="images/gallery-img-03.jpg" alt="Gallery Images">
							</a>
						</div>
						<div class="col-sm-12 col-md-4 col-lg-4">
							<a class="lightbox" href="images/gallery-img-04.jpg">
								<img class="img-fluid" src="images/gallery-img-04.jpg" alt="Gallery Images">
							</a>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-4">
							<a class="lightbox" href="images/gallery-img-05.jpg">
								<img class="img-fluid" src="images/gallery-img-05.jpg" alt="Gallery Images">
							</a>
						</div> 
						<div class="col-sm-6 col-md-4 col-lg-4">
							<a class="lightbox" href="images/gallery-img-06.jpg">
								<img class="img-fluid" src="images/gallery-img-06.jpg" alt="Gallery Images">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Gallery -->



		<!-- Start Customer Reviews -->
<!-- 		<div class="customer-reviews-box">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading-title text-center">
							<h2>Customer Reviews</h2>

						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 mr-auto ml-auto text-center">
						<div id="reviews" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner mt-4">


								<?php 

								$comment = new Main();

								$comment->databring(array("comment","all"));


								if($comment->counter()==1){ 

									$username = new User($comment->data()->usersalt);

									?>

									<div class="carousel-item text-center active">
										<div class="img-box p-1 border rounded-circle m-auto">
											<img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
										</div>
										<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase"><?php echo $username->data()->username." ".$username->data()->usersurname; ?></strong></h5>						
										<p class="m-0 pt-3"><?php echo  $comment->data()->description; ?></p>
									</div>



								<?php }elseif($comment->counter()>1){


									foreach ($comment->data() as $key) {

										$username = new User($key->usersalt); ?>


										<div class="carousel-item text-center active">
											<div class="img-box p-1 border rounded-circle m-auto">
												<img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
											</div>
											<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase"><?php echo $username->data()->username." ".$username->data()->usersurname ; ?></strong></h5>						
											<p class="m-0 pt-3"><?php echo $key->description; ?></p>
										</div>


										<?php
										
									}




								}






								

								?>



								










							</div>
							<a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
								<i class="fa fa-angle-left" aria-hidden="true"></i>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<!-- End Customer Reviews -->



		<?php include 'footer.php' ?>