CREATE OR REPLACE FUNCTION fun_insert_marcas(wid_marca tab_marcas.id_marca%TYPE,wnom_marca tab_marcas.nom_marca%TYPE,wind_estado tab_marcas.ind_estado%TYPE) RETURNS BOOLEAN AS
$BODY$
    DECLARE wid_reg tab_marcas.id_marca%TYPE;
    BEGIN
        SELECT a.id_marca into wid_reg FROM tab_marcas a
        WHERE a.id_marca = wid_marca;
        IF FOUND THEN
            RETURN FALSE;
        ELSE
            INSERT INTO tab_marcas VALUES(wid_marca,wnom_marca,wind_estado);
            IF FOUND THEN
                RETURN TRUE;
            ELSE
                RETURN FALSE;
            END IF;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL