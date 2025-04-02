CREATE OR REPLACE FUNCTION fun_insert_paises(wid_pais tab_paises.id_pais%TYPE,wnom_pais tab_paises.nom_pais%TYPE,wind_estado tab_paises.ind_estado%TYPE) RETURNS BOOLEAN AS
$BODY$
    DECLARE wid_reg tab_paises.id_pais%TYPE;
    BEGIN
        SELECT a.id_pais into wid_reg FROM tab_paises a
        WHERE a.id_pais = wid_pais;
        IF FOUND THEN
            RETURN FALSE;
        ELSE
            INSERT INTO tab_paises VALUES(wid_pais,wnom_pais,wind_estado);
            IF FOUND THEN
                RETURN TRUE;
            ELSE
                RETURN FALSE;
            END IF;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL