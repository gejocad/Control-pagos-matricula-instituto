<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Horario{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($jornada,$hora_entrada,$hora_salida){
	$sql="INSERT INTO horario (jornada,hora_entrada,hora_salida,condicion)
	 VALUES ('$jornada','$hora_entrada','$hora_salida','1')";
	return ejecutarConsulta($sql);
}

public function editar($idhorario,$jornada,$hora_entrada,$hora_salida){
	$sql="UPDATE horario SET jornada='$jornada',hora_entrada='$hora_entrada',hora_salida='$hora_salida'
	WHERE idhorario='$idhorario'";
	return ejecutarConsulta($sql);
}
public function desactivar($idhorario){
	$sql="UPDATE horario SET condicion='0' WHERE idhorario='$idhorario'";
	return ejecutarConsulta($sql);
}
public function activar($idhorario){
	$sql="UPDATE horario SET condicion='1' WHERE idhorario='$idhorario'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idhorario){
	$sql="SELECT * FROM horario WHERE idhorario='$idhorario'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar y mostrar en selct
public function select(){
	$sql="SELECT * FROM horario WHERE condicion=1";
	return ejecutarConsulta($sql);
}

//listar registros 
public function listar(){
	$sql="SELECT * FROM horario ORDER BY idhorario";
	return ejecutarConsulta($sql);
}

//listar registros activos
public function listarActivos(){
	$sql="SELECT * FROM horario WHERE condicion='1' ORDER BY idhorario ";
	return ejecutarConsulta($sql);
}
public function listarp(){
	$sql="SELECT * FROM horario";
	return ejecutarConsulta($sql);
}
}
 ?>
