<?php
require_once 'pdflib/dompdf_config.inc.php';
require_once('barcode.inc.php'); 
$conexion = mysqli_connect("localhost","sqlServer","root","fak_electronica");
include 'conexion.php';
conectarse();
//$q=($_GET['geu']);
$claveFac=$_GET['claveFac'];

//error_reporting(0);

$carga_xml = "";

$code_number = '0912201501109172885700120000000000000000165660020';
new barCodeGenrator($code_number,1,'barcode/'.$code_number.'.jpg', 500, 80, true);

$consulta="select documento_xml, n_factura from servicio where clave_acceso='".$claveFac."'";
$resultado=mysqli_query($conexion,$consulta);

while($fila = mysqli_fetch_assoc($resultado)){

	$carga_xml=simplexml_load_string($fila['documento_xml']);
}

$numeroAutorizacion=$carga_xml->numeroAutorizacion;
$fechaAutorizacion=$carga_xml->fechaAutorizacion;
$getXml=$carga_xml->comprobante;

$get2=new simplexmlElement($getXml);

//infoTributaria
$estab=$get2->infoTributaria->estab;
$ptoEmi=$get2->infoTributaria->ptoEmi;
$secuencial=$get2->infoTributaria->secuencial;
$razonSocial=$get2->infoTributaria->razonSocial;
$nombreComercial=$get2->infoTributaria->nombreComercial;
$ruc=$get2->infoTributaria->ruc;
$dirMatriz=$get2->infoTributaria->dirMatriz;

$codDoc=$get2->infoTributaria->codDoc;
$ambiente=$get2->infoTributaria->ambiente;
$tipoEmision=$get2->infoTributaria->tipoEmision;

//infoFactura
$dirEstablecimiento=$get2->infoFactura->dirEstablecimiento;
$fechaEmision=$get2->infoFactura->fechaEmision;
$obligadoContabilidad=$get2->infoFactura->obligadoContabilidad;
$contribuyenteEspecial=$get2->infoFactura->contribuyenteEspecial;

if(strcmp($ambiente,"1")==0){
	$ambiente="Pruebas";
}
if(strcmp($ambiente,"2")==0){
	$ambiente="Producción";
}

if(strcmp($tipoEmision,"1")==0){
	$tipoEmision="Emisión Normal";
}
if(strcmp($tipoEmision,"1")==0){
	$tipoEmision="Emisión por Indisponibilidad del Sistema";
}

