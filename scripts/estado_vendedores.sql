CREATE OR REPLACE FUNCTION vendedores_estado(wid_vendedor tab_vendedores.id_vendedor%TYPE)
RETURNS BOOLEAN AS
$$
	DECLARE
	wind		VARCHAR;
	wreg		RECORD;

	BEGIN
	select id_vendedor, ind_estado INTO wreg from tab_vendedores
	where id_vendedor = wid_vendedor;

IF FOUND THEN
	if wreg.ind_estado is TRUE THEN
	UPDATE tab_vendedores
	SET ind_estado = FALSE
	WHERE id_vendedor = wid_vendedor;
	IF FOUND THEN
		RETURN TRUE;
	ELSE
		RETURN FALSE;
	END IF;
ELSE
	UPDATE tab_vendedores
	SET ind_estado = TRUE
	WHERE id_vendedor = wid_vendedor;
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