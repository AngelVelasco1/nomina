CREATE OR REPLACE FUNCTION prov_estado(wid_prov tab_prov.id_prov%TYPE)
RETURNS BOOLEAN AS
$$
	DECLARE
	wind		VARCHAR;
	wreg		RECORD;

	BEGIN
	select id_prov, ind_estado INTO wreg from tab_prov
	where id_prov = wid_prov;

IF FOUND THEN
	if wreg.ind_estado is TRUE THEN
	UPDATE tab_prov
	SET ind_estado = FALSE
	WHERE id_prov = wid_prov;
	IF FOUND THEN
		RETURN TRUE;
	ELSE
		RETURN FALSE;
	END IF;
ELSE
	UPDATE tab_prov
	SET ind_estado = TRUE
	WHERE id_prov = wid_prov;
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