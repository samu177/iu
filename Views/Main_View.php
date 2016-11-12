<?php
	class Main_View{

		private $user;

		function __construct($user){
			$this->user = $user;
		}

		function getView(){?>
		<!-- nav bar -->
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../Assets/css/style.css" />
	<link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap-theme.min.css">
	<script type="text/javascript" src="../Assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../Assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../Assets/js/npm.js"></script>
	<script type="text/javascript" src="../Assets/js/codigo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
				
</head>
<body>
<!-- Header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Moovett</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
            <li><a href="#">My Profile</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
      </ul>
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="row">
    <div class="col-md-2">
    <div class="barraIzq">
      <!-- Left column -->   
      <ul class="list-unstyled">
      <hr>
        <li class="nav-header"> <a href="#"  onclick="cambiar('userMenu')">
          <h5>Gestion de usuarios <i class="glyphicon glyphicon-chevron-right "></i></h5>
          </a>
            <ul class="list-unstyled collapse " name="userMenu" id="userMenu" >
                <li class="active"> <a href="#"><i class="glyphicon glyphicon-home"></i> Crear Nuevo Usuario</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-envelope"></i> Consultar Usuarios</a></li> 
                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Eliminar Usuarios</a></li>
                
          
            </ul>
        </li>
        <hr>
        <li class="nav-header"> <a href="#" onclick="cambiar('userMenu2')">
          <h5>Gestion de Perfiles <i class="glyphicon glyphicon-chevron-right"></i></h5>
          </a> 
           <ul class="list-unstyled collapse " name="userMenu2" id="userMenu2" >
                <li class="active"> <a href="#"><i class="glyphicon glyphicon-home"></i> Crear Nuevo Perfil</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-envelope"></i> Consultar Perfiles </a></li>
                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Eliminar Perfiles</a></li>    
            </ul>
        </li>
        <hr>
        <li class="nav-header"><a href="#" onclick="cambiar('userMenu3')">
          <h5>Gestión de idiomas <i class="glyphicon glyphicon-chevron-right"></i></h5>
          </a>
        	<ul class="list-unstyled collapse " name="userMenu3" id="userMenu3" >
                <li class="active"> <a href="#"><i class="glyphicon glyphicon-home"></i> Seleccionar idioma</a></li> 
            </ul>
            
        </li>
      </ul>
      <hr>
      </div>
  	</div><!-- /col-3 -->


  	<div class="col-md-10 ">
  			<?php include( '../Controllers/CALENDAR_controler.php' ); ?>
  	</div>
    
</div>



<!-- /Main -->

</body>

</html>

			<?php
		}
	}
?>