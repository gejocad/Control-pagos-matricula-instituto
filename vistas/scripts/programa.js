var tabla;

//funcion que se ejecuta al inicio
function init(){
   mostrarform(false);
   listar();

   $("#formulario").on("submit",function(e){
   	guardaryeditar(e);
   })


}

//funcion limpiar
function limpiar(){
	$("#idprograma").val("");
	$("#nombre").val("");
	$("#resolucion").val("");
	$("#licencia").val("");
	$("#fecha_expedicion").val("");
	$("#fecha_vencimiento").val("");
	$("#codigo").val("");
	$("#semestre").val("");
	$("#decreto").val("");
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
			url:'../ajax/programa.php?op=listar',
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
     	url: "../ajax/programa.php?op=guardaryeditar",
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



function mostrar(idprograma){
	$.post("../ajax/programa.php?op=mostrar",{idprograma : idprograma},
		function(data,status)
		{
			data=JSON.parse(data);
			mostrarform(true);


			$("#nombre").val(data.nombre);
			$("#resolucion").val(data.resolucion);
			$("#licencia").val(data.licencia);
			$("#fecha_expedicion").val(data.fecha_expedicion);
			$("#fecha_vencimiento").val(data.fecha_vencimiento);
			$("#codigo").val(data.codigo);
			$("#semestre").val(data.semestre);
			$("#decreto").val(data.decreto);
			$("#idprograma").val(data.idprograma);
			
		})
}


//funcion para desactivar
function desactivar(idprograma){
	bootbox.confirm("??Esta seguro de desactivar este dato?", function(result){
		if (result) {
			$.post("../ajax/programa.php?op=desactivar", {idprograma : idprograma}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

function activar(idprograma){
	bootbox.confirm("??Esta seguro de activar este dato?" , function(result){
		if (result) {
			$.post("../ajax/programa.php?op=activar" , {idprograma : idprograma}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}


init();