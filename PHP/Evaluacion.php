<?php
require_once "../models/Evaluacion.php"; // Cargar el modelo

$evaluacionObj = new Evaluacion($conexion); // Instanciamos la clase con la conexión

if ($_SERVER['REQUEST_METHOD']) {

    switch ($_SERVER["REQUEST_METHOD"]) {
        case "GET":
            // Revisamos la tarea a realizar
            if (isset($_GET["task"]) && $_GET["task"] == "getAll") {
                // Devolver todas las evaluaciones en formato JSON
                header("Content-Type: application/json; charset=utf-8");
                echo json_encode($evaluacionObj->getAll());
            }
            break;

        case "POST":
            // Obtener y decodificar los datos enviados por POST
            $input = file_get_contents("php://input");
            $data = json_decode($input, true);

            // Asignamos el título de la evaluación
            $evaluacionData = [
                "titulo" => $data["titulo"]
            ];

            // Llamamos al método para insertar una nueva evaluación
            $insertId = $evaluacionObj->create($evaluacionData["titulo"]);

            // Enviamos la respuesta en formato JSON con el ID de la evaluación insertada
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
