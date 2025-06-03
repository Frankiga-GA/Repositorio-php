<?php
class Alternativa {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function create($id_pregunta, $texto, $es_correcta) {
        $stmt = $this->conn->prepare("INSERT INTO alternativas (id_pregunta, texto, es_correcta) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $id_pregunta, $texto, $es_correcta);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function getAll() {
        $result = $this->conn->query("SELECT * FROM alternativas");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>