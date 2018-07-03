-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.17 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para laraguan_araguaneyes
CREATE DATABASE IF NOT EXISTS `laraguan_araguaneyes` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `laraguan_araguaneyes`;

-- Volcando estructura para tabla laraguan_araguaneyes.almacen
CREATE TABLE IF NOT EXISTS `almacen` (
  `idalmacen` int(11) NOT NULL AUTO_INCREMENT,
  `cod_almacen` varchar(10) NOT NULL DEFAULT '0',
  `nombre` varchar(20) NOT NULL DEFAULT '0',
  `descripcion` varchar(40) DEFAULT '0',
  PRIMARY KEY (`idalmacen`),
  KEY `fk_cod_almacen` (`cod_almacen`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.almacen: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `almacen` DISABLE KEYS */;
INSERT INTO `almacen` (`idalmacen`, `cod_almacen`, `nombre`, `descripcion`) VALUES
	(1, '01', 'directo', 'directo');
/*!40000 ALTER TABLE `almacen` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.arbols
CREATE TABLE IF NOT EXISTS `arbols` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL,
  `text` varchar(25) NOT NULL DEFAULT '',
  `vinculo` varchar(100) NOT NULL DEFAULT '',
  `padre_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.arbols: 21 rows
/*!40000 ALTER TABLE `arbols` DISABLE KEYS */;
INSERT INTO `arbols` (`id`, `tipo`, `text`, `vinculo`, `padre_id`) VALUES
	(1, 1, 'inventario', '', 0),
	(2, 1, 'Actualizar usuarios', 'javascript:menu(0)', 1),
	(3, 1, 'Cambiar plantillas', 'javascript:menu(1)', 1),
	(4, 1, 'Crear BD', 'javascript:menu(2)', 1),
	(5, 2, 'Mayorista', '', 0),
	(6, 2, 'Crear Transportistas', '', 5),
	(7, 2, 'Indicadores1', 'ejemplo01', 6),
	(8, 2, 'Indicadores2', 'ejemplo02', 6),
	(9, 2, 'Indicadores3', '', 6),
	(10, 2, 'Indicadores31', 'ejemplo03', 9),
	(11, 1, 'compras', '', 0),
	(12, 1, 'Crear Gastos', 'javascript:menu(0)', 11),
	(13, 1, 'Administrar Gastos', 'javascript:menu(1)', 11),
	(14, 1, 'Crear Proveedor', 'javascript:menu(1)', 11),
	(15, 1, 'Crear Trabajador', 'javascript:menu(1)', 11),
	(16, 1, 'Categorias', '', 1),
	(17, 1, 'Crear', 'javascript:menu(1)', 16),
	(18, 1, 'Administrar', 'javascript:menu(1)', 16),
	(19, 1, 'Presentacion', '', 1),
	(21, 1, 'Administrar', 'javascript:menu(1)', 19),
	(20, 1, 'Crear', 'javascript:menu(3)', 19);
/*!40000 ALTER TABLE `arbols` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.articulo
CREATE TABLE IF NOT EXISTS `articulo` (
  `idarticulo` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) unsigned zerofill DEFAULT '00000000000',
  `codigo` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` longtext,
  `imagen` varchar(100) DEFAULT NULL,
  `uso_interno` char(1) DEFAULT NULL,
  `usa_existencia` char(1) DEFAULT NULL,
  `es_siembra` char(1) DEFAULT NULL,
  `idcategoria` int(11) NOT NULL DEFAULT '1',
  `idpresentacion` int(11) NOT NULL DEFAULT '1',
  `cod_impuesto` varchar(3) DEFAULT '01',
  `cantidad_anterior` float(10,2) unsigned zerofill DEFAULT NULL,
  `cantidad_act` float(10,2) unsigned DEFAULT NULL,
  `costo_anterior` float(10,2) unsigned zerofill DEFAULT NULL,
  `costo_actual` float(10,2) unsigned DEFAULT NULL,
  `precio_anterior` float(10,2) unsigned DEFAULT NULL,
  `precio_actual` float(10,2) unsigned DEFAULT NULL,
  PRIMARY KEY (`idarticulo`),
  KEY `fki_articulo_presentacion` (`idpresentacion`),
  KEY `FK_articulo_impuesto` (`cod_impuesto`),
  KEY `Índice 4` (`idcategoria`),
  CONSTRAINT `FK_articulo_impuesto` FOREIGN KEY (`cod_impuesto`) REFERENCES `impuesto` (`cod_impuesto`),
  CONSTRAINT `pk_idarticulo_fk_idarticulo` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`),
  CONSTRAINT `pk_idarticulo_fk_idpresentacion` FOREIGN KEY (`idpresentacion`) REFERENCES `presentacion` (`idpresentacion`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 COMMENT='pendiemte uso interno';

-- Volcando datos para la tabla laraguan_araguaneyes.articulo: ~19 rows (aproximadamente)
/*!40000 ALTER TABLE `articulo` DISABLE KEYS */;


-- Volcando estructura para tabla laraguan_araguaneyes.banco
CREATE TABLE IF NOT EXISTS `banco` (
  `idbanco` int(11) NOT NULL AUTO_INCREMENT,
  `iddisponibilidad` int(11) DEFAULT NULL,
  `num_banco` int(11) DEFAULT NULL,
  `banco` varchar(50) DEFAULT NULL,
  `num_cheque` int(11) DEFAULT NULL,
  `saldo` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`idbanco`),
  KEY `fk` (`iddisponibilidad`),
  CONSTRAINT `FK_banco_disponibilidad` FOREIGN KEY (`iddisponibilidad`) REFERENCES `disponibilidad` (`iddisponibilidad`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.banco: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `banco` DISABLE KEYS */;
/*!40000 ALTER TABLE `banco` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.cambios
CREATE TABLE IF NOT EXISTS `cambios` (
  `idcambio` int(11) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `idarticulo` int(11) DEFAULT NULL,
  `cantida` float(10,2) DEFAULT NULL,
  `factor_cambio` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='trueques para hacer equivalencia de dinero';

-- Volcando datos para la tabla laraguan_araguaneyes.cambios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cambios` DISABLE KEYS */;
/*!40000 ALTER TABLE `cambios` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.cantidad_almacen
CREATE TABLE IF NOT EXISTS `cantidad_almacen` (
  `idcantidad_almacen` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcantidad_almacen`),
  KEY `Índice 2` (`idarticulo`),
  CONSTRAINT `FK__articulo2` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.cantidad_almacen: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cantidad_almacen` DISABLE KEYS */;
/*!40000 ALTER TABLE `cantidad_almacen` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` longtext,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.categoria: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`) VALUES
	(1, 'directo', 'directo'),
	(3, 'Fertilizantes', 'Insumos que permiten el rendimiento de cualquier cocecha'),
	(6, 'Herbicidas', ''),
	(7, 'Venenos', ''),
	(8, 'Maqu. Pesadas', ''),
	(9, 'Maq. Manuales', ''),
	(10, 'Abonos', ''),
	(11, 'Riego', ''),
	(12, 'Serv. Profesion', '');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `idtipocontribuyente` int(11) DEFAULT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `num_documento` varchar(11) NOT NULL,
  `razon_social` varchar(50) NOT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tipo_contribuyente` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idcliente`),
  KEY `Índice 2` (`idtipocontribuyente`),
  CONSTRAINT `FK_cliente_tipo_contribuyente` FOREIGN KEY (`idtipocontribuyente`) REFERENCES `tipo_contribuyente` (`idtipocontribuyente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.cliente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;

/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.cosecha
CREATE TABLE IF NOT EXISTS `cosecha` (
  `idcosecha` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cosecha` varchar(50) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `temporada` varchar(10) NOT NULL,
  PRIMARY KEY (`idcosecha`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.cosecha: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cosecha` DISABLE KEYS */;

/*!40000 ALTER TABLE `cosecha` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.creditos_disponibilidad
CREATE TABLE IF NOT EXISTS `creditos_disponibilidad` (
  `idcredito` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `credito` float(10,2) unsigned zerofill NOT NULL,
  `idingreso` int(11) DEFAULT NULL,
  `num_deposito` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_transanccion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idcredito`),
  KEY `fk_idingreso_pk_idingreso` (`idingreso`)
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla laraguan_araguaneyes.creditos_disponibilidad: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `creditos_disponibilidad` DISABLE KEYS */;

/*!40000 ALTER TABLE `creditos_disponibilidad` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.cuenta
CREATE TABLE IF NOT EXISTS `cuenta` (
  `idcuenta` int(11) NOT NULL AUTO_INCREMENT,
  `idcosecha` int(11) NOT NULL,
  `idtrabajador` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_comprobante` varchar(20) NOT NULL,
  `serie` varchar(4) NOT NULL,
  `correlativo` varchar(7) NOT NULL,
  `estado` varchar(7) NOT NULL,
  `base_imponible` float(10,2) unsigned NOT NULL DEFAULT '0.00',
  `total` float(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`idcuenta`),
  KEY `fk_idtrabajador` (`idtrabajador`),
  KEY `fk_idproveedor` (`idproveedor`),
  KEY `fk_idcosecha` (`idcosecha`),
  CONSTRAINT `FK_cuenta_cosecha` FOREIGN KEY (`idcosecha`) REFERENCES `cosecha` (`idcosecha`),
  CONSTRAINT `FK_cuenta_proveedor` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.cuenta: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;

/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.debitos_disponibilidad
CREATE TABLE IF NOT EXISTS `debitos_disponibilidad` (
  `iddebito` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `debito` float(10,2) unsigned zerofill NOT NULL,
  `idingreso` int(11) NOT NULL,
  PRIMARY KEY (`iddebito`),
  KEY `fk_idingreso_pk_idingreso_gastos` (`idingreso`)
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla laraguan_araguaneyes.debitos_disponibilidad: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `debitos_disponibilidad` DISABLE KEYS */;

/*!40000 ALTER TABLE `debitos_disponibilidad` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.detalle_almacen
CREATE TABLE IF NOT EXISTS `detalle_almacen` (
  `iddetalle_almacen` int(11) NOT NULL AUTO_INCREMENT,
  `cod_almacen` varchar(10) NOT NULL DEFAULT '0',
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` float NOT NULL,
  `uso_interno` char(1) NOT NULL,
  PRIMARY KEY (`iddetalle_almacen`),
  KEY `fk_cod_almacen` (`cod_almacen`),
  KEY `fk_idarticulo` (`idarticulo`),
  CONSTRAINT `FK_detalle_almacen_almacen` FOREIGN KEY (`cod_almacen`) REFERENCES `almacen` (`cod_almacen`),
  CONSTRAINT `FK_detalle_almacen_articulo` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.detalle_almacen: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_almacen` DISABLE KEYS */;

/*!40000 ALTER TABLE `detalle_almacen` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.detalle_ingreso
CREATE TABLE IF NOT EXISTS `detalle_ingreso` (
  `iddetalle_ingreso` int(11) NOT NULL AUTO_INCREMENT,
  `idingreso` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `precio_compra` decimal(18,4) NOT NULL,
  `precio_venta` decimal(18,4) DEFAULT NULL,
  `stock_actual` int(11) NOT NULL COMMENT 'cantidad comprada',
  `fecha_produccion` date DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  PRIMARY KEY (`iddetalle_ingreso`),
  KEY `fki_detalle_ingreso_ingreso` (`idingreso`),
  KEY `FK_detalle_ingreso_articulo` (`idarticulo`),
  CONSTRAINT `FK_detalle_ingreso_articulo` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`),
  CONSTRAINT `FK_detalle_ingreso_gastos` FOREIGN KEY (`idingreso`) REFERENCES `gastos` (`idingreso`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.detalle_ingreso: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_ingreso` DISABLE KEYS */;

/*!40000 ALTER TABLE `detalle_ingreso` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.detalle_movimiento_inventario
CREATE TABLE IF NOT EXISTS `detalle_movimiento_inventario` (
  `idmovimiento_inventario` int(11) NOT NULL AUTO_INCREMENT,
  `idtipomovimiento` int(11) DEFAULT NULL,
  `idarticulo` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `Fecha_hora` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idmovimiento_inventario`),
  KEY `Índice 2` (`idtipomovimiento`),
  KEY `Índice 3` (`idarticulo`),
  CONSTRAINT `FK__articulo_detalle` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`),
  CONSTRAINT `FK__tipo_movimiento_dettale` FOREIGN KEY (`idtipomovimiento`) REFERENCES `tipo_movimiento` (`idtipomovimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.detalle_movimiento_inventario: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_movimiento_inventario` DISABLE KEYS */;

/*!40000 ALTER TABLE `detalle_movimiento_inventario` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.detalle_venta
CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `iddetalle_ingreso` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(18,4) NOT NULL,
  `descuento` decimal(18,4) NOT NULL,
  PRIMARY KEY (`iddetalle_venta`),
  KEY `fki_detalleingreso_articulo` (`iddetalle_ingreso`),
  KEY `fki_detalle_venta_venta` (`idventa`),
  CONSTRAINT `fk_detalleingreso_articulo` FOREIGN KEY (`iddetalle_ingreso`) REFERENCES `articulo` (`idarticulo`),
  CONSTRAINT `fk_detalle_venta_detalle_ingreso` FOREIGN KEY (`iddetalle_ingreso`) REFERENCES `detalle_ingreso` (`iddetalle_ingreso`),
  CONSTRAINT `fk_detalle_venta_venta` FOREIGN KEY (`idventa`) REFERENCES `detalle_venta` (`iddetalle_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.detalle_venta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_venta` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.disponibilidad
CREATE TABLE IF NOT EXISTS `disponibilidad` (
  `iddisponibilidad` int(11) NOT NULL AUTO_INCREMENT,
  `monto` float(10,2) DEFAULT NULL,
  `debito` float(10,2) DEFAULT NULL,
  `credito` float(10,2) DEFAULT NULL,
  `total` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`iddisponibilidad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.disponibilidad: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `disponibilidad` DISABLE KEYS */;
INSERT INTO `disponibilidad` (`iddisponibilidad`, `monto`, `debito`, `credito`, `total`) VALUES
	(1, 0.00, 15000.00, 457000.00, 5411830.00);
/*!40000 ALTER TABLE `disponibilidad` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.gastos
CREATE TABLE IF NOT EXISTS `gastos` (
  `idingreso` int(11) NOT NULL AUTO_INCREMENT,
  `idtrabajador` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `idbanco` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `tipo_comprobante` varchar(20) NOT NULL,
  `serie` varchar(4) NOT NULL,
  `correlativo` varchar(7) NOT NULL,
  `igv` decimal(4,2) DEFAULT NULL,
  `estado` varchar(7) NOT NULL,
  `base_imponible` float(10,2) unsigned NOT NULL DEFAULT '0.00',
  `total` float(10,2) NOT NULL DEFAULT '0.00',
  `idcosecha` int(11) DEFAULT NULL,
  PRIMARY KEY (`idingreso`),
  KEY `fk_idtrabajador` (`idtrabajador`),
  KEY `fk_idproveedor` (`idproveedor`),
  KEY `fk_idcosecha_pk_idcosecha` (`idcosecha`),
  CONSTRAINT `FK_gastos_proveedor` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`),
  CONSTRAINT `fk_idcosecha_pk_idcosecha` FOREIGN KEY (`idcosecha`) REFERENCES `cosecha` (`idcosecha`),
  CONSTRAINT `fk_idtrabajado_pk_idtrabajador` FOREIGN KEY (`idtrabajador`) REFERENCES `trabajador` (`idtrabajador`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.gastos: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `gastos` DISABLE KEYS */;


-- Volcando estructura para tabla laraguan_araguaneyes.historia
CREATE TABLE IF NOT EXISTS `historia` (
  `idhistoria` int(11) NOT NULL AUTO_INCREMENT,
  `idproveedor` int(11) DEFAULT NULL,
  `idcuenta` int(11) DEFAULT NULL,
  `concepto` varchar(50) DEFAULT NULL COMMENT 'cargo/abono',
  `total` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`idhistoria`),
  KEY `idproveedor` (`idproveedor`),
  KEY `idcuenta` (`idcuenta`),
  CONSTRAINT `FK_historia_cuenta` FOREIGN KEY (`idcuenta`) REFERENCES `cuenta` (`idcuenta`),
  CONSTRAINT `FK_historia_proveedor` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.historia: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `historia` DISABLE KEYS */;

/*!40000 ALTER TABLE `historia` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.impuesto
CREATE TABLE IF NOT EXISTS `impuesto` (
  `idimpuesto` int(11) NOT NULL AUTO_INCREMENT,
  `cod_impuesto` varchar(3) NOT NULL,
  `nombre_impuesto` varchar(10) NOT NULL,
  `impuesto` float(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`idimpuesto`),
  KEY `key` (`cod_impuesto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='tabla que guarda los iva';

-- Volcando datos para la tabla laraguan_araguaneyes.impuesto: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `impuesto` DISABLE KEYS */;
/*!40000 ALTER TABLE `impuesto` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.movimiento_inventario
CREATE TABLE IF NOT EXISTS `movimiento_inventario` (
  `idmovimiento_inventario` int(11) NOT NULL AUTO_INCREMENT,
  `idtipomovimiento` int(11) DEFAULT NULL,
  `idarticulo` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idmovimiento_inventario`),
  KEY `Índice 2` (`idtipomovimiento`),
  KEY `Índice 3` (`idarticulo`),
  CONSTRAINT `FK__articulo` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`),
  CONSTRAINT `FK__tipo_movimiento` FOREIGN KEY (`idtipomovimiento`) REFERENCES `tipo_movimiento` (`idtipomovimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.movimiento_inventario: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `movimiento_inventario` DISABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.presentacion
CREATE TABLE IF NOT EXISTS `presentacion` (
  `idpresentacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` longtext,
  PRIMARY KEY (`idpresentacion`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.presentacion: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `presentacion` DISABLE KEYS */;
INSERT INTO `presentacion` (`idpresentacion`, `nombre`, `descripcion`) VALUES
	(1, 'directo', 'directo'),
	(2, 'prueba', 'para pruebas'),
	(3, 'Kilogramos', ''),
	(4, 'Bolsas', ''),
	(5, 'Sacos', ''),
	(6, 'Litros', ''),
	(7, 'Metros', '');
/*!40000 ALTER TABLE `presentacion` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.proveedor
CREATE TABLE IF NOT EXISTS `proveedor` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(150) NOT NULL,
  `sector_comercial` varchar(50) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `num_documento` varchar(11) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.proveedor: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.recoleccion
CREATE TABLE IF NOT EXISTS `recoleccion` (
  `idrecoleccion` int(11) NOT NULL AUTO_INCREMENT,
  `idcosecha` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `fecha_recolecta` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `comentario` varchar(50) DEFAULT NULL,
  `idtipomovimiento` int(11) DEFAULT NULL,
  `cantidad_recogida` float(10,2) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`idrecoleccion`),
  KEY `Índice 2` (`idtipomovimiento`),
  KEY `Índice 3` (`idcosecha`),
  KEY `Índice 4` (`idarticulo`),
  CONSTRAINT `FK_recoleccion_articulo` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`),
  CONSTRAINT `FK_recoleccion_cosecha` FOREIGN KEY (`idcosecha`) REFERENCES `cosecha` (`idcosecha`),
  CONSTRAINT `FK_reoleccion_tipo_movimiento` FOREIGN KEY (`idtipomovimiento`) REFERENCES `tipo_movimiento` (`idtipomovimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='tabla para definir la recoleccion del producto y agregar una caducidad para la venta';

-- Volcando datos para la tabla laraguan_araguaneyes.recoleccion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `recoleccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `recoleccion` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.tbl_audit_trail
CREATE TABLE IF NOT EXISTS `tbl_audit_trail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `old_value` varchar(50) DEFAULT NULL,
  `new_value` varchar(50) DEFAULT NULL,
  `action` varchar(50) NOT NULL DEFAULT '0',
  `model` varchar(50) NOT NULL DEFAULT '0',
  `field` varchar(50) NOT NULL DEFAULT '0',
  `stamp` datetime NOT NULL,
  `user_id` varchar(50) DEFAULT '0',
  `model_id` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_audit_trail_user_id` (`model_id`),
  KEY `idx_audit_trail_model` (`model`),
  KEY `idx_audit_trail_field` (`field`),
  KEY `idx_audit_trail_old_value` (`old_value`),
  KEY `idx_audit_trail_new_value` (`new_value`),
  KEY `idx_audit_trail_action` (`action`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.tbl_audit_trail: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_audit_trail` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_audit_trail` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.tbl_help
CREATE TABLE IF NOT EXISTS `tbl_help` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(64) DEFAULT NULL,
  `tittle_et` varchar(256) DEFAULT NULL,
  `content_et` text,
  `tittle_en` varchar(64) DEFAULT NULL,
  `content_en` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla de contenido de ayuda para yii necesesario sesion';

-- Volcando datos para la tabla laraguan_araguaneyes.tbl_help: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_help` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_help` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.tbl_menu
CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `rowid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `position` int(11) NOT NULL,
  `url` varchar(50) NOT NULL,
  PRIMARY KEY (`rowid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.tbl_menu: ~29 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_menu` DISABLE KEYS */;

--verifica tu ruta--
INSERT INTO `tbl_menu` (`rowid`, `id`, `parent_id`, `label`, `position`, `url`) VALUES
	(0, 30, 22, 'Recolectar', 3, '/sga/index.php/es/recoleccion/index'),
	(1, 1, 0, 'ini', 1, '..'),
	(2, 2, 1, 'Inventario', 2, '/sga/index.php/es/articulo/index'),
	(3, 3, 1, 'Gastos', 3, '/sga/index.php/es/gastos/index'),
	(4, 4, 2, 'Categorias', 2, '/sga/index.php/es/categoria/index'),
	(5, 5, 2, 'Presentacion', 1, '/sga/index.php/es/presentacion/index'),
	(6, 6, 2, 'Articulo', 3, '/sga/index.php/es/articulo/index'),
	(7, 7, 4, 'Gestionar', 1, '/sga/index.php/es/categoria/admin'),
	(8, 8, 4, 'Crear', 2, '/sga/index.php/es/categoria/create'),
	(9, 9, 5, 'Gestionar', 1, '/sga/index.php/es/presentacion/admin'),
	(10, 10, 5, 'Crear', 2, '/sga/index.php/es/presentacion/create'),
	(11, 11, 6, 'Gestionar', 1, '/sga/index.php/es/articulo/admin'),
	(12, 12, 6, 'Crear', 2, '/sga/index.php/es/articulo/create'),
	(13, 13, 3, 'Gestionar', 1, '/sga/index.php/es/gastos/admin'),
	(14, 14, 3, 'Crear', 2, '/sga/index.php/es/gastos/create'),
	(15, 15, 1, 'Banco', 4, '/sga/index.php/es/banco/index'),
	(16, 16, 15, 'Gestionar', 1, '/sga/index.php/es/banco/admin'),
	(17, 17, 15, 'Crear', 2, '/sga/index.php/es/banco/create'),
	(18, 18, 3, 'Proveedor', 4, '/sga/index.php/es/proveedor/index'),
	(19, 19, 18, 'Gestionar', 1, '/sga/index.php/es/proveedor/admin'),
	(20, 20, 18, 'Crear', 2, '/sga/index.php/es/proveedor/create'),
	(22, 22, 1, 'Cosecha', 1, '/sga/index.php/es/cosecha/index'),
	(23, 23, 22, 'Gestionar', 1, '/sga/index.php/es/cosecha/admin'),
	(24, 24, 22, 'Crear', 2, '/sga/index.php/es/cosecha/create'),
	(25, 25, 25, 'CXP', 3, '/sga/index.php/es/cuenta/admin'),
	(26, 26, 999, 'Trabajador', 1, '/sga/index.php/es/trabajador/index'),
	(27, 27, 26, 'Gestionar', 1, '/sga/index.php/es/trabajador/admin'),
	(28, 28, 26, 'Crear', 2, '/sga/index.php/es/trabajador/create'),
	(29, 29, 2, 'Movimiento De Inventario', 4, '/sga/index.php/es/movimientoInventario/create'),
	(30, 0, 0, '', 0, ''),
	(31, 31, 30, 'Gestionar', 1, '/sga/index.php/es/recoleccion/admin'),
	(32, 32, 30, 'Crear', 2, '/sga/index.php/es/recoleccion/create'),
	(999, 999, 1, 'Utilidades', 5, '#'),
	(1000, 1000, 1, 'salir', 5, '/sga/index.php/es/site/logout');
/*!40000 ALTER TABLE `tbl_menu` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.test1
CREATE TABLE IF NOT EXISTS `test1` (
  `a1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.test1: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `test1` DISABLE KEYS */;
INSERT INTO `test1` (`a1`) VALUES
	(1),
	(2),
	(4),
	(4);
/*!40000 ALTER TABLE `test1` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.test2
CREATE TABLE IF NOT EXISTS `test2` (
  `a2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.test2: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `test2` DISABLE KEYS */;
INSERT INTO `test2` (`a2`) VALUES
	(1),
	(2),
	(4),
	(4);
/*!40000 ALTER TABLE `test2` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.test3
CREATE TABLE IF NOT EXISTS `test3` (
  `a3` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`a3`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.test3: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `test3` DISABLE KEYS */;
INSERT INTO `test3` (`a3`) VALUES
	(3),
	(5),
	(6),
	(7),
	(8),
	(9),
	(10);
/*!40000 ALTER TABLE `test3` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.test4
CREATE TABLE IF NOT EXISTS `test4` (
  `a4` int(11) NOT NULL AUTO_INCREMENT,
  `b4` int(11) DEFAULT '0',
  PRIMARY KEY (`a4`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.test4: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `test4` DISABLE KEYS */;
INSERT INTO `test4` (`a4`, `b4`) VALUES
	(1, 1),
	(2, 1),
	(3, 0),
	(4, 2),
	(5, 0),
	(6, 0),
	(7, 0),
	(8, 0),
	(9, 0),
	(10, 0);
/*!40000 ALTER TABLE `test4` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.tipo_contribuyente
CREATE TABLE IF NOT EXISTS `tipo_contribuyente` (
  `idtipocontribuyente` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idtipocontribuyente`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.tipo_contribuyente: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_contribuyente` DISABLE KEYS */;
INSERT INTO `tipo_contribuyente` (`idtipocontribuyente`, `codigo`, `nombre`) VALUES
	(1, '01', 'ORDINARIO'),
	(2, '02', 'NO CONTRIBUYENTE'),
	(3, '03', 'EXONERADOS'),
	(4, '04', 'CONTRIBUYENTE FORMAL'),
	(5, '05', 'GOBIERNO'),
	(6, '06', 'EXPORTACION/EXTRANGERO'),
	(7, '07', 'ISVM');
/*!40000 ALTER TABLE `tipo_contribuyente` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.tipo_movimiento
CREATE TABLE IF NOT EXISTS `tipo_movimiento` (
  `idtipomovimiento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idtipomovimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.tipo_movimiento: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_movimiento` DISABLE KEYS */;
INSERT INTO `tipo_movimiento` (`idtipomovimiento`, `nombre`, `descripcion`) VALUES
	(1, 'entrada', 'entrada manual por cargo'),
	(2, 'entrada cosecha', 'entrada por recolecciond e cosecha'),
	(3, 'entrada compra', 'entrada por compra'),
	(4, 'salida', 'salida de forma manual'),
	(5, 'salida por daño', 'salida por daño de la mercancia ejemplo vencida'),
	(6, 'salida por venta', 'salida por venta');
/*!40000 ALTER TABLE `tipo_movimiento` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.trabajador
CREATE TABLE IF NOT EXISTS `trabajador` (
  `idtrabajador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `fecha_nac` date NOT NULL,
  `num_documento` varchar(8) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `acceso` varchar(20) NOT NULL,
  PRIMARY KEY (`idtrabajador`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.trabajador: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `trabajador` DISABLE KEYS */;
/*!40000 ALTER TABLE `trabajador` ENABLE KEYS */;

-- Volcando estructura para tabla laraguan_araguaneyes.venta
CREATE TABLE IF NOT EXISTS `venta` (
  `idventa` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `razon_social` varchar(50) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_comprobante` varchar(20) NOT NULL,
  `serie` varchar(4) NOT NULL,
  `correlativo` varchar(7) NOT NULL,
  `iva1` float(4,2) unsigned zerofill NOT NULL,
  `iva2` float(4,2) unsigned zerofill NOT NULL,
  `iva3` float(4,2) unsigned zerofill NOT NULL,
  `base_imponible` float(10,2) unsigned zerofill NOT NULL,
  `total` float(10,2) NOT NULL,
  PRIMARY KEY (`idventa`),
  KEY `Índice 2` (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla laraguan_araguaneyes.venta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;

-- Volcando estructura para disparador laraguan_araguaneyes.actualizar_disponibilidad_por_credito
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `actualizar_disponibilidad_por_credito` AFTER INSERT ON `creditos_disponibilidad` FOR EACH ROW BEGIN
UPDATE disponibilidad SET credito = NEW.credito WHERE new.credito > 0;
UPDATE disponibilidad SET total = total + NEW.credito WHERE new.credito > 0;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador laraguan_araguaneyes.actualizar_gasto_banco
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `actualizar_gasto_banco` AFTER UPDATE ON `gastos` FOR EACH ROW BEGIN
UPDATE debitos_disponibilidad set debito = NEW.total WHERE idingreso = NEW.idingreso;
UPDATE banco set banco.saldo= banco.saldo - NEW.total WHERE banco.idbanco = NEW.idbanco;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador laraguan_araguaneyes.actualiza_cheque
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `actualiza_cheque` AFTER INSERT ON `debitos_disponibilidad` FOR EACH ROW BEGIN
UPDATE banco set num_cheque = num_cheque + 1 where new.debito > 0;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador laraguan_araguaneyes.agregar_art_almacen
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `agregar_art_almacen` AFTER INSERT ON `detalle_almacen` FOR EACH ROW BEGIN
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador laraguan_araguaneyes.agregar_credito_debito
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `agregar_credito_debito` BEFORE DELETE ON `gastos` FOR EACH ROW BEGIN
INSERT INTO creditos_disponibilidad values ( idcredito,"eliminacion/devolucion de factura",old.total,old.idingreso, num_deposito, tipo_transanccion);
INSERT INTO debitos_disponibilidad values (iddebito,"devolucion/eliminacion de factura", 0, old.idingreso);
delete from detalle_ingreso where idingreso = OLD.idingreso;

UPDATE banco SET saldo =  saldo + old.total;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador laraguan_araguaneyes.agregar_debito_credito
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `agregar_debito_credito` AFTER INSERT ON `gastos` FOR EACH ROW BEGIN
INSERT INTO debitos_disponibilidad values ( iddebito,"compra",NEW.total,new.idingreso) ;
INSERT INTO creditos_disponibilidad values ( idcredito,"se inserta en 0 debido a la compra",0,new.idingreso,num_deposito, tipo_transanccion);
UPDATE banco SET SALDO =  SALDO - new.total;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador laraguan_araguaneyes.agregar_movimieto_cant_almacen
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `agregar_movimieto_cant_almacen` AFTER INSERT ON `recoleccion` FOR EACH ROW BEGIN
INSERT INTO detalle_movimiento_inventario (idtipomovimiento, idarticulo, cantidad, descripcion)VALUES(NEW.idtipomovimiento, NEw.idarticulo, NEW.cantidad_recogida, "cargo por recoleccion de cosecha");
UPDATE articulo set articulo.cantidad_anterior= articulo.cantidad_act WHERE articulo.idarticulo=NEW.idarticulo;
UPDATE articulo set articulo.cantidad_act= articulo.cantidad_act+NEW.cantidad_recogida WHERE articulo.idarticulo=NEW.idarticulo;

END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador laraguan_araguaneyes.detalle_ingreso_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `detalle_ingreso_after_insert` AFTER INSERT ON `detalle_ingreso` FOR EACH ROW BEGIN
INSERT INTO detalle_movimiento_inventario (idtipomovimiento, idarticulo, cantidad, descripcion)VALUES(3, NEw.idarticulo, NEW.stock_actual, "cargo por compra" );
UPDATE articulo set articulo.cantidad_anterior= articulo.cantidad_act WHERE articulo.idarticulo=NEW.idarticulo;
UPDATE articulo set articulo.cantidad_act= articulo.cantidad_act+NEW.stock_actual WHERE articulo.idarticulo=NEW.idarticulo;
UPDATE articulo set articulo.costo_anterior= articulo.costo_actual WHERE articulo.idarticulo=NEW.idarticulo;

UPDATE articulo set articulo.costo_actual = NEW.precio_compra WHERE articulo.idarticulo=NEW.idarticulo;
UPDATE articulo set articulo.precio_anterior = articulo.precio_actual WHERE articulo.idarticulo=NEW.idarticulo;

UPDATE articulo set articulo.precio_actual = NEW.precio_venta WHERE articulo.idarticulo=NEW.idarticulo;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador laraguan_araguaneyes.gastos_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `gastos_before_insert` BEFORE INSERT ON `gastos` FOR EACH ROW BEGIN
IF NEW.estado = "CXP" THEN
INSERT INTO cuenta (idcosecha,idtrabajador,idproveedor,fecha,tipo_comprobante,serie,correlativo,estado,base_imponible,total)VALUES(NEW.idcosecha,NEW.idtrabajador,NEW.idproveedor,NEW.fecha,NEW.tipo_comprobante,NEW.serie,NEW.correlativo,NEW.estado,NEW.base_imponible,NEW.total);
SET NEW.total = 0;
SET NEW.base_imponible=0;
END IF;
end//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador laraguan_araguaneyes.historia_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `historia_after_insert` AFTER INSERT ON `historia` FOR EACH ROW BEGIN
UPDATE cuenta SET total =  total - new.total WHERE idcuenta = new.idcuenta;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador laraguan_araguaneyes.movimiento_inventario_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `movimiento_inventario_after_insert` AFTER INSERT ON `movimiento_inventario` FOR EACH ROW BEGIN
UPDATE articulo set articulo.cantidad_anterior= articulo.cantidad_act WHERE articulo.idarticulo=NEW.idarticulo;
IF NEW.idtipomovimiento = 4 THEN
UPDATE articulo set articulo.cantidad_act= articulo.cantidad_act-NEW.cantidad WHERE articulo.idarticulo=NEW.idarticulo;
ELSE
UPDATE articulo set articulo.cantidad_act= articulo.cantidad_act+NEW.cantidad WHERE articulo.idarticulo=NEW.idarticulo;
END IF;
INSERT INTO detalle_movimiento_inventario (idtipomovimiento, idarticulo, cantidad, descripcion)VALUES(new.idtipomovimiento, NEw.idarticulo, NEW.cantidad, NEW.descripcion );
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador laraguan_araguaneyes.testref
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `testref` BEFORE INSERT ON `test1` FOR EACH ROW BEGIN
    INSERT INTO test2 SET a2 = NEW.a1;
    DELETE FROM test3 WHERE a3 = NEW.a1;  
    UPDATE test4 SET b4 = b4 + 1 WHERE a4 = NEW.a1;
  END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
