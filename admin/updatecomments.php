<?php include 'header.php'; 



if(!$user->rights("comments")){
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

				if($findcomments = new Main(array("comment","commentid",$id))){




					if($findcomments->counter()){
						
						$take=$findcomments->data();

						if(Main::inputcheck("commentsupdate")){



							$update=$findcomments->updatedata(array("update","updatecomments",$id),array("comment","commentid",$id),
								array(
									"description"=>Main::inputbring("description"),
									"admincomment"=>Main::inputbring("admincomment"),
									"admincommenttime"=>date('d-m-Y H:i')));

							// if(!$update){
							// 	// hata geliyor
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
					<h2>Comments Update</h2>
					
					<div class="clearfix"></div>
					

				</div>

				<div class="x_content">
					<br />
					<form class="form-horizontal form-label-left" action="" method="POST">

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" > Description <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" name="description" value="<?php echo $take->description ?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"> Admin Comment <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="last-name" name="admincomment" value="<?php echo $take->admincomment ?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>

						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<input type="hidden" name="id" value="<?php echo $id ?>" >
								<input type="submit" name="commentsupdate" style="margin-left: 40%"  class="btn btn-success" value="Update">	
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>












</div>
<?php include 'footer.php'; ?>