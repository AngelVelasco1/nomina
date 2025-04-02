CREATE OR REPLACE FUNCTION fun_delete_producto(wid_prod tab_prod.id_prod%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        DELETE FROM tab_prod
        WHERE id_prod = wid_prod;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL