# Host: localhost  (Version: 5.6.12-log)
# Date: 2016-01-23 10:24:11
# Generator: MySQL-Front 5.3  (Build 4.113)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "erp"
#

CREATE TABLE `erp` (
  `tipo_ident_erp` varchar(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `num_ident_erp` int(11) NOT NULL DEFAULT '0',
  `nombre_erp` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`num_ident_erp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# Structure for table "facturas"
#

CREATE TABLE `facturas` (
  `tipo_registro` int(11) DEFAULT NULL,
  `tipo_cobro` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prefijo_factura` varchar(2) CHARACTER SET utf8 DEFAULT NULL COMMENT 'hay que ver que atributo es',
  `numero_factura` bigint(11) NOT NULL DEFAULT '0',
  `indicador_actualizacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'hay que ver que atributo es',
  `valor_factura` int(11) DEFAULT NULL,
  `fecha_emision_factura` date DEFAULT NULL,
  `fecha_prestacion_factura` date DEFAULT NULL,
  `fecha_devolucion` date DEFAULT NULL,
  `valor_pagos_aplic` int(11) DEFAULT NULL,
  `valor_glosa` int(11) DEFAULT '0',
  `glosa_respuesta` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `saldo_factura` int(11) DEFAULT NULL,
  `estado_juridico` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `etapa_proceso` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL COMMENT 'registra el dia en que ingreso la factura',
  PRIMARY KEY (`numero_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# Structure for table "ips"
#

CREATE TABLE `ips` (
  `tipo_ident_ips` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `num_ident_ips` int(11) NOT NULL DEFAULT '0',
  `nombre_ips` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`num_ident_ips`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# Structure for table "pagos"
#

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` int(11) NOT NULL DEFAULT '0' COMMENT 'esto sirve para saber si es un registro nuevo o modificacion',
  `prefijo_factura` int(11) DEFAULT NULL,
  `num_factura_pagos` bigint(11) NOT NULL DEFAULT '0',
  `documento_aplicado` int(11) DEFAULT NULL,
  `fecha_documento` date DEFAULT NULL,
  `valor_abonado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=565 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# Structure for table "tabla_relacional"
#

CREATE TABLE `tabla_relacional` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_ident_erp` int(11) DEFAULT NULL,
  `numero_ident_ips` int(11) DEFAULT NULL,
  `numero_factura` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
