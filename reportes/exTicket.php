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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
$documento = "NIT 102.237.7406-6";
$direccion = "Cll. 17 Nro. 23-56, Santa teresita. Arauca-Arauca";
$telefono = "+57 (315) 217 04 68";
$email = "direccion@institutolafrontera.co";

$pago = new Pago();

//en el objeto $rspta obtenemos los valores devueltos del metodo ventacabecera del modelo
$rspta = $pago->pagocabecera($_GET["id"]);

$reg=$rspta->fetch_object();

$cuota= "Cuota 0";

if ($reg->pagado == $reg->precio_mes && $reg->pagado < ($reg->precio_mes*2)) {
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
    $cuota= "Cuota 17";
} else {
    $cuota= "Cuota No Valida";
}

	 ?>
<FONT FACE="Arial">
<div class="zona_impresion">
	<!--codigo imprimir-->
	<br>
	<div class="border" style="">
  <div class="">
  	<img class="fixed-top ml-5" src="logo.png" width="200" height="200" style="top:35px"/>
  	<img class="position-fixed mr-5" src="foto.jpeg" width="200" height="200" style="top:30px; right: 0px;"/>
  	<h1 class="text-center mt-5">Instituto la Frontera</h1>
  	<h6 class="text-center">Instituto para el trabajo y desarrollo humano.</h6>
  	<h6 class="text-center">Licencia de funcionamiento N° 0083 del 2008 S.E.D.A.</h6>
  	<br>
  	<h4 class="text-center">HOJA DE MATRICULA</h4>
  	<br>
  <div class="row justify-content-center" style="margin-right: -130px;margin-left:-130px">
    <div class="col-2 border">
          Numero:
    </div>
    <div class="col-4 border">
      Fecha de matricula:
    </div>
    <div class="col-4 border">
      Ciudad:
    </div>
  </div>
  <div class="row justify-content-center" style="margin-right: -130px;margin-left:-130px">
    <div class="col-2 border pt-2 pb-2">
        </br>        
    </div>
    <div class="col-4 border pt-2 pb-2">
      
    </div>
    <div class="col-4 border pt-2 pb-2">
      
    </div>
  </div>
  </br> 
  <h4 class="text-center">Datos personales</h4>
  </br> 
  <div class="row justify-content-center">
    <div class="col-3 border">
           Nombres:
    </div>
    <div class="col-3 border">
      Apellidos:
    </div>
    <div class="col-3 border">
      Fecha de nacimiento:
    </div>
    <div class="col-3 border">
      Ciudad de nacimiento:
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-3 border pt-2 pb-2">
        </br>    
    </div>
    <div class="col-3 border pt-2 pb-2">
      
    </div>
    <div class="col-3 border pt-2 pb-2">
   
    </div>
    <div class="col-3 border pt-2 pb-2">
      
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-1 border">
      Tipo doc:
    </div>
    <div class="col-3 border">
      Numero de documento:
    </div>
    <div class="col-4 border">
      Fecha de expedicion:
    </div>
    <div class="col-4 border">
      Ciudad de expedicion:
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-1 border pt-2 pb-2">
     		</br>   
    </div>
    <div class="col-3 border pt-2 pb-2">
     
    </div>
    <div class="col-4 border pt-2 pb-2">
     
    </div>
    <div class="col-4 border pt-2 pb-2">
    
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-6 border">
      Direccion:
    </div>
    <div class="col-2 border">
      Telefono: 
    </div>
    <div class="col-3 border">
      Correo:
    </div>
    <div class="col-1 border">
      RH: O+
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-6 border pt-2 pb-2">
      </br> 
    </div>
    <div class="col-2 border pt-2 pb-2">
     
    </div>
    <div class="col-3 border pt-2 pb-2">
      
    </div>
    <div class="col-1 border pt-2 pb-2">
      
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-3 border">
      Acudiente:
    </div>
    <div class="col-2 border">
      Telefono: 
    </div>
    <div class="col-7 border">
      Programa:
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-3 border pt-2 pb-2">
      </br> 
    </div>
    <div class="col-2 border pt-2 pb-2">
    </div>
    <div class="col-7 border pt-2 pb-2">
      Técnico laboral por competencias en AUXILIAR CONTABLE Y FINANCIERO
    </div>
  </div>
  <div class="row justify-content-right">
    <div class="col-2 border">
      Jornada:
    </div>
    <div class="col-4 border">
      Horario: 
    </div>
  </div>
  <div class="row justify-content-right">
    <div class="col-2 border pt-2 pb-2">
    	</br>
    </div>
    <div class="col-4 border pt-2 pb-2">

    </div>
  </div>
  </br> 
  <h4 class="text-center">Requisitos de matricula</h4>
  </br> 
  <div class="row justify-content-center">
    <div class="col-3 border">
      Diploma Bachiller:
    </div>
    <div class="col-3 border">
      Certificado de 9:
    </div>
    <div class="col-3 border">
      Fotocopia de identificacion:
    </div>
    <div class="col-3 border">
      Fotocopia de registro civil:
    </div>
    <div class="col-3 border">
      Carpeta:
    </div>
  </div>
</div>
	<br>
</div>
</FONT>
<p>&nbsp;</p>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script
</body>
</html>



<?php

	}else{
echo "No tiene permiso para visualizar el reporte";
}

}


ob_end_flush();
  ?>