import { iniciarCrud, FORM_EDICION, BOTON_INSERTAR } from "./crud_dt.js";

iniciarCrud("id", [
	{ title: "Nº Control", data: "id" },
	{ title: "Comunidad", data: "nombre_comunidad" },
	{ title: "Municipio", data: "nombre_municipio" },
	{ title: "Parroquia", data: "nombre_parroquia" },
	{ title: "Gerencia", data: "nombre_gerencia" },
	{ title: "Fecha", data: "fecha" },
	{ title: "Estado", data: "nombre_estado" },
	{ title: "Problematica", data: "problematica" },
]);

BOTON_INSERTAR.addEventListener("click", () => {
	const fecha = new Date().toISOString().split("T")[0];
	FORM_EDICION.fecha.value = fecha;
});

function cambiarTipoSolicitud(tipo) {
	const url = new URL(window.location.href);
	url.searchParams.set("tipo", tipo);
	window.history.pushState({}, "", url);
	window.location.reload();
}

// Selector de solicitudes
document
	.getElementById("tipo-solicitud")
	.addEventListener("change", (event) => {
		cambiarTipoSolicitud(event.target.value);
	});
