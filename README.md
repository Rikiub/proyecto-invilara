# 🍏 Proyecto INVILARA

## 📦 Requisitos

### ⏫ Version PHP

**PHP 8** como minimo.

### 🚝 Router

El proyecto utiliza un sistema de **routing** para cargar las vistas. Redirigira cada **URL** a un **controlador** junto a su **metodo** en base a la **ruta de la URL** actual. 

**Ejemplo:**

- `https://proyecto-invilara.com/inicio-sesion` redirigira al controlador [InicioSesion](https://github.com/Rikiub/proyecto-invilara/blob/f32ead9eb0598c31305c8e1dadb182488fdac082/src/Controlador/InicioSesion.php)
- `https://proyecto-invilara.com/panel/usuarios` redirigira al controlador [UsuariosPanel](https://github.com/Rikiub/proyecto-invilara/blob/f32ead9eb0598c31305c8e1dadb182488fdac082/src/Controlador/UsuariosPanel.php)

Las **rutas** estan especificadas en el archivo [rutas.php](https://github.com/Rikiub/proyecto-invilara/blob/cb1530786982273b96594d43e83e772fa9d0820d/src/rutas.php).

---

Algo a tomar en cuenta es que el sistema esta estrictamente ligado a la **estructura de archivos**, es decir, si el proyecto esta en un **subdirectorio** y no en el directorio **raiz**, el sistema fallara debido a que no encontrara los archivos.

**Ejemplo:**

- `htdocs/` es el directorio **raiz** de **XAMPP**, por lo tanto, se sabe la **ruta exacta** de los archivos.
- `htdocs/mi-proyecto` es un subdirectorio y no la **raiz** del proyecto, por lo tanto, no se sabe la **ruta exacta** de los archivos.

### 🧰 XAMPP

En caso de usar **XAMPP**, se puede adaptar:

- Mueva **TODOS** archivos de la carpeta **htdocs** a otro lugar.
- Luego, mueva **TODOS** los archivos del repositorio a la carpeta **htdocs**.

## 📂 Estructura

- .vscode/ **(Configuración VSCode)**
- assets/ **(Recursos para vistas: img/js/css)**
- lib/ **(Librerias web externas)**
- src/ **(Codigo PHP)**
- vendor/ **(Autoloader generado por Composer)**
- .htaccess **(Configuración Apache: Redirigir URLs al Front-controller)**
- index.php **(Front-controller)**
- jsconfig.json **(Configuración VSCode: Activar autocompletado JQuery)**
