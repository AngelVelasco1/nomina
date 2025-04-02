CREATE OR REPLACE FUNCTION fun_insert_dptos(wid_dpto tab_dptos.id_dpto%TYPE, wnom_dpto tab_dptos.nom_dpto%TYPE,wid_region tab_dptos.id_region%TYPE) RETURNS BOOLEAN AS
$BODY$
    DECLARE wregion tab_dptos.id_region%TYPE;
    DECLARE wdpto   tab_dptos.id_dpto%TYPE;
    BEGIN
        SELECT id_region,id_dpto INTO wregion,wdpto FROM tab_dptos
        WHERE id_dpto   = wid_dpto;
        IF FOUND THEN
            RETURN FALSE;
        ELSE
            INSERT INTO tab_dptos VALUES(wid_dpto, wnom_dpto, wid_region);
            IF FOUND THEN
                RETURN TRUE;
            ELSE
                RETURN FALSE;
            END IF;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL