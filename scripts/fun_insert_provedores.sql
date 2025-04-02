CREATE OR REPLACE FUNCTION fun_insert_provedores(wid_prov tab_prov.id_prov%TYPE,wnom_prov tab_prov.nom_prov%TYPE,
                                                wid_pais tab_prov.id_pais%TYPE,
                                                wid_ciudad tab_prov.id_ciudad%TYPE,
                                                wmail_prov tab_prov.mail_prov%TYPE,
                                                wubic_prov tab_prov.ubic_prov%TYPE,
                                                wtel_prov tab_prov.tel_prov%TYPE,
                                                wind_estado tab_prov.ind_estado%TYPE) RETURNS BOOLEAN AS
$BODY$
    DECLARE wid_reg tab_prov.id_prov%TYPE;
    BEGIN
        SELECT a.id_prov into wid_reg FROM tab_prov a
        WHERE a.id_prov = wid_prov;
        IF FOUND THEN
            RETURN FALSE;
        ELSE
            INSERT INTO tab_prov VALUES(wid_prov, wnom_prov, wid_pais, wid_ciudad, wmail_prov, wubic_prov, wtel_prov,wind_estado );
            IF FOUND THEN
                RETURN TRUE;
            ELSE
                RETURN FALSE;
            END IF;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL