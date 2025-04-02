CREATE OR REPLACE FUNCTION fun_delete_contactos(wid_contacto tab_contactos.id_contacto%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        DELETE FROM tab_contactos
        WHERE id_contacto = wid_contacto;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL