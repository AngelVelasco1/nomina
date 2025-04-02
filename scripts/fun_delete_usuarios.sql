CREATE OR REPLACE FUNCTION fun_delete_usuarios(wnusuario tab_usuarios.nusuario%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        DELETE FROM tab_usuarios
        WHERE nusuario = wnusuario;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL