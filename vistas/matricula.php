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
  <h1 class="box-title">Matriculas <button class="btn btn-success" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-plus-circle"></i>Agregar</button></h1>
  <div class="box-tools pull-right">
  </div>
</div>
<!--box-header-->
<!--centro-->
<div class="panel-body table-responsive" id="listadoregistros">
  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
    <thead>
      <th>Opciones</th>
      <th>Estudiante</th>
      <th>Programa matriculado</th>
      <th>Jornada</th>
      <th>Fecha de matricula</th>
      <th>Pagado</th>
      <th>Total</th>
      <th>Estado</th>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
      <th>Opciones</th>
      <th>Estudiante</th>
      <th>Programa matriculado</th>
      <th>Jornada</th>
      <th>Fecha de matricula</th>
      <th>Pagado</th>
      <th>Total</th>
      <th>Estado</th>
    </tfoot>   
  </table>
</div>
<div class="panel-body" id="formularioregistros" style="height: 100vh;">
  <form action="" name="formulario" id="formulario" method="POST">
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Estudiante(*):</label>
      <input class="form-control" type="hidden" name="idmatricula" id="idmatricula">
      <select name="estudiante" id="estudiante" class="form-control selectpicker" data-live-search="true" required>
        
      </select>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Programa(*):</label>
      <input class="form-control" type="hidden" name="idprograma" id="idprograma">
      <select name="programa" id="programa" class="form-control selectpicker" data-live-search="true" required>
        
      </select>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Jornada/Horario(*):</label>
      <input class="form-control" type="hidden" name="idhorario" id="idhorario">
      <select name="horario" id="horario" class="form-control selectpicker" data-live-search="true" required>
        
      </select>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Precio matricula/mes(*):</label>
     <select class="form-control select-picker" name="precio_mes" id="precio_mes" required>
       <option value="110000">110.000 $</option>
     </select>
    </div>
    <div class="form-group col-lg-3 col-md-3 col-xs-12">
      <label for="">Diploma bachiller(*):</label>
      <select class="form-control select-picker" name="diploma_bachiller" id="diploma_bachiller" required>
       <option value="1">Si</option>
       <option value="0">No</option>
     </select>
    </div>
    <div class="form-group col-lg-3 col-md-3 col-xs-12">
      <label for="">Certificado de 9°(*):</label>
      <select class="form-control select-picker" name="certificado_9" id="certificado_9" required>
       <option value="1">Si</option>
       <option value="0">No</option>
     </select>
    </div>
    <div class="form-group col-lg-3 col-md-3 col-xs-12">
      <label for="">Fotocopia de identificacion(*):</label>
      <select class="form-control select-picker" name="fotocopia_identificacion" id="fotocopia_identificacion" required>
       <option value="1">Si</option>
       <option value="0">No</option>
     </select>
    </div>
    <div class="form-group col-lg-3 col-md-3 col-xs-12">
      <label for="">Fotocopia de registro civil(*):</label>
      <select class="form-control select-picker" name="fotocopia_registro_civil" id="fotocopia_registro_civil" required>
       <option value="1">Si</option>
       <option value="0">No</option>
     </select>
    </div>
    <div class="form-group col-lg-3 col-md-3 col-xs-12">
      <label for="">Carpeta(*):</label>
      <select class="form-control select-picker" name="carpeta" id="carpeta" required>
       <option value="1">Si</option>
       <option value="0">No</option>
     </select>
    </div>
    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>  Guardar</button>

      <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
    </div>
  </form>
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
 <script src="scripts/matricula.js"></script>

 <?php 
}

ob_end_flush();
  ?>