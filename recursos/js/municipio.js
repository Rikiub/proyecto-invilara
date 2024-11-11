// Formularios
const form_edicion = document.getElementById("form-edicion");
const form_eliminacion = document.getElementById("form-eliminacion");

// Sintaxis basada en su propia documentación: https://getbootstrap.com/docs/5.3/components/modal/#via-javascript
const modal_edicion = new bootstrap.Modal("#modal-edicion");
const modal_eliminacion = new bootstrap.Modal("#modal-eliminacion");

const tabla = crearTabla("id", [{ title: "Nombre", data: "nombre" }]);

document.getElementById("boton-eliminar").addEventListener("click", () => {
	const seleccionado = tabla.row(".selected");

	if (seleccionado) {
		const id = seleccionado.id();
		form_eliminacion.id.value = id;

		modal_eliminacion.show();

		form_eliminacion.addEventListener("submit", () => {
			$.ajax({
				method: "post",
				data: { accion: "eliminar", id: id },
				success: () => {
					seleccionado.remove().draw(false);
				},
			});
		});
	}
});

document.getElementById("boton-insertar").addEventListener("click", (event) => {
	form_edicion.reset();
	modal_edicion.show();
});

// Controlador de formularios.
for (const form of [form_edicion, form_eliminacion]) {
	form.addEventListener("submit", (event) => {
		event.preventDefault();
		const datos = new FormData(form);
		envioAjax(datos);
	});
}

window.onload = () => {
	$.ajax({
		method: "post",
		data: { accion: "consultar" },
		dataType: "json",
		success: (res) => {
			for (const data of res) {
				tabla.row.add(data).draw(false);
			}
		},
	});
};

function crearTabla(row_id, columns) {
	return new DataTable("#tabla-contenedor", {
		responsive: true,
		fixedHeader: true,
		select: { style: "single" },
		rowId: row_id,
		columns: columns,
	});
}

/** Envio Ajax al controlador utilizando jQuery.
 * Debe pasar un objeto `FormData` como argumento.
 **/
function envioAjax(formData) {
	$.ajax({
		method: "post",
		data: formData,
		dataType: "json",
		processData: false,
		contentType: false,
		async: true,
		success: (res) => {
			if (res.error) {
				// Mostrar error en pantalla.
				const msg = `ERROR: ${res.error}`;
				alert(msg);

				// Mostrar en consola.
				throw res.error;
			}

			console.log("Procesado con exito");

			// Ocultar modal.
			modal_edicion.hide();
		},
	});
}
