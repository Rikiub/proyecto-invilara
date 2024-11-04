const contenedor = document.getElementById("tabla-contenedor");
const principal = document.getElementById("tabla-principal");

while (contenedor.firstChild) {
	contenedor.firstChild.remove();
}

const grid = new gridjs.Grid({
	from: principal,
	search: true,
	language: {
		search: {
			placeholder: "Escribe algo...",
		},
		pagination: {
			previous: "Atras",
			next: "Adelante",
		},
	},
	className: {
		table: "table table-hover",
		tbody: "table-group-divider",
	},
}).render(contenedor);

function cambiarTipoSolicitud(tipo) {
	const url = new URL(window.location.href);
	url.searchParams.set("tipo", tipo);
	window.history.pushState({}, "", url);
	window.location.reload();
}

// Selector de solicitudes
document
	.getElementById("tipo-solicitud")
	.addEventListener("change", (event) => {
		cambiarTipoSolicitud(event.target.value);
	});
