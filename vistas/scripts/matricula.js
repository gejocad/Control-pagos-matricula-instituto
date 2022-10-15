var tabla;

//funcion que se ejecuta al inicio
function init(){
   mostrarform(false);
   listar();

   $("#formulario").on("submit",function(e){
   	guardaryeditar(e);
   });

   //cargamos los items al select proveedor
   $.post("../ajax/estudiante.php?op=selectEstudiante", function(r){
   	$("#estudiante").html(r);
   	$('#estudiante').selectpicker('refresh');
   });
   //cargamos los items al select proveedor
   $.post("../ajax/programa.php?op=selectPrograma", function(i){
   	$("#programa").html(i);
   	$('#programa').selectpicker('refresh');
   });
   //cargamos los items al select proveedor
   $.post("../ajax/horario.php?op=selectHorario", function(j){
   	$("#horario").html(j);
   	$('#horario').selectpicker('refresh');
   });

}

//funcion limpiar
function limpiar(){

	$("#idmatricula").val("");
	$("#estudiante").val("");
	$("#programa").val("");
	$("#horario").val("");
	$("#precio_mes").val("");

}

//funcion mostrar formulario
function mostrarform(flag){
	limpiar();
	if(flag){
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		//$("#btnGuardar").prop("disabled",false);

		$("#btnCancelar").show();
		detalles=0;
		$("#btnAgregarArt").show();


	}else{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
	}
}

//cancelar form
function cancelarform(){
	limpiar();
	mostrarform(false);
}

//funcion listar
function listar(){
	tabla=$('#tbllistado').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdf'
		],
		"ajax":
		{
			url:'../ajax/matricula.php?op=listar',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":5,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}

//funcion para guardaryeditar
function guardaryeditar(e){
     e.preventDefault();//no se activara la accion predeterminada 
     //$("#btnGuardar").prop("disabled",true);
     var formData=new FormData($("#formulario")[0]);

     $.ajax({
     	url: "../ajax/matricula.php?op=guardaryeditar",
     	type: "POST",
     	data: formData,
     	contentType: false,
     	processData: false,

     	success: function(datos){
     		bootbox.alert(datos);
     		mostrarform(false);
     		listar();
     	}
     });

     limpiar();
}

function mostrar(idmatricula){
	$.post("../ajax/matricula.php?op=mostrar",{idmatricula : idmatricula},
		function(data,status)
		{
			data=JSON.parse(data);
			mostrarform(true);

			//obtenemos la fecha actual
			$("#estudiante").val(data.idestudiante);
			$("#estudiante").selectpicker('refresh');
			$("#programa").val(data.idprograma);
			$("#programa").selectpicker('refresh');
			$("#jornada").val(data.idhorario);
			$("#jornada").selectpicker('refresh');
			$("#precio_mes").val(data.precio_mes);
			$("#precio_mes").selectpicker('refresh');

			//ocultar y mostrar los botones
			$("#btnCancelar").show();
		});

}


//funcion para desactivar
function anular(idmatricula){
	bootbox.confirm("¿Esta seguro de desactivar este dato?", function(result){
		if (result) {
			$.post("../ajax/matricula.php?op=anular", {idmatricula : idmatricula}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

//declaramos variables necesarias para trabajar con las compras y sus detalles
var cont=0;
var detalles=0;





function agregarDetalle(idarticulo,articulo){
	var cantidad=1;
	var precio_compra=1;
	var precio_venta=1;

	if (idarticulo!="") {
		var subtotal=cantidad*precio_compra;
		var fila='<tr class="filas" id="fila'+cont+'">'+
        '<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">X</button></td>'+
        '<td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td>'+
        '<td><input type="number" name="cantidad[]" id="cantidad[]" value="'+cantidad+'"></td>'+
        '<td><input type="number" name="precio_compra[]" id="precio_compra[]" value="'+precio_compra+'"></td>'+
        '<td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td>'+
        '<td><span id="subtotal'+cont+'" name="subtotal">'+subtotal+'</span></td>'+
        '<td><button type="button" onclick="modificarSubtotales()" class="btn btn-info"><i class="fa fa-refresh"></i></button></td>'+
		'</tr>';
		cont++;
		detalles++;
		$('#detalles').append(fila);
		modificarSubtotales();

	}else{
		alert("error al ingresar el detalle, revisar las datos del articulo ");
	}
}

function modificarSubtotales(){
	var cant=document.getElementsByName("cantidad[]");
	var prec=document.getElementsByName("precio_compra[]");
	var sub=document.getElementsByName("subtotal");

	for (var i = 0; i < cant.length; i++) {
		var inpC=cant[i];
		var inpP=prec[i];
		var inpS=sub[i];

		inpS.value=inpC.value*inpP.value;
		document.getElementsByName("subtotal")[i].innerHTML=inpS.value;
	}

	calcularTotales();
}

function calcularTotales(){
	var sub = document.getElementsByName("subtotal");
	var total=0.0;

	for (var i = 0; i < sub.length; i++) {
		total += document.getElementsByName("subtotal")[i].value;
	}
	$("#total").html("$" + total);
	$("#total_compra").val(total);
	evaluar();
}

function evaluar(){

	if (detalles>0) 
	{
		$("#btnGuardar").show();
	}
	else
	{
		$("#btnGuardar").hide();
		cont=0;
	}
}

function eliminarDetalle(indice){
$("#fila"+indice).remove();
calcularTotales();
detalles=detalles-1;

}

init();