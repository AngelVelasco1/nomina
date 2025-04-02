CREATE OR REPLACE FUNCTION fun_insert_pmtros_bnpro(wid_entidad tab_pmtros_bnpro.id_entidad%TYPE,wnom_entidad tab_pmtros_bnpro.nom_entidad%TYPE,
                                                   wano_fiscal tab_pmtros_bnpro.ano_fiscal%TYPE,wmes_fiscal tab_pmtros_bnpro.mes_fiscal%TYPE,
                                                   wval_tir tab_pmtros_bnpro.val_tir%TYPE,wnom_plan_desarrollo tab_pmtros_bnpro.nom_plan_desarrollo%TYPE) RETURNS BOOLEAN AS
$BODY$
    DECLARE wid_ent tab_pmtros_bnpro.id_entidad%TYPE;
    BEGIN
        SELECT a.id_entidad into wid_ent FROM tab_pmtros_bnpro a
        WHERE a.id_entidad = wid_entidad;
        IF FOUND THEN
            RETURN FALSE;
        ELSE
            INSERT INTO tab_pmtros_bnpro VALUES(wid_entidad,wnom_entidad,wano_fiscal,wmes_fiscal,wval_tir,wnom_plan_desarrollo);
            IF FOUND THEN
                RETURN TRUE;
            ELSE
                RETURN FALSE;
            END IF;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL