CREATE OR REPLACE FUNCTION fun_update_vendedores(wid_vendedor tab_vendedores.id_vendedor%TYPE,wnom_vendedor tab_vendedores.nom_vendedor%TYPE,
                                                wape_vendedor tab_vendedores.ape_vendedor%TYPE,
                                                wval_sueldo tab_vendedores.val_sueldo%TYPE,
                                                wval_comision tab_vendedores.val_comision%TYPE,
                                                wval_totsuel tab_vendedores.val_totsuel%TYPE,
                                                wtel_vendedor tab_vendedores.tel_vendedor%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE tab_vendedores SET id_vendedor  = wid_vendedor,
                                nom_vendedor = wnom_vendedor,
                                ape_vendedor = wape_vendedor,
                                val_sueldo = wval_sueldo,
                                val_comision = wval_comision,
                                val_totsuel = wval_totsuel,
                                tel_vendedor = wtel_vendedor
        WHERE id_vendedor = wid_vendedor;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL