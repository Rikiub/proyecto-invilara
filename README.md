# Proyecto INVILARA

## Guia de desarrollo

### ⏫ Version PHP

Necesita **PHP 8** como minimo.

### 📄 Base datos

Debe importar el archivo [invilara.sql](invilara.sql) en su **base de datos**.

## Estructura de archivos

- 📁 Carpetas
    - .vscode/
        - *Configuración VSCode*
    - assets/
        - *Recursos para las vistas: img/js/css*
    - lib/
        - *Librerias web externas: Bootstrap/JQuery*
    - src/
        - *Codigo fuente PHP*

---

- ❗ Esenciales
    - index.php 
        - *Inicializador*
    - invilara.sql
        - *Base de datos a importar*

---

- 🔵 Opcionales
    - jsconfig.json
        - *Configuración VSCode: Activar autocompletado para JQuery*

---

- Si quieres agregar imagenes, guardala en la carpeta [assets](assets).
- Si quieres usar tu propio CSS, coloca tu codigo en el archivo [styles.css](assets/styles.css).