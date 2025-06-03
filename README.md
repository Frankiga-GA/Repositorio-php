# Sistema de Evaluaciones

Este proyecto proporciona una API para gestionar **evaluaciones**, **preguntas** y **alternativas**. Está diseñado para almacenar evaluaciones con preguntas y alternativas posibles, permitiendo a los usuarios realizar exámenes. 

## Tecnologías Usadas

- **PHP**: Lenguaje de programación del backend.
- **MySQL**: Base de datos para almacenar las evaluaciones, preguntas y alternativas.
- **API RESTful**: Comunicación con el frontend a través de HTTP.

## Estructura del Proyecto

La API proporciona tres entidades principales:
1. **Evaluación**: Un conjunto de preguntas.
2. **Pregunta**: Una pregunta dentro de una evaluación.
3. **Alternativa**: Opciones posibles para cada pregunta.

Cada entidad tiene sus respectivas operaciones CRUD (Crear, Leer) a través de una API RESTful.

## Endpoints

### 1. **Evaluaciones**

#### Obtener todas las evaluaciones (GET)
- **URL**: `/evaluaciones`
- **Método**: `GET`
- **Parámetros**:
  - `task=getAll` (Requerido para obtener todas las evaluaciones)

