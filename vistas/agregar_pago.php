<?php 
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
}else{

require 'header.php';
if ($_SESSION['matricula']==1) {
 ?>
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border">
  <h1 class="box-title">Agregar matricula</h1>
  <div class="box-tools pull-right">
    
  </div>
</div>
<!--box-header-->
<!--centro-->
<div class="panel-body table-responsive" id="listadoregistros">
  <form action="" name="formulario" id="formulario" method="POST">
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Matricula(*):</label>
      <input class="form-control" type="hidden" name="idpago" id="idpago">
      <select name="idmatricula" id="idmatricula" class="form-control selectpicker" data-live-search="true" required>
        
      </select>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Tipo de pago(*):</label>
     <select class="form-control select-picker" name="tipo_pago" id="tipo_pago" required>
       <option value="cuota" selected>Cuota / abono</option>
       <option value="semestral">Semestral</option>
       <option value="seguro">Seguro</option>
     </select>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Pago(*):</label>
      <input type="text" class="form-control" name="total_pago" id="total_pago" placeholder="Pago" maxlength="20">
    </div>
       <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Observacion:</label>
      <input class="form-control" type="text" name="observacion" id="observacion"  maxlength="70">
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
 <script src="scripts/pago.js"></script>

 <?php 
}

ob_end_flush();
  ?>