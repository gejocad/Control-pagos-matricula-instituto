<?php 
require_once "../modelos/Pago.php";
if (strlen(session_id())<1) 
	session_start();
	
$pago=new Pago();

$idpago=isset($_POST["idpago"])? limpiarCadena($_POST["idpago"]):"";
$matricula=isset($_POST["matricula"])? limpiarCadena($_POST["matricula"]):"";
$tipo_pago=isset($_POST["tipo_pago"])? limpiarCadena($_POST["tipo_pago"]):"";
$total_pago=isset($_POST["total_pago"])? limpiarCadena($_POST["total_pago"]):"";
$observacion=isset($_POST["observacion"])? limpiarCadena($_POST["observacion"]):"";


switch ($_GET["op"]) {
	case 'guardaryeditar':
	if (empty($idpago)) {
		$rspta=$pago->insertar($matricula,$tipo_pago,$total_pago,$observacion);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
        $rspta=$pago->editar($idpago,$matricula,$tipo_pago,$total_pago,$observacion);
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

	case 'listarDetalle':
		//recibimos el idpago
		$id=$_GET['id'];

		$rspta=$pago->listarDetalle($id);
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
		$rspta=$pago->listar();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>($reg->estado=='1')?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idpago.')"><i class="fa fa-eye"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="anular('.$reg->idpago.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idpago.')"><i class="fa fa-eye"></i></button>',
            "1"=>$reg->idpago,
            "2"=>$reg->nombre.' '.$reg->apellido,
            "3"=>$reg->programa,
            "4"=>$reg->tipo_pago,
            "5"=>$reg->pago,
            "6"=>($reg->estado=='1')?'<span class="label bg-green">Aceptado</span>':'<span class="label bg-red">Anulado</span>'
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