--SELECT fun_insert_usuarios(100,'jloca','Juana la Loca','juana123',1);
CREATE OR REPLACE FUNCTION fun_insert_municipios(wid_dpto tab_municipios.id_dpto%TYPE,wid_municipio tab_municipios.id_municipio%TYPE,
                                   wnom_municipio tab_municipios.nom_municipio%TYPE) RETURNS BOOLEAN AS
$BODY$
    DECLARE wmunicipio  tab_municipios.id_municipio%TYPE;
    DECLARE wdep        tab_municipios.id_dpto%TYPE;
    DECLARE wmun        tab_municipios.id_municipio%TYPE;
    BEGIN
        wmunicipio = wid_dpto || wid_municipio;
        SELECT a.id_municipio INTO wmun FROM tab_municipios a
        WHERE a.id_municipio = wmunicipio;
        IF FOUND THEN
            INSERT INTO tab_municipios VALUES(wid_dpto, wmunicipio, wnom_municipio);
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