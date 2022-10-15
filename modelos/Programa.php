<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Programa{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($nombre,$resolucion,$licencia,$fecha_expedicion,$fecha_vencimiento,$codigo,$semestre,$decreto){
	$sql="INSERT INTO programa (nombre,resolucion,licencia,fecha_expedicion,fecha_vencimiento,codigo,semestre,decreto,condicion)
	 VALUES ('$nombre','$resolucion','$licencia','$fecha_expedicion','$fecha_vencimiento','$codigo','$semestre','$decreto','1')";
	return ejecutarConsulta($sql);
}

public function editar($nombre,$resolucion,$licencia,$fecha_expedicion,$fecha_vencimiento,$codigo,$semestre,$decreto){
	$sql="UPDATE programa SET nombre='$nombre',resolucion='$resolucion',licencia='$licencia',fecha_expedicion='$fecha_expedicion',fecha_vencimiento='$fecha_vencimiento',codigo='$codigo',semestre='$semestre',decreto='$decreto' 
	WHERE idprograma='$idprograma'";
	return ejecutarConsulta($sql);
}
public function desactivar($idprograma){
	$sql="UPDATE programa SET condicion='0' WHERE idprograma='$idprograma'";
	return ejecutarConsulta($sql);
}
public function activar($idprograma){
	$sql="UPDATE programa SET condicion='1' WHERE idprograma='$idprograma'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idprograma){
	$sql="SELECT * FROM programa WHERE idprograma='$idprograma'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar y mostrar en selct
public function select(){
	$sql="SELECT * FROM programa WHERE condicion=1";
	return ejecutarConsulta($sql);
}

//listar registros 
public function listar(){
	$sql="SELECT idprograma,nombre,resolucion,fecha_expedicion,fecha_vencimiento,codigo,semestre,condicion FROM programa ORDER BY idprograma DESC";
	return ejecutarConsulta($sql);
}

//listar registros activos
public function listarActivos(){
	$sql="SELECT a.idprograma,a.idcategoria,a.nombre as nombre,a.idcategoria,c.nombre as categoria,a.codigo,a.stock,a.ing1,a.cant1,a.ing2,a.cant2,a.ing3,a.cant3,a.ing4,a.cant4,a.ing5,a.cant5,a.ing6,a.cant6,a.ing7,a.cant7,a.descripcion,a.imagen,a.condicion FROM programa a INNER JOIN categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
	return ejecutarConsulta($sql);
}
public function listarp(){
	$sql="SELECT * FROM programa";
	return ejecutarConsulta($sql);
}
}
 ?>
