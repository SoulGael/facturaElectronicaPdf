<?php
$conexion = mysqli_connect("localhost","sqlServer","root","fak_electronica");
include 'conexion.php';
conectarse();
//$q=($_GET['geu']);
$claveFac=$_GET['claveFac'];

error_reporting(0);

$consulta="select documento_xml, n_factura from servicio where clave_acceso='".$claveFac."'";
$resultado=mysqli_query($conexion,$consulta);

while($fila = mysqli_fetch_assoc($resultado)){

	header("Content-Description: File Transfer");
	header("Content-Type: application/force-download");
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false);
    header("Content-Disposition: attachment; filename=".$fila['n_factura'].".xml;" );
    //header("Content-Transfer-Encoding: binary");
	print $fila['documento_xml'];
}

?>