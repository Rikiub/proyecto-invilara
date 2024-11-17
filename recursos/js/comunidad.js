import { iniciarCrud, capitalizarTexto } from "./crud_dt.js";

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
