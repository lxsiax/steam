-- Tabla de clientes de la tienda online

DROP TABLE IF EXISTS cliente CASCADE; 
DROP TABLE IF EXISTS desarrolladoras CASCADE; 
DROP TABLE IF EXISTS cliente_juego CASCADE; 
DROP TABLE IF EXISTS juego CASCADE; 

-- Tabla de desarroladoras 

CREATE TABLE desarrolladora (
    id      BIGSERIAL       PRIMARY KEY,
    nombre  VARCHAR(255)    NOT NULL
);

--Tabla de juegos 

CREATE TABLE juego (
    id                  BIGSERIAL       PRIMARY KEY,
    nombre              VARCHAR(255)    NOT NULL,
    genero              VARCHAR(255)    NOT NULL,
    fPublicacion        TIMESTAMP       NOT NULL,
    precio              NUMERIC(6,2),
    desarrolladora_id   BIGINT          NOT NULL REFERENCES desarrolladora(id)          
);

-- Tabla de clientes 

CREATE TABLE cliente (
    id          BIGSERIAL       PRIMARY KEY,
    dni         VARCHAR(9)      NOT NULL UNIQUE,
    nombre      VARCHAR(255)    NOT NULL,
    apellidos   VARCHAR(255),
    direccion   VARCHAR(255),
    codpostal   NUMERIC(5)      CHECK(codpostal >= 0),
    telefono    VARCHAR(255)     
); 

--Relacion clientes y juegos que compra 
CREATE TABLE cliente_juego (
    idCliente       int     NOT NULL,
    idJuego         int     NOT NULL, 
    PRIMARY KEY (idCliente, idJuego),
    FOREIGN KEY (idCliente) REFERENCES cliente(id),
    FOREIGN KEY (idJuego)   REFERENCES juego(id)
);


-- Insercción de datos en las tablas 

INSERT INTO desarrolladora (nombre)
VALUES ('The game Kitchen'),
       ('Valve');

INSERT INTO juego (nombre, genero, fPublicacion, precio, desarrolladora_id)
VALUES ('Valorant', 'FPS', '2018-10-13 23:00:00', 0, 1),
       ('Phasmophobia', 'Terror', '2015-06-19 14:12:00', 20, 2);


INSERT INTO cliente (dni, nombre, apellidos, direccion, codpostal, telefono)
VALUES ('11111111A', 'Juan', 'Martínez', 'C/Hola, Su casa', 11540,  '666333444'),
       ('22222222B', 'María', 'González', 'C/Adiós, Su otra casa', 11550, '666777222'); 