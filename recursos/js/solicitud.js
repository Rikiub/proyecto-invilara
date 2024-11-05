const contenedor = document.getElementById("tabla-contenedor");
const principal = document.getElementById("tabla-principal");

while (contenedor.firstChild) {
	contenedor.firstChild.remove();
}

const grid = new gridjs.Grid({
	from: principal,
	sort: true,
	search: true,
	resizable: true,
	fixedHeader: true,
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
		th: "bg-body-secondary-subtle text-body",
		td: "bg-body text-body",
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
