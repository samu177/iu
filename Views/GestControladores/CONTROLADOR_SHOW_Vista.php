


<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION["connected"] == "false"){
header("Location: ../../index.php");
}
include('../../Interfaz/Cabecera.php');
?>
<?php
	$am= $_GET['cnomb'];
	$con=$_SESSION['consulta'];
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/CONTROLADORES_Controller.php?idioma=esp&acc=Consultar&cnomb='.$am.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/CONTROLADORES_Controller.php?idioma=eng&acc=Consultar&cnomb='.$am.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
            ?>
          </ul>
        </div>
          
        
      </div><!-- /container -->
    </div>
    <!-- /Header -->
<?php
    include('../../Interfaz/BarraLateral.php');
?>

<div class="col-xs-1">
</div>

<div class="col-xs-8"><!-- 8 -->
	<div>
		<fieldset>
		<!-- Form Name -->
			
			<legend>Mostrar controlador</legend>
			
		</fieldset>
		
	</div>
	<div class="col-xs-10">
		<table class="table table-striped table-bordered table-list " id="tablaConsultaUsuarios">
              	<thead>
                    <tr>
                        <th id='textoConsultUser'>Controlador</th>
                        <th id='textoConsultUser'>Acciones</th>
                        <th><em class="fa fa-cog"></em></th>
                    </tr> 
              	</thead>
              	<tbody >
                        
						<tr>
						  	<?php  
						  	echo "<td id='textoConsultUserxt' align='center'>".//if issetconstant($am)."</td>";
						  	
						  	echo "<td id='textoConsultUserxt' align='center'>";

							foreach ($con as $value) {
								echo constant($am.$value) ."</br>";
							}

						  	echo "</td>";
						  	?>
						  	<td align="center" >
						  	<?php
	                			echo '<a class="btn btn-default glyphicon glyphicon-pencil" href="../../Controllers/CONTROLADORES_Controller.php?acc=Modificar&cnomb='.$am.'"></em></a>';
	                			echo '<a class="btn btn-default glyphicon glyphicon-trash" href="../../Controllers/CONTROLADORES_Controller.php?acc=¿Borrar?&cnomb='.$am.'"></em></a>';
	                		?>
	            			</td>
						</tr>			    
                 </tbody>
            </table>
		</div>
		
		</body>
		</html>

	
	