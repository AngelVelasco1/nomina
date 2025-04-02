CREATE OR REPLACE FUNCTION fun_insert_pais(wid_pais tab_paises.id_pais%TYPE,wnom_pais tab_paises.nom_pais%TYPE) RETURNS BOOLEAN AS
$BODY$
    DECLARE wreg_pais     RECORD;
    BEGIN
        SELECT a.id_pais,a.nom_pais into wreg_pais FROM tab_paises a
        WHERE a.id_pais = wid_pais OR a.nom_pais = wnom_pais;
        IF FOUND THEN
            RETURN FALSE;
        ELSE
            INSERT INTO tab_paises VALUES(wid_pais,wnom_pais);
            IF FOUND THEN
                RETURN TRUE;
            ELSE
                RETURN FALSE;
            END IF;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL;
--SELECT * FROM tab_paises
--SELECT fun_insert_pais(65,'Maracaibo')
