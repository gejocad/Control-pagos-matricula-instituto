var tabla;

//funcion que se ejecuta al inicio
function init(){
   mostrarform(false);
   listar();

   $("#formulario").on("submit",function(e){
   	guardaryeditar(e);
   });

   //cargamos los items al select proveedor
   $.post("../ajax/matricula.php?op=selectMatricula", function(r){
   	$("#idmatricula").html(r);
   	$('#idmatricula').selectpicker('refresh');
   });


   $( function() {
    $("#tipopago").change( function() {
        if ($(this).val() === "semestral") {
            $("#total_pago").prop("disabled", true);
        } else {
            $("#total_pago").prop("disabled", false);
        }
    });
});

}


//funcion limpiar
function limpiar(){

	$("#idmatricula").val("");
	$("#tipo_pago").val("");
	$("#total_pago").val("");
	$("#observacion").val("");

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
			url:'../ajax/pago.php?op=listar',
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
     	url: "../ajax/pago.php?op=guardaryeditar",
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

function mostrar(idpago){
	$.post("../ajax/pago.php?op=mostrar",{idpago : idpago},
		function(data,status)
		{
			data=JSON.parse(data);
			mostrarform(true);

			$("#idmatricula").val(data.idmatricula);
			$("#idmatricula").selectpicker('refresh');
			$("#tipo_pago").val(data.tipo_pago);
			$("#tipo_pago").selectpicker('refresh');
			$("#total_pago").val(data.pago);
			$("#total_pago").selectpicker('refresh');
			$("#observacion").val(data.observacion);
			$("#idpago").val(data.idpago);

			//ocultar y mostrar los botones
			$("#btnGuardar").hide();
			$("#btnCancelar").show();
			$("#btnAgregarArt").hide();
		});

}


//funcion para desactivar
function anular(idpago){
	bootbox.confirm("??Esta seguro de desactivar este dato?", function(result){
		if (result) {
			$.post("../ajax/pago.php?op=anular", {idpago : idpago}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

//declaramos variables necesarias para trabajar con las compras y sus detalles
var cont=0;
var detalles=0;



init();