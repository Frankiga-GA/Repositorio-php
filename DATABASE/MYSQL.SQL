CREATE TABLE evaluaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL
);

CREATE TABLE preguntas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_evaluacion INT,
    enunciado TEXT NOT NULL,
    FOREIGN KEY (id_evaluacion) REFERENCES evaluaciones(id)
);

CREATE TABLE alternativas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pregunta INT,
    texto TEXT NOT NULL,
    es_correcta BOOLEAN,
    FOREIGN KEY (id_pregunta) REFERENCES preguntas(id)
);
