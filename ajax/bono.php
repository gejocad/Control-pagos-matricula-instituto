<?php 
require_once "../modelos/Bono.php";
if (strlen(session_id())<1) 
	session_start();
	
$bono=new Bono();

$idbono=isset($_POST["idbono"])? limpiarCadena($_POST["idbono"]):"";
$idmatricula=isset($_POST["idmatricula"])? limpiarCadena($_POST["idmatricula"]):"";
$tipo_bono=isset($_POST["tipo_bono"])? limpiarCadena($_POST["tipo_bono"]):"";
$total_bono=isset($_POST["total_bono"])? limpiarCadena($_POST["total_bono"]):"";
$observacion=isset($_POST["observacion"])? limpiarCadena($_POST["observacion"]):"";
$idusuario=$_SESSION["idusuario"];


switch ($_GET["op"]) {
	case 'guardaryeditar':
	if (empty($idbono)) {
		$rspta=$bono->insertar($idmatricula,$idusuario,$tipo_bono,$total_bono,$observacion);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
        $rspta=$bono->editar($idbono,$idmatricula,$idusuario,$tipo_bono,$total_bono,$observacion);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}
		break;
	

	case 'anular':
		$rspta=$bono->anular($idbono);
		echo $rspta ? "Bono anulado correctamente" : "No se pudo anular el bono";
		break;
	
	case 'mostrar':
		$rspta=$bono->mostrar($idbono);
		echo json_encode($rspta);
		break;

    case 'listar':
		$rspta=$bono->listar();
		$data=Array();
		$url='../reportes/exTicket.php?id=';
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>(($reg->estado=='1')?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idbono.')"><i class="fa fa-eye"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="anular('.$reg->idbono.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idbono.')"><i class="fa fa-eye"></i></button>').
            '<a target="_blank" href="'.$url.$reg->idbono.'"> <button class="btn btn-info btn-xs"><i class="fa fa-file"></i></button></a>',
            "1"=>$reg->idbono,
            "2"=>$reg->nombre.' '.$reg->apellido,
            "3"=>$reg->usuario,
            "4"=>$reg->fecha,
            "5"=>$reg->programa,
            "6"=>$reg->tipo_bono,
            "7"=>number_format($reg->bono, 0, ',', '.'),
            "8"=>($reg->estado=='1')?'<span class="label bg-green">Aceptado</span>':'<span class="label bg-red">Anulado</span>'
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
		break;

	




}
 ?>