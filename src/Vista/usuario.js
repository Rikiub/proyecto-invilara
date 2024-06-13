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


/*
jQuery(() => {
    $("tr").each((index, element) => {
        console.log(element)

        $("#btn-eliminar").on("click", (e) => {
            let btn = $(e.target)

            $.ajax({
                url: "/panel/usuarios",
                method: "GET",
                data: { "id": btn.val(), "accion": "eliminar" },
                success: (msg) => {
                    btn.closest("tr").remove()
                },
            })
        })
    })
})
*/