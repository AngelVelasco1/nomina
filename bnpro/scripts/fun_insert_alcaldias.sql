CREATE OR REPLACE FUNCTION fun_insert_alcaldias(wid_alcaldia tab_alcaldias.id_alcaldia%TYPE,wval_digito_verif tab_alcaldias.val_digito_verif%TYPE,wnom_alcaldia tab_alcaldias.nom_alcaldia%TYPE,
                                                wnom_alcalde tab_alcaldias.nom_alcalde%TYPE,wid_dpto tab_alcaldias.id_dpto%TYPE,wid_municipio tab_alcaldias.id_municipio%TYPE,
                                                wdir_alcaldia tab_alcaldias.dir_alcaldia%TYPE,wnom_gestora_social tab_alcaldias.nom_gestora_social%TYPE) RETURNS BOOLEAN AS
$BODY$
    DECLARE walcaldia tab_alcaldias.id_alcaldia%TYPE;
    BEGIN
        wid_dpto = SUBSTRING(wid_municipio,1,2);
        SELECT a.id_alcaldia INTO walcaldia FROM tab_alcaldias a
        WHERE a.id_alcaldia = wid_alcaldia;
        IF NOT FOUND THEN
            INSERT INTO tab_alcaldias VALUES(wid_alcaldia, wval_digito_verif, wnom_alcaldia, wnom_alcalde, wid_dpto, wid_municipio, wdir_alcaldia, wnom_gestora_social);
            IF FOUND THEN
                RETURN TRUE;
            ELSE
                RETURN FALSE;
            END IF;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL