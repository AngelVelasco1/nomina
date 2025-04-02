CREATE OR REPLACE FUNCTION fun_delete_ciudades(wid_ciudad tab_ciudades.id_ciudad%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        DELETE FROM tab_ciudades
        WHERE id_ciudad = wid_ciudad;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL