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


switch ($_GET["op"]) {
	case 'guardaryeditar':
	if (empty($idmatricula)) {
		$rspta=$matricula->insertar($estudiante,$programa,$horario,$precio_mes);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
        $rspta=$matricula->editar($idmatricula,$estudiante,$programa,$horario,$precio_mes);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
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

	case 'listarDetalle':
		//recibimos el idmatricula
		$id=$_GET['id'];

		$rspta=$matricula->listarDetalle($id);
		$total=0;
		echo ' <thead style="background-color:#A9D0F5">
        <th>Opciones</th>
        <th>Articulo</th>
        <th>Cantidad</th>
        <th>Precio Compra</th>
        <th>Precio Venta</th>
        <th>Subtotal</th>
       </thead>';
		while ($reg=$rspta->fetch_object()) {
			echo '<tr class="filas">
			<td></td>
			<td>'.$reg->nombre.'</td>
			<td>'.$reg->cantidad.'</td>
			<td>'.$reg->precio_compra.'</td>
			<td>'.$reg->precio_venta.'</td>
			<td>'.$reg->precio_compra*$reg->cantidad.'</td>
			<td></td>
			</tr>';
			$total=$total+($reg->precio_compra*$reg->cantidad);
		}
		echo '<tfoot>
         <th>TOTAL</th>
         <th></th>
         <th></th>
         <th></th>
         <th></th>
         <th><h4 id="total">$ '.$total.'</h4><input type="hidden" name="total_compra" id="total_compra"></th>
       </tfoot>';
		break;

    case 'listar':
		$rspta=$matricula->listar();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>($reg->condicion=='1')?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idmatricula.')"><i class="fa fa-eye"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="anular('.$reg->idmatricula.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idmatricula.')"><i class="fa fa-eye"></i></button>',
            "1"=>$reg->nombre,
            "2"=>$reg->programa,
            "3"=>$reg->jornada,
            "4"=>$reg->fecha_registro,
            "5"=>$reg->pagado,
            "6"=>number_format(($reg->semestre*6)*($reg->precio_mes), 0, ',', '.'),
            "7"=>($reg->condicion=='1')?'<span class="label bg-green">Aceptado</span>':'<span class="label bg-red">Anulado</span>'
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