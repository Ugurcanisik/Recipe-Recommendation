<?php 



spl_autoload_register(function($class){

	require_once 'class/'.$class.'.php';
});



if(!Main::inputcheck("null","get")){
	$message=false;
}else{

	$id = Main::inputbring("id");


	$page = Main::inputbring("page");

	if($id && $page){

		if(Main::getcheck($id)){
			echo "unsuccesfull";
		}else{


			
			switch ($page) {

				case 'category':


				$delete = new Main();
				$del=$delete->updatedata(array("delete"),array($page,"categoryid",$id),array(
					"deleted"=>1));

				if($del){
					echo "succesfull";
				}else{
					echo "unsuccesfull";
				}

				break;

				case 'recipes':

				$delete = new Main();
				$del=$delete->updatedata(array("delete"),array($page,"recipesid",$id),array(
					"deleted"=>1));

				if($del){
					echo "succesfull";
				}else{
					echo "unsuccesfull";
				}

				break;
				case 'users':


				$delete = new Main();
				$del=$delete->updatedata(array("delete"),array($page,"userid",$id),array(
					"deleted"=>1));

				if($del){
					echo "succesfull";
				}else{
					echo "unsuccesfull";
				}

				break;
				case 'comment':

				$delete = new Main();
				$del=$delete->updatedata(array("delete"),array($page,"commentid",$id),array(
					"deleted"=>1));

				if($del){
					echo "succesfull";
				}else{
					echo "unsuccesfull";
				}

				break;
				case 'staff':


				$delete = new Main();
				$del=$delete->updatedata(array("delete"),array($page,"staffid",$id),array(
					"deleted"=>1));

				if($del){
					echo "succesfull";
				}else{
					echo "unsuccesfull";
				}

				break;
				
			}

			
			
		}

	}else{
		echo "unsuccesfull";
		
	}

}






?>