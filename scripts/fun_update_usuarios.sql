--SELECT fun_update_usuario(91423627,'91423627','Carlos Perez','laura2021*','1','2021-10-17')
CREATE OR REPLACE FUNCTION fun_update_usuarios(wid tab_usuarios.id%TYPE,wnusuario tab_usuarios.nusuario%TYPE,
                                              wnombre tab_usuarios.nombre%TYPE,wpassword tab_usuarios.password%TYPE,
                                              wrol tab_usuarios.rol%TYPE,wfec_creacion tab_usuarios.fec_creacion%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE tab_usuarios SET id           = wid,
                                nombre       = wnombre,
                                password     = wpassword,
                                rol          = wrol,
                                fec_creacion = wfec_creacion
        WHERE nusuario = wnusuario;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL