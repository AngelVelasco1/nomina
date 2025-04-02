CREATE OR REPLACE FUNCTION fun_update_marcas(wid_marca tab_marcas.id_marca%TYPE,
                                             wnom_marca tab_marcas.nom_marca%TYPE) RETURNS BOOLEAN AS
$$
	DECLARE wnommarca tab_marcas.nom_marca%TYPE;
    BEGIN
        SELECT a.nom_marca INTO wnommarca FROM tab_marcas a
        WHERE a.nom_marca = wnom_marca;
        IF FOUND THEN
            RETURN FALSE;
        ELSE
            UPDATE tab_marcas
            SET nom_marca = wnom_marca,
                id_marca = wid_marca
            WHERE id_marca=wid_marca;
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
--SELECT fun_update_marcas(1,'Benotto') 