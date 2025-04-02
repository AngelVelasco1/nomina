CREATE OR REPLACE FUNCTION fun_update_municipios(wid_dpto tab_municipios.id_dpto%TYPE,wid_municipio tab_municipios.id_municipio%TYPE,
                                              wnom_municipio tab_municipios.nom_municipio%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE tab_municipios SET id_dpto     = wid_dpto,
                                id_municipio  = wid_municipio,
                                nom_municipio = wnom_municipio
        WHERE id_dpto      = wid_dpto AND
              id_municipio = wid_municipio;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL