<?php 
require_once "../modelos/Programa.php";

$programa=new Programa();

$idprograma=isset($_POST["idprograma"])? limpiarCadena($_POST["idprograma"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$resolucion=isset($_POST["resolucion"])? limpiarCadena($_POST["resolucion"]):"";
$licencia=isset($_POST["licencia"])? limpiarCadena($_POST["licencia"]):"";
$fecha_expedicion=isset($_POST["fecha_expedicion"])? limpiarCadena($_POST["fecha_expedicion"]):"";
$fecha_vencimiento=isset($_POST["fecha_vencimiento"])? limpiarCadena($_POST["fecha_vencimiento"]):"";
$codigo=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$semestre=isset($_POST["semestre"])? limpiarCadena($_POST["semestre"]):"";
$decreto=isset($_POST["decreto"])? limpiarCadena($_POST["decreto"]):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':

	if (empty($idprograma)) {

		$rspta=$programa->insertar($nombre,$resolucion,$licencia,$fecha_expedicion,$fecha_vencimiento,$codigo,$semestre,$decreto);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
         $rspta=$programa->editar($idprograma,$nombre,$resolucion,$licencia,$fecha_expedicion,$fecha_vencimiento,$codigo,$semestre,$decreto);
		echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
	}
		break;
	

	case 'desactivar':
		$rspta=$programa->desactivar($idprograma);
		echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
		break;
	case 'activar':
		$rspta=$programa->activar($idprograma);
		echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
		break;
	
	case 'mostrar':
		$rspta=$programa->mostrar($idprograma);
		echo json_encode($rspta);
		break;

    case 'listar':
		$rspta=$programa->listar();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>($reg->condicion)?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idprograma.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->idprograma.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idprograma.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->idprograma.')"><i class="fa fa-check"></i></button>',
            "1"=>$reg->nombre,
            "2"=>$reg->resolucion,
            "3"=>$reg->fecha_expedicion,
            "4"=>$reg->fecha_vencimiento,
            "5"=>$reg->codigo,
            "6"=>$reg->semestre,
			"7"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
			
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
		break;
		
		case 'selectPrograma':
			require_once "../modelos/Programa.php";
			$Programa = new Programa();

			$rspta = $programa->listar();

			while ($reg = $rspta->fetch_object()) {
				echo '<option value='.$reg->idprograma.'>'.$reg->nombre.'</option>';
			}
			break;

}
 ?>