# Contenido HTML del documento que queremos generar en PDF.
$html='
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Ejemplo de Documento en PDF.</title>
	</head>
	<body style="font-size:15px">

	<!--Info General*/-->
		 <table style="width : 100%;"> 
		 <tr> 
		 	<td width="49%" style="border: 1px solid black" valign="top">
		 		<table>
		 			<tr>
		 				<td>
			 				<table>
					 			<tr align=center>
					 				<td colspan="2"><br><br><br><br><br></td>
					 			</tr>
					 			<tr align=center>
					 				<td colspan="2">'.$razonSocial.'</td>
					 			</tr>
					 			<br>
					 			<tr>
					 				<td valign="top" width="40%">Dirección Matriz:</td>
					 				<td width="60%">'.$dirMatriz.'</td>
					 			</tr>
					 			<tr>
					 				<td valign="top" width="40%">Dirección Sucursal: </td>
					 				<td width="60%">'.$dirEstablecimiento.'</td>
					 			</tr>';
					 			if(strcmp($contribuyenteEspecial,"")!=0){
					 				$html.='<tr>
							 					<td colspan="2">Contribuyente Especial Nro. '.$contribuyenteEspecial.'</td>
							 			   </tr>';
					 			}
					 	$html.='<tr>
					 				<td colspan="2">OBLIGADO A LLEVAR CONTABILIDAD: '.$obligadoContabilidad.'</td>
					 			</tr>
					 		</table>
		 				</td>
		 			</tr>
		 		</table>
		 	</td>
		 	<td width="2%"></td>
		 	<td width="49%" style="border: 1px solid black" valign="top">
		 		<table>
		 			<tr>
		 				<td>
			 				<table>
					 			<tr>
					 				<td>R.U.C: '.$ruc.'</td>
					 			</tr>
					 			<tr>
					 				<td>F A C T U R A</td>
					 			</tr>
					 			<tr>
					 				<td>No. '.$estab.'-'.$ptoEmi.'-'.$secuencial.'</td>
					 			</tr>
					 			<tr>
					 				<td>NÚMERO DE AUTORIZACIÓN</td>
					 			</tr>
					 			<tr>
					 				<td>'.$numeroAutorizacion.'</td>
					 			</tr>
					 			<tr>
					 				<td>FECHA Y HORA DE AUTORIZACION</td>
					 			</tr>
					 			<tr>
					 				<td>'.$fechaAutorizacion.'</td>
					 			</tr>
					 			<tr>
					 				<td>AMBIENTE: Producción</td>
					 			</tr>
					 			<tr>
					 				<td>EMISIÓN: Contingencia</td>
					 			</tr>
					 			<tr>
					 				<td>CLAVE DE ACCESO</td>
					 			</tr>
					 			<tr>
					 				<td><img src="barcode/'.$code_number.'.jpg" WIDTH="330px"></td>
					 			</tr>
					 		</table>
		 				</td>
		 			</tr>
		 		</table>
		 	</td>
		 </tr> 
		</table>
		<br>

		<!--Info del Cliente*/-->
		<table border="0.2" style="width : 100%;"> 
		 <tr> 
			 <td>
			 	<table style="width : 100%;">
				 	<tr>
					 	<td width="30%" valign="top">Razón Social / Nombres y Apellidos:</td>
					 	<td width="45%" valign="top">TAIS CONEJO MARINA ALEXANDRA</td>
					 	<td width="25%" valign="top">RUC/CI: 1003291034</td>
				 	</tr>
				 	<tr>
					 	<td valign="top">Fecha de emisión: 05/11/2015</td>
					 	<td valign="top" colspan=2>DIRECCION: CALLE ROCA Y MORALES</td>
				 	</tr>
			 	</table>
		 	</td>
		 </tr>
		</table>

		<!--Detalle*/-->
		<br>
		<table border="0.2" style="width : 100%;border-collapse: collapse;">
			<tr align=center>
				<td width="10%">Cod. Principal</td>
				<td width="10%">Cant.</td>
				<td width="50%">Descripción</td>
				<td width="10%">Precio Unitario</td>
				<td width="10%">Desc.</td>
				<td width="10%">Total</td>
			</tr>
			<tr align=center>
				<td>1</td>
				<td>1.00</td>
				<td>SERVICIO DE INTERNET PLAN RESIDENCIAL 3.0 Mbps PERIODO FACTURADO 2015 / octubre ~</td>
				<td>11.52</td>
				<td>0.00</td>
				<td>11.52</td>
			</tr>
		</table>

		<!--Informacion*/-->
		<br>
		<table style="width : 100%;"> 
		 <tr> 
		 	<td width="40%" style="border: 1px solid black" valign="top">
		 		<table>
		 			<tr>
		 				<td>
			 				<table>
					 			<tr align=center>
					 				<td colspan="2">Información Adicional</td>
					 			</tr>
					 			<tr><td><br></td></tr>
					 			<tr>
					 				<td valign="top" width="40%">Contacto: </td>
					 				<td valign="top">062609177 / 062610330</td>
					 			</tr>
					 			<tr>
					 				<td valign="top" width="40%">Email:</td>
					 				<td valign="top">info@saitel.ec</td>
					 			</tr>
					 			<tr>
					 				<td valign="top">Sitio Web:</td>
					 				<td valign="top">www.saitel.ec</td>
					 			</tr>
					 			<tr><td><br></td></tr>
					 			<tr>
					 				<td valign="top" colspan="2">PARA LA ATENCION DE RECLAMOS NO RESUELTOS POR LA 
					 				OPERADORA, LLAME GRATIS A LA ARCOTEL 1800-567- 567</td>
					 			</tr>
					 		</table>
		 				</td>
		 			</tr>
		 		</table>
		 	</td>
		 	<td width="10%"></td>
		 	<td width="50%" valign="top">
		 		<table border="0.2" style="width : 100%;border-collapse: collapse;">
		 			<tr>
		 				<td width="70%">SUBTOTAL 12% </td>
		 				<td width="30%" align=right>11.52</td>
		 			</tr>
		 			<tr>
		 				<td>SUBTOTAL 0% </td>
		 				<td align=right>0.00</td>
		 			</tr>
		 			<tr>
		 				<td>SUBTOTAL No objeto de IVA </td>
		 				<td align=right>0.00</td>
		 			</tr>
		 			<tr>
		 				<td>SUBTOTAL SIN IMPUESTOS  </td>
		 				<td align=right>11.52</td>
		 			</tr>
		 			<tr>
		 				<td>SUBTOTAL Exento de IVA</td>
		 				<td align=right>0.00</td>
		 			</tr>
		 			<tr>
		 				<td>DESCUENTO</td>
		 				<td align=right>0.00</td>
		 			</tr>
		 			<tr>
		 				<td>IVA 12%</td>
		 				<td align=right>1.38</td>
		 			</tr>
		 			<tr>
		 				<td>VALOR TOTAL</td>
		 				<td align=right>12.9</td>
		 			</tr>
		 		</table>
		 	</td>
		 </tr> 
		</table>
	</body>
</html>';
 
# Instanciamos un objeto de la clase DOMPDF.
$mipdf = new DOMPDF();
 
# Definimos el tamaño y orientación del papel que queremos.
# O por defecto cogerá el que está en el fichero de configuración.
$mipdf ->set_paper("A4", "portrait");
 
# Cargamos el contenido HTML.
$mipdf ->load_html($html);

//aumentamos memoria del servidor si es necesario
ini_set("memory_limit","32M"); 

# Renderizamos el documento PDF.
$mipdf ->render();
 
# Enviamos el fichero PDF al navegador.
$mipdf ->stream('FicheroEjemplo.pdf', array("Attachment" => 0));
?>

?>