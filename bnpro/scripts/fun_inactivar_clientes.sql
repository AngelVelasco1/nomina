CREATE OR REPLACE FUNCTION fun_inactivar_clientes(wid_cliente tab_clientes.id_cliente%TYPE) RETURNS BOOLEAN AS 
$$
    DECLARE wind_cliente  tab_clientes.ind_estado%TYPE;
    BEGIN
        SELECT a.ind_estado INTO wind_cliente FROM tab_clientes as a
        WHERE a.id_cliente=wid_cliente;
        IF wind_cliente IS TRUE THEN 
            UPDATE tab_clientes
            SET ind_estado = FALSE
            WHERE id_cliente = wid_cliente;
            IF FOUND THEN
				--RAISE NOTICE 'INACTIVADO';
                RETURN TRUE;
            ELSE
                RETURN FALSE;
			END IF;
		ELSE 
			UPDATE tab_clientes
            SET ind_estado = TRUE
            WHERE id_cliente = wid_cliente;
			IF FOUND THEN
				--RAISE NOTICE 'ACTIVADO';
                RETURN TRUE;
            ELSE
                RETURN FALSE;
			END IF;
        END IF;
    END;
$$
LANGUAGE PLPGSQL;
--SELECT fun_inactivar_clientes(1)
--SELECT * FROM tab_clientes