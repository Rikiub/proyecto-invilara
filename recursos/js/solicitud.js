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
