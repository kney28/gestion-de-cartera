# Host: localhost  (Version: 5.6.12-log)
# Date: 2016-01-23 10:23:45
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
# Data for table "erp"
#

INSERT INTO `erp` VALUES ('NI',800088702,'EPSSURA'),('NI',800140949,'Cafesaludcontributivo'),('NI',800249241,'Coosalud'),('NI',800250119,'Saludcoop'),('NI',800251440,'Saludsanitas'),('NI',804002105,'Comparta'),('NI',805000427,'Coomeva'),('NI',805004565,'Calisaludenliquidacion'),('NI',806008394,'AsociacionMutualSer'),('NI',809008362,'Pijaossalud'),('NI',811004055,'EmdisaludESS'),('NI',814000337,'EmssanarESS'),('NI',814000608,'SaludCondor'),('NI',817000248,'AsmetSalud'),('NI',817001773,'AsociacionIndigenadelCaucaAIC'),('NI',818000140,'Barriosunidos'),('NI',830003564,'Famisanar'),('NI',830006404,'Humanavivir'),('NI',830009783,'Cruzblanca'),('NI',830074184,'Saludvida'),('NI',830113831,'Aliansaludeps'),('NI',832000760,'EcoopsosESS'),('NI',846000244,'Comfacor'),('NI',860013570,'CAFAM'),('NI',860066942,'Compesar'),('NI',890102044,'Cajadecompensacionfamiliarcajacopi'),('NI',890303093,'Comfenalco'),('NI',890900841,'CajadeComfamiliarAntioquia'),('NI',899999026,'CaprecomEPSS'),('NI',900156264,'Nuevaeps'),('NI',900298372,'CapitalSalud'),('NI',900372442,'SaludTotal'),('NI',900604350,'Alianzamedellinantioquia');

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
# Data for table "facturas"
#

INSERT INTO `facturas` VALUES (2,'F','',1075829,'A',7200,'2015-03-02','2015-03-02','2015-03-02',500,6000,'SI',700,'NO','0','2015-03-03'),(2,'F','',1076501,'I',3300,'2015-03-04','2015-03-04','2015-03-04',2200,0,'NO',1100,'NO','0','2015-03-04'),(2,'F','',1076835,'I',9350,'2015-03-02','2015-03-02','2015-03-02',8000,1350,'SI',0,'NO','0','2015-03-04'),(2,'F','',1083985,'A',158000,'2015-02-28','2015-02-28','2015-03-02',158000,0,'NO',0,'NO','0','2015-03-04'),(2,'F','',1099348,'I',22300,'2015-03-03','2015-03-03','2015-03-04',22000,300,'SI',0,'NO','0','2015-03-04'),(2,'F','',1099384,'I',30000,'2015-03-04','2015-03-04','2015-03-04',21000,0,'NO',9000,'NO','0','2015-03-04'),(2,'F','',1110803,'A',12000,'2015-03-03','2015-03-03','2015-03-03',12000,0,'NO',0,'NO','0','2015-03-03');

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
# Data for table "ips"
#

INSERT INTO `ips` VALUES ('NIT',1113594470,'HOSPITAL OBANDO');

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
# Data for table "pagos"
#

INSERT INTO `pagos` VALUES (559,1,11,1099365,0,'2011-02-14',22300),(561,1,11,1099392,0,'2011-02-14',13000),(562,1,11,1099469,0,'2011-02-14',15000),(563,1,11,1099471,0,'2011-02-14',22300),(564,1,11,1099500,0,'2011-02-14',7000);

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

#
# Data for table "tabla_relacional"
#

INSERT INTO `tabla_relacional` VALUES (32,805000427,2147483647,1110803),(33,800249241,2147483647,1075829),(34,805000427,2147483647,1076501),(35,818000140,2147483647,1076835),(36,818000140,2147483647,1083985),(37,800249241,2147483647,1099348),(39,800249241,2147483647,1099384);
