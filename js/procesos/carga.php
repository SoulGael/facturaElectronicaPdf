<?php
require_once('barcode.inc.php'); 
$conexion = mysqli_connect("localhost","sqlServer","root","fak_electronica");
include 'conexion.php';
conectarse();
//$q=($_GET['geu']);

//error_reporting(0);

$carga_xml = "";

$code_number = '0912201501109172885700120000000000000000165660020';
new barCodeGenrator($code_number,1,'barcode/'.$code_number.'.jpg', 500, 80, true);

$consulta="select documento_xml, n_factura from servicio where clave_acceso='".$code_number."'";
$resultado=mysqli_query($conexion,$consulta);

while($fila = mysqli_fetch_assoc($resultado)){

	$carga_xml=simplexml_load_string($fila['documento_xml']);
}
$numeroAutorizacion=$carga_xml->numeroAutorizacion;
$getXml=$carga_xml->comprobante;

$get2=new simplexmlElement($getXml);
$rat=$get2->infoTributaria->razonSocial;

/*$file = fopen("barcode/".$code_number.".xml", "a");
fwrite($file, $getXml . PHP_EOL);
fclose($file);*/

//$xml = simplexml_load_file("0912201501109172885700120000000000000000165660020.xml");

//$rat=$xml->infoTributaria->razonSocial;

echo $rat;

?>