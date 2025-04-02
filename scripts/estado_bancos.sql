CREATE OR REPLACE FUNCTION bancos_estado(wid_banco tab_bancos.id_banco%TYPE)
RETURNS BOOLEAN AS
$$
	DECLARE
	wind		VARCHAR;
	wreg		RECORD;

	BEGIN
	select id_banco, ind_estado INTO wreg from tab_bancos
	where id_banco = wid_banco;

IF FOUND THEN
	if wreg.ind_estado is TRUE THEN
	UPDATE tab_bancos
	SET ind_estado = FALSE
	WHERE id_banco = wid_banco;
	IF FOUND THEN
		RETURN TRUE;
	ELSE
		RETURN FALSE;
	END IF;
ELSE
	UPDATE tab_bancos
	SET ind_estado = TRUE
	WHERE id_banco = wid_banco;
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
