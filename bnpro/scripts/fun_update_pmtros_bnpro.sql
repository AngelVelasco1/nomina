CREATE OR REPLACE FUNCTION fun_update_pmtros_bnpro(wid_entidad tab_pmtros_bnpro.id_entidad%TYPE,wnom_entidad tab_pmtros_bnpro.nom_entidad%TYPE,
                                                   wano_fiscal tab_pmtros_bnpro.ano_fiscal%TYPE,wmes_fiscal tab_pmtros_bnpro.mes_fiscal%TYPE,
                                                   wval_tir tab_pmtros_bnpro.val_tir%TYPE,wnom_plan_desarrollo tab_pmtros_bnpro.nom_plan_desarrollo%TYPE)
												   RETURNS BOOLEAN AS
$BODY$
    BEGIN
        UPDATE tab_pmtros_bnpro SET id_entidad  		= wid_entidad,
                                    nom_entidad 		= wnom_entidad,
                                    ano_fiscal  		= wano_fiscal,
                                    mes_fiscal  		= wmes_fiscal,
                                    val_tir     		= wval_tir,
									nom_plan_desarrollo = wnom_plan_desarrollo
		WHERE id_entidad = wid_entidad;
        IF FOUND THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$BODY$
LANGUAGE PLPGSQL