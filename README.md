<h1 align=center>
    🍏 Proyecto INVILARA
</h1>

## Requisitos

### ⏫ Version PHP

Necesita **PHP 8** como minimo.

### 📄 Base datos

Debe importar el archivo [invilara.sql](invilara.sql) en su **base de datos**.

## Estructura de archivos

- 📁 Carpetas
    - [.vscode/](.vscode/)
        - *Configuración VSCode*
    - [assets/](assets/)
        - *Recursos para las vistas: img/js/css*
    - [lib/](lib/)
        - *Librerias web externas: Bootstrap/jQuery*
    - [src/](src/)
        - *Codigo fuente PHP*

---

- ❗ Esenciales
    - [index.php](index.php)
        - *Inicializador/Front-controller*
    - [invilara.sql](invilara.sql)
        - *Base de datos a importar*

---

- 🔵 Opcionales
    - [jsconfig.json](jsconfig.json)
        - *Configuración VSCode: Activar autocompletado para JQuery*

---

## Modo de trabajo

- Todo el codigo de la pagina web DEBE estar en la carpeta [src](src/).
    - Tomalo en cuenta a la hora de usar `require` en PHP.
- Cada vista DEBE importar el componente [header.php](src/vista/componentes/header.php) con `require_once`.
    - Este componente se comparte entre TODAS las vistas y maneja el CSS y JS necesarios para su funcionamiento.
    - Vea el inicio de la vista [registro.php](src/vista/registro.php) como ejemplo.
- Si quiere usar su propio CSS DEBE colocar su codigo en el archivo [styles.css](assets/styles.css).
    - Este archivo es importado por [header.php](src/vista/componentes/header.php)
- Si quiere agregar imagenes DEBE colocarlas en la carpeta [assets](assets/).
- Cada libreria web externa (Bootstrap/jQuery) DEBE estar en la carpeta [lib](lib/) y DEBE importarse UNICAMENTE en el archivo [header.php](src/vista/componentes/header.php)