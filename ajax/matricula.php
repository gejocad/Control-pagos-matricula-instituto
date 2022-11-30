<?php 
require_once "../modelos/Matricula.php";
if (strlen(session_id())<1) 
	session_start();
	
$matricula=new Matricula();

$idmatricula=isset($_POST["idmatricula"])? limpiarCadena($_POST["idmatricula"]):"";
$estudiante=isset($_POST["estudiante"])? limpiarCadena($_POST["estudiante"]):"";
$programa=isset($_POST["programa"])? limpiarCadena($_POST["programa"]):"";
$horario=isset($_POST["horario"])? limpiarCadena($_POST["horario"]):"";
$precio_mes=isset($_POST["precio_mes"])? limpiarCadena($_POST["precio_mes"]):"";
$diploma_bachiller=isset($_POST["diploma_bachiller"])? limpiarCadena($_POST["diploma_bachiller"]):"";
$certificado_9=isset($_POST["certificado_9"])? limpiarCadena($_POST["certificado_9"]):"";
$fotocopia_identificacion=isset($_POST["fotocopia_identificacion"])? limpiarCadena($_POST["fotocopia_identificacion"]):"";
$fotocopia_registro_civil=isset($_POST["fotocopia_registro_civil"])? limpiarCadena($_POST["fotocopia_registro_civil"]):"";
$carpeta=isset($_POST["carpeta"])? limpiarCadena($_POST["carpeta"]):"";
$idusuario=$_SESSION["idusuario"];


switch ($_GET["op"]) {
	case 'guardaryeditar':
	if (empty($idmatricula)) {
		$rspta=$matricula->insertar($idusuario,$estudiante,$programa,$horario,$precio_mes,$diploma_bachiller,$certificado_9,$fotocopia_identificacion,$fotocopia_registro_civil,$carpeta);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
        $rspta=$matricula->editar($idusuario,$idmatricula,$estudiante,$programa,$horario,$precio_mes,$diploma_bachiller,$certificado_9,$fotocopia_identificacion,$fotocopia_registro_civil,$carpeta);
		echo $rspta ? "Datos actualizados correctamente" : "No se pudo registrar los datos";
	}
		break;
	

	case 'anular':
		$rspta=$matricula->anular($idmatricula);
		echo $rspta ? "Matricula anulado correctamente" : "No se pudo anular el matricula";
		break;
	
	case 'mostrar':
		$rspta=$matricula->mostrar($idmatricula);
		echo json_encode($rspta);
		break;

    case 'listar':
		$rspta=$matricula->listar();
		$data=Array();
		$url='../reportes/exMatricula.php?id=';
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>(($reg->condicion=='1')?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idmatricula.')"><i class="fa fa-eye"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="anular('.$reg->idmatricula.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idmatricula.')"><i class="fa fa-eye"></i></button>').
            '<a target="_blank" href="'.$url.$reg->idmatricula.'"> <button class="btn btn-info btn-xs"><i class="fa fa-file"></i></button></a>',
            "1"=>$reg->nombre,
            "2"=>$reg->usuario,
            "3"=>$reg->programa,
            "4"=>$reg->jornada,
            "5"=>$reg->fecha_registro,
            "6"=>($reg->seguro=='1')?'<span class="label bg-green">Pago</span>':'<span class="label bg-red">No pago</span>',
            "7"=>number_format($reg->pagado, 0, ',', '.'),
            "8"=>number_format((($reg->semestre*6)-($reg->semestre-2))*($reg->precio_mes), 0, ',', '.'),
            "9"=>($reg->condicion=='1')?'<span class="label bg-green">Aceptado</span>':'<span class="label bg-red">Anulado</span>'
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
		break;

	

			case 'selectMatricula':
			$matricula = new Matricula();

			$rspta = $matricula->listarMatriculaActiva();

			while ($reg = $rspta->fetch_object()) {
				echo '<option value='.$reg->idmatricula.'>'.$reg->nombre.' '.$reg->apellido.' - '.$reg->programa.'</option>';
			}
			break;




}
 ?>