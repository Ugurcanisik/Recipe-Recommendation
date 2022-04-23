<?php 

class Session{


	public  function __construct(){
		
		session_start();
	}


	public static  function create($name=null,$value=null){
		if($name && $value){
			return $_SESSION[$name]=$value;
		}else{
			return false;
		}
	}


	public static function check($name=null){
		if($name){
			return (isset($_SESSION[$name]))? true : false;
		}else{
			return false;
		}
	}

	public static function bring($name=null){
		if($name){
			if(self::check($name)){
				return $_SESSION[$name];
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function delete($name=null){
		if($name){
			if(self::check($name)){
				unset($_SESSION[$name]);			
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


	public static function alert($name,$value=""){

		if(self::check($name)){
			$session=self::bring($name);
			self::delete($name);
			return $session;
		} else {
			self::create($name,$value);
			
		}
		return false;

	}
}

?>