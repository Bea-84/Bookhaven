-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: bookhaven
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `idCategorias` int NOT NULL AUTO_INCREMENT,
  `nombreCategoria` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCategorias`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Fantasia','Todos los públicos'),(2,'Ficción','Todos los públicos'),(3,'Infantil','niños'),(4,'Novela histórica','adultos'),(5,'Thriller','+18');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentarios` (
  `idComentarios` int NOT NULL AUTO_INCREMENT,
  `puntuacion` int DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `idUsuario` int NOT NULL,
  PRIMARY KEY (`idComentarios`,`idUsuario`),
  KEY `fk_comentarioUsuarios_idx` (`idUsuario`),
  CONSTRAINT `fk_comentarioUsuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `idPedidos` int NOT NULL AUTO_INCREMENT,
  `precio_total` decimal(45,0) DEFAULT NULL,
  `fecha_compra` datetime DEFAULT NULL,
  `idUsuario` int NOT NULL,
  PRIMARY KEY (`idPedidos`),
  KEY `fk_pedidoUsuario_idx` (`idUsuario`),
  CONSTRAINT `fk_pedidoUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos_has_productos`
--

DROP TABLE IF EXISTS `pedidos_has_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos_has_productos` (
  `Pedidos_idPedidos` int NOT NULL,
  `Productos_idProductos` int NOT NULL,
  `precio` decimal(20,0) DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  PRIMARY KEY (`Pedidos_idPedidos`,`Productos_idProductos`),
  KEY `fk_Pedidos_has_Productos_Productos1_idx` (`Productos_idProductos`),
  KEY `fk_Pedidos_has_Productos_Pedidos1_idx` (`Pedidos_idPedidos`),
  CONSTRAINT `fk_Pedidos_has_Productos_Pedidos1` FOREIGN KEY (`Pedidos_idPedidos`) REFERENCES `pedidos` (`idPedidos`),
  CONSTRAINT `fk_Pedidos_has_Productos_Productos1` FOREIGN KEY (`Productos_idProductos`) REFERENCES `productos` (`idProductos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos_has_productos`
--

LOCK TABLES `pedidos_has_productos` WRITE;
/*!40000 ALTER TABLE `pedidos_has_productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos_has_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `idProductos` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `idCategoria` int DEFAULT NULL,
  `img` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idProductos`),
  KEY `fk_productoCategoria_idx` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'Alicia en el país de las maravillas',8,'Obra clássica',3,'i1.jpg'),(2,'Onin',10,'Las aventuras de Onin',3,'i2.jpg'),(3,'Los pilares de la tierra',20,'Historia siglo XII',4,'i3.jpg'),(4,'Ultimos días en Berlín',21,'Finalista premio planeta',4,'i4.jpg'),(5,'El código da Vinci',15,'Misterio y suspense',5,'i5.jpg'),(6,'El silencio de los corderos',12,'Suspense y terror',5,'i6.jpg'),(7,'Harry Potter',11,'Saga JKRowling',1,'i7.jpg'),(8,'El señor de los anillos',25,'Trilogía',1,'i8.jpg'),(9,'Cien años de soledad',9,'Autor latam',2,'i9.jpg'),(10,'1984',14,'Historia de un mundo autoritario',2,'i10.jpg');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `idUsuarios` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `rol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idUsuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Bea','Sanchez','be@gmail.com','12','Maragall','administrador'),(2,'Marc','Balaguer','ma@gmail.com','15','Monturiol','administrador'),(3,'Karolayn','Muñoz','ka@gmail.com','45','Aribau','usuario'),(4,'Jordi','Muntaner','jo@gmail.com','78','Diagonal','usuario'),(5,'Jenifer','Fernandez','je@gmail.com','65','Rizal','usuario'),(6,'Manuel','Gillis','ma@gmail.com','32','Luna','usuario');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-27 12:24:57
