CREATE OR REPLACE FUNCTION fun_update_pais(wid_pais tab_paises.id_pais%TYPE,
                                           wnom_pais tab_paises.nom_pais%TYPE) RETURNS BOOLEAN AS
$$
	DECLARE wnompais tab_paises.nom_pais%TYPE;
    BEGIN
        SELECT a.nom_pais INTO wnompais FROM tab_paises a
        WHERE a.nom_pais = wnom_pais;
        IF FOUND THEN
            RETURN FALSE;
        ELSE
            UPDATE tab_paises
            SET nom_pais = wnom_pais,
                id_pais = wid_pais
            WHERE id_pais=wid_pais;
            IF FOUND THEN
                RETURN TRUE;
            ELSE
                RETURN FALSE;
            END IF;
        END IF;
    END;
$$
LANGUAGE PLPGSQL;

--SELECT * FROM tab_paises
--SELECT fun_update_pais(1,'Colombia') 