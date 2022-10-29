<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Matricula{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar registro
public function insertar($estudiante,$programa,$horario,$precio_mes,$diploma_bachiller,$certificado_9,$fotocopia_identificacion,$fotocopia_registro_civil,$carpeta){
	$sql="INSERT INTO matricula (idestudiante,idprograma,idhorario,precio_mes,diploma_bachiller,certificado_9,fotocopia_identificacion,fotocopia_registro_civil,carpeta,condicion) VALUES ('$estudiante','$programa','$horario','$precio_mes','$diploma_bachiller','$certificado_9','$fotocopia_identificacion','$fotocopia_registro_civil','$carpeta','1')";
	return ejecutarConsulta($sql);
}
public function editar($idmatricula,$estudiante,$programa,$horario,$precio_mes,$diploma_bachiller,$certificado_9,$fotocopia_identificacion,$fotocopia_registro_civil,$carpeta){
	$sql="UPDATE matricula SET idestudiante='$estudiante',idprograma='$programa',idhorario='$horario',precio_mes='$precio_mes',diploma_bachiller='$diploma_bachiller',certificado_9='$certificado_9',fotocopia_identificacion='$fotocopia_identificacion',fotocopia_registro_civil='$fotocopia_registro_civil',carpeta='$carpeta',condicion='1'
	WHERE idmatricula='$idmatricula'";
	return ejecutarConsulta($sql);
}

public function anular($idmatricula){
	$sql="UPDATE matricula SET estado='Anulado' WHERE idmatricula='$idmatricula'";
	return ejecutarConsulta($sql);
}


//metodo para mostrar registros
public function mostrar($idmatricula){
	$sql="SELECT * FROM matricula WHERE idmatricula='$idmatricula'";
	return ejecutarConsultaSimpleFila($sql);
}

public function listarDetalle($idmatricula){
	$sql="SELECT di.idmatricula,di.idarticulo,a.nombre,di.cantidad,di.precio_compra,di.precio_venta FROM detalle_matricula di INNER JOIN articulo a ON di.idarticulo=a.idarticulo WHERE di.idmatricula='$idmatricula'";
	return ejecutarConsulta($sql);
}

//listar registros
public function listar(){
	$sql="SELECT m.idmatricula,e.nombre as nombre,p.nombre as programa,p.semestre,h.jornada as jornada, m.fecha_registro,m.precio_mes,m.pagado,m.condicion FROM matricula m INNER JOIN horario h ON m.idhorario=h.idhorario INNER JOIN programa p ON m.idprograma=p.idprograma INNER JOIN estudiante e ON m.idestudiante=e.idestudiante ORDER BY m.idmatricula DESC";
	return ejecutarConsulta($sql);
}

public function listarMatricula(){
	$sql="SELECT m.idmatricula,e.nombre,e.apellido,p.nombre as programa FROM matricula m INNER JOIN estudiante e ON m.idestudiante=e.idestudiante INNER JOIN programa p ON m.idprograma=p.idprograma ORDER BY m.idmatricula DESC";
	return ejecutarConsulta($sql);
}

public function listarMatriculaActiva(){
	$sql="SELECT m.idmatricula,e.nombre,e.apellido,p.nombre as programa FROM matricula m INNER JOIN estudiante e ON m.idestudiante=e.idestudiante INNER JOIN programa p ON m.idprograma=p.idprograma WHERE m.condicion=1 ORDER BY m.idmatricula DESC";
	return ejecutarConsulta($sql);
}

public function imprimirMatricula($idmatricula){
	$sql="SELECT m.idmatricula,m.fecha_registro,e.nombre as nombre_estudiante,e.apellido as apellido_estudiante,e.fecha_nacimiento,l.municipio as municipio_nacimiento,l.departamento as departamento_nacimiento,e.tipo_documento,e.numero_documento,e.fecha_expedicion,u.municipio as municipio_expedicion,u.departamento as departamento_expedicion,e.direccion_residencia,e.telefono,e.correo,e.sangre,e.acudiente,e.telefono_acudiente,e.observacion,h.jornada,h.hora_entrada,h.hora_salida,p.nombre,m.diploma_bachiller,m.certificado_9,m.fotocopia_identificacion,m.fotocopia_registro_civil,m.carpeta  FROM matricula m INNER JOIN estudiante e ON m.idestudiante=e.idestudiante INNER JOIN lugar l ON e.lugar_nacimiento=l.idlugar INNER JOIN lugar u ON e.lugar_expedicion=u.idlugar INNER JOIN programa p ON m.idprograma=p.idprograma INNER JOIN horario h ON m.idhorario=h.idhorario WHERE m.idmatricula='$idmatricula'";
	return ejecutarConsulta($sql);
}

}

 ?>
