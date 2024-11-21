<div class="input-group">
    <select id="telefono-codigo" class="input-group-text">
        <option value="" selected disabled>Formato</option>

        <option>0412</option>
        <option>0414</option>
        <option>0416</option>
        <option>0424</option>
        <option>0426</option>
    </select>

    <input id="telefono" name="telefono" class="form-control" type="tel" pattern="[0-9]{4}-[0-9]{7}" maxlength="12"
        title="Debe empezar con 4 digitos, separarse con una raya y terminar en 7 digitos" required />

    <script>
        const telefono_codigo = document.getElementById("telefono-codigo");
        const telefono_input = document.getElementById("telefono");

        telefono_input.addEventListener("change", () => {
            const partes = telefono_input.value.split("-");

            if (partes.length > 1) {
                telefono_codigo.value = partes[0];
            }
        });

        telefono_codigo.addEventListener("change", () => {
            const partes = telefono_input.value.split("-");

            if (partes.length > 1) {
                telefono_input.value = `${telefono_codigo.value}-${partes[1]}`;
            } else {
                telefono_input.value = `${telefono_codigo.value}-`;
            }
        });
    </script>
</div>