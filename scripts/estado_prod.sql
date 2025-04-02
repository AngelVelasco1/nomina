CREATE OR REPLACE FUNCTION prod_estado(wid_prod tab_prod.id_prod%TYPE)
RETURNS BOOLEAN AS
$$
	DECLARE
	wind		VARCHAR;
	wreg		RECORD;

	BEGIN
	select id_prod, ind_estado INTO wreg from tab_prod
	where id_prod = wid_prod;

IF FOUND THEN
	if wreg.ind_estado is TRUE THEN
	UPDATE tab_prod
	SET ind_estado = FALSE
	WHERE id_prod = wid_prod;
	IF FOUND THEN
		RETURN TRUE;
	ELSE
		RETURN FALSE;
	END IF;
ELSE
	UPDATE tab_prod
	SET ind_estado = TRUE
	WHERE id_prod = wid_prod;
	IF FOUND THEN
		RETURN TRUE;
	ELSE
		RETURN FALSE;
	END IF;
	end if;
end if;
	END;
$$
LANGUAGE PLPGSQL;
