CREATE OR REPLACE FUNCTION fun_vali_ir_bancos(wid_banco tab_bancos.id_banco%TYPE) RETURNS BOOLEAN AS
$$  
    DECLARE wreg_banco RECORD;
    BEGIN
        SELECT a.id_banco INTO wreg_banco FROM tab_clientes as a
        WHERE a.id_banco = wid_banco;
        IF wreg_banco.id_banco IS NOT NULL THEN
            RAISE NOTICE 'Hay relacion con el banco';
            RETURN TRUE;
        ELSE
            --RAISE NOTICE 'Si se puede inactivar';
            RETURN FALSE;
        END IF;
    END;
$$
LANGUAGE plpgsql;

--SELECT fun_vali_ir_bancos(1)