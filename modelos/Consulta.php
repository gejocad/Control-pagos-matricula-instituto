<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Consulta{


	//implementamos nuestro constructor
public function __construct(){


}


public function totalEstudiante(){
	$sql="SELECT count(*) as total_estudiantes FROM estudiante";
	return ejecutarConsulta($sql);
}

public function totalMatricula(){
	$sql="SELECT count(*) as total_matriculas FROM matricula";
	return ejecutarConsulta($sql);
}

public function totalPagos(){
	$sql="SELECT IFNULL(SUM(pago),0) as total_pagos FROM pago WHERE DATE(fecha_registro)=curdate()";
	return ejecutarConsulta($sql);
}

public function pagosultimos_10dias(){
	$sql=" SELECT CONCAT(DAY(fecha_registro),'-',MONTH(fecha_registro)) AS fecha, SUM(pago) AS total FROM pago GROUP BY fecha_registro ORDER BY fecha_registro DESC LIMIT 0,10";
	return ejecutarConsulta($sql);
}
}



 ?>
