<?php 
require_once "../modelos/Lugar.php";

$lugar=new Lugar();

$idlugar=isset($_POST["idlugar"])? limpiarCadena($_POST["idlugar"]):"";
$municipio=isset($_POST["municipio"])? limpiarCadena($_POST["municipio"]):"";
$departamento=isset($_POST["departamento"])? limpiarCadena($_POST["departamento"]):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':

	if (empty($idlugar)) {

		$rspta=$lugar->insertar($municipio,$departamento);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
         $rspta=$lugar->editar($idlugar,$municipio,$departamento);
		echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
	}
		break;
	

	case 'desactivar':
		$rspta=$lugar->desactivar($idlugar);
		echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
		break;
	case 'activar':
		$rspta=$lugar->activar($idlugar);
		echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
		break;
	
	case 'mostrar':
		$rspta=$lugar->mostrar($idlugar);
		echo json_encode($rspta);
		break;

    case 'listar':
		$rspta=$lugar->listar();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>($reg->condicion)?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idlugar.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->idlugar.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idlugar.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->idlugar.')"><i class="fa fa-check"></i></button>',
            "1"=>$reg->municipio,
            "2"=>$reg->departamento,
			"3"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
			
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
		break;
		
		case 'selectLugar':
			require_once "../modelos/Lugar.php";
			$Lugar = new Lugar();

			$rspta = $lugar->listar();

			while ($reg = $rspta->fetch_object()) {
				echo '<option value='.$reg->idlugar.'>'.$reg->municipio.' - '.$reg->departamento.'</option>';
			}
			break;

}
 ?>