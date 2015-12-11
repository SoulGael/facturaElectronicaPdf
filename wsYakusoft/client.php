<?php
include('lib/nusoap.php');
$client = new nusoap_client('http://localhost/fak/wsYakusoft/setDocElectronico.php?wsdl','wsdl');
$err = $client->getError();
if ($err) {
	echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
}

$param = array('cedula' => '1003291034','razon_social' => 'Marina Tais',
	'clave_acceso' => '12345678901234567890','num_factura' => '001-001-2002929',
	'fecha_emision' => '2015-11-11','total' => '51.51',
	'tipo_documento' => '1','documento_xml' => '<?wdsl>');
$result = $client->call('setDocElectronico', $param);

if ($client->fault) {
	echo '<h2>Fault</h2><pre>';
	print_r($result);
	echo '</pre>';
} else {
	// Check for errors
	$err = $client->getError();
	if ($err) {
		// Display the error
		echo '<h2>Error</h2><pre>' . $err . '</pre>';
	} else {
		// Display the result
		echo '<h2>Result</h2><pre>';
		print($result);
		echo '</pre>';
	}
}

echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
?>
