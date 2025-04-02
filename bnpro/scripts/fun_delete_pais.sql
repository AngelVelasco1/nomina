CREATE OR REPLACE FUNCTION fun_delete_pais(wid_pais tab_paises.id_pais%TYPE) RETURNS BOOLEAN AS
$BODY$
    DECLARE wreg_pais	RECORD;
    BEGIN
        SELECT a.id_pais INTO wreg_pais FROM tab_dptos as a
        WHERE a.id_pais = wid_pais;
        IF wreg_pais.id_pais IS NULL THEN
            DELETE FROM tab_paises
            WHERE id_pais  = wid_pais;
            IF FOUND THEN
                RETURN TRUE;
            ELSE
                RETURN FALSE;
            END IF;
        ELSE
            --RAISE NOTICE 'hay relacion con el pais';
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL
--SELECT fun_delete_pais(65)