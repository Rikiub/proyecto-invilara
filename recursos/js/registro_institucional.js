function consultar() {
	var datos = new FormData();
	datos.append('accion', 'consultar');
	enviaAjax(datos);
}
function destruyeDT() {
	if ($.fn.DataTable.isDataTable("#tablaregistro_solicitante")) {
		$("#tablaregistro_solicitante").DataTable().destroy();
	}
}
function crearDT() {
	if (!$.fn.DataTable.isDataTable("#tablaregistro_solicitante")) {
		$("#tablaregistro_solicitante").DataTable({
			language: {
				lengthMenu: "Mostrar _MENU_ por página",
				zeroRecords: "No se encontraron personas",
				info: "Mostrando página _PAGE_ de _PAGES_",
				infoEmpty: "No hay personas registradas",
				infoFiltered: "(filtrado de _MAX_ registros totales)",
				search: "Buscar:",
				paginate: {
					first: "Primera",
					last: "Última",
					next: "Siguiente",
					previous: "Anterior",
				},
			},
			autoWidth: false,
			order: [[1, "asc"]],
		});
	}
}

$(document).ready(function () {
	$("#proceso").on("click", function () {
		if ($(this).text() == "INCLUIR") {
			var datos = new FormData();
			datos.append('accion', 'modificar');
			datos.append('nro_control', $("#nro_control").val());
			datos.append('nro_oficio', $("#nro_oficio").val());
			datos.append('fecha', $("#fecha").val());
			datos.append('asunto', $("#asunto").val());
			datos.append('telefono', $("#telefono").val());
			datos.append('observacion', $("#observacion").val());
			datos.append('gerencia_referida', $("#gerencia_referida").val());
			datos.append('direccion_comunidad', $("#direccion_comunidad").val());
			datos.append('instrucciones_presidenciales', $("#instrucciones_presidenciales").val());
			datos.append("estatus", $("estatus").val());
			enviaAjax(datos);
		} else if ($(this).text() == "MODIFICAR") {
			var datos = new FormData();
			datos.append('accion', 'modificar');
			datos.append('nro_control', $("#nro_control").val());
			datos.append('nro_oficio', $("#nro_oficio").val());
			datos.append('fecha', $("#fecha").val());
			datos.append('asunto', $("#asunto").val());
			datos.append('telefono', $("#telefono").val());
			datos.append('observacion', $("#observacion").val());
			datos.append('gerencia_referida', $("#gerencia_referida").val());
			datos.append('direccion_comunidad', $("#direccion_comunidad").val());
			datos.append('instrucciones_presidenciales', $("#instrucciones_presidenciales").val());
			datos.append("estatus", $("estatus").val());
			enviaAjax(datos);
		} else if ($(this).text() == "ELIMINAR") {
			var datos = new FormData();
			datos.append('accion', 'eliminar');
			datos.append('nro_control', $("#nro_control").val());
			enviaAjax(datos);
		}
	}
	);
	$("#incluir").on("click", function () {
		limpia();
		$("#proceso").text("INCLUIR");
		$("#modal1").modal("show");
	});
});

function muestraMensaje(mensaje) {

	$("#contenidodemodal").html(mensaje);
	$("#mostrarmodal").modal("show");
	setTimeout(function () {
		$("#mostrarmodal").modal("hide");
	}, 5000);
}
function validarkeypress(er, e) {

	key = e.keyCode;


	tecla = String.fromCharCode(key);


	a = er.test(tecla);

	if (!a) {

		e.preventDefault();
	}


}
function validarkeyup(er, etiqueta, etiquetamensaje,
	mensaje) {
	a = er.test(etiqueta.val());
	if (a) {
		etiquetamensaje.text("");
		return 1;
	}
	else {
		etiquetamensaje.text(mensaje);
		return 0;
	}
}

function pone(pos, accion) {

	linea = $(pos).closest('tr');


	if (accion == 0) {
		$("#proceso").text("MODIFICAR");
	}
	else {
		$("#proceso").text("ELIMINAR");
	}
	$("#nro_control").val($(linea).find("td:eq(1)").text());
	$("#nro_oficio").val($(linea).find("td:eq(2)").text());
	$("fecha").val($(linea).find("td:eq(3)").text());
	$("#asunto").val($(linea).find("td:eq(4)").text());
	$("#telefono").val($(linea).find("td:eq(5)").text());
	$("#observacion").val($(linea).find("td:eq(6)").text());
	$("#gerencia_referida").val($(linea).find("td:eq(7)").text());
	$("#direccion_comunidad").val($(linea).find("td:eq(8)").text());
	$("#instrucciones_presidenciales").val($(linea).find("td:eq(9)").text());
	$("#estatus").val($(linea).find("td:eq(9)").text());
	$("#modal1").modal("show");
}
function enviaAjax(datos) {
	$.ajax({
		async: true,
		url: "",
		type: "POST",
		contentType: false,
		data: datos,
		processData: false,
		cache: false,
		beforeSend: function () { },
		timeout: 10000, success: function (respuesta) {
			try {
				var lee = JSON.parse(respuesta);
				if (lee.resultado == "") {
					$("").val(lee.mensaje);
				}
				else if (lee.resultado == "consultar") {
					destruyeDT();
					$("#resultadoconsulta").html(lee.mensaje);
					crearDT();
				}
				else if (lee.resultado == "incluir") {
					muestraMensaje(lee.mensaje);
					if (lee.mensaje == 'Registro Inluido') {
						$("#modal1").modal("hide");
						consultar();
					}
				}
				else if (lee.resultado == "modificar") {
					muestraMensaje(lee.mensaje);
					if (lee.mensaje == 'Registro Modificado') {
						$("#modal1").modal("hide");
						consultar();
					}
				}
				else if (lee.resultado == "eliminar") {
					muestraMensaje(lee.mensaje);
					if (lee.mensaje == 'Registro Eliminado') {
						$("#modal1").modal("hide");
						consultar();
					}
				}
				else if (lee.resultado == "error") {
					muestraMensaje(lee.mensaje);
				}
			} catch (e) {
				alert("Error en JSON " + e.name);
			}
		},
		error: function (request, status, err) {

			if (status == "timeout") {
				muestraMensaje("Servidor ocupado, intente de nuevo");
			} else {
				muestraMensaje("ERROR: <br/>" + request + status + err);
			}
		},
		complete: function () { },
	});
}

function limpia() {

	$("#nro_control").val("");
	$("#nro_oficio").val("");
	$("#fecha").val("");
	$("#asunto").val("");
	$("#telefono").val("");
	$("#observacion").val("");
	$("#gerencia_referida").val("");
	$("#direccion_comunidad").val("");
	$("#instrucciones_presidenciales").val("");
	$("#estatus").val("");
}