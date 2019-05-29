-- Insercion de Registros de Prueba en la base de datos

-- (IMPORTANTE) Registrar Accesorios
INSERT INTO accesorios(nombre, estatus) VALUES
('REPRODUCTOR','ACTIVO'),
('LIMPIA PARABRISAS','ACTIVO'),
('CAUCHO DE RECUESTO','ACTIVO'),
('ANTENA','ACTIVO'),
('TAPIZ INTERIOR','ACTIVO'),
('EXTINTOR','ACTIVO'),
('CINTURONES','ACTIVO'),
('ALFOMBRAS','ACTIVO'),
('ENCENDEDOR','ACTIVO'),
('TRIANGULO DE SEGURIDAD','ACTIVO'),
('PARASOLES','ACTIVO'),
('CAJA DE HERRAMIENTAS','ACTIVO'),
('AIRE ACONDICIONADO','ACTIVO'),
('GPS','ACTIVO'),
('ALARMA','ACTIVO');


-- USUARIO
INSERT INTO usuarios(identificacion, nombre, apellido, direccion, telefono, correo, usuario, password, privilegio, estatus)
VALUES ('V-00000000', 'ADMINISTRADOR', 'ADMINISTRADOR', 'HIDROPARTS','000-0000000', 'administrador@correo.com', 'administrador', 'bWxzUFhsenNNTERQQUdXY21odG0rdz09', '2', 'ACTIVO');

-- CLIENTES
INSERT INTO clientes(identificacion, nombre, apellido, direccion, telefono, correo, estatus) VALUES
('V-26945214', 'JOSNERY', 'DIAZ', 'LOS CREPUSCULOS', '000-1234567', 'josnery@gmail.com', 'ACTIVO'),
('V-27025411', 'MARIA', 'BETANCOURT', 'DON AURELIO', '000-1234567', 'maria@gmail.com', 'ACTIVO'),
('V-26540950', 'JESUS', 'ARRIECHE', 'DUACA', '000-1234567', 'jesus@gmail.com', 'ACTIVO');

-- EMPLEADOS
INSERT INTO empleados(identificacion, nombre, apellido, direccion, telefono, correo, cargo, estatus) VALUES
('V-26945214', 'JUAN', 'DIAZ', 'LOS CREPUSCULOS', '000-1234567', 'josnery@gmail.com', 'ADMINISTRADOR', 'ACTIVO'),
('V-27025411', 'PEDRO', 'BETANCOURT', 'DON AURELIO', '000-1234567', 'maria@gmail.com', 'MECANICO', 'ACTIVO'),
('V-26540950', 'CARLOS', 'ARRIECHE', 'DUACA', '000-1234567', 'jesus@gmail.com', 'AYUDANTE MECANICO', 'ACTIVO');

-- MARCAS
INSERT INTO marcas(nombre, estatus) VALUES
('FORD', 'ACTIVO'),
('FIAT', 'ACTIVO'),
('TOYOTA', 'ACTIVO');

-- MODELOS
INSERT INTO modelos(id_marcas, nombre, estatus) VALUES
('1','FIESTA', 'ACTIVO'),
('1','F-150', 'ACTIVO'),
('1','FOCUS', 'ACTIVO'),
('2','PALIO', 'ACTIVO'),
('2','TUCAN', 'ACTIVO'),
('2','SIENA', 'ACTIVO'),
('3','COROLLA', 'ACTIVO'),
('3','4RUNNER', 'ACTIVO'),
('3','FORTUNER', 'ACTIVO');
