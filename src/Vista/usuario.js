const filas = document.getElementsByName("fila-usuario")

filas.forEach((fila) => {
    let cedula = fila.querySelector("[name=cedula]")
    let boton = fila.querySelector("[name=btn-eliminar]")

    boton.addEventListener("click", () => {
        $.ajax({
            url: "/panel/usuarios",
            method: "GET",
            data: { "id": cedula.innerHTML, "accion": "eliminar" },
            success: (msg) => {
                console.log(msg)
                fila.remove()
            },
            error: (msg) => {
                console.log(msg)
            }
        })
    })
})
