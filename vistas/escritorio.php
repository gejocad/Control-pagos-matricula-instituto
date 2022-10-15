<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
}else{

 
require 'header.php';

if ($_SESSION['escritorio']==1) {

  
 ?>
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border">
  <h1 class="box-title">Escritorio</h1>
  <div class="box-tools pull-right">
    
  </div>
</div>
<!--box-header-->
<!--centro-->
<div class="panel-body">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
  <div class="small-box bg-aqua">
    <div class="inner">
      <h4 style="font-size: 17px;">
        <strong>$  </strong>
      </h4>
      <p>Estudiantes</p>
    </div>
    <div class="icon">
      <i class="ion ion-bag"></i>
    </div>
    <a href="ingreso.php" class="small-box-footer">Añadir estudiante <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
  <div class="small-box bg-green">
    <div class="inner">
      <h4 style="font-size: 17px;">
        <strong>$  </strong>
      </h4>
      <p>Matriculas</p>
    </div>
    <div class="icon">
      <i class="ion ion-bag"></i>
    </div>
    <a href="venta.php" class="small-box-footer">Añadir matricula <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
  <div class="small-box bg-primary">
    <div class="inner">
      <h4 style="font-size: 17px;">
        <strong>$  </strong>
      </h4>
      <p>Pagos</p>
    </div>
    <div class="icon">
      <i class="ion ion-bag"></i>
    </div>
    <a href="ingreso_ingrediente.php" class="small-box-footer">Añadir pago <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>

  
<!--fin centro-->
      </div>
      </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
<?php 
}else{
 require 'noacceso.php'; 
}

require 'footer.php';
 ?>
 <script src="../public/js/Chart.bundle.min.js"></script>
 <script src="../public/js/Chart.min.js"></script>
 <?php 
}

ob_end_flush();
  ?>

