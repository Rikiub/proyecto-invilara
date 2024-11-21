import { iniciarCrud } from "./crud_dt.js";

iniciarCrud("cedula", [
	{ title: "Cedula", data: "cedula" },
	{ title: "Contraseña", data: "contrasena" },
	{
		title: "Rol",
		data: "rol",
		render: (valor) => {
			if (valor === 1) {
				return "Usuario";
			}

			if (valor === 2) {
				return "Administrador";
			}

			return valor;
		},
	},
]);
