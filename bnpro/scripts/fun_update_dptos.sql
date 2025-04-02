CREATE OR REPLACE FUNCTION fun_update_dptos(wid_dpto tab_dptos.id_dpto%TYPE, wnom_dpto tab_dptos.nom_dpto%TYPE, wid_region tab_dptos.id_region%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE tab_dptos SET nom_dpto   = wnom_dpto,
                             id_region  = wid_region
        WHERE id_dpto = wid_dpto;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL