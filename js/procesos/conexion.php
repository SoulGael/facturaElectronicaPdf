<?php
function conectarse() {
	$conexion = mysqli_connect("localhost","sqlServer","root","fak_electronica");
	if (!$conexion) 
    //if (!($conexion = pg_connect("host='localhost' port=5432 dbname='db_isp' user='postgres' password='postgres'"))) 
    {
    	die("Connection failed: " . mysqli_connect_error());
        exit();
    }
    return $conexion;
    pg_close();
}
conectarse();
?>