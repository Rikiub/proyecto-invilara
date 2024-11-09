//telefono

const telefono = document.getElementById("telefono");

telefono.addEventListener("input", (event) => {
	input = event.target;

	let format = input.value.replace(/\D/g, "");

	if (format.length > 4) {
		format = `${format.substring(0, 4)}-${format.substring(4)}`;
	}

	input.value = format;
});
