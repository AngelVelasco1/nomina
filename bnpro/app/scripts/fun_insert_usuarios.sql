CREATE OR REPLACE FUNCTION fun_insert_usuarios(wid tab_usuarios.id%TYPE,wnusuario tab_usuarios.nusuario%TYPE,
                                   wnombre tab_usuarios.nombre%TYPE,wpassword tab_usuarios.password%TYPE,
                                   wrol tab_usuarios.rol%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        SELECT MAX(id) INTO wid FROM tab_usuarios;
        IF wid IS NULL THEN
           wid = 1;
        ELSE
           wid = wid + 1;
        END IF;
        INSERT INTO tab_usuarios VALUES(wid,wnusuario, wnombre, wpassword, wrol, NOW());
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL