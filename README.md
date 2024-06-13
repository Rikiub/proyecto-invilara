# Proyecto INVILARA

## Requisitos

> **PHP 8** como minimo para ejecutar el proyecto.

### Routing

El proyecto utiliza un sistema de routing para cargar las paginas. Redirigira cada controlador en base a la **URL** actual.

**Ejemplo:**

- `https://proyecto-invilara.com/inicio-sesion` redirigira al controlador `InicioSesion`
- `https://proyecto-invilara.com/panel/usuarios` redirigira al controlador `UsuariosPanel`

Algo a tomar en cuenta es que el sistema esta estrictamente ligado a la **estructura de archivos**, es decir, si el proyecto esta en una **subcarpeta** y no en la **raiz**, fallara debido a que no encontrara los archivos.

**Ejemplo:**

- `htdocs/` es el directorio **raiz** de **XAMPP**, por lo tanto, se sabe la **ruta exacta** de los archivos.
- `htdocs/mi-proyecto` es un subdirectorio y no la **raiz** del proyecto, por lo tanto, no se sabe la **ruta exacta** de los archivos.

### XAMPP

En caso de usar **XAMPP**, se puede adaptar:

- Mueva **TODOS** archivos de la carpeta **htdocs** a otro lugar.
- Luego, mueva **TODOS** los archivos del repositorio a la carpeta **htdocs**.

## Estructura

- .vscode/ **(Configuración VSCode)**
- assets/ **(Recursos para vistas: img/js/css)**
- lib/ **(Librerias web externas)**
- src/ **(Codigo PHP)**
- vendor/ **(Autoloader generado por Composer)**
- .htaccess **(Configuración Apache: Redirigir URLs al Front-controller)**
- index.php **(Front-controller)**
- jsconfig.json **(Configuración VSCode: Activar autocompletado JQuery)**
