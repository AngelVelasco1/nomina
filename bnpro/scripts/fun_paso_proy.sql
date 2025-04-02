--SELECT * FROM tab_pro
--WHERE SUBSTRING(id_bpin,5,2) = 17;
--SELECT fun_paso_proy();
CREATE OR REPLACE FUNCTION fun_paso_proy() RETURNS VARCHAR AS
$$
    DECLARE wcur_proy       REFCURSOR;
    DECLARE wreg_proy       tab_proy%ROWTYPE;
    DECLARE wcontador       INTEGER;
    DECLARE wid_municipio   tab_proy.id_municipio%TYPE;
    DECLARE wid_dpto        tab_proy.id_dpto%TYPE;
    DECLARE wid_muni        tab_proy.id_municipio%TYPE;
    DECLARE wid_dep         tab_proy.id_dpto%TYPE;
    BEGIN
        wcontador = 1;
        OPEN wcur_proy FOR SELECT a.* FROM tab_pro a
                           WHERE a.id_bpin IS NOT NULL;
        FETCH wcur_proy INTO wreg_proy;
        WHILE FOUND LOOP
            wid_dpto      = SUBSTRING(wreg_proy.id_bpin,5,2);
            SELECT a.id_dpto INTO wid_dep FROM tab_dptos a
            WHERE a.id_dpto = wid_dpto;
            IF FOUND THEN
                wid_municipio = SUBSTRING(wreg_proy.id_bpin,5,5);
                SELECT a.id_municipio INTO wid_muni FROM tab_municipios a
                WHERE a.id_dpto      = wid_dpto       AND
                      a.id_municipio = wid_municipio;
                IF FOUND THEN
                    wreg_proy.id_municipio = wid_municipio;
                    wreg_proy.id_dpto      = wid_dpto;
                    INSERT INTO tab_proy VALUES(wreg_proy.*);
                    wcontador = wcontador + 1;
                    RAISE NOTICE 'Van % registros insertados',wcontador;
                END IF;
            END IF;
            FETCH wcur_proy INTO wreg_proy;
        END LOOP;
        RAISE NOTICE 'Registros insertados: %',wcontador;
        RETURN 'Proceso terminado';
    END;
$$
LANGUAGE PLPGSQL;