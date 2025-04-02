CREATE OR REPLACE FUNCTION fun_delete_pmtros_bnpro(wid_entidad tab_pmtros_bnpro.id_entidad%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        DELETE FROM tab_pmtros_bnpro
        WHERE id_entidad = wid_entidad;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL