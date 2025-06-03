<?php
class Pregunta {
    private $conn;

    // Constructor para la conexión
    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    // Método para crear una nueva pregunta
    public function create($id_evaluacion, $enunciado) {
        // Preparamos la consulta SQL para insertar una nueva pregunta
        $query = "INSERT INTO preguntas (id_evaluacion, enunciado) VALUES (?, ?)";

        // Preparamos la sentencia
        $stmt = $this->conn->prepare($query);
        
        // Enlazamos los parámetros con los valores
        $stmt->bind_param("is", $id_evaluacion, $enunciado);
        
        // Ejecutamos la sentencia
        $stmt->execute();

        // Verificamos si la inserción fue exitosa
        if ($stmt->affected_rows > 0) {
            // Retornamos el ID de la pregunta recién insertada
            return $stmt->insert_id;
        } else {
            // Si no hubo inserción, retornamos 0
            return 0;
        }
    }

    // Método para obtener todas las preguntas
    public function getAll() {
        // Consultamos todas las preguntas en la base de datos
        $result = $this->conn->query("SELECT * FROM preguntas");
        
        // Verificamos si la consulta fue exitosa
        if ($result->num_rows > 0) {
            // Devolvemos los resultados como un array asociativo
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            // Si no hay resultados, devolvemos un array vacío
            return [];
        }
    }
}
?>
