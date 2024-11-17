import { iniciarCrud, capitalizarTexto } from "./crud.js";

iniciarCrud("id", [
	{ title: "Nombre", data: "nombre", render: capitalizarTexto },
	{ title: "Parroquia", data: "nombre_parroquia" },
	{ title: "Tipo", data: "tipo" },
	{ title: "Dirección", data: "direccion" },
	{ title: "RIF", data: "rif" },
	{ title: "Representante", data: "representante" },
	{ title: "Ambito", data: "ambito" },
]);
