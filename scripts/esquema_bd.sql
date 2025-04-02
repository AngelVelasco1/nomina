DROP TABLE IF EXISTS tab_referidos;
DROP TABLE IF EXISTS tab_lideres;
DROP TABLE IF EXISTS tab_centros_pob;
DROP TABLE IF EXISTS tab_municipios;
DROP TABLE IF EXISTS tab_dptos;
DROP TABLE IF EXISTS tab_candidatos;
DROP TABLE IF EXISTS tab_ocupaciones;
DROP TABLE IF EXISTS tab_profesiones;
DROP TABLE IF EXISTS tab_credenciales;

CREATE TABLE tab_usuarios
(
 id_usuario		VARCHAR(10)		NOT NULL,
 usu_clave		VARCHAR(12)		NOT NULL,
 mail_usuario	VARCHAR(100)	NOT NULL,
 usr_insert     VARCHAR(10)     NOT NULL DEFAULT CURRENT_USER,
 fec_insert     TIMESTAMP WITHOUT TIME ZONE NOT NULL DEFAULT NOW(),
 usr_update     VARCHAR(10)     DEFAULT CURRENT_USER,
 fec_update     TIMESTAMP WITHOUT TIME ZONE DEFAULT NOW(),
 PRIMARY KEY(id_usuario)
);
INSERT INTO tab_usuarios VALUES('superuser','cepfabo2021*','carloseduardoperezrueda@gmail.com')

CREATE TABLE tab_credenciales
(
    id_credencial   INTEGER     NOT NULL,
    nom_credencial  VARCHAR     NOT NULL,
    ind_tipo        CHAR(1)     NOT NULL CHECK (ind_tipo = 'N' OR ind_tipo = 'D' OR ind_tipo = 'M' OR
                                                ind_tipo = 'C'),
    ind_vigencia    BOOLEAN     NOT NULL DEFAULT FALSE, -- False=Ex / True=Vigente actualmente
    usr_insert      VARCHAR     NOT NULL DEFAULT CURRENT_USER,
    fec_insert      TIMESTAMP   WITHOUT TIME ZONE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    usr_update      VARCHAR     DEFAULT CURRENT_USER,
    fec_update      TIMESTAMP   WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id_credencial)
);

CREATE TABLE tab_profesiones
(
    id_profesion    INTEGER     NOT NULL,
    nom_profesion   VARCHAR     NOT NULL,
    usr_insert      VARCHAR     NOT NULL DEFAULT CURRENT_USER,
    fec_insert      TIMESTAMP   WITHOUT TIME ZONE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    usr_update      VARCHAR     DEFAULT CURRENT_USER,
    fec_update      TIMESTAMP   WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id_profesion)
);

