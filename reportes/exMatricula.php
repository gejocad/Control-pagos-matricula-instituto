<?php 
//activamos almacenamiento en el buffer
ob_start();
if (strlen(session_id())<1) 
  session_start();

if (!isset($_SESSION['nombre'])) {
  echo "debe ingresar al sistema correctamente para vosualizar el reporte";
}else{

if ($_SESSION['matricula']==1) {

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
require_once "../modelos/Matricula.php";


//incluimos el archivo factura


//establecemos los datos de la empresa
$logo="logo.png";
$ext_logo="png";
$empresa = "INSTITUTO LA FRONTERA";
$eslogan = "Instituto para el trabajo y desarrollo humano.";
$subtitulo_1 = "Licencia de funcionamiento N° 0083 del 2008 S.E.D.A.";
$ciudad = "810001, Arauca, Arauca, CO.";
$email = "direccion@institutolafrontera.co";

$matricula = new Matricula();

//en el objeto $rspta obtenemos los valores devueltos del metodo ventacabecera del modelo
$rspta = $matricula->imprimirMatricula($_GET["id"]);

$reg=$rspta->fetch_object();


	 ?>
<FONT FACE="Arial">
<div class="zona_impresion">
	<!--codigo imprimir-->
	<br>
	<div class="border" style="">
  <div class="">
  	<img class="fixed-top ml-5" src="logo.png" width="200" height="200" style="top:35px"/>
  	<img class="position-fixed mr-5" src="foto.jpeg" width="200" height="200" style="top:30px; right: 0px;"/>
  	<h1 class="text-center mt-5"><?php echo $empresa; ?></h1>
  	<h6 class="text-center"><?php echo $eslogan; ?></h6>
  	<h6 class="text-center"><?php echo $subtitulo_1; ?></h6>
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
        <?php echo $reg->idmatricula; ?>       
    </div>
    <div class="col-4 border pt-2 pb-2">
      	<?php echo $reg->fecha_registro; ?>  
    </div>
    <div class="col-4 border pt-2 pb-2">
      	<?php echo $ciudad; ?>
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
      Observacion: 
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-3 border pt-2 pb-2">
      </br> 
    </div>
    <div class="col-2 border pt-2 pb-2">
    </div>
    <div class="col-7 border pt-2 pb-2">
    </div>
  </div>
  <div class="row justify-content-right">
    <div class="col-2 border">
      Jornada:
    </div>
    <div class="col-3 border">
      Horario: 
    </div>
    <div class="col-7 border">
      Programa:
    </div>
  </div>
  <div class="row justify-content-right">
    <div class="col-2 border pt-2 pb-2">
    	</br>
    </div>
    <div class="col-3 border pt-2 pb-2">
    </div>
    <div class="col-7 border pt-2 pb-2">
      Técnico laboral por competencias en AUXILIAR CONTABLE Y FINANCIERO
    </div>
  </div>
  </br> 
  <h4 class="text-center">Requisitos de matricula</h4>
  </br> 
  <div class="row justify-content-center">
    <div class="col-2 border">
      Diploma Bachiller:
    </div>
    <div class="col-2 border">
      Certificado de 9:
    </div>
    <div class="col-3 border">
      Fotocopia de identificacion:
    </div>
    <div class="col-3 border">
      Fotocopia de registro civil:
    </div>
    <div class="col-2 border">
      Carpeta:
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-2 border pt-2 pb-2">
    </br>
    </div>
    <div class="col-2 border pt-2 pb-2">
    </div>
    <div class="col-3 border pt-2 pb-2">
    </div>
    <div class="col-3 border pt-2 pb-2">
    </div>
    <div class="col-2 border pt-2 pb-2">
    </div>
  </div>
  </br> 
  <h4 class="text-center">Documento de identidad</h4>
  </br> 
  <div class="row justify-content-around">
    <div class="col-5 border pt-2 pb-2" style="height: 300px;">
    </div>
    <div class="col-5 border pt-2 pb-2" style="height: 300px;">
  </div>
</div>
<div class="row justify-content-around text-center">
    <div class="col-5">
    	Parte frontal
    </div>
    <div class="col-5">
    	Parte trasera
    </div>
</div>
	<br>
	<br>
	<br>
	<br>
	<div class="row justify-content-around">
    <div class="col-3 border-bottom pt-4 pb-4">
          
          </br>
    </div>
    <div class="col-3 border-bottom pt-4 pb-4">
      
    </div>
    <div class="col-3 border-bottom pt-4 pb-4">
      
    </div>
  </div>
  <div class="row justify-content-around text-center">
    <div class="col-3">
       FIRMA ESTUDIANTE
    </div>
    <div class="col-3">
       FIRMA SECRETARIO
    </div>
    <div class="col-3">
       FIRMA DIRECTOR
    </div>
  </div>
	<br>
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


