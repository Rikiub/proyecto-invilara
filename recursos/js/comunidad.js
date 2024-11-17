import { iniciarCrud, capitalizarTexto } from "./crud.js";

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
