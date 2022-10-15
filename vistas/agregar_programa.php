<?php 
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
}else{

require 'header.php';
if ($_SESSION['programa']==1) {
 ?>
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border">
  <h1 class="box-title">Agregar programa</h1>
  <div class="box-tools pull-right">
    
  </div>
</div>
<!--box-header-->
<!--centro-->
<div class="panel-body table-responsive" id="listadoregistros">
  <form action="" name="formulario" id="formulario" method="POST">
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Nombre(*):</label>
      <input class="form-control" type="hidden" name="idprograma" id="idprograma">
      <input class="form-control" type="text" name="nombre" id="nombre" maxlength="80" placeholder="Nombres" required>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Resolucion(*):</label>
      <input class="form-control" type="number" name="resolucion" id="resolucion" maxlength="6" placeholder="Nombres" required></select>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Licencia(*):</label>
      <input class="form-control" type="number" name="licencia" id="licencia"  value="" placeholder="Numero de documento"required>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Fecha de expedicion(*):</label>
      <input class="form-control" type="date" name="fecha_expedicion" id="fecha_expedicion" maxlength="12" placeholder="Fecha de expedicion" required>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Fecha de vencimiento(*):</label>
      <input class="form-control" type="date" name="fecha_vencimiento" id="fecha_vencimiento" maxlength="12" placeholder="Fecha de vencimiento"  required>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Codigo(*):</label>
      <input class="form-control" type="number" name="codigo" id="codigo"  value="" placeholder="Codigo" required>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Semestre(*):</label>
      <input class="form-control" type="number" name="semestre" id="semestre" maxlength="50" placeholder="Semestre de residencia" required>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Decreto:</label>
      <input class="form-control" type="number" name="decreto" id="decreto" maxlength="5" placeholder="Telefono" required>
    </div>
    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>  Guardar</button>
    </div>
  </form>
</div>
<div class="panel-body" id="formularioregistros">
  
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
require 'footer.php'
 ?>
 <script src="../public/js/JsBarcode.all.min.js"></script>
 <script src="../public/js/jquery.PrintArea.js"></script>
 <script src="scripts/programa.js"></script>

 <?php 
}

ob_end_flush();
  ?>