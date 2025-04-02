CREATE OR REPLACE FUNCTION fun_delete_municipios(wid_dpto tab_municipios.id_dpto%TYPE, wid_municipio tab_municipios.id_municipio%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        DELETE FROM tab_municipios
        WHERE id_dpto      = wid_dpto       AND
              id_municipio = wid_municipio;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL