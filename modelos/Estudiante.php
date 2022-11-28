<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Estudiante{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($idusuario,$nombre,$apellido,$fecha_nacimiento,$lugar_nacimiento,$tipo_documento,$numero_documento,$fecha_expedicion,$lugar_expedicion,$direccion_residencia,$telefono,$correo,$sangre,$acudiente,$telefono_acudiente,$observacion){
	$sql="INSERT INTO estudiante (idusuario,nombre,apellido,fecha_nacimiento,lugar_nacimiento,tipo_documento,numero_documento,fecha_expedicion,lugar_expedicion,direccion_residencia,telefono,correo,sangre,acudiente,telefono_acudiente,observacion,condicion)
	 VALUES ('$idusuario','$nombre','$apellido','$fecha_nacimiento','$lugar_nacimiento','$tipo_documento','$numero_documento','$fecha_expedicion','$lugar_expedicion','$direccion_residencia','$telefono','$correo','$sangre','$acudiente','$telefono_acudiente','observacion','1')";
	return ejecutarConsulta($sql);
}

public function editar($idusuario,$idestudiante,$nombre,$apellido,$fecha_nacimiento,$lugar_nacimiento,$tipo_documento,$numero_documento,$fecha_expedicion,$lugar_expedicion,$direccion_residencia,$telefono,$correo,$sangre,$acudiente,$telefono_acudiente,$observacion){
	$sql="UPDATE estudiante SET idusuario='$idusuario',nombre='$nombre',apellido='$apellido',fecha_nacimiento='$fecha_nacimiento',lugar_nacimiento='$lugar_nacimiento',tipo_documento='$tipo_documento',numero_documento='$numero_documento',fecha_expedicion='$fecha_expedicion',lugar_expedicion='$lugar_expedicion',direccion_residencia='$direccion_residencia',telefono='$telefono',correo='$correo',sangre='$sangre',acudiente='$acudiente',telefono_acudiente='$telefono_acudiente',observacion='$observacion' 
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
	$sql="SELECT e.idestudiante,u.nombre as usuario,e.nombre,e.apellido,e.fecha_nacimiento,e.numero_documento,e.telefono,e.correo,e.fecha_registro,e.condicion FROM estudiante e INNER JOIN usuario u ON e.idusuario=u.idusuario ORDER BY idestudiante DESC";
	return ejecutarConsulta($sql);
}



}
 ?>
