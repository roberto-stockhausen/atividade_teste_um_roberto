CREATE DATABASE sistema_simples_m1_roberto; /* This is just here to save the sql code. */

USE sistema_simples_m1_roberto;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(87) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (usuario, senha) VALUES ('admin','123');