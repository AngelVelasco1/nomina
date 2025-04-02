CREATE OR REPLACE FUNCTION fun_update_provedores(wid_prov tab_prov.id_prov%TYPE,wnom_prov tab_prov.nom_prov%TYPE,
                                                wid_pais tab_prov.id_pais%TYPE,
                                                wid_ciudad tab_prov.id_ciudad%TYPE,
                                                wmail_prov tab_prov.mail_prov%TYPE,
                                                wubic_prov tab_prov.ubic_prov%TYPE,
                                                wtel_prov tab_prov.tel_prov%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE tab_prov SET id_prov  = wid_prov,
                                nom_prov = wnom_prov,
                                id_pais = wid_pais,
                                id_ciudad = wid_ciudad,
                                mail_prov = wmail_prov,
                                ubic_prov = wubic_prov,
                                tel_prov = wtel_prov
        WHERE id_prov = wid_prov;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL