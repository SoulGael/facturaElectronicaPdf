<?php
require_once "lib/nusoap.php";

$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');

$server->register('setDocElectronico',											// method name
    array('cedula' => 'xsd:string',
          'razon_social' => 'xsd:string',
          'clave_acceso' => 'xsd:string',
          'num_factura' => 'xsd:string',
          'fecha_emision' => 'xsd:string',
          'total' => 'xsd:string',
          'tipo_documento' => 'xsd:string',
          'documento_xml' => 'xsd:string'),	// input parameters
    array('return' => 'xsd:string'),										// output parameters
    'urn:MetodoPruebawsdl',													// namespace
    'urn:MetodoPruebawsdl#MetodoPrueba',									// soapaction
    'rpc',																	// style
    'encoded',																// use
    'Registra un documento electronico y retorna una confirmacio en formato cadena = "ok"'														// documentation
);

function setDocElectronico($cedula, $razon_social, $clave_acceso, $num_factura, $fecha_emision, $total, $tipo_documento, $documento_xml) 
{
  //return $cedula;

  $conexion = mysqli_connect("localhost","sqlServer","root","fak_electronica");
  $sql="insert into servicio(cedula, razon_social,clave_acceso,n_factura,fecha_emision,total,tipo_factura,documento_xml)
  values('".$cedula."','".$razon_social."', '".$clave_acceso."','".$num_factura."','".$fecha_emision."','".$total."',".$tipo_documento.",'".$documento_xml."')";
	if ($conexion->query($sql) === TRUE) {
    return 'ok';
  } else {
      return "Error: " . $sql . "<br>" . $conexion->error;
  }

}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>