CREATE OR REPLACE FUNCTION iniciar_sesion(nom_usuario text, cont_usuario text) RETURNS boolean AS
$$
DECLARE
    es_admin boolean;
BEGIN
    -- Verificar si las credenciales son válidas y obtener el rango_usuario
    SELECT rango_usuario INTO es_admin FROM tab_usuarios WHERE nom_usuario = $1 AND cont_usuario = $2 LIMIT 1;

    -- Si se encuentra un rango_usuario válido, retornar TRUE si es administrador, FALSE si es usuario normal
    IF es_admin THEN
        RETURN true;
    ELSE
        RETURN false;
    END IF;
END;
$$ LANGUAGE plpgsql;
