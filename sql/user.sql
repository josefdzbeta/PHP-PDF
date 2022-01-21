--Crear usuario 'NombreDeUsuario@NombreDeServidor' IDENTIFIED BY 'ContraseñaUsuario'
CREATE USER '2DAWJoseAngel'@'localhost' IDENTIFIED BY 'hola1234';

--Dar permisos al usuario GRANT Tipo_de_Privilegio ON BaseDeDatos.Tabla TO 'NombreDeUsuario@NombreDeServidor'
GRANT DROP, DELETE, INSERT, SELECT, UPDATE ON Alumnos.UsuariosDAW TO '2DAWJoseAngel'@'localhost';