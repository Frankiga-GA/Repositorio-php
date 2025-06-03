<?php
require_once "../models/Alternativas.php"; // Cargar el modelo

$alternativaObj = new Alternativa($conexion); // Instanciamos la clase con la conexión

if ($_SERVER['REQUEST_METHOD']) {

    switch ($_SERVER["REQUEST_METHOD"]) {
        case "GET":
            // Revisamos la tarea a realizar
            if (isset($_GET["task"]) && $_GET["task"] == "getAll") {
                // Devolver todas las alternativas en formato JSON
                header("Content-Type: application/json; charset=utf-8");
                echo json_encode($alternativaObj->getAll());
            }
            break;

        case "POST":
            // Obtener y decodificar los datos enviados por POST
            $input = file_get_contents("php://input");
            $data = json_decode($input, true);

            // Asignamos los datos en variables para la inserción
            $alternativaData = [
                "texto" => $data["texto"],
                "esCorrecta" => $data["esCorrecta"],
                "idPregunta" => $data["idInterrogante"]
            ];

            // Llamamos al método para insertar la nueva alternativa y obtenemos las filas afectadas
            $filasAfectadas = $alternativaObj->create(
                $alternativaData["idPregunta"],
                $alternativaData["texto"],
                $alternativaData["esCorrecta"]
            );

            // Enviamos la respuesta en formato JSON con el número de filas afectadas
            header("Content-Type: application/json; charset=utf-8");
            echo json_encode(["filas" => $filasAfectadas]);
            break;

        default:
            // Si el método no es GET ni POST, enviar un error
            header("HTTP/1.1 405 Method Not Allowed");
            echo json_encode(["error" => "Método no permitido"]);
            break;
    }
}
