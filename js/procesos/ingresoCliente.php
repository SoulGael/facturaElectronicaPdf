<?php
$conexion = mysqli_connect("localhost","sqlServer","root","fak_electronica");

include 'conexion.php';
conectarse();
//Inicio de variables de sesión
session_start();
//Recibir los datos ingresados en el formulario
$cedula= $_POST['cedula'];
$tipo= $_POST['tipo'];

//echo $tipo;
//echo $conexion;

//Consultar si los datos son están guardados en la base de datos
if(strcmp($tipo, "1")==0){
	$consulta="select distinct cedula, razon_social from servicio where cedula='".$cedula."'";
	$resultado=mysqli_query($conexion,$consulta);

	if (mysqli_num_rows($resultado)>0){ //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
		 while($fila = mysqli_fetch_assoc($resultado)) {
		 	$_SESSION['ced'] = $fila['cedula'];
			$_SESSION['nombres'] = $fila['razon_social'];
        	echo "0";
        	//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    	}
		//echo '<div class="uk-alert uk-alert-danger">Usuario no Encontrado</div>';
	}

	else{ //opcion2: Usuario logueado correctamente

		echo '<div class="uk-alert uk-alert-danger">Usuario no Encontrado</div>';
	}
}

?>