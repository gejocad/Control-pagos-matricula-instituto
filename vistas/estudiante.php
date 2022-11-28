<?php 
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
}else{

require 'header.php';
if ($_SESSION['estudiante']==1) {
 ?>
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border">
  <h1 class="box-title">Estudiante <button class="btn btn-success" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-plus-circle"></i>Agregar</button></h1>
  <div class="box-tools pull-right">
  </div>
</div>
<!--box-header-->
<!--centro-->
<div class="panel-body table-responsive" id="listadoregistros">
  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
    <thead>
      <th>Opciones</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Fecha de nacimiento</th>
      <th>Registro</th>
      <th>Documento</th>
      <th>Telefono</th>
      <th>Correo</th>
      <th>Usuario</th>
      <th>Estado</th>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
      <th>Opciones</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Fecha de nacimiento</th>
      <th>Registro</th>
      <th>Documento</th>
      <th>Telefono</th>
      <th>Correo</th>
      <th>Usuario</th>
      <th>Estado</th>
    </tfoot>   
  </table>
</div>
<div class="panel-body" id="formularioregistros">
  <form action="" name="formulario" id="formulario" method="POST">
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Nombres(*):</label>
      <input class="form-control" type="hidden" name="idestudiante" id="idestudiante">
      <input class="form-control" type="text" name="nombre" id="nombre" maxlength="40" placeholder="Nombres" required>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Apellidos(*):</label>
      <input class="form-control" type="text" name="apellido" id="apellido" maxlength="40" placeholder="Apellidos" required></select>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Fecha de nacimiento(*):</label>
      <input class="form-control" type="date" name="fecha_nacimiento" id="fecha_nacimiento" maxlength="12" placeholder="Fecha de nacimiento" required>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Lugar de nacimiento(*):</label>
      <input class="form-control" type="hidden" name="idlugar" id="idlugar">
      <select name="lugar_nacimiento" id="lugar_nacimiento" class="form-control selectpicker" data-live-search="true" required>
        
      </select>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Tipo Documento(*):</label>
     <select class="form-control select-picker" name="tipo_documento" id="tipo_documento" required>
       <option value="CC">CEDULA DE CIUDADANIA</option>
       <option value="TI">TARJETA DE IDENTIDAD</option>
       <option value="CE">CEDULA DE EXTRANJERIA</option>
       <option value="NIT">NIT</option>
       <option value="PAS">PASAPORTE</option>
     </select>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Numero de documento(*):</label>
      <input class="form-control" type="number" name="numero_documento" id="numero_documento"  value="" placeholder="Numero de documento"required>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Fecha de expedicion(*):</label>
      <input class="form-control" type="date" name="fecha_expedicion" id="fecha_expedicion" maxlength="12" placeholder="Fecha de expedicion"  required>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Lugar de expedicion(*):</label>
      <input class="form-control" type="hidden" name="idlugar" id="idlugar">
      <select name="lugar_expedicion" id="lugar_expedicion" class="form-control selectpicker" data-live-search="true" required>
        
      </select>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Direccion de residencia(*):</label>
      <input class="form-control" type="text" name="direccion_residencia" id="direccion_residencia" maxlength="50" placeholder="Direccion de residencia" required>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Telefono:</label>
      <input class="form-control" type="text" name="telefono" id="telefono" maxlength="11" placeholder="Telefono" required>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Correo Electronico:</label>
      <input class="form-control" type="text" name="correo" id="correo" maxlength="40" placeholder="Correo Electronico">
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Tipo de sangre:</label>
      <input class="form-control" type="text" name="sangre" id="sangre" maxlength="5" placeholder="Tipo de sangre" required>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Nombre de un acudiente</label>
      <input class="form-control" type="text" name="acudiente" id="acudiente" maxlength="50" placeholder="Nombre de un acudiente">
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Telefono del acudiente:</label>
      <input class="form-control" type="text" name="telefono_acudiente" id="telefono_acudiente" maxlength="11" placeholder="Telefono del acudiente">
    </div>
    <div class="form-group col-lg-12 col-md-12 col-xs-12">
      <label for="">Observacion:</label>
      <input class="form-control" type="text" name="observacion" id="observacion" maxlength="150" placeholder="Observacion">
    </div>
    <div class="form-group col-lg-12 col-md-12 col-xs-12">
      <label for="">Foto del estudiante:</label>
      <input class="form-control" type="file" name="imagen_estudiante" id="imagen_estudiante">
      <input type="hidden" name="imagenactual1" id="imagenactual1">
      <img src="" alt="" width="150px" height="120" id="imagenmuestra1">
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Foto del documento (1/2):</label>
      <input class="form-control" type="file" name="imagen_documento1" id="imagen_documento1">
      <input type="hidden" name="imagenactual2" id="imagenactual2">
      <img src="" alt="" width="150px" height="120" id="imagenmuestra2">
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Foto del documento (2/2):</label>
      <input class="form-control" type="file" name="imagen_documento2" id="imagen_documento2">
      <input type="hidden" name="imagenactual3" id="imagenactual3">
      <img src="" alt="" width="150px" height="120" id="imagenmuestra3">
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
 <script src="scripts/estudiante.js"></script>

 <?php 
}

ob_end_flush();
  ?>