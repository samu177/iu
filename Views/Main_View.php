<?php
	class Main_View{

		private $userName;
    private $userPerm;
    private $datos; 
    private $horario;
    private $inicio;

  function __construct($userName,$userPerm,$horario,$inicio){
    $this->userName = $userName;
    $this->userPerm = $userPerm;
    $this->horario = $horario;
    $this->inicio = $inicio;
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
            
              <div class="navbar-header" id="logo">
                <a class="navbar-brand" href="../Controllers/CALENDAR_Controller.php">Moovett</a>
              </div>
              <div class="navbar-collapse collapse" >
                <ul class="nav navbar-nav navbar-right" id="options">
                  <li><a href="../index.html"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
                </ul>
              </div>
            </div><!-- /container -->
          </div>
          <!-- /Header -->

          <!-- Main -->
          <div class="row">
              <div class="col-md-2 ">
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
            	</div><!-- /col-2 -->
              
            	<div class="col-md-10"><!-- calendario -->
            			<div >
                    <?php
                      include '../Models/CALENDAR_model.php';
                    ?>
                      <div > <!-- div de muestra de datos.... titulos y datos --> 
                        <form action="../Controllers/CALENDAR_Controller.php" method="GET" class="divAntSig">
                        <input class="ant btn" type="submit" name="acc" value="ant">
                        <input class="sig btn" type="submit" name="acc" value="sig">
                        <input type="hidden" name="var" value="<?php echo $this->inicio ?>">
                        </form>
                          <?php
                            $this->datos = array(array('2016-11-03','13','boddyjump'),array('2016-11-05','16','tae chi'));
                            $titulos = titulos($this->inicio);
                          ?>

                          <table class="table table-bordered" id="tabla" width="100%" border = 1>
                            <!-- Fila de titulos -->
                            <tr>

                              <td align='center' class="ColIzq">
                                <form action="../Controllers/CALENDAR_Controller.php" method="GET">
                                  <input class="select btn " type="submit" name="Select" value="Actividades/Salas">
                                </form>
                              </td>

                              <?php
                                 $cont =0;
                                 foreach($titulos as $titulo){
                              ?>

                              <th class="fecha">
                                <?php
                                    echo $titulo;
                                ?>
                              </th>

                              <?php
                                }
                              ?>

                            </tr><!-- /Fila de titulos -->


                            <?php
                              $long = count($this->horario);
                              while ($cont < $long) {

                            ?>
                            <!-- Columnas con fechas -->
                            <tr>
                              <td class="horas">
                                <?php
                                  echo $this->horario[$cont];
                                ?>
                              </td>

                              <?php
                                for($i=0;$i<7;$i++){
                                //foreach($datos as $dato){

                              ?>

                              <td CSS de los datos>
                                <?php
                                    //echo $dato['2'];
                                ?>
                              </td>

                              <?php
                                }
                              ?>

                            </tr>

                            <?php
                                $cont++;
                              }
                            ?>

                          </table>

                       </div> <!-- fin de div de muestra de datos -->

                    </div><!-- /calendario -->
                    <?php
                      echo $this->userName."<br>";
                      echo $this->userPerm;
                    ?>
                  </div><!-- /col-10 -->  

          </div>
          <!-- /Main -->

        </body>

      </html>

			<?php
		}
	}
?>