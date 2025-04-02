CREATE OR REPLACE FUNCTION fun_update_productos(wid_prod tab_prod.id_prod%TYPE,wnom_prod tab_prod.nom_prod%TYPE,
                                                wid_marca tab_prod.id_marca%TYPE,
                                                wval_prod tab_prod.val_prod%TYPE,
                                                wval_stock tab_prod.val_stock%TYPE,
                                                wind_categ tab_prod.ind_categ%TYPE,
                                                wind_tipo tab_prod.ind_tipo%TYPE,
                                                wind_clase tab_prod.ind_clase%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE tab_prod SET id_prod  = wid_prod,
                                nom_prod = wnom_prod,
                                id_marca = wid_marca,
                                val_prod = wval_prod,
                                val_stock = wval_stock,
                                ind_categ = wind_categ,
                                ind_tipo = wind_tipo,
                                ind_clase = wind_clase
        WHERE id_prod = wid_prod;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL