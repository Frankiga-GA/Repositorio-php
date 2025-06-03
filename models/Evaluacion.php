<?php
class Evaluacion {
    private $conn;

    // Constructor para la conexión
    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    // Método para crear una nueva evaluación
    public function create($titulo) {
        // Preparamos la consulta SQL para insertar una nueva evaluación
        $query = "INSERT INTO evaluaciones (titulo) VALUES (?)";

        // Preparamos la sentencia
        $stmt = $this->conn->prepare($query);
        
        // Enlazamos el parámetro con el valor
        $stmt->bind_param("s", $titulo);
        
        // Ejecutamos la sentencia
        $stmt->execute();

        // Verificamos si la inserción fue exitosa
        if ($stmt->affected_rows > 0) {
            // Retornamos el ID de la evaluación recién insertada
            return $stmt->insert_id;
        } else {
            // Si no hubo inserción, retornamos 0
            return 0;
        }
    }

    // Método para obtener todas las evaluaciones
    public function getAll() {
        // Consultamos todas las evaluaciones en la base de datos
        $result = $this->conn->query("SELECT * FROM evaluaciones");
        
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
