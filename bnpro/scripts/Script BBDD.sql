DROP TABLE IF EXISTS tab_asistentes_reuniones;
DROP TABLE IF EXISTS tab_asistentes;
DROP TABLE IF EXISTS tab_reuniones;
DROP TABLE IF EXISTS tab_usuarios;

CREATE TABLE tab_usuarios (
    id SERIAL,
    usuario character varying(12) NOT NULL,
    nombre character varying(100) NOT NULL,
    clave character varying(50) NOT NULL,
    rol character varying(1) NOT NULL,
    fec_creacion timestamp without time zone DEFAULT (now() - '07:00:00'::interval),
    token character varying(50),
    updated_at timestamp without time zone,
    PRIMARY KEY (usuario)
);

CREATE TABLE tab_asistentes (
    id BIGINT NOT NULL,
    apellido1 character varying(30) NOT NULL,
    apellido2 character varying(30),
    nombre1 character varying(30) NOT NULL,
    nombre2 character varying(30),
    genero character varying(1) NOT NULL,
    fec_nac date,
    rh character varying(3),
    telefono character varying(10) NOT NULL,
    email character varying(50),
    hijos integer,
    usuario character varying(12),
    fec_y_hora timestamp without time zone DEFAULT (now() - '07:00:00'::interval),
    direccion character varying ,
    municipio character varying ,
    barrio character varying ,
    tel2 character varying(10) ,
    profesion character varying ,
    puestovota character varying ,
    PRIMARY KEY (id),
    FOREIGN KEY (usuario) REFERENCES tab_usuarios (usuario) 
);

CREATE TABLE tab_reuniones (
    id SERIAL,
    nombre character varying(300) NOT NULL,
    fecha timestamp without time zone DEFAULT (now() - '07:00:00'::interval),
    lugar character varying(300) NOT NULL,
    obs character varying(300),
    updated_at timestamp without time zone  DEFAULT (now() - '07:00:00'::interval),
    PRIMARY KEY (id)
);

CREATE TABLE tab_asistentes_reuniones (
    id_asistente bigint NOT NULL,
    id_reunion bigint NOT NULL,
    fecha timestamp without time zone DEFAULT (now() - '07:00:00'::interval),
    obs character varying(300),
    PRIMARY KEY (id_asistente,id_reunion),
	FOREIGN KEY(id_asistente) REFERENCES tab_asistentes(id),
	FOREIGN KEY(id_reunion) REFERENCES tab_reuniones(id)
);


INSERT INTO tab_usuarios (usuario, nombre, clave, rol)
VALUES('10178092', 'Jose Nadin Herrera', MD5('10178092'), '1');

INSERT INTO tab_reuniones (nombre, fecha, lugar, obs)
VALUES('UNA REUNION DE PRUEBA', now(), 'aqui en la casa', 'una reunion de prueba en casa');


INSERT INTO tab_reuniones (nombre, fecha, lugar, obs)
VALUES('OTRA REUNION DE PRUEBA DOS', now(), 'aqui en la casa', 'una reunion de prueba en casa');

INSERT INTO tab_asistentes (id, apellido1, apellido2, nombre1, nombre2, 
genero, fec_nac, rh, telefono, email,  usuario )
VALUES('10178092', 'JOSE', 'NADIN', 'HERRERA', null, 'M', '1972-01-10', 'A+', '3117489410', 
'jnadinh@hotmail.com',  '10178092');

INSERT INTO tab_asistentes_reuniones (id_asistente, id_reunion)
VALUES(10178092,1);

SELECT * FROM tab_reuniones;
SELECT * FROM tab_asistentes;
SELECT * FROM tab_usuarios; 
SELECT * FROM tab_asistentes_reuniones;

SELECT r.id, r.nombre, r.fecha, r.lugar, r.obs,
(SELECT COUNT(*) FROM tab_asistentes_reuniones WHERE id_reunion=r.id ) AS asistentes
FROM tab_reuniones r
LEFT JOIN tab_asistentes_reuniones ar ON r.id=ar.id_reunion;

SELECT r.id, r.nombre, r.fecha, r.lugar, r.obs,
(SELECT COUNT(*) FROM tab_asistentes_reuniones WHERE id_reunion=r.id ) AS asistentes
FROM tab_reuniones r
LEFT JOIN tab_asistentes_reuniones ar ON r.id=ar.id_reunion ORDER BY r.id DESC;






