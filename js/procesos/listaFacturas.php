<?php
$conexion = mysqli_connect("localhost","sqlServer","root","fak_electronica");
session_start();
include 'conexion.php';
conectarse();
//$q=($_GET['geu']);
$cedula=$_POST['ced'];
$tipo=$_POST['tipo'];

error_reporting(0);

$consulta="select n_factura, fecha_emision, total, clave_acceso
	from servicio
	where cedula='".$cedula."' and tipo_factura=".$tipo." order by fecha_emision desc";
$resultado=mysqli_query($conexion,$consulta);

if(mysqli_num_rows($resultado)>0){
	echo "<div class='uk-overflow-container'>";
	echo '<table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">';
		echo "<thead>";
			echo "<tr>";
				echo "<th>Nº de Factura</th>";
				echo "<th>Fecha Emisión</th>";
				echo "<th>Total</th>";
				echo "<th>Pdf</th>";
				echo "<th>Xml</th>";
			echo "</tr>";
		echo "</thead>";

	while($fila = mysqli_fetch_assoc($resultado)){
		echo '<tbody>';
			echo '<tr>';
				echo '<td>';
				echo $fila['n_factura'];
				echo '</td>';
				echo '<td>';
				echo $fila['fecha_emision'];
				echo '</td>';
				echo '<td>';
				echo $fila['total'];
				echo '</td>';
				echo '<td>';
				echo '<a class="uk-icon-button uk-icon-file-pdf-o"  onClick="generarPdf(\''.$fila['clave_acceso'].'\');"></a>';
				echo '</td>';
				echo '<td>';
				echo '<a class="uk-icon-button uk-icon-file-code-o"  onClick="generarXml(\''.$fila['clave_acceso'].'\');"></a>';
				echo '</td>';
			echo '</tr>';
		echo '</tbody>';
	}
	echo "</table>";
	echo "</div>";
}else{
	echo '<b>No tiene Facturas</b>';
}

?>