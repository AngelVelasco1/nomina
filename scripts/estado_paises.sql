CREATE OR REPLACE FUNCTION paises_estado(wid_pais tab_paises.id_pais%TYPE)
RETURNS BOOLEAN AS
$$
	DECLARE
	wind		VARCHAR;
	wreg		RECORD;

	BEGIN
	select id_pais, ind_estado INTO wreg from tab_paises
	where id_pais = wid_pais;

IF FOUND THEN
	if wreg.ind_estado is TRUE THEN
	UPDATE tab_paises
	SET ind_estado = FALSE
	WHERE id_pais = wid_pais;
	IF FOUND THEN
		RETURN TRUE;
	ELSE
		RETURN FALSE;
	END IF;
ELSE
	UPDATE tab_paises
	SET ind_estado = TRUE
	WHERE id_pais = wid_pais;
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
