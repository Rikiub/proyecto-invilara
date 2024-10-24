// CRUD
const crud = document.getElementById("crud");

// Formularios
const form_edicion = document.getElementById("form-edicion");
const form_eliminacion = document.getElementById("form-eliminacion");

// Modales Bootstrap
// Sintaxis basada en su propia documentación: https://getbootstrap.com/docs/5.3/components/modal/#via-javascript
const modal_edicion = new bootstrap.Modal("#modal-edicion");
const modal_eliminacion = new bootstrap.Modal("#modal-eliminacion");

// Controlador de botones.
crud.addEventListener("click", (event) => {
	if (event.target.tagName === "BUTTON") {
		const accion = event.target.value;

		if (accion === "insertar") {
			// Reiniciar formulario
			form_edicion.reset();

			desactivar_input(false);
			modal_edicion.show();
		} else if (accion === "modificar") {
			// Desde la ubicación del boton, obtener <tr> más cercano.
			// Luego extraer una lista de todos sus <td>.
			const td_lista = event.target.closest("tr").querySelectorAll("td");

			// Iterar sobre todos los <td> y copiar su valor al formulario.
			for (const [index, td] of td_lista.entries()) {
				el = form_edicion[index];

				if (el.tagName === "SELECT") {
					// Fijar posición del <select>
					for (let i = 0; i < el.options.length; i++) {
						if (el.options[i].text === td.textContent) {
							el.selectedIndex = i;
							break;
						}
					}
				} else if (el.type === "date") {
					// Fijar fecha.
					const [dia, mes, año] = td.textContent.split("/");
					el.value = `${año}-${mes}-${dia}`;
				} else {
					el.value = td.textContent;
				}
			}

			desactivar_input(true);
			modal_edicion.show();
		} else if (accion === "eliminar") {
			// Desde la ubicación del boton, obtener <tr> más cercano.
			// Luego extraer su ID principal desde el primer <td> que encuentre.
			const id = event.target.closest("tr").querySelector("td").textContent;

			// Cambiar valor del formulario de eliminación con el nuevo ID a eliminar.
			form_eliminacion.id.value = id;
		}

		// Actualizar acción del formulario.
		form_edicion.accion.value = accion;
	}
});

// Controlador de formularios.
for (const form of [form_edicion, form_eliminacion]) {
	form.addEventListener("submit", (event) => {
		event.preventDefault();

		const data = new FormData(form);
		envioAjax(data);
	});
}

// Ayudantes

/** Desactivar los `input` con el atributo `data-id` para evitar que sean editados. */
function desactivar_input(bool) {
	const lista = form_edicion.querySelectorAll("input[data-id]");

	for (const input of lista) {
		input.readOnly = bool;
	}
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
				const msg = `ERROR: ${res.error}`;

				console.log(msg);

				// Mostrar error en pantalla.
				alert(msg);
			} else {
				console.log("Procesado con exito");

				// Ocultar modal.
				modal_edicion.hide();

				// Reiniciar pagina y obtener datos actualizados.
				window.location.reload();
			}
		},
	});
}
