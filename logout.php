<?php 

spl_autoload_register(function($class){

	require_once 'admin/class/'.$class.'.php';
});

session_start();


if(Session::check("users")){
	Session::delete("users");
	session_destroy();
}

Main::direct("index");



?>