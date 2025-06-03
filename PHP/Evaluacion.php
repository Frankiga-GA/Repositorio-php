<?php
class Evaluacion {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function create($titulo) {
        $stmt = $this->conn->prepare("INSERT INTO evaluaciones (titulo) VALUES (?)");
        $stmt->bind_param("s", $titulo);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function getAll() {
        $result = $this->conn->query("SELECT * FROM evaluaciones");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>