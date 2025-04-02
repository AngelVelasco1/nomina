CREATE OR REPLACE FUNCTION fun_insert_vendedores(wid_vendedor tab_vendedores.id_vendedor%TYPE,wnom_vendedor tab_vendedores.nom_vendedor%TYPE,
                                                wape_vendedor tab_vendedores.ape_vendedor%TYPE,
                                                wval_sueldo tab_vendedores.val_sueldo%TYPE,
                                                wval_comision tab_vendedores.val_comision%TYPE,
                                                wval_totsuel tab_vendedores.val_totsuel%TYPE,
                                                wind_estado tab_vendedores.ind_estado%TYPE,
                                                wtel_vendedor tab_vendedores.tel_vendedor%TYPE) RETURNS BOOLEAN AS
$BODY$
    DECLARE wid_reg tab_vendedores.id_vendedor%TYPE;
    BEGIN
        SELECT a.id_vendedor into wid_reg FROM tab_vendedores a
        WHERE a.id_vendedor = wid_vendedor;
        IF FOUND THEN
            RETURN FALSE;
        ELSE
            INSERT INTO tab_vendedores VALUES(wid_vendedor, wnom_vendedor, wape_vendedor,  wval_sueldo, wval_comision, wval_totsuel, wind_estado, wtel_vendedor);
            IF FOUND THEN
                RETURN TRUE;
            ELSE
                RETURN FALSE;
            END IF;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL