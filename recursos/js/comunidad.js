import { iniciarCrud, envioAjax, capitalizarTexto } from "./crud_dt.js";

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

const municipio_select = document.getElementById("municipio_select");
const parroquia_select = document.getElementById("parroquia_select");

municipio_select.addEventListener("change", (event) => {
	const id = event.target.value;

	envioAjax(
		"consultar",
		{ id_municipio: id },
		(res) => {
			const options = res
				.map((item) => `<option value="${item.id}">${item.nombre}</option>`)
				.join("");
			parroquia_select.innerHTML = options;
		},
		"?pagina=parroquia",
	);
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
