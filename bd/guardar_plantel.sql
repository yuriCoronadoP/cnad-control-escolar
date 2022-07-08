CREATE DEFINER = 'root'@'localhost' PROCEDURE 'guardar_plantel'(cct_p VARCHAR(10), nombre_p VARCHAR(50), direccion_p VARCHAR(100), tel_p VARCHAR(13), correo_p VARCHAR(45))

BEGIN

INSERT INTO escuela(cct,nombre,direccion,telefono,correo)
VALUES (cct_p, nombre_p, direccion_p, telefono_p, correo_p)

END