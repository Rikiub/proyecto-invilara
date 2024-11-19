import {
	iniciarCrud,
	envioAjax,
	capitalizarTexto,
	BOTON_INSERTAR,
	BOTON_MODIFICAR,
	FORM_EDICION,
} from "./crud_dt.js";

iniciarCrud("id", [
	{ title: "Nombre", data: "nombre", render: capitalizarTexto },
	{ title: "Tipo", data: "tipo" },
	{ title: "RIF", data: "rif" },
	{ title: "Parroquia", data: "nombre_parroquia" },
	{ title: "Representante", data: "representante" },
	{ title: "Dirección", data: "direccion" },
	{ title: "Correo", data: "correo" },
	{ title: "Teléfono", data: "telefono" },
	{ title: "Ambito", data: "ambito" },
]);

// Actualizar select parroquias
const municipio_select = document.getElementById("municipio_select");
const parroquia_select = document.getElementById("parroquia_select");

municipio_select.addEventListener("change", (event) => {
	const id = event.currentTarget.value;
	actualizarParroquias(id);
});

for (const boton of [BOTON_INSERTAR, BOTON_MODIFICAR]) {
	boton.addEventListener("click", () => {
		setTimeout(() => {
			const id = FORM_EDICION.id.value;

			if (id) {
				envioAjax("consultar", { id: id }, (comunidad) => {
					envioAjax(
						"consultar",
						{ id: comunidad.id_parroquia },
						(parroquia) => {
							municipio_select.value = parroquia.id_municipio;
							actualizarParroquias(municipio_select.value, parroquia.id);
						},
						"?pagina=parroquia",
					);
				});
			} else {
				actualizarParroquias(municipio_select.value);
			}
		}, 100);
	});
}

function actualizarParroquias(id_municipio, id_parroquia) {
	envioAjax(
		"consultar",
		{ id_municipio: id_municipio },
		(res) => {
			const options = res
				.map(
					(parroquia) =>
						`<option ${parroquia.id === id_parroquia ? "selected" : ""} value="${parroquia.id}">${parroquia.nombre}</option>`,
				)
				.join("");
			parroquia_select.innerHTML = options;
		},
		"?pagina=parroquia",
	);
}

// Validar RIF
BOTON_MODIFICAR.addEventListener("click", () => {
	const tipo_rif = FORM_EDICION.tipo_rif;
	const rif = FORM_EDICION.rif;

	setTimeout(() => {
		const prefix = rif.value.charAt(0);
		const nuevo_rif = rif.value.slice(2);

		tipo_rif.value = prefix;
		rif.value = nuevo_rif;
	}, 100);
});

// Validaciones
document.getElementById("telefono_codigo").addEventListener("change", () => {
	const tipo = document.getElementById("telefono_codigo").value;
	document.getElementById("telefono").value = `${tipo}-`;
});

document.getElementById("rif").addEventListener("input", (event) => {
	const input = event.target;

	let format = input.value.replace(/\D/g, "");

	if (format.length > 8) {
		format = `${format.substring(0, 8)}-${format.substring(8)}`;
	}

	input.value = format;
});
