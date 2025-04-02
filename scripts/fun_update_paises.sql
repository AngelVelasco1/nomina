CREATE OR REPLACE FUNCTION fun_update_paises(wid_pais tab_paises.id_pais%TYPE,wnom_pais tab_paises.nom_pais%TYPE) RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE tab_paises SET id_pais  = wid_pais,
                                nom_pais = wnom_pais
        WHERE id_pais = wid_pais;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL