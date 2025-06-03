# Sistema de Evaluaciones en PHP

Este paquete contiene tres clases PHP orientadas a manejar un sistema básico de evaluaciones con preguntas y alternativas.

## Estructura de Archivos

- `Evaluacion.php`: Clase para crear y listar evaluaciones.
- `Pregunta.php`: Clase para crear y listar preguntas vinculadas a una evaluación.
- `Alternativa.php`: Clase para crear y listar alternativas asociadas a una pregunta.
- `conexion.php`: Archivo de conexión a la base de datos MySQL.

## Requisitos

- Servidor web con soporte PHP (por ejemplo, XAMPP, LAMP).
- MySQL y base de datos configurada con las tablas necesarias.
- PHP 7.0 o superior.


## Conexión a Base de Datos

Modificar `conexion.php` con tus credenciales y nombre de base de datos:

```php
$conexion = new mysqli("localhost", "usuario", "contraseña", "nombre_base_datos");
```

