<?php
session_start();
if(!isset($_SESSION['idioma']) ){
    session_destroy();
    header("Location: ../../index.php?logout=true");
}


if(isset($_SESSION['connected']) && $_SESSION["connected"] == "false"){
header("Location: ../../index.php");
}
include('../../Interfaz/Cabecera.php');
?>
<ul class="dropdown-menu" role="menu" id="contBandera">
            <li class="glyphicon glyphicon-user" id="user"> <?=$_SESSION["user"]?></li>
            <li id="idioma"><?=IDIOMA?>: </li>
            <li class="contBandera"><a href="../../Controllers/CLIEXT_Controller.php?idioma=esp&acc=Insertar"><IMG SRC="../../Assets/img/bespanha.gif" class="bandera"> Esp </a></li>
            <li class="contBandera"><a href="../../Controllers/CLIEXT_Controller.php?idioma=eng&acc=Insertar"><IMG SRC="../../Assets/img/buk.gif" class="bandera"> Eng </a></li>
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

	<form action="../../Controllers/CLIEXT_Controller.php" method="POST">
		<fieldset>
		<!-- Form Name -->
			<div class="form-group">
			<legend><?=TITULO_ADD_USER?></legend>
			</div>

			<!-- Text input-->
		
			  <label class="col-xs-4 control-label" for="nom"><?=LABEL_USER?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="nom" name="nom" type="text" placeholder="'.CAMPO_USER_USER.'" class="form-control input-md" required="">';
			  ?>
			  </div>

			  <!-- Text input-->
		
			  <label class="col-xs-4 control-label" for="email"><?=LABEL_USER?></label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="email" name="email" type="email" placeholder="'.CAMPO_USER_USER.'" class="form-control input-md" required="">';
			  ?>
			  </div>

			<!-- Text input-->
			
			  <label class="col-xs-4 control-label" for="dni">DNI</label>  
			  <div class="col-xs-6">
			  <?php
			  echo '<input id="dni" name="dni" type="text" placeholder="'.CAMPO_USER_DNI.'" class="form-control input-md"  onBlur="comprobarDNI(this)" required="">';
			   ?>
			  </div>
			
			
			  <label class="col-xs-4 control-label" for="singlebutton" ></label>
			  <div class="col-xs-4" id="CrearUsrButtons">
			  <?php
			   echo '<input type="hidden" name="acc" value="Insertar" >';
			   echo '<input type="submit" value="'.ADD.'" class="btn">';
			   ?>
			  </div>
			
		</fieldset>
	</form>
</div>
</div>
</body>
</html>
