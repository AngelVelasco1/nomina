CREATE OR REPLACE FUNCTION fun_delete_regiones(wid_region tab_regiones.id_region%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        DELETE FROM tab_regiones
        WHERE id_region = wid_region;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL