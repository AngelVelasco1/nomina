CREATE OR REPLACE FUNCTION fun_update_contactos(wid_contacto tab_contactos.id_contacto%TYPE,wnom_entidad tab_contactos.nom_entidad%TYPE,
                                                wnom_contacto tab_contactos.nom_contacto%TYPE,wval_correo tab_contactos.val_correo%TYPE,
                                                wval_telefono tab_contactos.val_telefono%TYPE,wval_interes tab_contactos.val_interes%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE tab_contactos SET id_contacto  = wid_contacto,
                                 nom_entidad  = wnom_entidad,
                                 nom_contacto = wnom_contacto,
                                 val_correo   = wval_correo,
                                 val_telefono = wval_telefono,
                                 val_interes  = wval_interes
        WHERE id_contacto = wid_contacto;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL