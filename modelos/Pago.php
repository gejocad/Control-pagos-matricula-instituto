<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Pago{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar registro
public function insertar($idmatricula,$idusuario,$tipo_pago,$total_pago,$observacion){
	$sql="INSERT INTO pago (idmatricula,idusuario,tipo_pago,pago,observacion,estado) VALUES ('$idmatricula','$idusuario','$tipo_pago','$total_pago','$observacion','1')";
	return ejecutarConsulta($sql);
}


public function anular($idpago){
	$sql="UPDATE pago SET estado='0' WHERE idpago='$idpago'";
	return ejecutarConsulta($sql);
}


//metodo para mostrar registros
public function mostrar($idpago){
	$sql="SELECT * FROM pago WHERE idpago='$idpago'";
	return ejecutarConsultaSimpleFila($sql);
}


//listar registros
public function listar(){
	$sql="SELECT m.idmatricula,p.idpago,p.idusuario,u.nombre as usuario,e.nombre,e.apellido,r.nombre as programa,DATE(p.fecha_registro) AS fecha, p.tipo_pago, p.pago, p.estado FROM matricula m INNER JOIN pago p ON m.idmatricula=p.idmatricula INNER JOIN estudiante e ON m.idestudiante=e.idestudiante INNER JOIN programa r ON m.idprograma=r.idprograma INNER JOIN usuario u ON p.idusuario=u.idusuario ORDER BY p.idpago DESC";
	return ejecutarConsulta($sql);
}

public function pagocabecera($idpago){
	$sql="SELECT p.idpago, m.idestudiante, e.nombre, e.apellido, e.tipo_documento, e.numero_documento, e.telefono, p.idusuario, u.nombre AS usuario, DATE(p.fecha_registro) AS fecha,pr.nombre as programa,pr.semestre,m.precio_mes,m.pagado, p.pago FROM pago p INNER JOIN matricula m ON p.idmatricula=m.idmatricula INNER JOIN programa pr ON m.idprograma=pr.idprograma INNER JOIN estudiante e ON e.idestudiante=m.idestudiante INNER JOIN usuario u ON p.idusuario=u.idusuario WHERE p.idpago='$idpago'";
	return ejecutarConsulta($sql);

}

public function pagodetalles($idpago){
	$sql="SELECT tipo_pago, pago, observacion FROM pago WHERE idpago='$idpago'";
         return ejecutarConsulta($sql);
}

}

 ?>
