<?php
require_once "../models/Pregunta.php"; // Cargar el modelo

$preguntaObj = new Pregunta($conexion); // Instanciamos la clase con la conexión

if ($_SERVER['REQUEST_METHOD']) {

    switch ($_SERVER["REQUEST_METHOD"]) {
        case "GET":
            // Revisamos la tarea a realizar
            if (isset($_GET["task"]) && $_GET["task"] == "getAll") {
                // Devolver todas las preguntas en formato JSON
                header("Content-Type: application/json; charset=utf-8");
                echo json_encode($preguntaObj->getAll());
            }
            break;

        case "POST":
            // Obtener y decodificar los datos enviados por POST
            $input = file_get_contents("php://input");
            $data = json_decode($input, true);

            // Asignamos los datos de la pregunta
            $preguntaData = [
                "idEvaluacion" => $data["idEvaluacion"],
                "enunciado" => $data["enunciado"]
            ];

            // Llamamos al método para insertar una nueva pregunta
            $insertId = $preguntaObj->create($preguntaData["idEvaluacion"], $preguntaData["enunciado"]);

            // Enviamos la respuesta en formato JSON con el ID de la pregunta insertada
            header("Content-Type: application/json; charset=utf-8");
            echo json_encode(["id" => $insertId]);
            break;

        default:
            // Si el método no es GET ni POST, enviar un error
            header("HTTP/1.1 405 Method Not Allowed");
            echo json_encode(["error" => "Método no permitido"]);
            break;
    }
}
?>
