CREATE OR REPLACE FUNCTION fun_delete_marcas(wid_marca tab_marcas.id_marca%TYPE) RETURNS BOOLEAN AS
$BODY$
    DECLARE wreg_marca	RECORD;
    BEGIN
        SELECT a.id_marca INTO wreg_marca FROM tab_prod as a
        WHERE a.id_marca = wid_marca;
        IF wreg_marca.id_marca IS NULL THEN
            DELETE FROM tab_marcas
            WHERE id_marca  = wid_marca;
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
--SELECT fun_delete_marcas(9)