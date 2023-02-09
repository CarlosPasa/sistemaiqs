CREATE TABLE `factura` (
  `id` int(11) NOT null AUTO_INCREMENT,
  `serie` varchar(5) NOT NULL,
  `correlativo` varchar(20) NOT NULL,
  estado INT not null,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `factura_detalle` (
  `id` int(11) NOT null AUTO_INCREMENT,
  id_factura INT not null,
  `id_producto` int NOT NULL,
 cantidad INT not null,
 precio DECIMAL(18,2) not null,
  estado INT not null,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `producto` (
  `id` int(11) NOT null AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  estado INT not null,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO producto (nombre, estado, created_at, updated_at)
VALUES('Libro', 1, CURRENT_TIMESTAMP, '0000-00-00 00:00:00');
INSERT INTO producto (nombre, estado, created_at, updated_at)
VALUES('Cuaderno', 1, CURRENT_TIMESTAMP, '0000-00-00 00:00:00');
INSERT INTO producto (nombre, estado, created_at, updated_at)
VALUES('Lapicero', 1, CURRENT_TIMESTAMP, '0000-00-00 00:00:00');
INSERT INTO producto (nombre, estado, created_at, updated_at)
VALUES('Lapiz', 1, CURRENT_TIMESTAMP, '0000-00-00 00:00:00');


INSERT INTO menu (name,title,icon,type_object,`object`,`order`,menu_padre_id,estado,created_at,updated_at)
VALUES ('factura','Factura','fa fa-dollar','Action','/factura','1',0,1,NOW(),NOW())

INSERT INTO role_menus (`role`,menu) VALUES 
(1,'factura')

INSERT INTO permissions (title, code) values
('factura_list', 'factura_list'),
('factura_add', 'factura_add'),
('factura_edit', 'factura_edit'),
('factura_delete', 'factura_delete'),
('factura_view', 'factura_view'),
('factura_detalle_list', 'factura_detalle_list'),
('factura_detalle_add', 'factura_detalle_add'),
('factura_detalle_edit', 'factura_detalle_edit'),
('factura_detalle_delete', 'factura_detalle_delete'),
('factura_detalle_view', 'factura_detalle_view');

INSERT INTO `role_permissions` (`role`, `permission`) VALUES
(1, 'factura_list'),
(1, 'factura_add'),
(1, 'factura_edit'),
(1, 'factura_delete'),
(1, 'factura_view');

INSERT INTO `role_permissions` (`role`, `permission`) VALUES
(1, 'factura_detalle_list'),
(1, 'factura_detalle_add'),
(1, 'factura_detalle_edit'),
(1, 'factura_detalle_delete'),
(1, 'factura_detalle_view');


CREATE TABLE `q_obra` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `o_nombre` varchar(250) DEFAULT NULL,
  `o_id_tseleccion` tinyint(4) DEFAULT NULL,
  `o_id_tcontratacion` tinyint(4) DEFAULT NULL,
  `o_nro_proceso` varchar(3) DEFAULT NULL,
  `o_monto` decimal(10,0) DEFAULT NULL,
  `o_monto_contractual` decimal(10,0) DEFAULT NULL,
  `o_fecha_inicio` date DEFAULT NULL,
  `o_contracto` varchar(30) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `o_alias` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


INSERT INTO permissions (title, code) values
('obra_list','obra_list'),
('obra_add','obra_add'),
('obra_edit','obra_edit'),
('obra_delete','obra_delete'),
('obra_view','obra_view');


INSERT INTO `role_permissions` (`role`, `permission`) VALUES
(1, 'obra_list'),
(1, 'obra_add'),
(1, 'obra_edit'),
(1, 'obra_delete'),
(1, 'obra_view');

INSERT INTO role_menus (`role`,menu) VALUES 
(1,'obra')

INSERT INTO menu (name,title,icon,type_object,`object`,`order`,menu_padre_id,estado,created_at,updated_at)
VALUES ('obra','Obra','fa fa-dollar','Action','/obra','1',0,1,NOW(),NOW())
