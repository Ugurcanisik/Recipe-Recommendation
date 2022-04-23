<?php 

class DB{

	public  static $_connect=null;

	private $_pdo,
	$_query,
	$_counter=0,
	$_result,
	$_errors=false;


	public  function __construct(){
		
		try {
			$this->_pdo = new PDO('mysql:host=localhost;dbname=dinner', "root", "");
			$this->_pdo->exec("set names utf8");
		} catch (PDOException $e) {

			die($e->getMessage());

		}

		
	}

	public static function connect(){
		
		if(!isset(self::$_connect)){
			self::$_connect = new DB();	
		}
		return self::$_connect;
		
	}


	public  function add($table=null,$fields=array()){
		if($table && count($fields)){
			$keys=array_keys($fields);
			$value="";
			$x=1;

			foreach ($fields as $key) {
				$value.="?";
				if($x<count($fields)){
					$value.=", ";
				}
				$x++;
			}
			$sql="insert into $table (`".implode('`, `', $keys)."`) values ($value) ";

			if(!$this->query($sql,$fields)->errors()){
				return true;
			}else{
				return false;
			}
			
		}else{
			return false;
		}
	}

	public  function update($data=array(),$fields=array()){

		if(count($data) && count($fields)){

			$set="";
			$x=1;

			foreach ($fields as $key => $values) {
				$set.="{$key}=?";
				if($x<count($fields)){
					$set.=", ";
				}
				$x++;
			}


			$sql="update $data[0] set {$set} where $data[1]=$data[2]";

// echo $sql;
// 			exit();


			if(!$this->query($sql,$fields)->errors())
				return true;
			else
				return false;
		}else{
			return false;
		}
		
	}

	


	public static function addpicture($way=null){
		if($way){
			$name=$_FILES['picture']["name"];
			$tmp_name=$_FILES['picture']["tmp_name"];
			$unique=rand(1,100);
			$pictureway=$way."/".$unique.$name;
			copy($tmp_name, "$way/".$unique.$name);
			return $pictureway;
		}else{
			return false;
		}
		

	}

	
	public  function bring($fields=array()){



		if(count($fields)){
			switch ($fields[1]) {
				case 'all':
				$sql="select * from $fields[0] where deleted = ?";
				if(!$this->query($sql,array(0))->errors()){
					return $this;
				}else{
					return false;
				}
				break;
				case 'limit':
				$sql="select * from $fields[0] where deleted = ? limit 5";
				if(!$this->query($sql,array(0))->errors()){
					return $this;
				}else{
					return false;
				}
				break;
				case 'query':
				
				$file=$fields[2];
				$operator=$fields[3];
				$value=$fields[4];

				$sql="select * from $fields[0] where deleted = ? and  $file $operator ? ";


				if(!$this->query($sql,array(0,$value))->errors()){
					return $this;
				}else{
					return false;
				}

				

				break;
				case 'toplike':


				$id = $fields[2];
				
		

				$sql="select (SELECT sum(likecounter) FROM $fields[0] where recipeid = ? and deleted = ?) as maxi, userid, recipeid from $fields[0] where recipeid = ? and deleted = ?";


				if(!$this->query($sql,array($id,0,$id,0))->errors()){
					return $this;
				}else{
					return false;
				}

				

				break;
				case 'orderbyquery':

				$file=$fields[2];
				$operator=$fields[3];
				$value=$fields[4];
				$ascordesc=$fields[5];




				
				
				$sql="select * from $fields[0] where deleted = ? and  $file $operator ? order by orders	$ascordesc";


				if(!$this->query($sql,array(0,$value))->errors()){
					return $this;
				}else{
					return false;
				}
				


				break;

				case 'orderby':
				$operator=$fields[2];
				$sql="select * from $fields[0] where  deleted = ? order by orders $operator";
				if(!$this->query($sql,array(0))->errors()){
					return $this;
				}else{
					return false;
				}
				break;
			}
		}else{
			return false;
		}
	}


	public  function query($sql=null,$parametre=array()){

		if($sql && count($parametre)){

			if($this->_query=$this->_pdo->prepare($sql)){
				$x=1;

				if(count($parametre)){
					foreach ($parametre as $param) {
						$this->_query->bindValue($x,$param);
						$x++;
					}

					if($this->_query->execute()){
						$this->_result=$this->_query->fetchAll(PDO::FETCH_OBJ);
						// print_r($this->_result);
						// exit();
						$this->_counter=$this->_query->rowCount();
					}else{
						$this->_errors=true;
					}
					return $this;
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



	public  function counter(){
		return $this->_counter;
	}



	public  function errors(){
		return $this->_errors;
	}


	public  function first(){
		return $this->_result[0];
	}

	public  function all(){
		return $this->_result;
	}




}














?>
