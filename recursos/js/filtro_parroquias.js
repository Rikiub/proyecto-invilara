import { envioAjax } from "./crud_dt.js";

// Actualizar select parroquias
const municipio_select = document.getElementById("municipio_select");
const parroquia_select = document.getElementById("parroquia_select");

actualizarMunicipios();
actualizarParroquias(municipio_select.value);

municipio_select.addEventListener("change", (event) => {
	const id = event.currentTarget.value;
	actualizarParroquias(id);
});

function actualizarMunicipios() {
	envioAjax(
		"consultar",
		{},
		(res) => {
			let options = [];
			options.push("<option value='' selected>Cualquiera</option>");
			options.push("<hr>");

			options = [
				...options,
				res
					.map(
						(municipio) =>
							`<option value="${municipio.id}">${municipio.nombre}</option>`,
					)
					.join(""),
			];
			municipio_select.innerHTML = options;
		},
		"?pagina=municipio",
	);
}

function actualizarParroquias(id_municipio, id_parroquia) {
	envioAjax(
		"consultar",
		{ id_municipio: id_municipio },
		(res) => {
			let options = [];

			if (municipio_select.value === "") {
				options.push("<option value=''>Cualquiera</option>");
			} else {
				options = [
					...options,
					res
						.map(
							(parroquia) =>
								`<option ${parroquia.id === id_parroquia ? "selected" : ""} value="${parroquia.id}">${parroquia.nombre}</option>`,
						)
						.join(""),
				];
			}
			parroquia_select.innerHTML = options;
		},
		"?pagina=parroquia",
	);
}
