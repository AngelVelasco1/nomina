CREATE OR REPLACE FUNCTION marcas_estado(wid_marca tab_marcas.id_marca%TYPE)
RETURNS BOOLEAN AS
$$
	DECLARE
	wind		VARCHAR;
	wreg		RECORD;

	BEGIN
	select id_marca, ind_estado INTO wreg from tab_marcas
	where id_marca = wid_marca;

IF FOUND THEN
	if wreg.ind_estado is TRUE THEN
	UPDATE tab_marcas
	SET ind_estado = FALSE
	WHERE id_marca = wid_marca;
	IF FOUND THEN
		RETURN TRUE;
	ELSE
		RETURN FALSE;
	END IF;
ELSE
	UPDATE tab_marcas
	SET ind_estado = TRUE
	WHERE id_marca = wid_marca;
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