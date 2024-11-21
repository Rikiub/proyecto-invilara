<label class="form-label col fw-semibold">Teléfono
    <div class="input-group">
        <select id="telefono-codigo" class="input-group-text" required>
            <option value="" disabled selected>Formato</option>

            <option>412</option>
            <option>414</option>
            <option>416</option>
            <option>424</option>
            <option>426</option>
        </select>

        <input id="telefono-input" class="form-control" type="tel" pattern="[0-9]{7}" maxlength="7"
            title="Debe ser un número válido" required />

        <input id="telefono-real" name="telefono" type="hidden">
    </div>

    <script>
        const telefono_codigo = document.getElementById("telefono-codigo");
        const telefono_input = document.getElementById("telefono-input");
        const telefono_real = document.getElementById("telefono-real");

        telefono_real.addEventListener("change", (event) => {
            const partes = telefono_real.value.split("-");
            console.log(partes)

            if (partes.length > 1) {
                const codigo = partes[0];
                const numeros = partes.slice(1).join("-");

                telefono_codigo.value = codigo;
                telefono_input.value = numeros;

                telefono_real.value = `${codigo}-${numeros}`;
            }
        })
    </script>
</label>