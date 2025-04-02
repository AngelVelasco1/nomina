--SELECT * FROM tab_clientes
--SELECT fun_insert_clientes(1,'Lizeth','De Portilla',68,68001,'Casa de Portilla','portilla@correo.com','Calle de los negros',3212323232,1);
CREATE OR REPLACE FUNCTION fun_insert_clientes(wid_cliente tab_clientes.id_cliente%TYPE,
                                               wnom_cliente tab_clientes.nom_cliente%TYPE,
                                               wape_cliente tab_clientes.ape_cliente%TYPE,
                                               wid_dpto tab_clientes.id_dpto%TYPE,
                                               wid_municipio tab_clientes.id_municipio%TYPE,
                                               wdir_cliente tab_clientes.dir_cliente%TYPE,
                                               wmail_cliente tab_clientes.mail_cliente%TYPE,
                                               wtel_cliente tab_clientes.tel_cliente%TYPE,
                                               wid_banco tab_clientes.id_cliente%TYPE
                                               ) RETURNS BOOLEAN AS 
$$
    DECLARE wcliente    tab_clientes.id_cliente%TYPE;
    BEGIN
        SELECT a.id_cliente INTO wcliente FROM tab_clientes AS a
        WHERE a.id_cliente = wid_cliente;
        IF FOUND THEN
            --RAISE NOTICE 'EL CLIENTE (%) YA EXISTE',wreg_cliente.id_cliente || ' - '|| wreg_cliente.nom_cliente || ' ' || wreg_cliente.ape_cliente;
            RETURN FALSE;
        ELSE
            INSERT INTO tab_clientes VALUES(wid_cliente,wnom_cliente,wape_cliente,wid_dpto,wid_municipio,wdir_cliente,wmail_cliente,wtel_cliente,wid_banco,0,TRUE);
            IF FOUND THEN
                --RAISE NOTICE 'SE INSERTÓ EL CLIENTE (%)',wid_cliente ||' - '||wnom_cliente ||' ' || wape_cliente;
                RETURN TRUE;
            ELSE 
                --RAISE NOTICE 'NO SIRVE ESTA MIERDA';
                RETURN FALSE;
			END IF;
        END IF;
        
    END;
$$
LANGUAGE PLPGSQL;




