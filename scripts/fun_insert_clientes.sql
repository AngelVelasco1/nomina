CREATE OR REPLACE FUNCTION fun_insert_clientes(wid_cliente tab_clientes.id_cliente%TYPE,wnom_cliente tab_clientes.nom_cliente%TYPE,
                                                wape_cliente tab_clientes.ape_cliente%TYPE,
                                                wid_ciudad tab_clientes.id_ciudad%TYPE,
                                                wdir_cliente tab_clientes.dir_cliente%TYPE,
                                                wtel_cliente tab_clientes.tel_cliente%TYPE,
                                                wid_banco tab_clientes.id_banco%TYPE,
                                                wval_acum tab_clientes.val_acum%TYPE,
                                                wind_estado tab_clientes.ind_estado%TYPE) RETURNS BOOLEAN AS
$BODY$
    DECLARE wid_reg tab_clientes.id_cliente%TYPE;
    BEGIN
        SELECT a.id_cliente into wid_reg FROM tab_clientes a
        WHERE a.id_cliente = wid_cliente;
        IF FOUND THEN
            RETURN FALSE;
        ELSE
            INSERT INTO tab_clientes VALUES(wid_cliente, wnom_cliente, wape_cliente,  wid_ciudad, wdir_cliente, wtel_cliente, wid_banco, wval_acum, wind_estado);
            IF FOUND THEN
                RETURN TRUE;
            ELSE
                RETURN FALSE;
            END IF;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL