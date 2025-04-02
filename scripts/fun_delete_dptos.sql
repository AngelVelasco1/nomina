CREATE OR REPLACE FUNCTION fun_delete_dptos(wid_dpto tab_dptos.id_dpto%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        DELETE FROM tab_dptos
        WHERE id_dpto = wid_dpto;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL