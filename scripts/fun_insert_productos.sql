CREATE OR REPLACE FUNCTION fun_insert_productos(wid_prod tab_prod.id_prod%TYPE,wnom_prod tab_prod.nom_prod%TYPE,
                                                wid_marca tab_prod.id_marca%TYPE,
                                                wval_prod tab_prod.val_prod%TYPE,
                                                wval_stock tab_prod.val_stock%TYPE,
                                                wind_categ tab_prod.ind_categ%TYPE,
                                                wind_tipo tab_prod.ind_tipo%TYPE,
                                                wind_clase tab_prod.ind_clase%TYPE,
                                                wind_estado tab_prod.ind_estado%TYPE) RETURNS BOOLEAN AS
$BODY$
    DECLARE wid_reg tab_prod.id_prod%TYPE;
    BEGIN
        SELECT a.id_prod into wid_reg FROM tab_prod a
        WHERE a.id_prod = wid_prod;
        IF FOUND THEN
            RETURN FALSE;
        ELSE
            INSERT INTO tab_prod VALUES(wid_prod, wnom_prod, wid_marca,  wval_prod, wval_stock, wind_categ, wind_tipo, wind_clase, wind_estado);
            IF FOUND THEN
                RETURN TRUE;
            ELSE
                RETURN FALSE;
            END IF;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL