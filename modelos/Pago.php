<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Pago{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar registro
public function insertar($matricula,$tipo_pago,$total_pago,$observacion){
	$sql="INSERT INTO pago (idmatricula,tipo_pago,pago,observacion,estado) VALUES ('$matricula','$tipo_pago','$total_pago','$observacion','1')";
	return ejecutarConsulta($sql);
}


public function anular($idpago){
	$sql="UPDATE pago SET estado='Anulado' WHERE idpago='$idpago'";
	return ejecutarConsulta($sql);
}


//metodo para mostrar registros
public function mostrar($idpago){
	$sql="SELECT * FROM pago WHERE idpago='$idpago'";
	return ejecutarConsultaSimpleFila($sql);
}


//listar registros
public function listar(){
	$sql="SELECT m.idmatricula,p.idpago,e.nombre,e.apellido,r.nombre as programa, p.tipo_pago, p.pago, p.estado FROM matricula m INNER JOIN pago p ON m.idmatricula=p.idmatricula INNER JOIN estudiante e ON m.idestudiante=e.idestudiante INNER JOIN programa r ON m.idprograma=r.idprograma ORDER BY p.idpago DESC";
	return ejecutarConsulta($sql);
}

}

 ?>
