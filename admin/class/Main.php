<?php 


class Main{

	private $_db,
	$_data,
	$_counter;


	public  function __construct($data=array()){


		$this->_db=DB::connect();

		/*
		0 => tablo adı
		1 => id adı
		2 => id değeri
		*/

		if(count($data)){
			if($datacheck=$this->_db->bring(array($data[0],"query",$data[1],"=",$data[2]))){
				if($datacheck->counter()){
					
					$this->_counter=$datacheck->counter();


					
					if(count($datacheck->all())==1){
						$this->_data=$datacheck->first();
					}elseif(count($datacheck->all())>1){
						$this->_data=$datacheck->all();
					}

					
					return true;

				}else{
					return false;
				}
			}else{
				return false;
			}
		}


		
	}



	public  function databring($fields){
		/*
		0 => tablo adı
		1 => hepsi,sorgu,between
		2 => alan
		3 => =,=<
		4 => deger
		*/

		if(count($fields)){


			if($databr=$this->_db->bring($fields)){



				if($databr->counter()){

					$this->_counter=$databr->counter();


					
					if(count($databr->all())===1){
						$this->_data=$databr->first();
					}elseif(count($databr->all())>1){
						$this->_data=$databr->all();
					}


					return true;

				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}



	public  function updatedata($page=array(),$data,$fields){

// print_r($data);
// print_r($fields);
// exit();

		
			/*
		veriler
		0 => tablo
		1 => id adı
		2 => id değeğeri
		*/

		if(count($page) && $data && $fields){
			if(!$this->_db->update($data,$fields)){
				if(!Session::check("alert")){
					Session::alert("alert","unsuccesfull");
				}
				return false;
			}else{
				
				switch ($page[0]) {
					case 'update':
					if(!Session::check("alert")){      
						Session::alert("alert","succesfull");  //$_session["alert"]="succesfull"
					}
					header("location:$page[1].php?id=$page[2]");
					
					break;

					case 'delete':
					return true;
					break;

					case 'settings':

					if(!Session::check("alert")){
						Session::alert("alert","succesfull");
					}

					Main::direct("settings");
					
					break;

					case 'addadmincomment':
					header("location:$page[1].php?id=$page[2]");
					break;
				}
			}
		}else{
			return false;
		}
	}



	public  function adddata($data=array(),$fileds){

		/*
		0 => tablo
		1 => sayfa
		*/
		if(count($data) && $fileds){


			if(!$this->_db->add($data[0],$fileds)){
				if(!Session::check("alert")){
					Session::alert("alert","unsuccesfull");
				}
				return false;
			}else{
				
				switch ($data[0]) {
					case 'comment':
					if(!Session::check("alert")){
						Session::alert("alert","succesfull");
					}

					header("location: recipes-details.php?id=$data[1]");
					break;
					case 'likes':
			

					return true;
					break;

					default:
					if(!Session::check("alert")){
						Session::alert("alert","succesfull");
					}
					Main::direct($data[1]);
					break;
				}


				
			}
		}else{
			return false;
		}
	}



	

	public static function inputcheck($button=null,$source="post"){

		switch ($source) {
			case 'post':
			return (!empty($_POST[$button]))? true : false;
			break;
			case 'get':
			return (!empty($_GET))? true : false;
			break;
			default:
			return false;
			break;
		}

	}

	public static function inputbring($fields=null){
		if($fields){               //fieldsta değer varsa çalışır post olur.
			if ($_POST) {
				return $_POST[$fields];
			}elseif($_GET){
				return $_GET[$fields];
			}
		}else{
			return false;
		}
	}



	public static function direct($location=null){
		if($location){
			header("location: ".$location.".php");
			exit();
		}

	}


	public static function salt(){

		$x=rand(100000000000000000,999999999999999999);
		$y=rand(100000000000000000,999999999999999999);
		return $x.$y;
	}



	public static function getcheck($data=null){
		if($data){
			$data=trim($data);
			return preg_match("/[^0-9]/i",$data);
		}else{
			return false;
		}
	}



	

	public  function data(){
		return $this->_data;
	}

	public  function counter(){
		return $this->_counter;
	}






}


?>