import { iniciarCrud, capitalizarTexto } from "./crud_dt.js";

iniciarCrud("cedula", [
	{ title: "Nombre", data: "nombre" },
	{ title: "Cedula", data: "cedula" },
	{ title: "Correo", data: "correo" },
	{ title: "Teléfono", data: "telefono" },
	{ title: "Dirección", data: "direccion" },
]);
var miCampo = document.getElementById("nombre");

// Asignar la función al evento onkeypress
miCampo.onkeypress = soloLetras;

function soloLetras(event) {
	// Obtener el código del carácter presionado
	var charCode = event.which ? event.which : event.keyCode;
	// Permitir solo letras (mayúsculas y minúsculas), espacios y la tecla de retroceso
	const regex = /^[\p{L}\s]+$/u;

	if (!regex.test(String.fromCharCode(charCode)) && charCode !== 8) {
		alert("Solo puedes ingresar letras en el campo ' nombre '");
		// Evita que el carácter se agregue al campo
		event.preventDefault();
	}
}
var miCedula = document.getElementById("cedula");

// Asignar la función al evento onkeypress
miCedula.onkeypress = soloNumeros;

function soloNumeros(event) {
	// Obtener el código del carácter presionado y el valor actual del input
	var charCode = event.which ? event.which : event.keyCode;
	var inputValue = miCedula.value;

	// Permitir solo números y la tecla de retroceso
	var regex = /[0-9]/;

	if (!regex.test(String.fromCharCode(charCode)) && charCode !== 8) {
		alert("Solo puedes ingresar números en el campo ' cédula '");
		event.preventDefault();
	} else if (inputValue.length > 8) {
		// Si la longitud es mayor a 8, se evita que se añadan más caracteres
		event.preventDefault();
	}
}
var miCorreo = document.getElementById("correo");

miCorreo.onblur = validarCorreo;

function validarCorreo() {
	var correo = miCorreo.value;
	var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

	if (!regex.test(correo)) {
		alert("Por favor, ingresa un correo electrónico válido.");
		// Aquí puedes agregar acciones adicionales, como marcar el campo como inválido visualmente
		event.preventDefault();
	} else {
		// Si el correo es válido, puedes realizar acciones adicionales, como habilitar un botón de envío
	}
}
