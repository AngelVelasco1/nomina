CREATE OR REPLACE FUNCTION fun_inactivar_bancos(wid_banco tab_bancos.id_banco%TYPE) RETURNS BOOLEAN AS
$BODY$
    DECLARE wind_banco  tab_bancos.ind_estado%TYPE;
    BEGIN
        SELECT a.ind_estado INTO wind_banco FROM tab_bancos as a
        WHERE a.id_banco=wid_banco;
		IF (SELECT fun_vali_ir_bancos(wid_banco)) IS FALSE THEN  
            IF wind_banco IS TRUE THEN 
                UPDATE tab_bancos
                SET ind_estado = FALSE
                WHERE id_banco = wid_banco;
                IF FOUND THEN
					--RAISE NOTICE 'INACTIVADO';
                    RETURN TRUE;
                ELSE
                    RETURN FALSE;
				END IF;
			ELSE 
				UPDATE tab_bancos
                SET ind_estado = TRUE
                WHERE id_banco = wid_banco;
				IF FOUND THEN
					--RAISE NOTICE 'ACTIVADO';
                    RETURN TRUE;
                ELSE
                    RETURN FALSE;
				END IF;
            END IF;
		ELSE 
			RETURN FALSE;
		END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;
--SELECT fun_inactivar_bancos(4)
--SELECT * FROM tab_bancos