<?php 
//activamos almacenamiento en el buffer
ob_start();
if (strlen(session_id())<1) 
  session_start();

if (!isset($_SESSION['nombre'])) {
  echo "debe ingresar al sistema correctamente para vosualizar el reporte";
}else{

if ($_SESSION['ventas']==1) {

?>

<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  <link rel="stylesheet">
</head>
<body onload="window.print();">
  <?php 
// incluimos la clase pago
require_once "../modelos/Pago.php";


//incluimos el archivo factura


//establecemos los datos de la empresa
$logo="logo.png";
$ext_logo="png";
$empresa = "INSTITUTO LA FRONTERA";
$documento = "NIT 13.489.371-4";
$direccion = "Cr. 21 Nro. 26-57, Miramar, Arauca-Arauca";
$telefono = "+57 (311) 521 02 20";
$email = "direccion@institutolafrontera.co";

$pago = new Pago();

//en el objeto $rspta obtenemos los valores devueltos del metodo ventacabecera del modelo
$rspta = $pago->pagocabecera($_GET["id"]);

$reg=$rspta->fetch_object();

$cuota= "Cuota 0";

if ($reg->pagado >= $reg->precio_mes && $reg->pagado < ($reg->precio_mes*2)) {
    $cuota= "Matricula";
} elseif ($reg->pagado >= ($reg->precio_mes*2) && $reg->pagado < ($reg->precio_mes*3)) {
    $cuota= "Cuota 1";
} elseif ($reg->pagado >= ($reg->precio_mes*3) && $reg->pagado < ($reg->precio_mes*4)) {
    $cuota= "Cuota 2";
} elseif ($reg->pagado >= ($reg->precio_mes*4) && $reg->pagado < ($reg->precio_mes*5)) {
    $cuota= "Cuota 3";
} elseif ($reg->pagado >= ($reg->precio_mes*5) && $reg->pagado < ($reg->precio_mes*6)) {
    $cuota= "Cuota 4";
} elseif ($reg->pagado >= ($reg->precio_mes*6) && $reg->pagado < ($reg->precio_mes*7)) {
    $cuota= "Cuota 5";
} elseif ($reg->pagado >= ($reg->precio_mes*7) && $reg->pagado < ($reg->precio_mes*8)) {
    $cuota= "Cuota 6";
} elseif ($reg->pagado >= ($reg->precio_mes*8) && $reg->pagado < ($reg->precio_mes*9)) {
    $cuota= "Cuota 7";
} elseif ($reg->pagado >= ($reg->precio_mes*9) && $reg->pagado < ($reg->precio_mes*10)) {
    $cuota= "Cuota 8";
} elseif ($reg->pagado >= ($reg->precio_mes*10) && $reg->pagado < ($reg->precio_mes*11)) {
    $cuota= "Cuota 9";
} elseif ($reg->pagado >= ($reg->precio_mes*11) && $reg->pagado < ($reg->precio_mes*12)) {
    $cuota= "Cuota 10";
} elseif ($reg->pagado >= ($reg->precio_mes*12) && $reg->pagado < ($reg->precio_mes*13)) {
    $cuota= "Cuota 11";
} elseif ($reg->pagado >= ($reg->precio_mes*13) && $reg->pagado < ($reg->precio_mes*14)) {
    $cuota= "Cuota 12";
} elseif ($reg->pagado >= ($reg->precio_mes*14) && $reg->pagado < ($reg->precio_mes*15)) {
    $cuota= "Cuota 13";
} elseif ($reg->pagado >= ($reg->precio_mes*15) && $reg->pagado < ($reg->precio_mes*16)) {
    $cuota= "Cuota 14";
} elseif ($reg->pagado >= ($reg->precio_mes*16) && $reg->pagado < ($reg->precio_mes*17)) {
    $cuota= "Cuota 15";
} elseif ($reg->pagado >= ($reg->precio_mes*17) && $reg->pagado < ($reg->precio_mes*18)) {
    $cuota= "Cuota 16";
} elseif ($reg->pagado >= ($reg->precio_mes*18)) {
    $cuota= "Derecho de grado";
} else {
    $cuota= "Cuota No Valida";
}

   ?>
<FONT FACE="Arial">
<div class="zona_impresion">
  <!--codigo imprimir-->
  <br>
  <table border="0" align="center" width="240px">
    <tr>
      <td align="center">
        <!--mostramos los datos de la empresa en el doc HTML-->
        <img src="logo.png" width="220" height="200"/><p>
        .::<strong> <?php echo $empresa; ?></strong>::.<br>
        <?php echo $documento; ?><br>
        <?php echo $direccion; ?><br>
        <?php echo $telefono; ?><br>
        <?php echo $email; ?><br>
      </td>
    </tr>
    <tr>
      <td align="center">Fecha: <?php echo $reg->fecha; ?></td>
    </tr>
    <tr> 
      <td align="center"></td>
    </tr>
    <tr> 
      <td align="center">RECIBO</td>
    </tr>
    <tr> 
      <td align="center"></td>
    </tr>
    <tr>
      <!--mostramos los datos del cliente -->
      <td>Nombre: <?php echo $reg->nombre; ?>
      </td>
    </tr>
      <!--mostramos los datos del cliente -->
      <td>Apellido: <?php echo $reg->apellido; ?>
      </td>
    </tr>
    <tr>
      <td>
        <?php echo $reg->tipo_documento.": ".number_format($reg->numero_documento); ?>
      </td>
    </tr>
    <tr>
      <td>
        Programa matriculado: <?php echo $reg->programa; ?>
      </td>
    </tr>
    <tr>
      <td>
        N° de Comprobante: F-0<?php echo $reg->idpago; ?>
      </td>
    </tr>
    <tr>
      <td>
        Usuario: <?php echo $reg->usuario; ?>
      </td>
    </tr>
  </table>
  <!--mostramos lod detalles de la venta -->

  <table border="0" align="center" width="210px">
    <tr>
      <td colspan="3">===========================</td>
    </tr>
    <?php
    $rsptad = $pago->pagodetalles($_GET["id"]);
    $regd = $rsptad->fetch_object()
     ?>
     <!--mostramos los totales de la venta-->
    <tr>
      <td align=""><b>TOTAL PAGO:</b></td>
      <td align=""><b>$ <?php echo number_format($regd->pago, 0, ',', ' '); ?></b></td>
    </tr>
    <tr>
      <td align=""><b>Cuota al dia:</b></td>
      <td align=""><b><?php echo $cuota; ?></b></td>
    </tr>
    <tr>
      <td colspan="3">Tipo de pago: <?php echo $regd->tipo_pago; ?> </td>
    </tr>
    <tr>
      <td colspan="3">Observacion: <?php echo $regd->observacion; ?> </td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
  </table>
  <table border="0" align="center" width="200px">
    <tr>
      <td colspan="3" align="center"></td>
    </tr>
    <tr>
    <tr>
      <td colspan="3" align="center"></td>
    </tr>
    <tr>
      <td>
        Usted ha pagado hasta el momento: <b>$ <?php echo number_format($reg->pagado, 0, ',', ' '); ?></b>
      </td>
    </tr>
    <tr>
      <td>
        De un total de: <b>$ <?php echo number_format($reg->precio_mes*($reg->semestre*6), 0, ',', ' '); ?></b>
      </td>
    </tr>
    <tr>
      <td colspan="3" align="center">¡Gracias por su pago!</td>
    </tr>
    <tr>
      <td colspan="3" align="center">Para cualquier cambio o garantia es indispensable presentar este recibo.</td>
    </tr>
  </table>
  <br>
</div>
</FONT>
<p>&nbsp;</p>
</body>
</html>



<?php

  }else{
echo "No tiene permiso para visualizar el reporte";
}

}


ob_end_flush();
  ?>