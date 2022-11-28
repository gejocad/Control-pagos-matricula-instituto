<?php 
require_once "../modelos/Pago.php";
if (strlen(session_id())<1) 
	session_start();
	
$pago=new Pago();

$idpago=isset($_POST["idpago"])? limpiarCadena($_POST["idpago"]):"";
$idmatricula=isset($_POST["idmatricula"])? limpiarCadena($_POST["idmatricula"]):"";
$tipo_pago=isset($_POST["tipo_pago"])? limpiarCadena($_POST["tipo_pago"]):"";
$total_pago=isset($_POST["total_pago"])? limpiarCadena($_POST["total_pago"]):"";
$observacion=isset($_POST["observacion"])? limpiarCadena($_POST["observacion"]):"";
$idusuario=$_SESSION["idusuario"];


switch ($_GET["op"]) {
	case 'guardaryeditar':
	if (empty($idpago)) {
		$rspta=$pago->insertar($idmatricula,$idusuario,$tipo_pago,$total_pago,$observacion);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
        $rspta=$pago->editar($idpago,$idmatricula,$idusuario,$tipo_pago,$total_pago,$observacion);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}
		break;
	

	case 'anular':
		$rspta=$pago->anular($idpago);
		echo $rspta ? "Pago anulado correctamente" : "No se pudo anular el pago";
		break;
	
	case 'mostrar':
		$rspta=$pago->mostrar($idpago);
		echo json_encode($rspta);
		break;

    case 'listar':
		$rspta=$pago->listar();
		$data=Array();
		$url='../reportes/exTicket.php?id=';
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>(($reg->estado=='1')?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idpago.')"><i class="fa fa-eye"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="anular('.$reg->idpago.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idpago.')"><i class="fa fa-eye"></i></button>').
            '<a target="_blank" href="'.$url.$reg->idpago.'"> <button class="btn btn-info btn-xs"><i class="fa fa-file"></i></button></a>',
            "1"=>$reg->idpago,
            "2"=>$reg->nombre.' '.$reg->apellido,
            "3"=>$reg->usuario,
            "4"=>$reg->fecha,
            "5"=>$reg->programa,
            "6"=>$reg->tipo_pago,
            "7"=>number_format($reg->pago, 0, ',', '.'),
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