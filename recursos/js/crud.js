const crud = document.getElementById("crud");
const form = document.getElementById("formulario");

// Elemento jQuery: Abre el modal con `modal.modal("show")`.
const modal = $("#modal");

// Controlador de botones.
crud.addEventListener("click", (event) => {
    if (event.target.tagName == "BUTTON") {
        let accion = event.target.value;

        if (accion == "insertar") {
            // Reiniciar formulario
            form.reset();
        } else {
            // Desde la ubicación del boton, obtener <tr> más cercano y extraer todos sus <td>
            let td = event.target.closest("tr").querySelectorAll("td");

            // Iterar sobre todos los <td> y copiar su valor al formulario.
            for (let [index, element] of td.entries()) {
                form[index].value = element.innerText;
            }
        }

        // Actualizar acción del formulario.
        form["accion"].value = accion;

        // Mostrar modal.
        modal.modal("show");
    }
});

// Controlador de formulario.
form.addEventListener("submit", (event) => {
    event.preventDefault();

    $.ajax({
        method: "post",
        data: $(form).serialize(),
        dataType: "json",
        async: true,
        success: (res) => {
            if (res["error"]) {
                let msg = "ERROR: " + res["error"];

                console.log(msg);

                // Mostrar error en pantalla.
                alert(msg);
            } else {
                console.log("Procesado con exito");

                // Ocultar modal.
                modal.modal("hide");

                // Reiniciar pagina y obtener datos actualizados.
                window.location.reload();
            }
        },
    });
});