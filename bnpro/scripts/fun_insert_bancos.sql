CREATE OR REPLACE FUNCTION fun_insert_bancos(wnom_banco tab_bancos.nom_banco%TYPE) RETURNS BOOLEAN AS
$BODY$
    DECLARE wid_banco 	tab_bancos.id_banco%TYPE;
	DECLARE wcur_ban	REFCURSOR;
	DECLARE wreg_ban	RECORD; 
    BEGIN
        SELECT MAX(a.id_banco) INTO wid_banco FROM tab_bancos AS a;
        IF FOUND THEN
			IF wid_banco IS NOT NULL THEN
            	wid_banco = wid_banco + 1;
				OPEN wcur_ban FOR SELECT a.nom_banco FROM tab_bancos AS a;
				FETCH wcur_ban INTO wreg_ban;
				WHILE FOUND LOOP
					IF wnom_banco = wreg_ban.nom_banco THEN
						--RAISE NOTICE 'ESTE BANCO (%) YA EXITE IDIOTA..',wnom_banco;
						RETURN FALSE;
					--ELSE 
						--RAISE NOTICE 'ESTE BANCO (%) no existe',wreg_ban.nom_banco;
					END IF;
					FETCH wcur_ban INTO wreg_ban;
				END LOOP;	
			ELSE
            	wid_banco = 1;
			END IF;
        ELSE
            wid_banco = 1;
        END IF;
        INSERT INTO tab_bancos VALUES(wid_banco,wnom_banco);
	    IF FOUND THEN
		    --RAISE NOTICE 'SE INSERTÓ EL BANCO: %',wnom_banco;
		    RETURN TRUE;
	    END IF;
    END;
$BODY$
LANGUAGE plpgsql;
--SELECT fun_insert_bancos('Nequi')
--SELECT * FROM tab_bancos;