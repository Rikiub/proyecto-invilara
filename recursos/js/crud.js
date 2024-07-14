// CRUD
const crud = document.getElementById("crud");

// Formularios
const form_edicion = document.getElementById("form-edicion");
const form_eliminacion = document.getElementById("form-eliminacion");

// Modales Bootstrap
// Sintaxis basada en su propia documentación: https://getbootstrap.com/docs/5.3/components/modal/#via-javascript
const modal_edicion = new bootstrap.Modal("#modal-edicion");
const modal_eliminacion = new bootstrap.Modal("#modal-eliminacion");



// Controlador de botones.
crud.addEventListener("click", (event) => {
    if (event.target.tagName == "BUTTON") {
        let accion = event.target.value;

        if (accion == "insertar") {
            // Reiniciar formulario
            form_edicion.reset();

            desactivar_input(false);
            modal_edicion.show();
        } else if (accion == "modificar") {
            // Desde la ubicación del boton, obtener <tr> más cercano.
            // Luego extraer una lista de todos sus <td>.
            let td_lista = event.target.closest("tr").querySelectorAll("td");

            // Iterar sobre todos los <td> y copiar su valor al formulario.
            for (let [index, td] of td_lista.entries()) {
                form_edicion[index].value = td.textContent;
            }

            desactivar_input(true);
            modal_edicion.show();
        } else if (accion == "eliminar") {
            // Desde la ubicación del boton, obtener <tr> más cercano.
            // Luego extraer su ID principal desde el primer <td> que encuentre.
            let id = event.target.closest("tr").querySelector("td").textContent;

            // Cambiar valor del formulario de eliminación con el nuevo ID a eliminar.
            form_eliminacion["id"].value = id;
        }

        // Actualizar acción del formulario.
        form_edicion["accion"].value = accion;
    }
});

// Controlador de formularios.
[form_edicion, form_eliminacion].forEach(form => {
    form.addEventListener("submit", (event) => {
        event.preventDefault();

        let data = new FormData(form);
        envioAjax(data);
    });
});



// Ayudantes

/** Desactivar los `input` con el atributo `data-id` para evitar que sean editados. */
function desactivar_input(bool) {
    let lista = form_edicion.querySelectorAll("input[data-id]");

    lista.forEach(input => {
        input.readOnly = bool;
    });
}

/** Envio Ajax al controlador utilizando jQuery.
 * Debe pasar un objeto `FormData` como argumento. 
 **/
function envioAjax(formData) {
    $.ajax({
        method: "post",
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
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
                modal_edicion.hide();

                // Reiniciar pagina y obtener datos actualizados.
                window.location.reload();
            }
        },
    });
}