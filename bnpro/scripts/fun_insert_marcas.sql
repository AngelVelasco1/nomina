CREATE OR REPLACE FUNCTION fun_insert_marcas(wid_marca tab_marcas.id_marca%TYPE,
                                             wnom_marca tab_marcas.nom_marca%TYPE) RETURNS BOOLEAN AS
$BODY$
    DECLARE wreg_marca     RECORD;
    BEGIN
        SELECT a.id_marca,a.nom_marca into wreg_marca FROM tab_marcas a
        WHERE a.id_marca = wid_marca OR a.nom_marca = wnom_marca;
        IF FOUND THEN
            RETURN FALSE;
        ELSE
            INSERT INTO tab_marcas VALUES(wid_marca,wnom_marca);
            IF FOUND THEN
                RETURN TRUE;
            ELSE
                RETURN FALSE;
            END IF;
        END IF;
    END;
$BODY$
LANGUAGE plpgsql;
--SELECT fun_insert_marcas(9,'Scotter')
--SELECT * FROM tab_marcas;