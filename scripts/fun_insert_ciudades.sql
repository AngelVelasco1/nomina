CREATE OR REPLACE FUNCTION fun_insert_ciudades(wid_ciudad tab_ciudades.id_ciudad%TYPE,wnom_ciudad tab_ciudades.nom_ciudad%TYPE,wind_estado tab_ciudades.ind_estado%TYPE) RETURNS BOOLEAN AS
$BODY$
    DECLARE wid_reg tab_ciudades.id_ciudad%TYPE;
    BEGIN
        SELECT a.id_ciudad into wid_reg FROM tab_ciudades a
        WHERE a.id_ciudad = wid_ciudad;
        IF FOUND THEN
            RETURN FALSE;
        ELSE
            INSERT INTO tab_ciudades VALUES(wid_ciudad,wnom_ciudad,wind_estado);
            IF FOUND THEN
                RETURN TRUE;
            ELSE
                RETURN FALSE;
            END IF;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL