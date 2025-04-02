--SELECT fun_insert_contactos('Alcaldía de Medellín','Carlos Perez','carlos@gmail.com',3503421739,'Conocer la vuelta');
CREATE OR REPLACE FUNCTION fun_insert_contactos(wnom_entidad tab_contactos.nom_entidad%TYPE,wnom_contacto tab_contactos.nom_contacto%TYPE,
                                                wval_correo tab_contactos.val_correo%TYPE,wval_telefono tab_contactos.val_telefono%TYPE,
                                                wval_interes tab_contactos.val_interes%TYPE) RETURNS BOOLEAN AS
$BODY$
	DECLARE wid_contacto tab_contactos.id_contacto%TYPE;
    DECLARE wid_con tab_contactos.id_contacto%TYPE;
    BEGIN
        wid_contacto = 0;
        SELECT MAX(id_contacto) INTO wid_contacto FROM tab_contactos;
        IF wid_contacto = 0 OR
           wid_contacto IS NULL THEN
            wid_contacto = 1;
        ELSE
            wid_contacto = wid_contacto + 1;
        END IF;
        SELECT a.id_contacto into wid_con FROM tab_contactos a
        WHERE a.id_contacto = wid_contacto;
        IF FOUND THEN
            RETURN FALSE;
        ELSE
            INSERT INTO tab_contactos VALUES(wid_contacto,wnom_entidad,wnom_contacto,wval_correo,wval_telefono,wval_interes,NOW());
            IF FOUND THEN
                RETURN TRUE;
            ELSE
                RETURN FALSE;
            END IF;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL