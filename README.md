# Tienda Online
Una tienda online desarrollada enteramente en **PHP**, **HTML**, **CSS** y **JavaScript vanilla**, con una base de datos en **MySQL**. La aplicación incluye autenticación basada en **JWT**, middlewares para controlar usuarios y roles, y un **gestor de rutas avanzado** que no solo carga dinámicamente los archivos CSS y JS, sino que también permite nombrar las rutas de manera desacoplada del código HTML, facilitando su modificación sin tocar directamente el HTML.

## Características Principales

- **Autenticación JWT**: Seguridad robusta mediante JSON Web Tokens para gestionar sesiones de usuarios.
- **Middlewares**: Control de acceso basado en roles (admin, usuario, invitado).
- **Gestor de Rutas Avanzado**:
  - Carga dinámica de archivos CSS y JS según la ruta.
  - Nombres de rutas desacoplados del código HTML, permitiendo modificaciones sin alterar el HTML.
- **Responsive Design**: Diseño adaptativo que funciona en dispositivos móviles, tablets y desktop.
- **Carrito de Compras**: Funcionalidad completa para agregar, eliminar y gestionar productos en el carrito.
- **Gestión de Productos**: Visualización de productos por categoría y detalles individuales.


## Tecnologías Utilizadas

- **Frontend**: HTML, CSS, JavaScript vanilla.
- **Backend**: PHP.
- **Base de Datos**: MySQL.
- **Autenticación**: JWT (JSON Web Tokens).
- **Otras Herramientas**: Gestor de rutas personalizado, middlewares para control de acceso.

## Estructura del Proyecto

El proyecto utiliza un **gestor de rutas avanzado** que no solo carga dinámicamente los archivos CSS y JS necesarios para cada página, sino que también permite nombrar las rutas de manera desacoplada del código HTML. Esto facilita la modificación de las rutas sin necesidad de tocar directamente el HTML. Aquí un ejemplo de la configuración de rutas:

```php
define('ROUTES', [
    'index' => [
        'route' => '',
        'css' => ['swiper-bundle.min.css', 'index.css'],
        'js' => ['swiper-bundle.min.js', 'index.js']
    ],
    'user.register' => [
        'route' => 'user/register',
        'css' => ['user/register.css'],
        'js' => ['user/register.js']
    ],
    'user.login' => [
        'route' => 'user/login',
        'css' => ['user/login.css'],
        'js' => []
    ],
    'user.myaccount' => [
        'route' => 'user/myaccount',
        'css' => ['user/myaccount.css'],
        'js' => []
    ],
    'products' => [
        'route' => 'products',
        'css' => ['products.css'],
        'js' => ['products.js']
    ],
    'products.category' => [
        'route' => 'products/:category',
        'css' => ['products.css'],
        'js' => ['products.js']
    ],
    'products.detail' => [
        'route' => 'products/detail/:id',
        'css' => ['swiper-bundle.min.css', 'productDetail.css'],
        'js' => ['swiper-bundle.min.js', 'productDetail.js']
    ],
    'cart' => [
        'route' => 'cart',
        'css' => ['cart.css'],
        'js' => []
    ]
]);
````
Ventajas del Gestor de Rutas
Desacoplamiento: Las rutas están definidas en un solo lugar, lo que permite modificarlas sin tocar el código HTML.

Flexibilidad: Puedes cambiar fácilmente la estructura de las URLs sin afectar la lógica del frontend.

Mantenibilidad: Centraliza la gestión de rutas, haciendo el código más limpio y fácil de mantener.


Contribución
¡Las contribuciones son bienvenidas! Si deseas contribuir al proyecto, sigue estos pasos:

Haz un fork del proyecto.

Crea una rama para tu feature (git checkout -b feature/NuevaCaracteristica).

Haz commit de tus cambios (git commit -m 'Añade una nueva característica').

Haz push a la rama (git push origin feature/NuevaCaracteristica).

Abre un Pull Request.
