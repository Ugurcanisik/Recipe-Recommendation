<?php include 'header.php' ?>




<?php 

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


			$recipes = new Main(array("recipes","recipesid",$id));

			if($recipes->counter()){

				$recipesView=$recipes->data();


				if(Main::inputcheck("addcomment")){


					$comment=$recipes->adddata(array("comment",$id),array(
						"usersalt"=>Session::bring("users"),
						"recipesid"=>$id,
						"description"=>Main::inputbring("description"),
						"fav"=>"213123",
						"time"=>date('d-m-Y H:i')
					));

					if(!$comment){
						// hata
					}
					



					
				}

			}else{
				Main::direct("index");
			}

		}
	}
}


?>





<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
	<div class="container text-center">
		<div class="row">
			<div class="col-lg-12">
				<h1>Recipes Details</h1>
			</div>
		</div>
	</div>
</div>
<!-- End All Pages -->

<!-- Start blog details -->
<div class="blog-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="heading-title text-center">
					<h2>Recipes Details</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-8 col-lg-8 col-12">
				<div class="blog-inner-details-page">
					<div class="blog-inner-box">
						<div class="side-blog-img">
							<img class="img-fluid" src="admin/<?php echo $recipesView->recipespicture ?>" alt="">							

						</div>

						






						<?php 


						if(!Session::check("users")){ ?>

							<div  style="margin-top: 50px"><a href="login.php">Beğeni veya Yorum Yapabilmek için Giriş Yapınız</a></div>
							



						<?php  }else{
							$likecheck = New Main();

							$likecheck->databring(array("likes","query","userid","=",$userview->userid));

						// print_r($likecheck->data());
						// exit();

							$a="";

							if($likecheck->counter()) {



								if($likecheck->counter()==1){

									if($likecheck->data()->recipeid==$id && $likecheck->data()->userid==$userview->userid){
										$a="del";
										$deletelike=$likecheck->data()->likeid;
									}else{
										$a="add";
									}


								}elseif($likecheck->counter()>1){

									foreach ($likecheck->data() as $key) {



										if($key->recipeid==$id && $key->userid==$userview->userid){
											$a="del";
											$deletelike=$key->likeid;
											break;
										}else{
											$a="add";
										}






									}

								}






							}else{


								$a="add";

							}
						}





						?>

						




						<?php 


						if(!Session::check("users")){
							
						}else{ ?>


							<div style="margin-top: 50px; ">

								<a href="javascript:void(0)" onclick="$.like(<?php echo $userview->userid  ?>,<?php if($a=="del"){
									echo $deletelike;
								}else{
									echo $id;
								} ?>, '<?php echo $a; ?>')"  >



								<i style="font-size: 30px; color: orange" id="likebuton" class="
								<?php 



								if($likecheck->counter()){

									if($likecheck->counter()==1){





										if($likecheck->data()->recipeid==$id && $likecheck->data()->userid==$userview->userid){
											echo "fa fa-star";
											}else{
												echo "fa fa-star-o";
											}






											}elseif($likecheck->counter()>1){

												foreach ($likecheck->data() as $key) {



													if($key->recipeid==$id && $key->userid==$userview->userid){
														echo "fa fa-star";
														break;
														}else{
															echo "fa fa-star-o";

														}






													}


													}else{
														echo "fa fa-star-o";
													}


													}else{
														echo "fa fa-star-o";
													}




													?>



													"></i>


												</a>
											</div>

										<?php } ?>











										<div class="inner-blog-detail details-page">
											<h3><?php echo $recipesView->recipesname; ?></h3>

											<p><?php echo $recipesView->recipesdescription; ?></p>

										</div>
									</div>



									<div class="blog-comment-box">


										<h3>Comments</h3>

										<?php 


										$com = new Main(array("comment","recipesid",$id));

						// print_r($com->data());
						// exit();

										if($com->counter()==1){ 

											$comview=$com->data();

											$comuser = new User($comview->usersalt);

											?>

											<div class="comment-item">
												<div class="comment-item-left">
													<img src="images/avt-img.jpg" alt="">
												</div>
												<div class="comment-item-right">
													<div class="pull-left">
														<a href="#"><?php echo $comuser->data()->username." ".$comuser->data()->usersurname; ?></a>
													</div>
													<div class="pull-right">

														<i class="fa fa-clock-o" aria-hidden="true"></i>Time : <span><?php echo $comview->time; ?></span>
													</div>
													<div class="des-l">
														<p><?php echo  $comview->description; ?></p>
													</div>

												</div>
											</div>

											<?php 

											if($comview->admincomment){ ?>

												<div class="comment-item children">
													<div class="comment-item-left">
														<img src="images/avt-img.jpg" alt="">
													</div>
													<div class="comment-item-right">
														<div class="pull-left">
															<a href="#">Admin</a>
														</div>
														<div class="pull-right">
															<i class="fa fa-clock-o" aria-hidden="true"></i>Time : <span><?php echo $comview->admincommenttime; ?></span>
														</div>
														<div class="des-l">
															<p><?php echo $comview->admincomment; ?></p>

														</div>
													</div>
												</div>

											<?php } ?>




										<?php	}elseif($com->counter()>1){


							// print_r($com->data());
							// exit();

											foreach ($com->data() as $comview) { 

												$comuser = new User($comview->usersalt,"gizlikelime");

												if(!$comuser->counter()){
													Main::direct("index");
												}else{ ?>


													<div class="comment-item">
														<div class="comment-item-left">
															<img src="images/avt-img.jpg" alt="">
														</div>
														<div class="comment-item-right">
															<div class="pull-left">
																<a href="#"><?php echo $comuser->data()->username." ".$comuser->data()->usersurname; ?></a>
															</div>
															<div class="pull-right">

																<i class="fa fa-clock-o" aria-hidden="true"></i>Time : <span><?php echo $comview->time; ?></span>

															</div>
															<div class="des-l">
																<p><?php echo  $comview->description; ?></p>
															</div>


														</div>
													</div>

													<?php 

													if($comview->admincomment){ ?>

														<div class="comment-item children">
															<div class="comment-item-left">
																<img src="images/avt-img.jpg" alt="">
															</div>
															<div class="comment-item-right">
																<div class="pull-left">
																	<a href="#">Admin</a>
																</div>
																<div class="pull-right">
																	<i class="fa fa-clock-o" aria-hidden="true"></i>Time : <span>1.30 pm</span>
																</div>
																<div class="des-l">
																	<p><?php echo $comview->admincomment; ?></p>

																</div>
															</div>
														</div>

													<?php } 

												}
											}

										}

										?>




					<!-- 	<div id="admincomment" style="visibility: hidden;">

							<div class="comment-item children">
								<div class="comment-item-left">
									<img src="images/avt-img.jpg" alt="">
								</div>
								<div class="comment-item-right">
									<div class="pull-left">
										<a href="#">Admin</a>
									</div>
									<div class="pull-right">
										<i class="fa fa-clock-o" aria-hidden="true"></i>Time : <span>1.30 pm</span>
									</div>
									<div class="des-l">
										<p><textarea class="form-control" name="description" id="textarea_com" placeholder="Your Message" rows="2"></textarea></p>
										<input type="submit"  class="btn btn-submit" name="addcomment" value="SUBMIT COMMENT">
									</div>
								</div>
							</div>

						</div> -->


