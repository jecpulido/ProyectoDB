CREATE DATABASE DelightSuite;

CREATE TABLE TIPO_EMPLEADO (
  cod_tipo_empleado INTEGER NOT NULL AUTO_INCREMENT,
  descrip_tipo_empleado VARCHAR(45) NOT NULL,
  PRIMARY KEY(cod_tipo_empleado)
);

CREATE TABLE PRODUCTO (
  cod_producto INTEGER NOT NULL AUTO_INCREMENT,
  nombre_producto VARCHAR(45) NOT NULL,
  descrip_producto VARCHAR(45) NOT NULL,
  cantidad_producto INTEGER NOT NULL,
  precio_producto DECIMAL(19,0) NOT NULL,
  rutafoto_producto VARCHAR(45),
  PRIMARY KEY(cod_producto)
);

CREATE TABLE TIPO_PAGO (
  cod_tipo_pago INTEGER NOT NULL AUTO_INCREMENT,
  descrip_tipo_pago VARCHAR(45) NOT NULL,
  PRIMARY KEY(cod_tipo_pago)
);

CREATE TABLE TIPO_HABITACION (
  cod_tipo_habitacion INTEGER NOT NULL AUTO_INCREMENT,
  descrip_habitacion VARCHAR(45) NOT NULL,
  PRIMARY KEY(cod_tipo_habitacion)
);

CREATE TABLE CLIENTE (
  dni_cliente NUMERIC NOT NULL,
  nombre_cliente VARCHAR(255) NOT NULL,
  telefono_cliente VARCHAR(10) NOT NULL,
  direccion_cliente VARCHAR(100) NULL,
  PRIMARY KEY(dni_cliente)
);

CREATE TABLE ESTADO_HABITACION (
  cod_estado_habitacion INTEGER NOT NULL AUTO_INCREMENT,
  descrip_estado_habitacion VARCHAR(45) NOT NULL,
  PRIMARY KEY(cod_estado_habitacion)
);

CREATE TABLE ESTADO_RESERVA (
  cod_estado_reserva INTEGER NOT NULL AUTO_INCREMENT,
  descrip_estado_reserva VARCHAR(45) NOT NULL,
  PRIMARY KEY(cod_estado_reserva)
);

CREATE TABLE EMPLEADO (
  cod_empleado INTEGER NOT NULL AUTO_INCREMENT,
  dni_empleado NUMERIC NOT NULL UNIQUE,
  cod_tipo_empleado INTEGER NOT NULL,
  nombre_empleado VARCHAR(255) NOT NULL,
  telefono_empleado VARCHAR(10) NOT NULL,
  direccion_empleado VARCHAR(100) NULL,
  fecha_ingreso_empleado DATETIME NOT NULL,
  fecha_salida_empleado DATETIME NULL,
  sueldo_empleado DECIMAL(19,0) NOT NULL,
  PRIMARY KEY(cod_empleado),
  FOREIGN KEY(cod_tipo_empleado) REFERENCES TIPO_EMPLEADO(cod_tipo_empleado)
);

CREATE TABLE HABITACION (
  cod_habitacion INTEGER NOT NULL AUTO_INCREMENT,
  cod_estado_habitacion INTEGER NOT NULL,
  cod_tipo_habitacion INTEGER NOT NULL,
  descrip_habitacion VARCHAR(45) NOT NULL,
  precio_habitacion FLOAT NOT NULL,
  PRIMARY KEY(cod_habitacion),
  FOREIGN KEY(cod_tipo_habitacion) REFERENCES TIPO_HABITACION(cod_tipo_habitacion),
  FOREIGN KEY(cod_estado_habitacion) REFERENCES ESTADO_HABITACION(cod_estado_habitacion)
);

CREATE TABLE USUARIO (
  usuario VARCHAR(20) NOT NULL,
  cod_empleado INTEGER NOT NULL,
  contraseña VARCHAR(255) NOT NULL,
  PRIMARY KEY(usuario),
  FOREIGN KEY(cod_empleado) REFERENCES EMPLEADO(cod_empleado)
);

CREATE TABLE RESERVA (
  cod_reserva INTEGER NOT NULL AUTO_INCREMENT,
  cod_tipo_pago INTEGER NOT NULL,
  cod_estado_reserva INTEGER NOT NULL,
  dni_cliente NUMERIC NOT NULL,
  usuario VARCHAR(20) NOT NULL,
  cod_habitacion INTEGER NOT NULL,
  fecha_entrada_reserva DATETIME NOT NULL,
  fecha_salida_reserva DATETIME NULL,
  precio_reserva DECIMAL(19,0) NULL,
  precio_total DECIMAL(19,0) NULL,
  PRIMARY KEY(cod_reserva),
  FOREIGN KEY(cod_habitacion) REFERENCES HABITACION(cod_habitacion),
  FOREIGN KEY(usuario) REFERENCES USUARIO(usuario),
  FOREIGN KEY(dni_cliente) REFERENCES CLIENTE(dni_cliente),
  FOREIGN KEY(cod_estado_reserva) REFERENCES ESTADO_RESERVA(cod_estado_reserva) ,
  FOREIGN KEY(cod_tipo_pago) REFERENCES TIPO_PAGO(cod_tipo_pago)
);

CREATE TABLE RESERVA_has_PRODUCTO (
  cod_reserva INTEGER NOT NULL,
  cod_producto INTEGER NOT NULL,
  cantidad INTEGER NULL,
  precio_detalle DECIMAL(19,0) NULL,
  PRIMARY KEY(cod_reserva, cod_producto),
  FOREIGN KEY(cod_reserva) REFERENCES RESERVA(cod_reserva),
  FOREIGN KEY(cod_producto) REFERENCES PRODUCTO(cod_producto)

);