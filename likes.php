<?php 



spl_autoload_register(function($class){

	require_once 'admin/class/'.$class.'.php';
});




if(!Main::inputcheck("null","get")){
	$message=false;
}else{

	$userid = Main::inputbring("usersalt");

	$recipeid = Main::inputbring("recipeid");

	$value = Main::inputbring("value");



	if($userid && $recipeid && $value){

		

		if($value=="add"){
			

			$like = new Main();
			$likes=$like->adddata(array("likes","likes"),array(
				"recipeid"=>$recipeid,
				"userid"=>$userid,
				"likecounter"=>1
			));

			if($likes){
				echo "succesfull";
			}else{
				echo "unsuccesfull";
			}






		}elseif($value=="del"){


			

			$like = new Main();
			$likes=$like->updatedata(array("delete"),array("likes","likeid",$recipeid),array("deleted"=>1));

			if($likes){
				echo "succesfull";
			}else{
				echo "unsuccesfull";
			}


		}





		



		
		
		
		

	}else{
		echo "unsuccesfull";
		
	}

}






?>
