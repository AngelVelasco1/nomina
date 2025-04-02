CREATE TABLE tab_pro
(
    id_proy             BIGINT          NOT NULL,
    id_bpin             BIGINT          NOT NULL,
    nom_proy            VARCHAR         NOT NULL,
    val_proy            DECIMAL(10,0)   NOT NULL,
    val_obj_gral        TEXT,
    id_sector           VARCHAR         NOT NULL,
    nom_pgm             VARCHAR,
    nom_estrategia      VARCHAR,
    nom_producto        VARCHAR,
    fec_registro        DATE,
    fec_actualizacion   DATE,
    id_region           DECIMAL(5,0),
    id_dpto             VARCHAR,
    id_municipio        VARCHAR,
    ind_xml             BOOLEAN         NOT NULL DEFAULT FALSE,
    ind_pdf             BOOLEAN         NOT NULL DEFAULT FALSE,
    ind_zip             BOOLEAN         NOT NULL DEFAULT FALSE,
    PRIMARY KEY(id_proy)
);

CREATE TABLE IF NOT EXISTS public.tab_proyectos
(
    id bigint NOT NULL,
    bpin bigint,
    nombre character varying COLLATE pg_catalog."default" NOT NULL,
    valor double precision,
    objetivo_general character varying COLLATE pg_catalog."default",
    sector character varying COLLATE pg_catalog."default",
    programa_plan_municipal character varying COLLATE pg_catalog."default",
    estrategia_municipio character varying COLLATE pg_catalog."default",
    producto character varying COLLATE pg_catalog."default",
    fecha_registro date NOT NULL,
    fecha_actualizacion date NOT NULL,
    regiones_id bigint,
    departamentos_id bigint,
    municipios_id bigint,
    ind_xml boolean NOT NULL DEFAULT false,
    ind_pdf boolean NOT NULL DEFAULT false,
    ind_zip boolean NOT NULL DEFAULT false,
    CONSTRAINT tab_proyectos_pkey PRIMARY KEY (id),
    CONSTRAINT tab_proyectos_departamentos_id_fkey FOREIGN KEY (departamentos_id)
        REFERENCES public.tab_departamentos (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT tab_proyectos_municipios_id_fkey FOREIGN KEY (municipios_id)
        REFERENCES public.tab_municipios (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT tab_proyectos_regiones_id_fkey FOREIGN KEY (regiones_id)
        REFERENCES public.tab_regiones (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.tab_proyectos
    OWNER to postgres;

-- EJERCICIO PARA SACAR DPTO. Y MUNICIPIO DE LA TABLA PROYECTOS
DROP TABLE IF EXISTS tab_proy;
CREATE TABLE IF NOT EXISTS tab_proy
(
    id_proy             DECIMAL(8,0)    NOT NULL,
    id_bpin             VARCHAR         NOT NULL,
    nom_proy            TEXT            NOT NULL,
    val_proy            DECIMAL(15,0)   NOT NULL,
    val_obj_gral        TEXT,
    id_sector           VARCHAR         NOT NULL,
    nom_pgm             VARCHAR,
    nom_estrategia      VARCHAR,
    nom_producto        VARCHAR,
    fec_registro        DATE            NOT NULL,
    fec_actualizacion   DATE            NOT NULL,
    id_region           DECIMAL(5,0),
    id_dpto             VARCHAR,
    id_municipio        VARCHAR,
    ind_xml             BOOLEAN         NOT NULL DEFAULT FALSE,
    ind_pdf             BOOLEAN         NOT NULL DEFAULT FALSE,
    ind_zip             BOOLEAN         NOT NULL DEFAULT FALSE,
    PRIMARY KEY(id_proy)
);
DELETE FROM tab_proy;
INSERT INTO tab_proy (id_proy,id_bpin,nom_proy,val_proy,val_obj_gral,id_sector,nom_pgm,nom_estrategia,nom_producto,
					  fec_registro,fec_actualizacion,id_region,id_dpto,id_municipio,ind_xml,ind_pdf,ind_zip)
SELECT id,bpin,nombre,valor,objetivo_general,sector,programa_plan_municipal,estrategia_municipio,producto,
	   fecha_registro,fecha_actualizacion,regiones_id,departamentos_id,municipios_id,ind_xml,ind_pdf,ind_zip
FROM tab_proyectos WHERE bpin IS NOT NULL;
psql -c "select nombre,apellido from clientes" gim > resultado.txt

SELECT COUNT(*) FROM tab_proy;
SELECT SUBSTRING(nombre,1,15) FROM tab_proyectos WHERE SUBSTRING(nombre,1,15)='Fortalecimiento' LIMIT 10;

--BASES DE DATOS DISTRIBUIDAS. CONEXIÓN REMOTA.
CREATE EXTENSION DBLINK;
SELECT dblink_connect('ind_conexion','hostaddr=192.34.58.242 port=5432 dbname=proyectos user=banpro password=majojunior321');
SELECT * FROM dblink('ind_conexion','select id,bpin,nombre from tab_proyectos' )  
   AS (id BIGINT, bpin BIGINT, nombre VARCHAR );
SELECT dblink_disconnect('ind_conexion');
----

-- INSERCIÓN CON CONEXIÓN A BASES DE DATOS DISTRIBUIDAS
SELECT dblink_connect('ind_conexion','hostaddr=192.34.58.242 port=5432 dbname=proyectos user=banpro password=majojunior321');
INSERT INTO tab_proy(id_proy,id_bpin,nom_proy,val_proy,val_obj_gral,id_sector,nom_pgm,nom_estrategia,nom_producto,
					  fec_registro,fec_actualizacion,id_region,id_dpto,id_municipio,ind_xml,ind_pdf,ind_zip)
SELECT * FROM dblink('ind_conexion','select id,bpin,nombre,valor,objetivo_general,sector,programa_plan_municipal,estrategia_municipio,producto,
	   fecha_registro,fecha_actualizacion,regiones_id,departamentos_id,municipios_id,ind_xml,ind_pdf,ind_zip FROM tab_proyectos')  
   AS (id BIGINT, bpin BIGINT, nombre VARCHAR );
SELECT dblink_disconnect('ind_conexion');

--- SCRIPT QUE FUNCIONÓ
--SELECT dblink_connect('ind_conexion','hostaddr=192.34.58.242 port=5432 dbname=proyectos user=banpro password=majojunior321');
--INSERT INTO tab_proy(id_proy,id_bpin,nom_proy) SELECT * FROM dblink('ind_conexion','select id,bpin,nombre from tab_proyectos' )  
--   AS (id BIGINT, bpin BIGINT, nombre VARCHAR );
--SELECT dblink_disconnect('ind_conexion');

--SELECT dblink_connect('ind_conexion','hostaddr=192.34.58.242 port=5432 dbname=proyectos user=banpro password=majojunior321');
DROP TABLE IF EXISTS tab_pro;
CREATE TABLE IF NOT EXISTS tab_pro
(
    id_proy             VARCHAR          NOT NULL,
    id_bpin             VARCHAR          NOT NULL,
    nom_proy            VARCHAR         NOT NULL,
    val_proy            DECIMAL(18,2)   NOT NULL,
    val_obj_gral        TEXT,
    id_sector           VARCHAR         NOT NULL,
    nom_pgm             VARCHAR,
    nom_estrategia      VARCHAR,
    nom_producto        VARCHAR,
    fec_registro        DATE,
    fec_actualizacion   DATE,
    id_region           DECIMAL(5,0),
    id_dpto             VARCHAR,
    id_municipio        VARCHAR,
    ind_xml             BOOLEAN         NOT NULL DEFAULT FALSE,
    ind_pdf             BOOLEAN         NOT NULL DEFAULT FALSE,
    ind_zip             BOOLEAN         NOT NULL DEFAULT FALSE,
    PRIMARY KEY(id_proy)
);
DELETE FROM tab_pro;
SELECT dblink_connect('ind_conexion','hostaddr=192.34.58.242 port=5432 dbname=proyectos user=banpro password=majojunior321');
INSERT INTO tab_pro(id_proy,id_bpin,nom_proy,val_proy,val_obj_gral,id_sector,nom_pgm,nom_estrategia,nom_producto,
					  fec_registro,fec_actualizacion,id_region,id_dpto,id_municipio,ind_xml,ind_pdf,ind_zip)
SELECT id,bpin,nombre,valor,objetivo_general,sector,programa_plan_municipal,estrategia_municipio,producto,
	   fecha_registro,fecha_actualizacion,regiones_id,departamentos_id,municipios_id,ind_xml,ind_pdf,ind_zip
FROM dblink('ind_conexion','select id,bpin,nombre,valor,objetivo_general,sector,programa_plan_municipal,estrategia_municipio,producto,
	   fecha_registro,fecha_actualizacion,regiones_id,departamentos_id,municipios_id,ind_xml,ind_pdf,ind_zip FROM tab_proyectos where bpin IS NOT NULL')  
   AS (id BIGINT, bpin BIGINT, nombre VARCHAR, valor DOUBLE PRECISION, objetivo_general VARCHAR, sector VARCHAR,
	  programa_plan_municipal VARCHAR, estrategia_municipio VARCHAR, producto VARCHAR, fecha_registro DATE, fecha_actualizacion DATE,
	  regiones_id BIGINT, departamentos_id BIGINT, municipios_id BIGINT, ind_xml BOOLEAN, ind_pdf BOOLEAN, ind_zip BOOLEAN);
--SELECT * FROM tab_pro;
--SELECT dblink_disconnect('ind_conexion');