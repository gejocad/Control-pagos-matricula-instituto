<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Bono{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar registro
public function insertar($matricula,$idusuario,$tipo_bono,$total_bono,$observacion){
	$sql="INSERT INTO bono (idmatricula,idusuario,tipo_bono,bono,observacion,estado) VALUES ('$matricula','$idusuario','$tipo_bono','$total_bono','$observacion','1')";
	return ejecutarConsulta($sql);
}


public function anular($idbono){
	$sql="UPDATE bono SET estado='0' WHERE idbono='$idbono'";
	return ejecutarConsulta($sql);
}


//metodo para mostrar registros
public function mostrar($idbono){
	$sql="SELECT * FROM bono WHERE idbono='$idbono'";
	return ejecutarConsultaSimpleFila($sql);
}


//listar registros
public function listar(){
	$sql="SELECT m.idmatricula,p.idbono,p.idusuario,u.nombre as usuario,e.nombre,e.apellido,r.nombre as programa,DATE(p.fecha_registro) AS fecha, p.tipo_bono, p.bono, p.estado FROM matricula m INNER JOIN bono p ON m.idmatricula=p.idmatricula INNER JOIN estudiante e ON m.idestudiante=e.idestudiante INNER JOIN programa r ON m.idprograma=r.idprograma INNER JOIN usuario u ON p.idusuario=u.idusuario ORDER BY p.idbono DESC";
	return ejecutarConsulta($sql);
}

public function bonocabecera($idbono){
	$sql="SELECT p.idbono, m.idestudiante, e.nombre, e.apellido, e.tipo_documento, e.numero_documento, e.telefono, p.idusuario, u.nombre AS usuario, DATE(p.fecha_registro) AS fecha,pr.nombre as programa,pr.semestre,m.precio_mes,m.pagado, p.bono FROM bono p INNER JOIN matricula m ON p.idmatricula=m.idmatricula INNER JOIN programa pr ON m.idprograma=pr.idprograma INNER JOIN estudiante e ON e.idestudiante=m.idestudiante INNER JOIN usuario u ON p.idusuario=u.idusuario WHERE p.idbono='$idbono'";
	return ejecutarConsulta($sql);

}

public function bonodetalles($idbono){
	$sql="SELECT tipo_bono, bono, observacion FROM bono WHERE idbono='$idbono'";
         return ejecutarConsulta($sql);
}

}

 ?>
