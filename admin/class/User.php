<?php 

class User{

	private $_db,
	$_session,
	$_data,
	$_rightsname,
	$_counter=0;



	public function __construct($userid=null){


		// $DB = NEW DB();
		// $db->connect();
		// DB::connect();

		$this->_db =  DB::connect();

		$this->_session="users"; //session name

		if(!$userid){

			if(Session::check($this->_session)){


				$sqldata=$this->_db->bring(array("users","query","usersalt","=",Session::bring($this->_session)));

		

				if($sqldata->counter()){

					$this->_data=$sqldata->first();
					$this->_counter=$sqldata->counter();
					$rights=$this->_db->bring(array("rights","query","rightsid","=",$this->_data->userrights));
					$this->_rightsname=$rights->first()->rightsname;
					return $this;
				}
				


			}else{
				return false;
			}
		}elseif($userid){            //userupdate(newuser)



			$userdata=$this->_db->bring(array("users","query","usersalt","=",$userid));

			if($userdata->counter()){  //dbdeki counter kontrol edildi


				$this->_counter=$userdata->counter();
				$this->_data=$userdata->first();
				$rightsname=$this->_db->bring(array("rights","query","rightsid","=",$this->_data->userrights));

				return $this;
			}else{
				return false;
			}



		}


	}

	public function adduser($fields=null){



		if($fields){
			if(!$this->_db->add("users",$fields)){
				if(!Session::check("alert")){
					Session::alert("alert","unsuccesfull");
				}
				return false;
			}else{

				if(!Session::check("alert")){
					Session::alert("alert","succesfull");
				}
				Main::direct("user");
			}
		}else{
			return false;
		}
	}




	public function login($mail=null,$pw=null){



		if($mail && $pw){


			$check=$this->_db->bring(array("users","query","usermail","=",$mail));


			if($check->counter()){
				

				$this->_data=$check->first();


				// echo $this->_data->userpassword;

				// exit();
				



				if($this->_data->userpassword===md5($pw)){



					Session::create($this->_session,$this->_data->usersalt);

					if(!Session::check("alert")){
						Session::alert("alert","login");
					}
					Main::direct("index");

				}else{
					return false;
				}
				
			}else{
				if(!Session::check("alert")){
					Session::alert("alert","fault");
				}
				
				return false;
			}


		}else{
			return false;
		}

	}



	public function userupdate($data=array(),$fields){

		/*
		veriler
		0 => gidilecek sayfa
		1 => id 
		*/

		if(count($data) && $fields ){


			
			if(!$this->_db->update(array("users","usersalt",$data[1]),$fields)){
				if(!Session::check("alert")){
					Session::alert("alert","unsuccesfull");
				}
				return false;
			}else{

				switch ($data[0]) {

					case 'pasupdatefront':

					if(!Session::check("alert")){
						Session::alert("alert","succesfull");
						
					}
					Main::direct("updatepassword");
					break;


					case 'userupdate':
					
					if(!Session::check("alert")){
						Session::alert("alert","succesfull");
					}

					header("location:updateuser.php?id=$data[1]");
					break;


					
					case 'userprofil':

					if(!Session::check("alert")){
						Session::alert("alert","succesfull");
					}

					Main::direct("updateprofil");
					break;


					case 'pasupdate':
					if(!Session::check("alert")){
						Session::alert("alert","succesfull");
					}
					Main::direct("updatepassword");
					break;


					case 'userprofilfront':
					if(!Session::check("alert")){
						Session::alert("alert","succesfull");
						
					}
					Main::direct("settings");
					break;
					
				}

			}

		}else{
			return false;
		}

	}




	public function rights($rights=null){
		if($rights){


			// 0 tablo adı
			// 1 sorgu tipi->query or like 
			// 2 tablo daki id değeri
			// 3 = <=
			// 4 value yani değer 

			if($rightsquery=$this->_db->bring(array("rights","query","rightsid","=",$this->data()->userrights))){
				if($rightsquery->counter()){
					
					$rightsresult=json_decode($rightsquery->first()->rights,true);
					if(isset($rightsresult[$rights]) && $rightsresult[$rights]==true){
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
		}else{
			return false;
		}
	}




	public function data(){
		return $this->_data;
	}



	public function rightsname(){
		return $this->_rightsname;
	}
	public function counter(){
		return $this->_counter;
	}

	





	



}