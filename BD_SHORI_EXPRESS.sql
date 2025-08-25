CREATE DATABASE IF NOT EXISTS SHORI_EXPRESS;
USE SHORI_EXPRESS;

CREATE TABLE ROL (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE USUARIO (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) NOT NULL UNIQUE,
	contrasena_usuario VARCHAR(255) NOT NULL,
    correo_usuario VARCHAR(100) NOT NULL UNIQUE,
    estado_usuario ENUM('activo', 'inactivo') DEFAULT 'activo',
    fecha_registro_usuario TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_rol INT NOT NULL,
    FOREIGN KEY (id_rol) REFERENCES rol(id_rol)
);

CREATE TABLE CLIENTE (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre_completo_cliente VARCHAR(150) NOT NULL,
    telefono_cliente VARCHAR(20),
    direccion_cliente VARCHAR(100),
	id_usuario INT NOT NULL UNIQUE,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE EMPLEADO (
    id_empleado INT AUTO_INCREMENT PRIMARY KEY,
    documento_empleado VARCHAR (10) UNIQUE NOT NULL,
    tipo_documento_empleado ENUM ('CC', 'TI', 'PET', 'PPT','Pasaporte'),
    nombre_completo_empleado VARCHAR(100) NOT NULL,
    cargo_empleado VARCHAR(50),
    telefono_empleado VARCHAR(20),
    id_usuario INT NOT NULL UNIQUE,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE MATERIA_PRIMA (
    id_materia_prima INT AUTO_INCREMENT PRIMARY KEY,
    nombre_materia_prima VARCHAR(100) NOT NULL,
    categoria_materia_prima VARCHAR (50) NOT NULL,
    unidad_medida_materia_prima ENUM('kg', 'g', 'unidad', 'ml', 'l') NULL ,
    descripcion_materia_prima VARCHAR(200),
    precio_materia_prima DECIMAL(10,2) NOT NULL,
    stock_materia_prima INT DEFAULT 0,
    estado_materia_prima ENUM('disponible', 'reservada', 'en preparación', 'agotada', 'caducada', 'en mal estado', 'devuelta', 'pendiente de ingreso', 'bloqueada', 'preparada', 'en proceso de descongelación') DEFAULT 'disponible' NOT NULL,
    fecha_registro_materia_prima  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_vencimiento_materia_prima  DATE NOT NULL
);

CREATE TABLE PRODUCTO_TERMINADO (
	id_producto_terminado INT AUTO_INCREMENT PRIMARY KEY,
    cantidad_producto_terminado INT NOT NULL,
    nombre_producto_terminado VARCHAR (100) NOT NULL,
    descripcion_producto_terminado VARCHAR (200) ,
    precio_venta_producto_terminado DECIMAL(10,2) NOT NULL,
    categoria_producto_terminado VARCHAR (50) NOT NULL,
    fecha_fabricacion_producto_terminado DATETIME NOT NULL
);

CREATE TABLE DETALLE_PRODUCTO_FINAL (
	id_detalle_producto_final INT AUTO_INCREMENT PRIMARY KEY,
	id_materia_prima INT NOT NULL,
    id_producto_terminado INT NOT NULL,
    cantidad_utilizada INT NOT NULL,
    unidad_medida_deta ENUM('kg', 'g', 'unidad', 'ml', 'l') ,
    observaciones_detalle TEXT NOT NULL,
    FOREIGN KEY (id_materia_prima) REFERENCES materia_prima(id_materia_prima),
    FOREIGN KEY (id_producto_terminado) REFERENCES producto_terminado (id_producto_terminado)
);

CREATE TABLE ENTRADA_INVENTARIO (
    id_entrada INT AUTO_INCREMENT PRIMARY KEY,
    cantidad_entrada INT NOT NULL,
    precio_unitario DECIMAL(10,2) NOT NULL,
    fecha_entrada DATETIME DEFAULT CURRENT_TIMESTAMP,
    descripcion_entrada VARCHAR(200) NOT NULL,
    id_materia_prima INT NOT NULL,
    id_empleado INT NOT NULL,
	FOREIGN KEY (id_materia_prima) REFERENCES materia_prima(id_materia_prima),
    FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado)
);

CREATE TABLE ENTRADA_DEVOLUCION (
	id_devolucion INT AUTO_INCREMENT PRIMARY KEY,
    descripcion_devolucion VARCHAR (200) NOT NULL,
    fecha_devolucion DATETIME NOT NULL,
    tipo_devolucion VARCHAR (30) NOT NULL,
    motivo_devolucion VARCHAR (50) NOT NULL,
    cantidad_devolucion INT NOT NULL,
    unidad_medida_devolucion VARCHAR (10) NOT NULL,
    id_entrada INT NOT NULL,
    FOREIGN KEY (id_entrada) REFERENCES entrada_inventario (id_entrada)
 );


CREATE TABLE PEDIDO (
    id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    fecha_pedido DATETIME DEFAULT CURRENT_TIMESTAMP,
    descripcion_pedido VARCHAR (200) NOT NULL,
    estado_pedido ENUM('pendiente', 'preparación', 'en camino', 'entregado', 'cancelado') DEFAULT 'pendiente',
    total_pedido DECIMAL(10,2) DEFAULT 0,
    id_cliente INT NOT NULL,
    id_empleado INT NOT NULL,
    FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado),
    FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)
);

CREATE TABLE FACTURA (
	id_factura INT AUTO_INCREMENT PRIMARY KEY,
    numero_factura VARCHAR(20) NOT NULL UNIQUE,  
    fecha_emision DATETIME DEFAULT CURRENT_TIMESTAMP,
    nombre_cliente VARCHAR(100) NOT NULL,
    documento_cliente VARCHAR(20),
    subtotal DECIMAL(10,2) NOT NULL,
    iva DECIMAL(10,2) NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    forma_pago VARCHAR(50),
	id_pedido INT NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido)
);

CREATE TABLE BONO (
    id_bono INT AUTO_INCREMENT PRIMARY KEY,
    puntos_acumulados_bono INT DEFAULT 0,
    puntos_necesarios_bono INT DEFAULT 5,
    estado_bono ENUM('disponible', 'redimido', 'no disponible') DEFAULT 'no disponible',
    fecha_actualizacion_bono TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    id_cliente INT NOT NULL,
    id_pedido INT NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES PEDIDO (id_pedido),
    FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)
);


CREATE TABLE REDENCION_BONO (
    id_redencion INT AUTO_INCREMENT PRIMARY KEY,
    id_bono INT NOT NULL,
    id_empleado INT NOT NULL,
    fecha_redencion DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_bono) REFERENCES bono(id_bono),
    FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado)
);







