CREATE OR REPLACE FUNCTION fun_activar_productos(wid_prod tab_prod.id_prod%TYPE,wind_estado tab_prod.ind_estado%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
       wind_estado = TRUE
        UPDATE tab_prod SET id_prod = wid_prod,
                                ind_estado  = wind_estado
        WHERE id_prod      = wid_prod AND
              ind_estado = wind_estado;
    END;
$BODY$
LANGUAGE PLPGSQL