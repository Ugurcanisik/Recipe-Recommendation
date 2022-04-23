<?php 


spl_autoload_register(function($class){

	require_once 'admin/class/'.$class.'.php';
});


$users = new Main();
$users->databring(array("likes","all"));
$userid = []; // $dizi=array()
$alluserslikes=[];


// print_r($dene->data());

// exit();


foreach ($users->data() as $user) {

	if(!in_array($user->userid,$userid)){
		array_push($userid, $user->userid);

		$userslikes = new Main();
		$userslikes->databring(array("likes","query","userid","=",$user->userid));
		$alllikes = [];

		// print_r($alllikes);

		// exit();

		foreach ($userslikes->data() as $key) {
			if(!in_array($key->recipeid, $alllikes)){
				array_push($alllikes, $key->recipeid);
			}
		}
		$alluserslikes+=[$user->userid=>$alllikes];  
	}	
}



function likes_scrore($referenceuser,$otherusers){  //referenceuse=ben, otherusers=hepsi

	
	$best_match = array('userid'=>'', 'count'=>0);

	foreach ($otherusers as $ids => $likeids) {
		
		if ($ids==$referenceuser) continue;   ///ben=ben ise devaö

		$c = count(array_intersect($likeids, $otherusers[$referenceuser]));   //ortak beğeni kontrolü


		if ($c >= $best_match['count']) {
			 $best_match= array('userid'=>$ids, 'count'=>$c);
		}
	}

		// print_r($best_match);
		// exit();

	if ($best_match['count']==0)
		return false;

	$t=array_diff($otherusers[$best_match['userid']], $otherusers[$referenceuser]);
	// $q=array_diff($user_array[$for], $user_array[$best_match['name']]);
	return $t;


}




$recommendation = likes_scrore($userview->userid,$alluserslikes);


print_r($recommendation);







?>