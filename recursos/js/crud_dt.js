// Formularios
export const FORM_EDICION = document.getElementById("form-edicion");

// Botones
export const BOTON_INSERTAR = document.getElementById("boton-insertar");
export const BOTON_MODIFICAR = document.getElementById("boton-modificar");
export const BOTON_ELIMINAR = document.getElementById("boton-eliminar");

// Interno
export let TABLA;

export function iniciarCrud(rowId, columns, options = {}) {
	// Tabla
	TABLA = crearTabla(rowId, columns, options);
	let ACCION;

	// Modales
	// Sintaxis basada en su propia documentación: https://getbootstrap.com/docs/5.3/components/modal/#via-javascript
	const MODAL_EDICION = new bootstrap.Modal("#modal-edicion");
	const MODAL_ELIMINACION = new bootstrap.Modal("#modal-eliminacion");

	// Controlador de botones
	desactivarBotones(true);

	TABLA.on("select deselect", () => {
		const selecciones = TABLA.rows({ selected: true }).count();
		desactivarBotones(selecciones === 0);
	});

	// Consulta
	envioAjax("consultar", {}, (res) => {
		console.log("Consulta: ", res);
		TABLA.rows.add(res).draw(false);
	});

	// Registro
	BOTON_INSERTAR.addEventListener("click", () => {
		cambiarTituloModal("Registrando");
		ACCION = "insertar";

		TABLA.row(".selected").deselect();
		desactivarInput(false);

		FORM_EDICION.reset();
		MODAL_EDICION.show();
	});

	// Modificación
	BOTON_MODIFICAR.addEventListener("click", () => {
		cambiarTituloModal("Modificando");
		ACCION = "modificar";

		desactivarInput(true);

		const row = TABLA.row(".selected");

		if (row.selected()) {
			const id = row.id();

			envioAjax("consultar", { id: id }, (datos) => {
				for (const key of Object.keys(datos)) {
					if (key in FORM_EDICION) {
						FORM_EDICION[key].value = datos[key];
						FORM_EDICION[key].dispatchEvent(new Event("change"));
					}
				}
			});

			MODAL_EDICION.show();
		}
	});

	// Eliminacion
	BOTON_ELIMINAR.addEventListener("click", () => {
		MODAL_ELIMINACION.show();
	});

	document
		.getElementById("form-eliminacion")
		.addEventListener("submit", (event) => {
			event.preventDefault();

			const row = TABLA.row(".selected");
			const id = row.id();

			envioAjax("eliminar", { id: id }, () => {
				row.remove().draw(false);
				MODAL_ELIMINACION.hide();
			});
		});

	// Formulario
	FORM_EDICION.addEventListener("submit", (event) => {
		event.preventDefault();

		let success = () => null;

		if (ACCION === "insertar") {
			success = (res) => {
				envioAjax("consultar", { id: res.id }, (res) => {
					TABLA.row.add(res).draw(false);
				});

				MODAL_EDICION.hide();
			};
		} else if (ACCION === "modificar") {
			success = () => {
				const id = TABLA.row(".selected").id();

				envioAjax("consultar", { id: id }, (res) => {
					TABLA.row(".selected").data(res).draw(false);
				});

				MODAL_EDICION.hide();
			};
		} else {
			throw new Error("Acción no valida.");
		}

		const formulario = formToObject(event.currentTarget);
		envioAjax(ACCION, formulario, success);
	});
}

export function capitalizarTexto(texto) {
	const formato = texto
		.split(" ")
		.map((palabra) => {
			return palabra[0].toUpperCase() + palabra.slice(1);
		})
		.join(" ");
	return formato;
}

export function cambiarTituloModal(titulo) {
	const elemento = document.getElementById("modal-title");
	elemento.textContent = titulo;
}

/* Desactivar botones */
function desactivarBotones(bool) {
	for (const btn of document.querySelectorAll("button.desactivable")) {
		btn.disabled = bool;
	}
}

/** Desactivar los `input` con el atributo `data-id` para evitar que sean editados. */
function desactivarInput(bool) {
	const lista = document.querySelectorAll("input[data-id]");

	for (const input of lista) {
		input.readOnly = bool;

		if (bool) {
			input.classList.add("bg-secondary-subtle");
		} else {
			input.classList.remove("bg-secondary-subtle");
		}
	}
}

/* Convertido formulario HTML en objeto JavaScript */
function formToObject(element) {
	const data = Object.fromEntries(new FormData(element));
	return data;
}

/* Crear DataTablet */
function crearTabla(row_id, columns, options = {}) {
	return new DataTable("#tabla-contenedor", {
		responsive: true,
		fixedHeader: true,
		select: { style: "single" },
		rowId: row_id,
		columns: columns,
		language: {
			emptyTable: "No hay datos disponibles para mostrar",
			info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
			infoEmpty: "Mostrando 0 a 0 de 0 entradas",
			infoFiltered: "(filtrados desde _MAX_ entradas totales)",
			search: "Buscar:",
			lengthMenu: "Mostrando _MENU_ entradas",
			zeroRecords: "No se encontraron coincidencias",
			loadingRecords: "Cargando...",
			paginate: {
				first: "Primero",
				last: "Ultimo",
				next: "Siguiente",
				previous: "Anterior",
			},
		},
		...options,
	});
}

/** Envio Ajax al controlador. */
export function envioAjax(accion, datos, success, url = "") {
	$.ajax({
		method: "post",
		url: url,
		data: { ...datos, accion: accion },
		dataType: "json",
		success: success,
		error: (res) => {
			let text;

			if (res.responseJSON) {
				text = res.responseJSON.mensaje;
			} else {
				text = "El servidor devolvio un error.";
			}

			console.log(text);
			alert(text);
		},
	});
}
