CREATE OR REPLACE FUNCTION fun_update_regiones(wid_region tab_regiones.id_region%TYPE,wnom_region tab_regiones.nom_region%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE tab_regiones SET id_region  = wid_region,
                                nom_region = wnom_region
        WHERE id_region = wid_region;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL