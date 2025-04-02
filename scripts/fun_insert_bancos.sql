CREATE OR REPLACE FUNCTION fun_insert_bancos(wid_banco tab_bancos.id_banco%TYPE,wnom_banco tab_bancos.nom_banco%TYPE, wind_estado tab_bancos.ind_estado%TYPE) RETURNS BOOLEAN AS
$BODY$
    DECLARE wid_reg tab_bancos.id_banco%TYPE;
    BEGIN
        SELECT a.id_banco into wid_reg FROM tab_bancos a
        WHERE a.id_banco = wid_banco;
        IF FOUND THEN
            RETURN FALSE;
        ELSE
            INSERT INTO tab_bancos VALUES(wid_banco,wnom_banco,wind_estado);
            IF FOUND THEN
                RETURN TRUE;
            ELSE
                RETURN FALSE;
            END IF;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL