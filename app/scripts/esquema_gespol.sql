DROP TABLE IF EXISTS tab_asistentes;
DROP TABLE IF EXISTS tab_usuarios;
CREATE TABLE tab_usuarios
(
    id              INTEGER         NOT NULL,
    nusuario        VARCHAR(12)     NOT NULL,
    nombre          VARCHAR(30)    	NOT NULL,
    password        VARCHAR(30)     NOT NULL,
    rol             VARCHAR(1)      NOT NULL,
    fec_creacion    TIMESTAMP WITHOUT TIME ZONE DEFAULT (now() - '07:00:00'::INTERVAL),
    PRIMARY KEY(nusuario)
);

CREATE TABLE tab_asistentes
(
    id              BIGINT          NOT NULL,
    apellido1       VARCHAR(30)     NOT NULL,
    apellido2       VARCHAR(30),
    nombre1         VARCHAR(30)     NOT NULL,
    nombre2         VARCHAR(30),
    genero          VARCHAR(1)      NOT NULL,
    fec_nac         DATE            NOT NULL,
    rh              VARCHAR(3)      NOT NULL,
    telefono        VARCHAR(10)     NOT NULL,
    email           VARCHAR(50),
    hijos           INTEGER,
    nusuario        VARCHAR(12)     NOT NULL,
    fec_y_hora      TIMESTAMP WITHOUT TIME ZONE DEFAULT (NOW() - '07:00:00'::INTERVAL),
    direccion       VARCHAR,
    municipio       VARCHAR,
    barrio          VARCHAR,
    tel2            VARCHAR(10),
    profesion       VARCHAR,
    puestovota      VARCHAR,
    PRIMARY KEY(id),
    FOREIGN KEY(nusuario)      REFERENCES tab_usuarios(nusuario)
);