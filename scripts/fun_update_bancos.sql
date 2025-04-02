CREATE OR REPLACE FUNCTION fun_update_bancos(wid_banco tab_bancos.id_banco%TYPE,wnom_banco tab_bancos.nom_banco%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE tab_bancos SET id_banco  = wid_banco,
                                nom_banco = wnom_banco
        WHERE id_banco = wid_banco;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL