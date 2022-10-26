<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Lugar{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($municipio,$departamento){
	$sql="INSERT INTO lugar (municipio,departamento,condicion)
	 VALUES ('$nombre','1')";
	return ejecutarConsulta($sql);
}

public function editar($idlugar,$municipio,$departamento){
	$sql="UPDATE lugar SET municipio='$municipio',departamento='$departamento'
	WHERE idlugar='$idlugar'";
	return ejecutarConsulta($sql);
}
public function desactivar($idlugar){
	$sql="UPDATE lugar SET condicion='0' WHERE idlugar='$idlugar'";
	return ejecutarConsulta($sql);
}
public function activar($idlugar){
	$sql="UPDATE lugar SET condicion='1' WHERE idlugar='$idlugar'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idlugar){
	$sql="SELECT * FROM lugar WHERE idlugar='$idlugar'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar y mostrar en selct
public function select(){
	$sql="SELECT * FROM lugar WHERE condicion=1";
	return ejecutarConsulta($sql);
}

//listar registros 
public function listar(){
	$sql="SELECT * FROM lugar ORDER BY idlugar";
	return ejecutarConsulta($sql);
}

//listar registros activos
public function listarLugarActivos(){
		$sql="SELECT * FROM lugar WHERE condicion='1' ORDER BY idlugar DESC";
	return ejecutarConsulta($sql);
}
}
 ?>
