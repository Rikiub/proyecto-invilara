import { iniciarCrud, capitalizarTexto, envioAjax } from "./crud_dt.js";

iniciarCrud("id", [
	{ title: "Nombre", data: "nombre", render: capitalizarTexto },
	{
		title: "Nombre del director",
		data: "nombre_director",
	},
	{
		title: "Cedula del director",
		data: "cedula_director",
	},
	{
		title: "Dirección",
		data: "direccion",
	},
	{
		title: "Correo",
		data: "correo",
	},
	{
		title: "Teléfono",
		data: "telefono",
	},
]);

// Telefono
const telefono = document.getElementById("telefono");

telefono.addEventListener("input", (event) => {
	input = event.target;

	let format = input.value.replace(/\D/g, "");

	if (format.length > 4) {
		format = `${format.substring(0, 4)}-${format.substring(4)}`;
	}

	input.value = format;
});
