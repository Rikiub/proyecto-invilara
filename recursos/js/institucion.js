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

// telefono
document.getElementById("telefono_codigo").addEventListener("change", () => {
	const tipo = document.getElementById("telefono_codigo").value;
	document.getElementById("telefono").value = `${tipo}-`;
});

