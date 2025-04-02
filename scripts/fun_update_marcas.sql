CREATE OR REPLACE FUNCTION fun_update_marcas(wid_marca tab_marcas.id_marca%TYPE,wnom_marca tab_marcas.nom_marca%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE tab_marcas SET id_marca  = wid_marca,
                                nom_marca = wnom_marca
        WHERE id_marca = wid_marca;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL