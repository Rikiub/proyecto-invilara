// Formularios
const FORM_EDICION = document.getElementById("form-edicion");
const FORM_ELIMINACION = document.getElementById("form-eliminacion");

// Sintaxis basada en su propia documentación: https://getbootstrap.com/docs/5.3/components/modal/#via-javascript
const MODAL_EDICION = new bootstrap.Modal("#modal-edicion");
const MODAL_ELIMINACION = new bootstrap.Modal("#modal-eliminacion");

export function iniciarCrud(rowId, columns) {
	// Tabla
	const TABLA = crearTabla(rowId, columns);
	let ACCION;

	window.onload = () => {
		// Controlador de botones
		desactivarBotones(true);

		TABLA.on("select deselect", () => {
			const selecciones = TABLA.rows({ selected: true }).count();
			desactivarBotones(selecciones === 0);
		});

		// Consulta
		envioAjax("consultar", {}, (res) => {
			TABLA.rows.add(res).draw(false);
		});
	};

	// Registro
	document.getElementById("boton-insertar").addEventListener("click", () => {
		cambiarTituloModal("Registrando");
		ACCION = "insertar";

		desactivarInput(false);

		FORM_EDICION.reset();
		MODAL_EDICION.show();
	});

	// Modificación
	document.getElementById("boton-modificar").addEventListener("click", () => {
		cambiarTituloModal("Registrando");
		ACCION = "modificar";

		desactivarInput(true);

		const row = TABLA.row(".selected");

		if (row.selected()) {
			const id = row.id();

			envioAjax("consultar", { id: id }, (datos) => {
				for (const key of Object.keys(datos)) {
					if (key in FORM_EDICION) {
						FORM_EDICION[key].value = datos[key];
					}
				}
			});

			MODAL_EDICION.show();
		}
	});

	// Eliminacion
	document.getElementById("boton-eliminar").addEventListener("click", () => {
		MODAL_ELIMINACION.show();
	});

	FORM_ELIMINACION.addEventListener("submit", (event) => {
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

		const data = formToObject(event.currentTarget);
		let ejecutar = () => null;

		if (ACCION === "insertar") {
			ejecutar = (res) => {
				data.id = res[rowId];
				TABLA.row.add(data).draw(false);
				MODAL_EDICION.hide();
			};
		} else if (ACCION === "modificar") {
			ejecutar = () => {
				TABLA.row(".selected").data(data).draw(false);
				MODAL_EDICION.hide();
			};
		} else {
			throw new Error("Acción no valida.");
		}

		envioAjax(ACCION, data, ejecutar);
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

/* Desactivar botones */
function desactivarBotones(bool) {
	for (const btn of document.querySelectorAll("button.desactivable")) {
		btn.disabled = bool;
	}
}

function cambiarTituloModal(titulo) {
	const elemento = document.getElementById("modal-title");
	elemento.textContent = titulo;
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
function crearTabla(row_id, columns) {
	return new DataTable("#tabla-contenedor", {
		responsive: true,
		fixedHeader: true,
		select: { style: "single" },
		rowId: row_id,
		columns: columns,
	});
}

/** Envio Ajax al controlador. */
function envioAjax(accion, datos, success) {
	$.ajax({
		method: "post",
		data: { ...datos, accion: accion },
		dataType: "json",
		success: success,
		error: (res) => {
			const text = res.responseJSON.mensaje;
			console.log(text);
			alert(text);
		},
	});
}
