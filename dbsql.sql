-- MariaDB dump 10.19-11.3.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: mkdg_player
-- ------------------------------------------------------
-- Server version	11.3.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `artistas`
--

DROP TABLE IF EXISTS `artistas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artistas` (
  `id_artista` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `descricao` text DEFAULT NULL,
  `link_foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_artista`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artistas`
--

LOCK TABLES `artistas` WRITE;
/*!40000 ALTER TABLE `artistas` DISABLE KEYS */;
INSERT INTO `artistas` VALUES
(5,'Burzum','lorem ipsum','varg.png'),
(6,'Bolsothrone','lorem ipsum dolor','bolsothrone.png');
/*!40000 ALTER TABLE `artistas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `musicas`
--

DROP TABLE IF EXISTS `musicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `musicas` (
  `id_musica` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `link_arquivo` varchar(255) NOT NULL,
  `compositor` varchar(200) NOT NULL,
  `id_artista` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_musica`),
  KEY `musicas_artistas_FK` (`id_artista`),
  CONSTRAINT `musicas_artistas_FK` FOREIGN KEY (`id_artista`) REFERENCES `artistas` (`id_artista`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musicas`
--

LOCK TABLES `musicas` WRITE;
/*!40000 ALTER TABLE `musicas` DISABLE KEYS */;
INSERT INTO `musicas` VALUES
(22,'Dunkelheit','Dunkelheit [-ZENtivAi6I].mp3','0',5),
(23,'Ea, Lord of the Depths','Ea, Lord of the Depths [JX68guGkdWs].mp3','0',5),
(24,'Erblicket Die Tochter Des Firmaments','Erblicket Die Tochter Des Firmaments [oPp2mIv4CyA].mp3','0',5),
(25,'War','War [ytA2MrPEZdA].mp3','0',5),
(26,'Bolsothrone - Matilha Patriota de Bolsonaristas Hiperbóreos','Bolsothrone - Matilha Patriota de Bolsonaristas Hiperbóreos (WARRIOR OF BRAZIL COVER) [P4Ep7_hNAgg].mp3','0',6);
/*!40000 ALTER TABLE `musicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES
(1,'Márcio','mar@sana','11',0),
(2,'a','a@a','44',0),
(3,'B','aa@b','$argon2id$v=19$m=65536,t=4,p=1$NWo5SFg5TzR1WGlub2JJZw$V2Ra5A5go5i5yZ4ODyZgA1CoxYF/KssU42/zRWSKg4w',0),
(4,'teste','teste@email.com','$argon2id$v=19$m=65536,t=4,p=1$NnMuTTZwMVpOR0J5a0ViSQ$om/t69Hu93PDUp1RofL3uoCTXOLoSLscAPUgwaiDGFE',0),
(5,'heitor','heitor@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$YmRleS5oMFdISWsubWFQRQ$PPA8kjBX2ogRqiGIXN5NX9mgEgt7hs62WYIAPNfwncY',1),
(6,'userr','userr@email.com','$argon2id$v=19$m=65536,t=4,p=1$OUd2Lzc5UFhLVi9YdWR1bA$ItiJiGLRq6Bmy4VaixZNCNk2e8Q1MXch4ohOH7W5Yes',0),
(7,'userteste','userteste@email.com','$argon2id$v=19$m=65536,t=4,p=1$R2diYjY3bGUxMkdHU2lKUA$moUEPc0LGUUlxtIXOC7tcYrIHupSIu+oo6e76FXveE8',0),
(8,'123','123@email.com','$argon2id$v=19$m=65536,t=4,p=1$ekNMU1BySVlSQW04VFRYQw$1cm83IyJ4+5GomyTgsozmdXzf6jA6Dk+KrH6sS0D1ek',0),
(9,'Teste Testoso','ergrtgrthrth@htrhty.com','$argon2id$v=19$m=65536,t=4,p=1$UTVPTlpYQ0pEcGhleE53Mg$RM3sQwITTsfzhZFgi5ekLHmPFK8+E3inXN64aWJECs4',0);
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

-- Dump completed on 2024-04-17 20:14:18
