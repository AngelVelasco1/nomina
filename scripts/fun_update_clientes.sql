CREATE OR REPLACE FUNCTION fun_update_clientes(wid_cliente tab_clientes.id_cliente%TYPE,wnom_cliente tab_clientes.nom_cliente%TYPE,
                                                wape_cliente tab_clientes.ape_cliente%TYPE,
                                                wid_ciudad tab_clientes.id_ciudad%TYPE,
                                                wdir_cliente tab_clientes.dir_cliente%TYPE,
                                                wtel_cliente tab_clientes.tel_cliente%TYPE,
                                                wid_banco tab_clientes.id_banco%TYPE,
                                                wval_acum tab_clientes.val_acum%TYPE,
                                                wind_estado tab_clientes.ind_estado%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE tab_clientes SET id_cliente  = wid_cliente,
                                nom_cliente = wnom_cliente,
                                ape_cliente = wape_cliente,
                                id_ciudad = wid_ciudad,
                                dir_cliente = wdir_cliente,
                                tel_cliente = wtel_cliente,
                                id_banco = wid_banco,
                                val_acum = wval_acum,
                                ind_estado  = wind_estado,
        WHERE id_cliente = wid_cliente;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL