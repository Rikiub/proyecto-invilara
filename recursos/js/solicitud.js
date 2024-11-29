import {
	iniciarCrud,
	cambiarTituloModal,
	TABLA,
	FORM_EDICION,
	BOTON_INSERTAR,
	BOTON_MODIFICAR,
	BOTON_ELIMINAR,
} from "./crud_dt.js";

iniciarCrud("id", [
	{ title: "Nº Control", data: "id" },
	{ title: "Comunidad", data: "nombre_comunidad" },
	{ title: "Institución", data: "nombre_institucion" },
	{ title: "Nombre del solicitante", data: "nombre_solicitante" },
	{ title: "Cedula del solicitante", data: "cedula_solicitante" },
	{
		title: "Gerencia",
		data: "nombre_gerencia",
		render: (valor) => {
			if (!valor) {
				return "NO ASIGNADO";
			}
			return valor;
		},
	},
	{ title: "Fecha", data: "fecha" },
	{ title: "Municipio", data: "nombre_municipio" },
	{ title: "Parroquia", data: "nombre_parroquia" },
	{ title: "Estado", data: "nombre_estado" },
	{ title: "Problematica", data: "problematica" },
]);

// Implementación

const TIPO_VISTA = getParametroUrl("vista");
const TIPO_SOLICITUD = getParametroUrl("tipo");

if (TIPO_SOLICITUD === "1" || TIPO_SOLICITUD === "2") {
	TABLA.column(2).visible(false);
} else if (TIPO_SOLICITUD === "3") {
	TABLA.column(3).visible(false);
	TABLA.column(4).visible(false);
}

if (TIPO_VISTA === "programado") {
	TABLA.column(5).visible(false);

	// Fijar estado
	const estado = document.getElementById("estado");
	estado.value = 1;

	for (const option of estado.options) {
		if (option.value !== estado.value) {
			option.disabled = true;
		}
	}
} else {
	BOTON_MODIFICAR.addEventListener("click", () => {
		// Habilitar opciones otra vez
		setTimeout(() => {
			for (const input of FORM_EDICION.elements) {
				if (input.tagName === "SELECT") {
					for (const option of input.options) {
						option.disabled = false;
					}
				}
			}
		}, 10);

		// Deshabilitar segun criterio
		setTimeout(() => {
			for (const input of FORM_EDICION.elements) {
				if (input.tagName === "SELECT") {
					if (input.name === "estado") {
						if (TIPO_VISTA === "ejecucion") {
							input.value = 2;
						} else if (TIPO_VISTA === "cerrado") {
							input.value = 3;
						}
					}

					if (input.name === "id_gerencia" && TIPO_VISTA === "ejecucion") {
					} else {
						for (const option of input.options) {
							if (option.value !== input.value) {
								option.disabled = true;
							}
						}
					}
				}
			}
		}, 100);
	});
}

// Configurar botones dinamicamente
if (TIPO_VISTA !== "programado") {
	BOTON_INSERTAR.remove();
	BOTON_ELIMINAR.remove();

	let titulo;

	if (TIPO_VISTA === "ejecucion") {
		titulo = "Asignar";
	} else if (TIPO_VISTA === "cerrado") {
		titulo = "Cerrar";
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

// Eliminar al modificar
FORM_EDICION.addEventListener("submit", () => {
	if (TIPO_VISTA !== "programado") {
		setTimeout(() => {
			TABLA.row(".selected").remove().draw(false);
		}, 200);
	}
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
