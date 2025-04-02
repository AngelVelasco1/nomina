CREATE OR REPLACE FUNCTION fun_update_clientes(wid_cliente tab_clientes.id_cliente%TYPE,
                                               wnom_cliente tab_clientes.nom_cliente%TYPE,
                                               wape_cliente tab_clientes.ape_cliente%TYPE,
                                               wid_dpto tab_clientes.id_dpto%TYPE,
                                               wid_municipio tab_clientes.id_municipio%TYPE,
                                               wdir_cliente tab_clientes.dir_cliente%TYPE,
                                               wmail_cliente tab_clientes.mail_cliente%TYPE,
                                               wtel_cliente tab_clientes.tel_cliente%TYPE,
                                               wid_banco tab_clientes.id_banco%TYPE) RETURNS BOOLEAN AS
$$
    DECLARE wreg_cliente    RECORD;
    BEGIN
        UPDATE tab_clientes
        SET nom_cliente   =   wnom_cliente,
            ape_cliente   =   wape_cliente,
            id_dpto       =   wid_dpto,
            id_municipio  =   wid_municipio,
            dir_cliente   =   wdir_cliente ,   
            mail_cliente  =   wmail_cliente,
            tel_cliente   =   wtel_cliente,
            id_banco      =   wid_banco
        WHERE id_cliente  =   wid_cliente;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;    
    END;
$$
LANGUAGE PLPGSQL;
--SELECT fun_update_clientes(1,'Lizeth','De Portilla',68,68001,'Casa de Portilla - Calle de los negros','portilla@correo.com',3212323232,1);