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
            <li class="contBandera"><a href="../../Controllers/USER_Controller.php?idioma=esp&acc=Insertar"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>
            <li class="contBandera"><a href="../../Controllers/USER_Controller.php?idioma=eng&acc=Insertar"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>
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

	<form onsubmit="return comprobarDatos()" action="../../Controllers/USER_Controller.php" method="POST">
		<fieldset>
		<!-- Form Name -->
			<div class="form-group">
			<legend><?=ADD_USER?></legend>
			</div>

			<!-- Text input-->
		
			  <label class="col-xs-4 control-label" for="usr">Usuario</label>  
			  <div class="col-xs-6">
			  <input id="usr" name="usr" type="text" placeholder="Introduce usuario" class="form-control input-md" onBlur="comprobarUsuario(this)" required="">
			  </div>
			

			<!-- Text input-->
		
			  <label class="col-xs-4 control-label" for="password1">Contraseña</label>  
			  <div class="col-xs-6">
			  <input id="password1" name="password1" type="password" placeholder="Introduce contraseña" class="form-control input-md" onBlur="comprobarContraseña(this)" required="">
			    
			  </div>
			

			<!-- Text input-->
			
			  <label class="col-xs-4 control-label" for="password2">Repite Contraseña</label>  
			  <div class="col-xs-6">
			  <input id="password2" name="password2" type="password" placeholder="Vuelva a introducir contraseña" class="form-control input-md" onBlur="comprobarIgualdad()" required="">
			    
			  </div>
			

			<!-- Text input-->
			
			  <label class="col-xs-4 control-label" for="dni">DNI</label>  
			  <div class="col-xs-6">
			  <input id="dni" name="dni" type="text" placeholder="Introduce DNI" class="form-control input-md"  onBlur="comprobarDNI(this)" required="">
			    
			  </div>
			
			<!-- Select Basic -->
		
			  <label class="col-xs-4 control-label" for="perfil">Perfil</label>
			  <div class="col-xs-6">
			    <select id="perfil" name="perfil" class="form-control" required="">
			        					<?php
			        								$aux = $_SESSION['perfiles'];
													foreach ($aux as $value) {
														echo "<option value='".$value."'>".$value."</option>";
													}
												?>
			                            </select>
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
