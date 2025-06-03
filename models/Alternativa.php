<?php
class Alternativa {
    private $conn;

    // Constructor para la conexión
    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    // Método para crear una nueva alternativa
    public function create($id_pregunta, $texto, $es_correcta) {
        // Preparamos la consulta SQL para insertar una nueva alternativa
        $query = "INSERT INTO alternativas (id_pregunta, texto, es_correcta) VALUES (?, ?, ?)";

        // Preparamos la sentencia
        $stmt = $this->conn->prepare($query);
        
        // Enlazamos los parámetros con los valores
        $stmt->bind_param("isi", $id_pregunta, $texto, $es_correcta);
        
        // Ejecutamos la sentencia
        $stmt->execute();

        // Verificamos si la inserción fue exitosa
        if ($stmt->affected_rows > 0) {
            // Retornamos el ID de la alternativa recién insertada
            return $stmt->insert_id;
        } else {
            // Si no hubo inserción, retornamos 0
            return 0;
        }
    }

    // Método para obtener todas las alternativas
    public function getAll() {
        // Consultamos todas las alternativas en la base de datos
        $result = $this->conn->query("SELECT * FROM alternativas");
        
        // Verificamos si la consulta fue exitosa
        if ($result->num_rows > 0) {
            // Devolvemos los resultados como un array asociativo
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            // Si no hay resultados, devolvemos un array vacío
            return [];
        }
    }

    // Método para obtener alternativas por ID de pregunta
    public function getByPregunta($id_pregunta) {
        // Preparamos la consulta para obtener alternativas de una pregunta específica
        $stmt = $this->conn->prepare("SELECT * FROM alternativas WHERE id_pregunta = ?");
        $stmt->bind_param("i", $id_pregunta);
        
        // Ejecutamos la consulta
        $stmt->execute();

        // Obtenemos el resultado de la consulta
        $result = $stmt->get_result();
        
        // Devolvemos los resultados como un array asociativo
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
