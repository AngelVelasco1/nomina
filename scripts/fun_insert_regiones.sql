CREATE OR REPLACE FUNCTION fun_insert_regiones(wid_region tab_regiones.id_region%TYPE,wnom_region tab_regiones.nom_region%TYPE) RETURNS BOOLEAN AS
$BODY$
    DECLARE wid_reg tab_regiones.id_region%TYPE;
    BEGIN
        SELECT a.id_region into wid_reg FROM tab_regiones a
        WHERE a.id_region = wid_region;
        IF FOUND THEN
            RETURN FALSE;
        ELSE
            INSERT INTO tab_regiones VALUES(wid_region,wnom_region);
            IF FOUND THEN
                RETURN TRUE;
            ELSE
                RETURN FALSE;
            END IF;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL