var tabla;

//funcion que se ejecuta al inicio
function init(){
   mostrarform(false);
   listar();

   $("#formulario").on("submit",function(e){
   	guardaryeditar(e);
   })

   //cargamos los items al select lugar expedicion
   $.post("../ajax/lugar.php?op=selectLugar", function(r){
   	$("#lugar_nacimiento").html(r);
   	$('#lugar_nacimiento').selectpicker('refresh');
   	$("#lugar_expedicion").html(r);
   	$('#lugar_expedicion').selectpicker('refresh')
   });
 

 
   $("#imagenmuestra").hide();
}

//funcion limpiar
function limpiar(){
	$("#idestudiante").val("");
	$("#nombre").val("");
	$("#apellido").val("");
	$("#fecha_nacimiento").val("");
	$("#lugar_nacimiento").val("");
	$("#tipo_documento").val("");
	$("#numero_documento").val("");
	$("#fecha_expedicion").val("");
	$("#lugar_expedicion").val("");
	$("#direccion_residencia").val("");
	$("#telefono").val("");
	$("#correo").val("");
	$("#sangre").val("");
	$("#acudiente").val("");
	$("#telefono_acudiente").val("");
	$("#imagen_estudiante").val("");
	$("#imagen_documento1").val("");
	$("#imagen_documento2").val("");
	$("#imagenmuestra1").attr("src","");
	$("#imagenmuestra2").attr("src","");
	$("#imagenmuestra3").attr("src","");
	$("#imagenactual1").val("");
	$("#imagenactual2").val("");
	$("#imagenactual3").val("");
}

//funcion mostrar formulario
function mostrarform(flag){
	limpiar();
	if(flag){
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}else{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
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
			url:'../ajax/estudiante.php?op=listar',
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
     $("#btnGuardar").prop("disabled",true);
     var formData=new FormData($("#formulario")[0]);

     $.ajax({
     	url: "../ajax/estudiante.php?op=guardaryeditar",
     	type: "POST",
     	data: formData,
     	contentType: false,
     	processData: false,

     	success: function(datos){
     		bootbox.alert(datos);
     		mostrarform(false);
     		tabla.ajax.reload();
     	}
     });

     limpiar();
}

function prueba1(){

	let prueba 

	prueba = setTimeout(mostrarform(), 5000)
}



function mostrar(idestudiante){
	$.post("../ajax/estudiante.php?op=mostrar",{idestudiante : idestudiante},
		function(data,status)
		{
			data=JSON.parse(data);
			mostrarform(true);

			$("#nombre").val(data.nombre);
			$("#apellido").val(data.apellido);
			$("#fecha_nacimiento").val(data.fecha_nacimiento);
			$("#lugar_nacimiento").val(data.lugar_nacimiento);
			$("#lugar_nacimiento").selectpicker('refresh');
			$("#tipo_documento").val(data.tipo_documento);
			$("#numero_documento").val(data.numero_documento);
			$("#fecha_expedicion").val(data.fecha_expedicion);
			$("#lugar_expedicion").val(data.lugar_expedicion);
			$("#lugar_expedicion").selectpicker('refresh');
			$("#direccion_residencia").val(data.direccion_residencia);
			$("#telefono").val(data.telefono);
			$("#correo").val(data.correo);
			$("#sangre").val(data.sangre);
			$("#acudiente").val(data.acudiente);
			$("#telefono_acudiente").val(data.telefono_acudiente);	
			$("#imagenmuestra1").show();
			$("#imagenmuestra1").attr("src","../files/estudiantes/"+data.numero_documento+"_"+data.nombre+".jpg");
			$("#imagenactual1").val(data.numero_documento+"_"+data.nombre+".jpg");
			$("#imagenmuestra2").show();
			$("#imagenmuestra2").attr("src","../files/estudiantes/"+data.numero_documento+"_documento_lado1.jpg");
			$("#imagenactual2").val(data.numero_documento+"_documento_lado1.jpg");
			$("#imagenmuestra3").show();
			$("#imagenmuestra3").attr("src","../files/estudiantes/"+data.numero_documento+"_documento_lado2.jpg");
			$("#imagenactual3").val(data.numero_documento+"_documento_lado2.jpg");
			
		})
}


//funcion para desactivar
function desactivar(idestudiante){
	bootbox.confirm("¿Esta seguro de desactivar este dato?", function(result){
		if (result) {
			$.post("../ajax/estudiante.php?op=desactivar", {idestudiante : idestudiante}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

function activar(idestudiante){
	bootbox.confirm("¿Esta seguro de activar este dato?" , function(result){
		if (result) {
			$.post("../ajax/estudiante.php?op=activar" , {idestudiante : idestudiante}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}


function imprimir(){
	$("#print").printArea();
}

init();