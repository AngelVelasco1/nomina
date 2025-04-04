-- Active: 1743100572938@@127.0.0.1@5432@nomina_adso
CREATE OR REPLACE FUNCTION sp_audit_tables() RETURNS TRIGGER AS
$$
BEGIN
     IF TG_OP = 'INSERT' THEN
            NEW.user_insert = CURRENT_USER;
            NEW.fec_insert = CURRENT_TIMESTAMP;
            RETURN NEW;
        END IF;
        IF TG_OP = 'UPDATE' THEN
            NEW.user_update = CURRENT_USER;
            NEW.fecha_update = CURRENT_TIMESTAMP;
            RETURN NEW;
        END IF;
        IF TG_OP = 'DELETE' THEN
            INSERT INTO tab_reg_del (table_name, deleted_data, user_delete, date_delete) VALUES(TG_TABLE_NAME, OLD, CURRENT_USER, CURRENT_TIMESTAMP);
            RETURN OLD;
        END IF;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION sp_audit_tables();
DELETE FROM tab_emplea WHERE id_emplea = 91423627;
SELECT * FROM tab_reg_del;
DELETE FROM tab_emplea