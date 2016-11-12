<?php

class CALENDAR_view{

private $datos; 
private $horario;
private $inicio;

function __construct($horario,$inicio){
	$this->horario = $horario;
	$this->inicio = $inicio;
	$this->render();
}
function render(){
?>

<div>
<p>
<h2>
<?php
	include '../Models/CALENDAR_model.php';
?>
<div> <!-- div de muestra de datos.... titulos y datos --> 
<form action="../Controllers/CALENDAR_controler.php" method="GET">
<input type="submit" name="acc" value="ant">
<input type="submit" name="acc" value="sig">
<input type="hidden" name="var" value="<?php echo $this->inicio ?>">
</form>
<?php
	$this->datos = array(array('2016-11-03','13','boddyjump'),array('2016-11-05','16','tae chi'));
	$titulos = titulos($this->inicio);
?>
	<table border = 1>
	<tr>
	<th>
	</th>
<?php
	$cont =0;
	foreach($titulos as $titulo){
?>
		<th>
<?php
		echo $titulo;
?>
		</th>
<?php
	}
?>
	</tr>
<?php
	$long = count($this->horario);
	while ($cont < $long) {

?>
	<tr>
	<td>
<?php
	echo $this->horario[$cont];
?>
	</td>
<?php
		for($i=0;$i<7;$i++){
		//foreach($datos as $dato){

?>
		<td>
<?php
			//echo $dato['2'];
?>
		</td>
<?php
	//}
	}
?>
	<tr>
<?php
	$cont++;
	}
?>
	</table>

</div> <!-- fin de div de muestra de datos -->
<h3>
<p>

</h3>
</p>

</div>

<?php
} //fin metodo render

}