<!-- 
						<div class="comment-item">
							<div class="comment-item-left">
								<img src="images/avt-img.jpg" alt="">
							</div>
							<div class="comment-item-right">
								<div class="pull-left">
									<a href="#">Rubel Ahmed</a>
								</div>
								<div class="pull-right">
									<i class="fa fa-clock-o" aria-hidden="true"></i>Time : <span>11.30 am</span>
								</div>
								<div class="des-l">
									<p>Morbi lacinia ultrices lorem id tincidunt. Cras id dui risus. Pellentesque consectetur id mi sed pharetra. Proin imperdiet gravida nisl, sit amet varius urna. In auctor.</p>
								</div>
								<a href="#" class="right-btn-re"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
							</div>
						</div> -->





					</div>

					<?php 

					if(Session::check("users")){

						$commentcheck = new Main(array("comment","recipesid",$id));

						// print_r($commentcheck->data());
						// exit();

						if($commentcheck->counter()){


							$x=0;

							if($commentcheck->counter()==1){
								if($commentcheck->data()->usersalt==$userview->usersalt)
									$x++;
							}elseif($commentcheck->counter()>1){
								foreach ($commentcheck->data() as $key) {
									if($key->usersalt==$userview->usersalt)
										$x++;
								}
							}


							if($x==0){ ?>
								<div class="comment-respond-box">
									<h3>Leave your comment </h3>
									<div class="comment-respond-form">


										<form id="commentrespondform" class="comment-form-respond row" method="post">

											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="form-group">
													<textarea class="form-control" name="description" id="textarea_com" placeholder="Your Message" rows="2"></textarea>
												</div>
											</div>
											<div class="col-lg-12 col-md-12 col-sm-12">
												<input type="hidden" value="<?php echo $id ?>" name="id">
												<input type="submit" class="btn btn-submit" name="addcomment" value="SUBMIT COMMENT">
											</div>
										</form>

									</div>
								</div>

							<?php }


						}else{ ?>

							<div class="comment-respond-box">
								<h3>Leave your comment </h3>
								<div class="comment-respond-form">


									<form id="commentrespondform" class="comment-form-respond row" method="post">

										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<textarea class="form-control" name="description" id="textarea_com" placeholder="Your Message" rows="2"></textarea>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<input type="hidden" name="reply" id="reply">
											<input type="hidden" value="<?php echo $id ?>" name="id">
											<input type="submit" class="btn btn-submit" name="addcomment" value="SUBMIT COMMENT">
										</div>
									</form>

								</div>
							</div>

						<?php	}


					}else{

					}

					?>



				</div>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-8 col-12 blog-sidebar">
				<div class="right-side-blog">


					<h3>Recent Post</h3>
					<div class="post-box-blog">
						<div class="recent-post-box">
							


							<?php 


							$recentpost = new Main();

							$recentpost->databring(array("comment","limit"));

								// print_r($recentpost->data());
								// exit();

							if(!$recentpost->counter()==0){
									// echo "asdsad";
									// exit();

								if($recentpost->counter()==1){

									$recentrecipes = new Main();
									$recentrecipes->databring(array("recipes","query","recipesid","=",$recentpost->data()->recipesid));

									if($recentrecipes->counter()){

										$recentusers = new User($recentpost->data()->usersalt);

										if($recentusers->counter()){ ?>

											<div class="recent-img">
												<img class="img-fluid" src="admin/<?php echo $recentrecipes->data()->recipespicture ?>" alt="">
											</div>
											<div class="recent-info">
												<ul>
													<li><i class="zmdi zmdi-account"></i>Posted By : <span><?php echo $recentusers->data()->username." ".$recentusers->data()->usersurname; ?></span></li>
													<li>|</li>
													<li><i class="zmdi zmdi-time"></i>Time : <span><?php echo $recentpost->data()->time; ?></span></li>
												</ul>
												<h4><?php echo substr($recentpost->data()->description, 0,36); ?></h4>
											</div>

										<?php }else{
											Main::direct("index");
										}




									}else{
										Main::direct("index");
									}




								}elseif($recentpost->counter()>1){


									foreach ($recentpost->data() as $recentpostview) {

										$recentrecipes = new Main();
										$recentrecipes->databring(array("recipes","query","recipesid","=",$recentpostview->recipesid));

										if($recentrecipes->counter()){

											$recentusers = new User($recentpostview->usersalt);

											if($recentusers->counter()){ ?> 

												<div class="recent-img">
													<img width="140px" height="140px" class="img-fluid" src="admin/<?php echo $recentrecipes->data()->recipespicture ?>" alt="">
												</div>
												<div class="recent-info">
													<ul>
														<li><i class="zmdi zmdi-account"></i>Posted By : <span><?php echo $recentusers->data()->username." ".$recentusers->data()->usersurname; ?></span></li>
														<li>|</li>
														<li><i class="zmdi zmdi-time"></i>Time : <span><?php echo $recentpostview->time; ?></span></li>
													</ul>
													<h4><?php echo substr($recentpostview->description, 0,36); ?></h4>
												</div>

											<?php }else{

											}



										}else{

										}








									}




								}




							}else{

							}


							?>


							
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
</div>
<!-- End details -->


<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>



<?php include 'footer.php' ?>