<?php 
require_once "../modelos/Horario.php";

$horario=new Horario();

$idhorario=isset($_POST["idhorario"])? limpiarCadena($_POST["idhorario"]):"";
$jornada=isset($_POST["jornada"])? limpiarCadena($_POST["jornada"]):"";
$hora_entrada=isset($_POST["hora_entrada"])? limpiarCadena($_POST["hora_entrada"]):"";
$hora_salida=isset($_POST["hora_salida"])? limpiarCadena($_POST["hora_salida"]):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':

	if (empty($idhorario)) {

		$rspta=$horario->insertar($jornada,$hora_entrada,$hora_salida);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
         $rspta=$horario->editar($idhorario,$jornada,$hora_entrada,$hora_salida);
		echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
	}
		break;
	

	case 'desactivar':
		$rspta=$horario->desactivar($idhorario);
		echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
		break;
	case 'activar':
		$rspta=$horario->activar($idhorario);
		echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
		break;
	
	case 'mostrar':
		$rspta=$horario->mostrar($idhorario);
		echo json_encode($rspta);
		break;

    case 'listar':
		$rspta=$horario->listar();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>($reg->condicion)?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idhorario.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->idhorario.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idhorario.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->idhorario.')"><i class="fa fa-check"></i></button>',
            "1"=>$reg->jornada,
            "2"=>$reg->hora_entrada,
            "3"=>$reg->hora_salida,
			"4"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
			
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
		break;
		
		case 'selectHorario':
			require_once "../modelos/Horario.php";
			$Horario = new Horario();

			$rspta = $horario->listarActivos();

			while ($reg = $rspta->fetch_object()) {
				echo '<option value='.$reg->idhorario.'>'.$reg->jornada.' de '.$reg->hora_entrada.' a '.$reg->hora_salida.'</option>';
			}
			break;

}
 ?>