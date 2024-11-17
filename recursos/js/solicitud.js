import {
	iniciarCrud,
	cambiarTituloModal,
	FORM_EDICION,
	BOTON_INSERTAR,
	BOTON_MODIFICAR,
	BOTON_ELIMINAR,
} from "./crud_dt.js";

iniciarCrud("id", [
	{ title: "Nº Control", data: "id" },
	{ title: "Institución", data: "nombre_institucion" },
	{ title: "Nombre solicitante", data: "nombre_solicitante" },
	{ title: "Solicitante", data: "cedula_solicitante" },
	{ title: "Comunidad", data: "nombre_comunidad" },
	{ title: "Municipio", data: "nombre_municipio" },
	{ title: "Parroquia", data: "nombre_parroquia" },
	{ title: "Gerencia", data: "nombre_gerencia" },
	{ title: "Fecha", data: "fecha" },
	{ title: "Estado", data: "nombre_estado" },
	{ title: "Problematica", data: "problematica" },
]);

// Implementación

const TIPO_VISTA = getParametroUrl("vista");

// Configurar botones dinamicamente
if (TIPO_VISTA !== "programado") {
	BOTON_INSERTAR.remove();
	BOTON_ELIMINAR.remove();

	let titulo;

	if (TIPO_VISTA === "ejecucion") {
		titulo = "Asignar";
	} else if (TIPO_VISTA === "cerrado") {
		titulo = "Cerrando";
	} else if (TIPO_VISTA === "reporte") {
		BOTON_MODIFICAR.remove();
	}

	BOTON_MODIFICAR.textContent = titulo;

	BOTON_MODIFICAR.addEventListener("click", () => {
		cambiarTituloModal(titulo);
	});
}

// Fijar fecha
BOTON_INSERTAR.addEventListener("click", () => {
	const fecha = new Date().toISOString().split("T")[0];
	FORM_EDICION.fecha.value = fecha;
});

// Selector de solicitudes
document
	.getElementById("tipo-solicitud")
	.addEventListener("change", (event) => {
		actualizarTipoSolicitud(event.target.value);
	});

function actualizarTipoSolicitud(tipo) {
	const url = new URL(window.location.href);
	url.searchParams.set("tipo", tipo);

	window.history.pushState({}, "", url);
	window.location.reload();
}

// Manipular URL
function getParametroUrl(parametro) {
	const url = new URL(window.location.href);
	return url.searchParams.get(parametro);
}
