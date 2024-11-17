import { iniciarCrud, capitalizarTexto } from "./crud.js";

iniciarCrud("id", [
	{ title: "Nombre", data: "nombre", render: capitalizarTexto },
]);
