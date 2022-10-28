<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Estudiante{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($nombre,$apellido,$fecha_nacimiento,$lugar_nacimiento,$tipo_documento,$numero_documento,$fecha_expedicion,$lugar_expedicion,$direccion_residencia,$telefono,$correo,$sangre,$acudiente,$telefono_acudiente,$observacion){
	$sql="INSERT INTO estudiante (nombre,apellido,fecha_nacimiento,lugar_nacimiento,tipo_documento,numero_documento,fecha_expedicion,lugar_expedicion,direccion_residencia,telefono,correo,sangre,acudiente,telefono_acudiente,observacion,condicion)
	 VALUES ('$nombre','$apellido','$fecha_nacimiento','$lugar_nacimiento','$tipo_documento','$numero_documento','$fecha_expedicion','$lugar_expedicion','$direccion_residencia','$telefono','$correo','$sangre','$acudiente','$telefono_acudiente','observacion','1')";
	return ejecutarConsulta($sql);
}

public function editar($idestudiante,$nombre,$apellido,$fecha_nacimiento,$lugar_nacimiento,$tipo_documento,$numero_documento,$fecha_expedicion,$lugar_expedicion,$direccion_residencia,$telefono,$correo,$sangre,$acudiente,$telefono_acudiente,$observacion){
	$sql="UPDATE estudiante SET nombre='$nombre',apellido='$apellido',fecha_nacimiento='$fecha_nacimiento',lugar_nacimiento='$lugar_nacimiento',tipo_documento='$tipo_documento',numero_documento='$numero_documento',fecha_expedicion='$fecha_expedicion',lugar_expedicion='$lugar_expedicion',direccion_residencia='$direccion_residencia',telefono='$telefono',correo='$correo',sangre='$sangre',acudiente='$acudiente',telefono_acudiente='$telefono_acudiente',observacion='$observacion' 
	WHERE idestudiante='$idestudiante'";
	return ejecutarConsulta($sql);
}
public function desactivar($idestudiante){
	$sql="UPDATE estudiante SET condicion='0' WHERE idestudiante='$idestudiante'";
	return ejecutarConsulta($sql);
}
public function activar($idestudiante){
	$sql="UPDATE estudiante SET condicion='1' WHERE idestudiante='$idestudiante'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idestudiante){
	$sql="SELECT * FROM estudiante WHERE idestudiante='$idestudiante'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar y mostrar en selct
public function select(){
	$sql="SELECT * FROM estudiante WHERE condicion=1";
	return ejecutarConsulta($sql);
}

//listar registros 
public function listar(){
	$sql="SELECT idestudiante,nombre,apellido,fecha_nacimiento,numero_documento,telefono,correo,fecha_registro,condicion FROM estudiante  ORDER BY idestudiante DESC";
	return ejecutarConsulta($sql);
}

//listar registros activos
public function listarActivos(){
	$sql="SELECT a.idestudiante,a.idcategoria,a.nombre as nombre,a.idcategoria,c.nombre as categoria,a.codigo,a.stock,a.ing1,a.cant1,a.ing2,a.cant2,a.ing3,a.cant3,a.ing4,a.cant4,a.ing5,a.cant5,a.ing6,a.cant6,a.ing7,a.cant7,a.descripcion,a.imagen,a.condicion FROM estudiante a INNER JOIN categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
	return ejecutarConsulta($sql);
}

//implementar un metodo para listar los activos, su ultimo precio y el stock(vamos a unir con el ultimo registro de la tabla detalle_ingreso)
public function listarActivosVenta(){
	$sql="SELECT a.idestudiante,a.idcategoria,a.nombre as nombre,a.idcategoria,c.nombre as categoria,a.codigo,a.stock,a.ing1,a.cant1,a.ing2,a.cant2,a.ing3,a.cant3,a.ing4,a.cant4,a.ing5,a.cant5,a.ing6,a.cant6,a.ing7,a.cant7,a.descripcion,a.imagen,a.condicion,(SELECT precio_venta FROM detalle_ingreso WHERE idestudiante=a.idestudiante ORDER BY iddetalle_ingreso DESC LIMIT 0,1) AS precio_venta FROM estudiante a INNER JOIN categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
	return ejecutarConsulta($sql);
}

}
 ?>
