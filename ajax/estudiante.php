<?php 
require_once "../modelos/Estudiante.php";

$estudiante=new Estudiante();

$idestudiante=isset($_POST["idestudiante"])? limpiarCadena($_POST["idestudiante"]):"";
$idlugar=isset($_POST["idlugar"])? limpiarCadena($_POST["idlugar"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$apellido=isset($_POST["apellido"])? limpiarCadena($_POST["apellido"]):"";
$fecha_nacimiento=isset($_POST["fecha_nacimiento"])? limpiarCadena($_POST["fecha_nacimiento"]):"";
$lugar_nacimiento=isset($_POST["lugar_nacimiento"])? limpiarCadena($_POST["lugar_nacimiento"]):"";
$tipo_documento=isset($_POST["tipo_documento"])? limpiarCadena($_POST["tipo_documento"]):"";
$numero_documento=isset($_POST["numero_documento"])? limpiarCadena($_POST["numero_documento"]):"";
$fecha_expedicion=isset($_POST["fecha_expedicion"])? limpiarCadena($_POST["fecha_expedicion"]):"";
$lugar_expedicion=isset($_POST["lugar_expedicion"])? limpiarCadena($_POST["lugar_expedicion"]):"";
$direccion_residencia=isset($_POST["direccion_residencia"])? limpiarCadena($_POST["direccion_residencia"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$correo=isset($_POST["correo"])? limpiarCadena($_POST["correo"]):"";
$sangre=isset($_POST["sangre"])? limpiarCadena($_POST["sangre"]):"";
$acudiente=isset($_POST["acudiente"])? limpiarCadena($_POST["acudiente"]):"";
$telefono_acudiente=isset($_POST["telefono_acudiente"])? limpiarCadena($_POST["telefono_acudiente"]):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':

	if (!file_exists($_FILES['imagen_estudiante']['tmp_name'])|| !is_uploaded_file($_FILES['imagen_estudiante']['tmp_name'])) {
		$imagen_estudiante=$_POST["imagenactual1"];
		$imagen_documento1=$_POST["imagenactual2"];
		$imagen_documento2=$_POST["imagenactual3"];
	}else{
		$ext=explode(".", $_FILES["imagen_estudiante"]["name"]);
		$ext2=explode(".", $_FILES["imagen_documento1"]["name"]);
		$ext3=explode(".", $_FILES["imagen_documento2"]["name"]);
		if ($_FILES['imagen_estudiante']['type']=="image/jpg" || $_FILES['imagen_estudiante']['type']=="image/jpeg" || $_FILES['imagen_estudiante']['type']=="image/png") {
			$imagen_estudiante=round(microtime(true)).'.'. end($ext);
			$imagen_documento1=round(microtime(true)).'.'. end($ext2);
			$imagen_documento2=round(microtime(true)).'.'. end($ext3);
			move_uploaded_file($_FILES["imagen_estudiante"]["tmp_name"], "../files/estudiantes/".$numero_documento."_".$nombre.".jpg");
			move_uploaded_file($_FILES["imagen_documento1"]["tmp_name"], "../files/estudiantes/".$numero_documento."_documento_lado1.jpg");
			move_uploaded_file($_FILES["imagen_documento2"]["tmp_name"], "../files/estudiantes/".$numero_documento."_documento_lado2.jpg");
		}
	}


	if (empty($idestudiante)) {

		$rspta=$estudiante->insertar($nombre,$apellido,$fecha_nacimiento,$lugar_nacimiento,$tipo_documento,$numero_documento,$fecha_expedicion,$lugar_expedicion,$direccion_residencia,$telefono,$correo,$sangre,$acudiente,$telefono_acudiente);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
         $rspta=$estudiante->editar($idestudiante,$nombre,$apellido,$fecha_nacimiento,$lugar_nacimiento,$tipo_documento,$numero_documento,$fecha_expedicion,$lugar_expedicion,$direccion_residencia,$telefono,$correo,$sangre,$acudiente,$telefono_acudiente);
		echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
	}
		break;
	

	case 'desactivar':
		$rspta=$estudiante->desactivar($idestudiante);
		echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
		break;
	case 'activar':
		$rspta=$estudiante->activar($idestudiante);
		echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
		break;
	
	case 'mostrar':
		$rspta=$estudiante->mostrar($idestudiante);
		echo json_encode($rspta);
		break;

    case 'listar':
		$rspta=$estudiante->listar();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>($reg->condicion)?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idestudiante.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->idestudiante.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idestudiante.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->idestudiante.')"><i class="fa fa-check"></i></button>',
            "1"=>$reg->nombre,
            "2"=>$reg->apellido,
            "3"=>$reg->fecha_nacimiento,
            "4"=>$reg->fecha_registro,
			"5"=>$reg->numero_documento,
            "6"=>$reg->telefono,
            "7"=>$reg->correo,
			"8"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
			
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
		break;

			case 'selectEstudiante':
			require_once "../modelos/Estudiante.php";
			$estudiante = new Estudiante();

			$rspta = $estudiante->listar();

			while ($reg = $rspta->fetch_object()) {
				echo '<option value='.$reg->idestudiante.'>'.$reg->nombre.' - '.$reg->numero_documento.'</option>';
			}
			break;

}
 ?>