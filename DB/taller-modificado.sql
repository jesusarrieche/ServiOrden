CREATE TABLE usuarios(
    id SERIAL,
    identificacion VARCHAR(15) UNIQUE NOT NULL,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    direccion VARCHAR(200),
    telefono VARCHAR(15),
    correo VARCHAR(100),
    usuario VARCHAR(50),
    password VARCHAR(120),
    privilegio INT,
    estatus VARCHAR(15),

    CONSTRAINT id_usuarios_pk PRIMARY KEY(id)
);

CREATE TABLE clientes(
    id SERIAL,
    identificacion VARCHAR(15) UNIQUE NOT NULL,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    direccion VARCHAR(200),
    telefono VARCHAR(15),
    correo VARCHAR(100),
    estatus VARCHAR(15),

    CONSTRAINT id_clientes_pk PRIMARY KEY(id)
);

CREATE TABLE empleados(
    id SERIAL,
    identificacion VARCHAR(15) UNIQUE NOT NULL,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    direccion VARCHAR(200),
    telefono VARCHAR(15),
    correo VARCHAR(100),
    cargo VARCHAR(25),
    estatus VARCHAR(15),

    CONSTRAINT id_empleados_pk PRIMARY KEY(id)
);

CREATE TABLE marcas(
    id SERIAL,
    nombre VARCHAR(40) UNIQUE,
    estatus VARCHAR(15),

    CONSTRAINT id_marcas_pk PRIMARY KEY(id)
);

CREATE TABLE modelos(
    id SERIAL,
    id_marcas INT,
    nombre VARCHAR(25),
    estatus VARCHAR(15),

    CONSTRAINT id_modelos_pk PRIMARY KEY(id),

    CONSTRAINT id_marcas_fk FOREIGN KEY(id_marcas) REFERENCES marcas(id) MATCH FULL
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE vehiculos(
    id SERIAL,
    id_modelos INT,
    id_clientes INT,
    placa VARCHAR(25),
    serial_motor VARCHAR(25),
    serial_carroceria VARCHAR(25),
    serial_caja VARCHAR(25),
    color VARCHAR(20),
    anio VARCHAR(10),
    estatus VARCHAR(15),

    CONSTRAINT id_vehiculos_pk PRIMARY KEY(id),
    
    CONSTRAINT id_modelos_fk FOREIGN KEY(id_modelos) REFERENCES modelos(id) MATCH FULL
    ON DELETE SET DEFAULT ON UPDATE CASCADE,

    CONSTRAINT id_clientes_fk FOREIGN KEY(id_clientes) REFERENCES clientes(id) MATCH FULL
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE ordenes(
    id SERIAL,
    codigo VARCHAR(15) UNIQUE NOT NULL,
    id_vehiculos INT,
    descripcion TEXT,
    fecha_registro TIMESTAMP,
    fecha_anulacion TIMESTAMP,
    fecha_cierre TIMESTAMP,
    estatus VARCHAR(15),

    CONSTRAINT id_ordenes_pk PRIMARY KEY(id),

    CONSTRAINT id_vehiculos_fk FOREIGN KEY(id_vehiculos) REFERENCES vehiculos(id) MATCH FULL
    ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE observaciones(
    id SERIAL,
    id_ordenes INT,
    descripcion TEXT,
    imagen VARCHAR(500),

    CONSTRAINT id_observaciones_pk PRIMARY KEY(id),

    CONSTRAINT id_ordenes_fk FOREIGN KEY(id_ordenes) REFERENCES ordenes(id) MATCH FULL
    ON DELETE CASCADE on UPDATE CASCADE
);

CREATE TABLE accesorios(
    id SERIAL,
    nombre VARCHAR(50),
    estatus VARCHAR(15),

    CONSTRAINT id_accesorios_pk PRIMARY KEY(id)
);


-- TABLAS PUENTE

CREATE TABLE ordenes_empleados(
    id_ordenes INT,
    id_empleados INT,

    CONSTRAINT ordenes_empleados_pk PRIMARY KEY (id_ordenes,id_empleados),

    CONSTRAINT id_ordenes_fk FOREIGN KEY (id_ordenes) REFERENCES ordenes(id) MATCH FULL
    ON DELETE RESTRICT ON UPDATE CASCADE,

    CONSTRAINT id_empleados_fk FOREIGN KEY (id_empleados) REFERENCES empleados(id) MATCH FULL
    ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE ordenes_accesorios(
    id_ordenes INT,
    id_accesorios INT,

    CONSTRAINT ordenes_accesorios_pk PRIMARY KEY(id_ordenes, id_accesorios),

    CONSTRAINT id_ordenes_fk FOREIGN KEY(id_ordenes) REFERENCES ordenes(id) MATCH FULL
    ON DELETE RESTRICT ON UPDATE CASCADE,

    CONSTRAINT id_accesorios_fk FOREIGN KEY(id_accesorios) REFERENCES accesorios(id) MATCH FULL
    ON DELETE RESTRICT ON UPDATE CASCADE
);
-- -----------------------