CREATE TABLE tab_ocupaciones
(
    id_ocupacion    INTEGER     NOT NULL,
    nom_ocupacion   VARCHAR     NOT NULL,
    usr_insert      VARCHAR     NOT NULL DEFAULT CURRENT_USER,
    fec_insert      TIMESTAMP   WITHOUT TIME ZONE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    usr_update      VARCHAR     DEFAULT CURRENT_USER,
    fec_update      TIMESTAMP   WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id_ocupacion)
);
INSERT INTO tab_ocupaciones VALUES(1,'Ama de Casa',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(2,'Desempleado',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(3,'Carpintería',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(4,'Empleado',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(5,'Independiente',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(6,'Abogado',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(7,'Administración Bancaria y Financiera',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(8,'Administracion de Empresas',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(9,'Administración De Empresas Agropecuarias',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(10,'Administración Documental',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(11,'Administración Bancaria y Financiera',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(12,'Administración Financiera',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(13,'Administración Financiera y de Sistemas',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(14,'Administracion Publica',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(15,'Administrador Ambiental y Recursos Naturales',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(16,'Administrador De Turismo',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(17,'Administrador Hotelera',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(18,'Administrador y Sistemas De Gestión Ambiental',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(19,'Agricultor',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(20,'Regencia de Farmacia',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(21,'Albanil',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(22,'Analista Químico',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(23,'Archivo y Correspondencia',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(24,'Arquitecto',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(25,'Artesano',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(26,'Asesor en Asuntos Internacionales',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(27,'Asesor y Consultor',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(28,'Asesora Comercial',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(29,'Asesora de Ventas',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(30,'Auxiliar Administrativo',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(31,'Auxiliar Contable',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(32,'Auxiliar de Bodega',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(33,'Auxiliar de Enfermería',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(34,'Auxiliar de Odontología',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(35,'Auxiliar de Perforación',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(36,'Auxiliar de Registraduría',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(37,'Bacteriologo',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(38,'Bibliotecaria',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(39,'Biólogo',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(40,'Bombero',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(41,'Camillero',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(42,'Capitan del Ejercito',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(43,'Vigilancia',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(44,'Comerciante',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(45,'Comercio Exterior',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(46,'Comunicación Social y Periodismo',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(47,'Conductor',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(48,'Construcccion y Obras Civiles',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(49,'Contabilidad',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(50,'Contratista',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(51,'Coordinación de Proyectos Petroleros',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(52,'Coordinador Bolsa de Empleo Sena',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(53,'Coordinador de Jóvenes Rurales Sena',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(54,'Coronel del Ejercito',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(55,'Cosmetologia y Peluqueria',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(56,'Decano Universidad',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(57,'Decoracion',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(58,'Director Operativo y Cial. Estaciones Brio Soacha',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(59,'Diseño de Modas',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(60,'Diseño Gráfico',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(61,'Docencia',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(62,'Dragoniante Inpec',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(63,'Empresario',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(64,'Economista',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(65,'Electricista',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(66,'Enfermeria',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(67,'Emprendimiento Sena',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(68,'Escolta',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(69,'Preservación de Recursos Naturales',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(70,'Estudiante',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(71,'Fisioterapeuta',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(72,'Fonoaudiologo',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(73,'Ganaderia',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(74,'Geologia',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(75,'Gestion Financiera',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(76,'Gerencia General',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(77,'Gerencia Agropecuaria',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(78,'Gerencia Administrativa',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(79,'Gerencia Comercial',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(80,'Gerencia Hospitalaria',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(81,'Guarnecedor- Fileteador',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(82,'Higiene Oral',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(83,'Ingenieria Ambiental',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(84,'Agronomia',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(85,'Ingeniería Civil',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(86,'Ingeniería de Mercados',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(87,'Ingeniería de Petróleos',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(88,'Ingeniería de Sistemas',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(89,'Telecomunicaciones',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(90,'Electricidad',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(91,'Electromecánica',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(92,'Electrónica',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(93,'Ingeniería Financiera',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(94,'Ingeniería Forestal',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(95,'Procesos Industriales',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(96,'Ingeniería Mecanica',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(97,'Mecatrónica',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(98,'Metalurgia',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(99,'Ingeniería Química',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(100,'Intendente de la Policía',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(101,'Jardinería',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(102,'Jefatura de Compras',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(103,'Joyería',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(104,'Licenciatura cn Ciencias Agropecuarias',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(105,'Licenciatura en Filosofía e Idiomas',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(106,'Licenciatura en Lengua Castellana',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(107,'Licenciatura en Preeescolar',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(108,'Licenciatura en Educación Física',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(109,'Licenciatura en Español y Comunicación',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(110,'Licenciatura en Idiomas',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(111,'Licenciatura en Matemáticas',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(112,'Licenciatura en Música',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(113,'Madre Comunitaria',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(114,'Maestro de Obra',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(115,'Mayor de la Policía',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(116,'Mecánica',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(117,'Medicina',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(118,'Medicina Veterinaria Zootecnia',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(119,'Mercadeo y Publicidad',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(120,'Modista',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(121,'Musica',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(122,'Nutricionista y Dietetica',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(123,'Odontologia y Salud Oral',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(124,'Oficios Varios',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(125,'Operador Turistico',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(126,'Operario',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(127,'Optometria',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(128,'Panaderia',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(129,'Patrullero de la Policía',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(130,'Pensionado',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(131,'Pintor',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(132,'Subintendente de la Policia',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(133,'Politólogo',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(134,'Presentador de Eventos y Representante Artistico',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(135,'Productor Musical',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(136,'Zapateria',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(137,'Direccion de Juventudes CR',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(138,'Presidente Directorio CR',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(139,'Servicios Generales',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(140,'Presidente JAC',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(141,'Transporte Informal',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(142,'Psicologia',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(143,'Quimica Pura',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(144,'Rectoria',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(145,'Registrador',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(146,'Sargento del Ejercito',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(147,'Secretaria',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(148,'Secretario de Gobierno',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(149,'Secretario de Hacienda',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(150,'Vicepresidente JAC',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(151,'Transporte Formal',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(152,'Trabajo Social',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(153,'Topografía',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(154,'Terapia Ocupacional',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(155,'Teniente del Ejercito',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(156,'Sociologia',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(157,'Soldado del Ejercito',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(158,'Soldadura',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(159,'Tecnico Agropecuario',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(160,'Medio Ambiente',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(161,'Tecnico Electricista',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(162,'Tecnico Electronico',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(163,'Atencion Primera Infancia',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(164,'Las TIC',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(165,'Salud y Seguridad en el Trabajo (SST)',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(166,'Diseño Industrial',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(167,'Gestión y Tratamiento de Alimentos',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(168,'Laboratorio Dental',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(169,'Técnico Profesional Intendente',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(170,'Profesional en Salud Publica',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(171,'Policia',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(172,'Ciencias Juridicas',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(173,'Gestion Cultural',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(174,'Músico',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(175,'Vendedor Informal',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(176,'Cantante',CURRENT_USER,NOW());
INSERT INTO tab_ocupaciones VALUES(999,'POR DEFINIR',CURRENT_USER,NOW());

CREATE TABLE tab_candidatos
(
    id_candidato    DECIMAL(11,0)   NOT NULL,
    nom_candidato   VARCHAR         NOT NULL,
    id_credencial   INTEGER         NOT NULL,
    tel_candidato   DECIMAL(12,0)   NOT NULL,
    val_instagram   VARCHAR,
    val_facebook    VARCHAR,
    val_youtube     VARCHAR,
    val_twitter     VARCHAR,
    usr_insert      VARCHAR     NOT NULL DEFAULT CURRENT_USER,
    fec_insert      TIMESTAMP   WITHOUT TIME ZONE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    usr_update      VARCHAR     DEFAULT CURRENT_USER,
    fec_update      TIMESTAMP   WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id_candidato)
);

CREATE TABLE tab_dptos
(
    id_dpto         VARCHAR     NOT NULL,
    nom_dpto        VARCHAR     NOT NULL,
    nom_goberna     VARCHAR,
    val_longitud    DECIMAL(12,10),
    val_latitud     DECIMAL(12,10),
    usr_insert      VARCHAR     NOT NULL DEFAULT CURRENT_USER,
    fec_insert      TIMESTAMP   WITHOUT TIME ZONE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    usr_update      VARCHAR     DEFAULT CURRENT_USER,
    fec_update      TIMESTAMP   WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id_dpto)
);

CREATE TABLE tab_municipios
(
    id_dpto         VARCHAR     NOT NULL,
    id_municipio    VARCHAR     NOT NULL,
    nom_municipio   VARCHAR     NOT NULL,
    nom_alcalde     VARCHAR,
    val_categoria   VARCHAR     NOT NULL CHECK(valcategoria >= 1 AND val_cateogira <=6),
    val_longitud    DECIMAL(12,10),
    val_latitud     DECIMAL(12,10),
    val_poblacion   BIGINT,
    usr_insert      VARCHAR     NOT NULL DEFAULT CURRENT_USER,
    fec_insert      TIMESTAMP   WITHOUT TIME ZONE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    usr_update      VARCHAR     DEFAULT CURRENT_USER,
    fec_update      TIMESTAMP   WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP,    
    PRIMARY KEY(id_dpto,id_municipio),
    FOREIGN KEY(id_dpto)   REFERENCES tab_dptos(id_dpto)
);

CREATE TABLE tab_comunas
(
 id_dpto 		VARCHAR(2)	NOT NULL,
 id_ciudad 		VARCHAR(5)	NOT NULL,
 id_comuna 		SMALLINT	NOT NULL,
 nom_comuna 	VARCHAR(50) NOT NULL,
 val_poblacion 	DECIMAL(9,0) DEFAULT 0 		NOT NULL,
 usr_insert 	VARCHAR(10) NOT NULL,
 fec_insert 	TIMESTAMP WITHOUT TIME ZONE NOT NULL,
 usr_update 	VARCHAR(10),
 fec_update 	TIMESTAMP WITHOUT TIME ZONE,
 PRIMARY KEY(id_comuna),
 FOREIGN KEY(id_dpto)			REFERENCES tab_dptos(id_dpto),
 FOREIGN KEY(id_dpto,id_ciudad)	REFERENCES tab_ciudades(id_dpto,id_ciudad)
 );

CREATE TABLE tab_centros_pob
(
    id_cen_poblado  VARCHAR		NOT NULL,
    id_dpto         VARCHAR     NOT NULL,
    id_municipio    VARCHAR     NOT NULL,
    nom_cen_poblado VARCHAR     NOT NULL,
    ind_tipo        CHAR(1)     NOT NULL CHECK(ind_tipo = 'V' OR ind_tipo = 'C' OR ind_tipo = 'P'), -- Vereda,Corregimiento,Centro Poblado
    val_longitud    DECIMAL(12,10),
    val_latitud     DECIMAL(12,10),
    nom_alcalde     VARCHAR,
    val_tipo		VARCHAR		NOT NULL CHECK (val_tipo = 'C' OR val_tipo = 'M'), -- C=Cabecera / M=Municipio
    usr_insert      VARCHAR     NOT NULL DEFAULT CURRENT_USER,
    fec_insert      TIMESTAMP   WITHOUT TIME ZONE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    usr_update      VARCHAR     DEFAULT CURRENT_USER,
    fec_update      TIMESTAMP   WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id_centro_pob),
    FOREIGN KEY(id_dpto)        		REFERENCES tab_dptos(id_dpto),
    FOREIGN KEY(id_dpto,id_municipio)   REFERENCES tab_municipios(id_dpto,id_municipio)    
);

CREATE TABLE tab_barrios
(
 id_barrio 		DECIMAL(6,0) 			NOT NULL,
 id_dpto 		VARCHAR(2) 				NOT NULL,
 id_ciudad 		VARCHAR(5) 				NOT NULL,
 id_comuna 		SMALLINT 				NOT NULL,
 nom_barrio 	VARCHAR(50) NOT NULL,
 ind_asentam	BOOLEAN DEFAULT FALSE	NOT NULL, -- True=Si es asentamiento / False=No es asentamiento
 val_poblacion 	DECIMAL(9,0) DEFAULT 0 NOT NULL,
 val_latitud	DECIMAL(12,8),
 val_longitud	DECIMAL(12,8), 
 usr_insert 	VARCHAR(10) 			NOT NULL,
 fec_insert 	TIMESTAMP WITHOUT TIME ZONE NOT NULL,
 usr_update 	VARCHAR(10),
 fec_update 	TIMESTAMP WITHOUT TIME ZONE,
 PRIMARY KEY(id_comuna),
 FOREIGN KEY(id_dpto)						REFERENCES tab_dptos(id_dpto),
 FOREIGN KEY(id_dpto,id_ciudad)				REFERENCES tab_ciudades(id_dpto,id_ciudad),
 FOREIGN KEY(id_comuna)	    REFERENCES tab_comunas(id_comuna)
);

CREATE TABLE tab_entidades
(
 id_entidad		DECIMAL(10,0)	NOT NULL,
 nom_entidad	VARCHAR(180)	NOT NULL,
 nit_entidad	VARCHAR(11)		NOT NULL,
 id_dpto        VARCHAR(2)      NOT NULL,
 id_ciudad      VARCHAR(5)      NOT NULL,
 dir_entidad	VARCHAR(100)	NOT NULL,
 tel_entidad	VARCHAR(50)		NOT NULL,
 fax_entidad	VARCHAR(40),
 val_correo		VARCHAR(100),
 ind_sector		CHAR(2)			NOT NULL,
 nom_pagweb		VARCHAR(100),
 usr_insert     VARCHAR(10)     NOT NULL,
 fec_insert     TIMESTAMP WITHOUT TIME ZONE NOT NULL,
 usr_update     VARCHAR(10),
 fec_update     TIMESTAMP WITHOUT TIME ZONE,
 PRIMARY KEY(id_entidad),
 FOREIGN KEY(id_dpto)   			REFERENCES tab_dptos(id_dpto),
 FOREIGN KEY(id_dpto,id_ciudad)   	REFERENCES tab_ciudades(id_dpto,id_ciudad)
);

CREATE TABLE tab_lideres
(
    id_lider        DECIMAL(11,0)   NOT NULL,
    fec_liderazgo   DATE            NOT NULL,
    usr_insert      VARCHAR         NOT NULL DEFAULT CURRENT_USER,
    fec_insert      TIMESTAMP       WITHOUT TIME ZONE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    usr_update      VARCHAR         DEFAULT CURRENT_USER,
    fec_update      TIMESTAMP       WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id_lider)
);

CREATE TABLE tab_referidos
(
    id_referido     DECIMAL(11,0)   NOT NULL,
    id_lider        DECIMAL(11,0)   NOT NULL,
    nom1_referido   VARCHAR         NOT NULL,
    nom2_referido   VARCHAR         NOT NULL,
    ape1_referido   VARCHAR         NOT NULL,
    ape2_referido   VARCHAR         NOT NULL,
    nom_completo    VARCHAR         NOT NULL CHECK (nom_completo = (nom1_referido||' '||nom2_referido||' '||ape1_referido||' '||ape2_referido)),
    fec_nacimi      DATE            CHECK (fec_nacimi <= '2002-12-31'),
    val_tiposangre  VARCHAR,
    ind_genero      VARCHAR         NOT NULL CHECK (ind_genero = 'F' OR ind_genero = 'M'),
    id_dpto         VARCHAR         NOT NULL,
    id_municipio    VARCHAR         NOT NULL,
    id_profesion    INTEGER         NOT NULL,
    ind_ocupacion   CHAR(1)         NOT NULL    CHECK (ind_ocupacion = 'S' OR ind_ocupacion = 'N'), -- Está haciendo algo?
    id_ocupacion    INTEGER         NOT NULL, -- Si ind_ocupacion = 'S' --> A qué está dedicado actualmente?
    id_empresa      INTEGER         NOT NULL, -- Empresa donde labora
    dir_lider       VARCHAR,
    tel_fijo        VARCHAR,
    tel_movil1      DECIMAL(12,0)   NOT NULL,
    tel_movil2      DECIMAL(12,0),
    val_notas       VARCHAR,
    ind_habil_votar BOOLEAN         NOT NULL DEFAULT TRUE CHECK (ind_habil_votar = TRUE OR ind_habil_votar = FALSE),
    id_municip_vota VARCHAR,
    val_puesto_vota VARCHAR,
    val_mesa_vota   INTEGER,
    usr_insert      VARCHAR         NOT NULL DEFAULT CURRENT_USER,
    fec_insert      TIMESTAMP       WITHOUT TIME ZONE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    usr_update      VARCHAR         DEFAULT CURRENT_USER,
    fec_update      TIMESTAMP       WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id_referido),
    FOREIGN KEY(id_dpto)        		REFERENCES tab_dptos(id_dpto),
    FOREIGN KEY(id_dpto,id_municipio)   REFERENCES tab_municipios(id_dpto,id_municipio),
    FOREIGN KEY(id_lider)	  	    	REFERENCES tab_lideres(id_lider),
    FOREIGN KEY(id_profesion)		   	REFERENCES tab_profesiones(id_profesion),
    FOREIGN KEY(id_ocupacion)   		REFERENCES tab_ocupaciones(id_ocupacion)
);