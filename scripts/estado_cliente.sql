CREATE OR REPLACE FUNCTION cliente_estado(yid_cliente tab_clientes.id_cliente%TYPE)
RETURNS BOOLEAN AS
$$
	DECLARE
	yind		VARCHAR;
	yreg		RECORD;

	BEGIN
	select id_cliente, ind_estado INTO yreg from tab_clientes
	where id_cliente = yid_cliente;

IF FOUND THEN
	if yreg.ind_estado is TRUE THEN
	UPDATE tab_clientes
	SET ind_estado = FALSE
	WHERE id_cliente = yid_cliente;
	IF FOUND THEN
		RETURN TRUE;
	ELSE
		RETURN FALSE;
	END IF;
ELSE
	UPDATE tab_clientes
	SET ind_estado = TRUE
	WHERE id_cliente = yid_cliente;
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
