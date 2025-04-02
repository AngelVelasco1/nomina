CREATE OR REPLACE FUNCTION fun_update_ciudades(wid_ciudad tab_ciudades.id_ciudad%TYPE,wnom_ciudad tab_ciudades.nom_ciudad%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE tab_ciudades SET id_ciudad  = wid_ciudad,
                                nom_ciudad = wnom_ciudad
        WHERE id_ciudad = wid_ciudad;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL