<?php
include('../Models/USERS_Model.php');
include('../Views/ErrLogUser.php');
include('../Views/Main_View.php');

// Includes de vistas
function get_data_form(){
	
	$usr = $_REQUEST['user'];
	$passwd = $_REQUEST['passwd'];

	//Comprobamos que el usuario existe en la bd y creamos un usuario nuevo con el nombre, contraseña y permisos de este
	$user = new User($usr, $passwd, "");
	return $user;

}
	

if (!isset($_REQUEST['user'])){
	$_REQUEST['user'] = '';

}else{
	$user = get_data_form();
	$check = $user->checkUser();
	if($check)
{		//Comenzamos a mostrar la pagina principal
		$user->addPermissions();
		$userName=$user->getUser();
		$permissions=$user->getPermissions();
		header("Location: ./CALENDAR_Controller.php?userName=$userName&permissions=$permissions");
		
	}else{
		$error = new ErrLogUser($check);
		$error->getError();

	}
}


?>