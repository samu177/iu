
<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION["connected"] == "false"){
header("Location: ../../index.php");
}
include('../../Interfaz/Cabecera.php');
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <li class="contBandera"><a href="../../Controllers/ACCIONES_Controller.php?idioma=esp&acc=Insertar"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>
            <li class="contBandera"><a href="../../Controllers/ACCIONES_Controller.php?idioma=eng&acc=Insertar"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>
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

<div class="col-xs-8"><!-- col8 -->

	<form onsubmit="return comprobarDatosCont()" action="../../Controllers/ACCIONES_Controller.php" method="POST">
		<fieldset>
		<!-- Form Name -->
			
			<legend>Crear accion</legend>
			

			<!-- Text input-->
			
		  <label class="col-xs-4 control-label" for="usr">Accion</label>  
		  <div class="col-xs-6">
		  <input type="text" name="anomb" placeholder="" class="form-control input-md" required>
		  </div>
			
			<label class="col-xs-4 control-label" for="usr">Controladores</label>  
			  <div class="col-xs-6 ">
			  <?php
				$mostacc=$_SESSION['controladores'];
				$cont=0;
				foreach ($mostacc as $value) {
					$au="<br><label><input type='radio' name='control' value='".$value."' ";
					if($cont==0){
						$au.= "checked='checked'";
					}
					$au.=">".constant($value);
					echo $au.'</label>';
					$cont++;
				}
				
				?>
			  </div>

			
			  <label class="col-xs-4 control-label" for="singlebutton" ></label>
			  <div class="col-xs-4" id="CrearUsrButtons">
			   <input type="submit" name="acc" value="Insertar" class="btn">
			   <input type="reset" value="Limpiar" class="btn" id="resetUsrAdd">
			  </div>
			
		</fieldset>
	</form>
</div>
</div>
</body>
</html>
