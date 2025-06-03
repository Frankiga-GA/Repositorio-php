<?php
class Pregunta {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function create($id_evaluacion, $enunciado) {
        $stmt = $this->conn->prepare("INSERT INTO preguntas (id_evaluacion, enunciado) VALUES (?, ?)");
        $stmt->bind_param("is", $id_evaluacion, $enunciado);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function getAll() {
        $result = $this->conn->query("SELECT * FROM preguntas");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>