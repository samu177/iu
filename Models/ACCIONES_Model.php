<?php

	/**
	* 
	*/
	class Accion{
		public $anomb;
		
		function __construct($anomb){
			$this->anomb=$anomb;
		}

		function ConectarBD(){
		    $mysqli = new mysqli("localhost", "root", "iu", "iu");
			
			if ($mysqli->connect_errno) {
				echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			return $mysqli;
		}

		function getNombre(){
			return $anomb;
		}


		function sacarAcciones(){
			$mysqli=$this->ConectarBD();
			$cnomb=$_SESSION['contrdeacc'];
		    $sql = "SELECT NOM_ACC, NOM_CONT FROM acciones WHERE NOM_ACC='".$this->anomb."' AND NOM_CONT='".$cnomb."'";
		    if (!($resultado = $mysqli->query($sql))){
			return 'Error en la consulta sobre la base de datos';
			}
		    else{
		    	$toret=array();
		    	$aux;
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['NOM_ACC']);
		    		array_push($toret, $aux['NOM_CONT']);
		    	}
				return $toret;
			}
		}


		function listarControladores(){
			$mysqli=$this->ConectarBD();
			$toret=array();
			$sql="select NOM_CONT from controlador"; 
			if (!($resultado = $mysqli->query($sql))){
			return 'Error en la consulta sobre la base de datos';
			}
		    elseif($resultado->num_rows == 0){
		  		return "error";
			}else{
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['NOM_CONT']);
		    	}
			}
			return $toret;
		}

		

		function insertar(){
		   	$mysqli=$this->ConectarBD();
		   	$controlador=$_SESSION['marcados'];
	        $sql = "SELECT NOM_ACC FROM acciones WHERE NOM_ACC = '".$this->anomb."' AND NOM_CONT = '".$controlador."'";

			if (!$result = $mysqli->query($sql)){
				return 'No se ha podido conectar con la base de datos'; 	
			}
			else {
		
				if ($result->num_rows == 0){
					$sql = "INSERT INTO acciones (NOM_ACC,NOM_CONT) VALUES ('";
					$sql = $sql."$this->anomb', '$controlador')";
					$mysqli->query($sql);
					return 'Inserción realizada con éxito';
				}
				else{
					return 'La accion ya existe en la base de datos';
				}
			}
		}
	

		function protomodificar(){
			$mysqli=$this->ConectarBD();
		    $sql = "SELECT NOM_CONT FROM controlador";
		      if (!($resultado = $mysqli->query($sql))){
			return 'Error en la consulta sobre la base de datos';
			}
			 else{
		    	$toret=array();
		    	while($aux = mysqli_fetch_row($resultado)){
		    		if(!in_array($aux[0], $toret)){
		    		array_push($toret, $aux[0]);
		    	}
		    	}
		    	$_SESSION['controladores']=$toret;
				return "";
			}
		}


		function modificar(){
			$mysqli=$this->ConectarBD();
			$marcado=$_SESSION['marcadoMod'];
			$antiguo=$_SESSION['controlmarcado'];
			$sql = "SELECT * FROM acciones WHERE NOM_ACC = '".$this->anomb."' AND NOM_CONT = '".$antiguo."'";
			if (!$result = $mysqli->query($sql)){
			return 'No se ha podido conectar con la base de datos'; 	
			}
			if($result->num_rows!=0){
			$sql = "DELETE FROM acciones WHERE NOM_ACC = '".$this->anomb."' AND NOM_CONT = '".$antiguo."'";
				if (!$result = $mysqli->query($sql)){
					return 'No se ha podido conectar con la base de datos'; 	
				}
			
			$sql = "INSERT INTO acciones (NOM_ACC,NOM_CONT) VALUES ('";
			$sql = $sql."$this->anomb', '$marcado')";
			if (!$result = $mysqli->query($sql)){
				return 'No se ha podido conectar con la base de datos'; 	
			}
			}

			$sql = "SELECT * FROM acciones WHERE NOM_ACC = '".$this->anomb."' AND NOM_CONT = '".$antiguo."'";
			if (!$result = $mysqli->query($sql)){
			return 'No se ha podido conectar con la base de datos'; 	
			}
			if($result->num_rows!=0){
			$sql = "DELETE FROM acciones WHERE NOM_ACC = '".$this->anomb."' AND NOM_CONT = '".$antiguo."'";
				if (!$result = $mysqli->query($sql)){
					return 'c)No se ha podido conectar con la base de datos'; 	
				}
			
			$sql = "INSERT INTO acciones (NOM_ACC,NOM_CONT) VALUES ('";
			$sql = $sql."$this->anomb', '$marcado')";
			if (!$result = $mysqli->query($sql)){
				return 'd)No se ha podido conectar con la base de datos'; 	
			}
			
			return 'La modificacion se ha realizado con exito';
		}
			
		}

		function borrar(){
			$mysqli=$this->ConectarBD();
			$controlador=$_SESSION['contrdeacc'];
			$sql = "DELETE FROM acciones WHERE NOM_ACC = '".$this->anomb."' AND NOM_CONT = '".$controlador."'";
			if (!$result = $mysqli->query($sql)){
				return 'No se ha podido conectar con la base de datos'; 	
			}
			return 'La accion se ha borrado correctamente';
		}



}

	function buscarAccion($busq){
	 		$mysqli = new mysqli("localhost", "root", "iu", "iu");
	
		if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			$toret=array();
			$sql="SELECT NOM_ACC, NOM_CONT FROM acciones WHERE NOM_ACC LIKE '%".$busq."%' AND NOM_CONT LIKE '%".$busq."%'"; 
			if (!($resultado = $mysqli->query($sql))){
			return 'Error en la consulta sobre la base de datos';
			}
		    elseif($resultado->num_rows == 0){
		  		return $toret;
			}else{
		    	$aux= array();
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['NOM_ACC']);
		    		array_push($toret, $aux['NOM_CONT']);
		    	}
			}
			return $toret;
		}

		