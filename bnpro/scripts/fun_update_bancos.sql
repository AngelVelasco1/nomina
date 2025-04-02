CREATE OR REPLACE FUNCTION fun_update_bancos(wid_banco tab_bancos.id_banco%TYPE, 
                                             wnom_banco tab_bancos.nom_banco%TYPE) RETURNS BOOLEAN AS
$BODY$
	DECLARE wnombanco	tab_bancoS.nom_banco%TYPE;
    BEGIN
        SELECT a.nom_banco INTO wnombanco FROM tab_bancos AS a
        WHERE a.nom_banco = wnom_banco;
        IF FOUND THEN
            RETURN FALSE;
        ELSE
            UPDATE tab_bancos SET nom_banco  = wnom_banco,
                                  id_banco   = wid_banco
            WHERE id_banco = wid_banco;
            IF FOUND THEN
                RETURN TRUE;
            ELSE
                RETURN FALSE;
            END IF;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;

--SELECT fun_update_bancos(1,'Nequi');
--SELECT * FROM tab_bancos;