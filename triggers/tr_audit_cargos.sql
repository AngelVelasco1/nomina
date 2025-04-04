CREATE OR REPLACE TRIGGER tr_audit_empleados BEFORE DELETE OR INSERT OR UPDATE ON tab_emplea
FOR EACH ROW EXECUTE PROCEDURE sp_audit_tables();

DELETE FROM tab_emplea WHERE id_emplea = 1014182933;

UPDATE tab_emplea SET ape_emplea = 'mario' WHERE id_emplea = 91423627;


SELECT * FROM tab_reg_del;

select * from tab_emplea