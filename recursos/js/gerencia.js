import { iniciarCrud, capitalizarTexto } from "./crud_dt.js";

iniciarCrud("id", [
	{ title: "Nombre", data: "nombre", render: capitalizarTexto },
	{
		title: "Nombre del gerente",
		data: "nombre_gerente",
	},
	{
		title: "Cedula del gerente",
		data: "cedula_gerente",
	},
	{
		title: "Dirección",
		data: "direccion",
	},
]);
