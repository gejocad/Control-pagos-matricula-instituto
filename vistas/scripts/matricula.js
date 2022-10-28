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
	$("#idestudiante").val("");
	$("#programa").val("");
	$("#idprograma").val("");
	$("#horario").val("");
	$("#idhorario").val("");
	$("#precio_mes").val("");
	$("#diploma_bachiller").val("");
	$("#certificado_9").val("");
	$("#fotocopia_identificacion").val("");
	$("#fotocopia_registro_civil").val("");
	$("#carpeta").val("");

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
			$("#diploma_bachiller").val(data.diploma_bachiller);
			$("#certificado_9").val(data.certificado_9);
			$("#fotocopia_identificacion").val(data.fotocopia_identificacion);
			$("#fotocopia_registro_civil").val(data.fotocopia_registro_civil);
			$("#carpeta").val(data.carpeta);
			$("#idmatricula").val(data.idmatricula);

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




init();