<?php
	session_start();
	//Comprobación del idioma seleccionado
	if (isset($_REQUEST['idioma']) && $_REQUEST['idioma']!=''){
	   $_SESSION["idioma"] = strtolower($_REQUEST['idioma']);
	}elseif(isset($_SESSION["idioma"]) &&$_SESSION["idioma"] == ""){
	   $_SESSION["idioma"] = "esp";
	}
	if(isset($_SESSION['connected']) && $_SESSION["connected"] == "false"){
			header("Location: ../index.php");
	}
	$idioma=$_SESSION['idioma'];
	include("../../Assets/languages/".$idioma.".php");
	include '../Models/CLIEXT_Model.php';

	
	
	$acc = (isset($_REQUEST['acc']) ? $_REQUEST['acc'] : "");

	$usr=(isset($_REQUEST['nom']) ? $_REQUEST['nom']:"");
	$pass = (isset($_REQUEST['password1']) ? $_REQUEST['password1']:"");
	

	$busr = (isset($_REQUEST['busr']) ? $_REQUEST['busr'] : "");
	
	



	switch ($acc) {

		case 'Insertar': 
						if($usr <> ''){
							$temp = new CliExt($usr,$pass,$dni,$perf);
							$_SESSION['mensaje']=$temp->insertar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							header("Location: ../Views/GestCliExt/CLIEXT_ADD_Vista.php");
						}
						
			break;
		/*case '¿Borrar?': 
						$temp = new User($usr,$pass,$dni,$perf);
						$me = $temp->protoborrar();
						if($me<>''){
						$_SESSION['mensaje']=$me;
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}elseif($usr==$_SESSION['user']){
							$_SESSION['mensaje']='DONT_DELETE_USR_OWN';
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}elseif($usr=="admin"){
							$_SESSION['mensaje']='DONT_DELETE_USR_ADMIN';
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							header("Location: ../Views/GestCliExt/CLIEXT_DELETE_Vista.php?usr=$usr");
						}
						
						
						break;

		case 'Borrar': $temp = new User($usr,$pass,$dni,$perf);
						$_SESSION['mensaje']=$temp->borrar();
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');

			break;
		case 'Consultar': $temp = new User($usr,"",$dni,$perf);
						 $_SESSION['consulta']=$temp->ConsultarU();
						 header("Location: ../Views/GestCliExt/CLIEXT_SHOW_Vista.php?usr=$usr");
			break;
		case 'Modificar':
						if($perf==''){
							$temp = new User($usr,$pass,$dni,$perf);
							$auxMod=$temp->protomodificar();
							if($auxMod <> ''){
								$_SESSION['mensaje']=$auxMod;
								header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
							}else{
								header("Location: ../Views/GestCliExt/CLIEXT_EDIT_Vista.php?usr=$usr");
							}
						}else{
							$temp = new User($usr,$pass,$dni,$perf);
							$_SESSION['mensaje']=$temp->modificar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}
			break; 
		case 'Buscar':
			
			$aux=array();
			$aux=buscarUsuarios($busr);
			$_SESSION['busq']=$aux;
			 header("Location:../Views/GestCliExt/CLIEXT_LIST_Vista.php");			
			break;
		default:
			
			$aux=array();
			$aux=buscarUsuarios($busr);
			$_SESSION['busq']=$aux;
			 header("Location:../Views/GestCliExt/CLIEXT_LIST_Vista.php");			
			break;*/
	}
