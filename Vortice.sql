# ************************************************************
# Antares - SQL Client
# Version 0.7.16
# 
# https://antares-sql.app/
# https://github.com/antares-sql/antares
# 
# Host: localhost (MySQL Community Server  5.7.24)
# Database: vortice
# Generation time: 2023-09-04T18:08:25-06:00
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table clientes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` char(20) NOT NULL,
  `apellido` char(20) NOT NULL,
  `telefono` char(20) NOT NULL,
  `correo` char(30) NOT NULL,
  `medio` int(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Clientes registrados.';

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;

INSERT INTO `clientes` (`ID`, `nombre`, `apellido`, `telefono`, `correo`, `medio`) VALUES
	(1, "Isabella", "Gonzalez", "312-345-7656", "isabella@gmail.com", 1),
	(2, "Rocio", "Martinez", "312-307-0769", "rociom89@hotmail.com", 3),
	(3, "Jason", "Bourne", "324-545-7865", "jbourne@cia.gov", 2),
	(4, "Daniella", "Gonzalez", "312-123-4567", "daniella@ghost.com", 2);

/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table conceptos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `conceptos`;

CREATE TABLE `conceptos` (
  `ID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` char(40) NOT NULL,
  `precio` int(10) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Diferentes conceptos de servicios que ofrecemos.';

LOCK TABLES `conceptos` WRITE;
/*!40000 ALTER TABLE `conceptos` DISABLE KEYS */;

INSERT INTO `conceptos` (`ID`, `nombre`, `precio`, `tipo`) VALUES
	(1, "Grabado Sencillo de Termo", 100, 2),
	(2, "Grabado doble de Termo", 150, 2),
	(3, "Termo 30oz", 450, 1);

/*!40000 ALTER TABLE `conceptos` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table estados
# ------------------------------------------------------------

DROP TABLE IF EXISTS `estados`;

CREATE TABLE `estados` (
  `ID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` char(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Diferentes etapas de un trabajo.';

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;

INSERT INTO `estados` (`ID`, `nombre`) VALUES
	(1, "Diseño"),
	(2, "Revisión"),
	(3, "Aprobado"),
	(4, "Terminado"),
	(5, "Entregado");

/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table medios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `medios`;

CREATE TABLE `medios` (
  `ID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descripcion` char(40) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Medio por el cual nos conocieron';

LOCK TABLES `medios` WRITE;
/*!40000 ALTER TABLE `medios` DISABLE KEYS */;

INSERT INTO `medios` (`ID`, `descripcion`) VALUES
	(1, "Recomendación"),
	(2, "Publicidad Facebook"),
	(3, "Buscó en Facebook"),
	(4, "Casa");

/*!40000 ALTER TABLE `medios` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table tickets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tickets`;

CREATE TABLE `tickets` (
  `ID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `ID_cliente` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `ID_estado` tinyint(4) NOT NULL,
  `anticipo` int(10) NOT NULL,
  `pagado` tinyint(1) NOT NULL,
  `total` int(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Ventas por cliente.';

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;

INSERT INTO `tickets` (`ID`, `ID_cliente`, `fecha`, `ID_estado`, `anticipo`, `pagado`, `total`) VALUES
	(1, 2, "2023-09-04", 1, 0, 0, 200);

/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table tipo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tipo`;

CREATE TABLE `tipo` (
  `ID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descripcion` char(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;

INSERT INTO `tipo` (`ID`, `descripcion`) VALUES
	(1, "Producto"),
	(2, "Servicio");

/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table trabajos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `trabajos`;

CREATE TABLE `trabajos` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ticket` tinyint(4) NOT NULL,
  `concepto` tinyint(4) NOT NULL,
  `precio` int(10) NOT NULL,
  `descripcion` char(40) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

LOCK TABLES `trabajos` WRITE;
/*!40000 ALTER TABLE `trabajos` DISABLE KEYS */;

INSERT INTO `trabajos` (`ID`, `ticket`, `concepto`, `precio`, `descripcion`) VALUES
	(1, 1, 1, 100, "Ghost"),
	(2, 1, 1, 100, "Serpiente");

/*!40000 ALTER TABLE `trabajos` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of table usuarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `usuario` char(20) NOT NULL,
  `password` char(20) NOT NULL,
  `nombre` char(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Tabla de usuarios dele sistema';

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;

INSERT INTO `usuarios` (`ID`, `usuario`, `password`, `nombre`) VALUES
	(1, "enrique", "3nri9u3", "Enrique Gonzalez"),
	(2, "alex", "Alex2023", "Alex Ramirez");

/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;



# Dump of views
# ------------------------------------------------------------

# Creating temporary tables to overcome VIEW dependency errors


/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

# Dump completed on 2023-09-04T18:08:25-06:00
