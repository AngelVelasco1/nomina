CREATE OR REPLACE FUNCTION fun_insert_prodxprov(wid_prov tab_prodxprov.id_prov%TYPE,wid_prod tab_prodxprov.id_prod%TYPE) RETURNS BOOLEAN AS
$BODY$
    DECLARE wid_reg tab_prodxprov.id_prov%TYPE;
    BEGIN
        SELECT a.id_prov into wid_reg FROM tab_prodxprov a
        WHERE a.id_prov = wid_prov;
        IF FOUND THEN
            RETURN FALSE;
        ELSE
            INSERT INTO tab_prodxprov VALUES(wid_prov,wid_prod);
            IF FOUND THEN
                RETURN TRUE;
            ELSE
                RETURN FALSE;
            END IF;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL