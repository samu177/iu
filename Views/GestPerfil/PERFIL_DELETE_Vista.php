<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION["connected"] == "false"){
header("Location: ../../index.php");
}
include('../../Interfaz/Cabecera.php');
?>
<?php
		                	$aux=$_SESSION['contraccShow'];
		                	$perfil=$_GET['perfil'];
						?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <?php
            echo '<li class="contBandera"><a href="../../Controllers/PERFIL_Controller.php?idioma=esp&acc=¿Borrar?&perfil='.$perfil.'"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>';
            echo '<li class="contBandera"><a href="../../Controllers/PERFIL_Controller.php?idioma=eng&acc=¿Borrar?&perfil='.$perfil.'"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>';
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
			
			<legend>¿Seguro que quieres borrar este perfil?</legend>
			
		</fieldset>
		
	</div>
	<div class="col-xs-10">
		<table class="table table-striped table-bordered table-list " id="tablaConsultaUsuarios">
              	<thead>
                    <tr>
                        <th id='textoConsultUser'>Perfil</th>
                        <th id='textoConsultUser'>Acciones</th>
                        <th><em class="fa fa-cog"></em></th>
                    </tr> 
              	</thead>
              	<tbody >
                        
						<tr>
							<td id='textoConsultUserxt' align='center'><?=$perfil?></td>
							<td >
						  	<?php  
						  	$controladores=array();
				
							for ($i=0; $i < sizeof($aux); $i+=2){ 
								if(!in_array($aux[$i],$controladores)){
									echo "<strong >".constant($aux[$i])."</strong><br>";
									echo "<span id='tituloAccPerf'>".constant($aux[$i].$aux[$i+1])."</span><br>";
									array_push($controladores, $aux[$i]);
								}else{
									echo "<span id='tituloAccPerf'>".constant($aux[$i].$aux[$i+1])."</span><br>";
								}
								
							}
						  	?>
						  	</td>
						  	<td align="center" >
						  	<?php
	                			echo '<a class="btn btn-danger glyphicon glyphicon-trash" href="../../Controllers/PERFIL_Controller.php?acc=Borrar&perfil='.$perfil.'"></em></a>';
	                			echo '<a class="btn btn-info glyphicon glyphicon-home" href="../../Controllers/PERFIL_Controller.php?acc=Cancelar"></em></a>';
	                		?>
	            			</td>
						</tr>			    
                 </tbody>
            </table>
		</div>
		
		</body>
		</html>

	