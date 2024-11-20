import { iniciarCrud, capitalizarTexto } from "./crud_dt.js";

iniciarCrud("cedula", [
	{ title: "Nombre", data: "nombre" },
	{ title: "Cedula", data: "cedula" },
	{ title: "Correo", data: "correo" },
	{ title: "Teléfono", data: "telefono" },
	{ title: "Dirección", data: "direccion" },
]);
