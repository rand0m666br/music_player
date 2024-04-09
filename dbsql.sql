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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artistas`
--

LOCK TABLES `artistas` WRITE;
/*!40000 ALTER TABLE `artistas` DISABLE KEYS */;
INSERT INTO `artistas` VALUES
(1,'teste','aaaa','0'),
(2,'artista teste','asdasd','0');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musicas`
--

LOCK TABLES `musicas` WRITE;
/*!40000 ALTER TABLE `musicas` DISABLE KEYS */;
INSERT INTO `musicas` VALUES
(1,'teste musica','Garotos Podres - Papai Noel filho da puta [jDDlLtZFgNo].mp3','teste',NULL),
(2,'teste musica','i believe he is trans.mp3','teste',NULL),
(3,'My Funeral','darkfuneral.mp3','teste',NULL),
(4,'Papai Noel Filho da Puta','Garotos Podres - Papai Noel filho da puta [jDDlLtZFgNo].mp3','teste',NULL),
(5,'Transbordando ódio','WORST ＂Transbordando Ódio＂ [XXwknzOeAws].mp3','teste',NULL),
(6,'Oh Mefisto','UDR - Oh, Mefisto [220278100].mp3','0',2);
/*!40000 ALTER TABLE `musicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `musicas_das_playlists`
--

DROP TABLE IF EXISTS `musicas_das_playlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `musicas_das_playlists` (
  `id_mus_play` int(11) NOT NULL AUTO_INCREMENT,
  `id_musica` int(11) NOT NULL,
  `id_playlist` int(11) NOT NULL,
  PRIMARY KEY (`id_mus_play`),
  KEY `fk_musica_p` (`id_musica`),
  KEY `fk_playlist_m` (`id_playlist`),
  CONSTRAINT `fk_musica_p` FOREIGN KEY (`id_musica`) REFERENCES `musicas` (`id_musica`),
  CONSTRAINT `fk_playlist_m` FOREIGN KEY (`id_playlist`) REFERENCES `playlists` (`id_playlist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musicas_das_playlists`
--

LOCK TABLES `musicas_das_playlists` WRITE;
/*!40000 ALTER TABLE `musicas_das_playlists` DISABLE KEYS */;
/*!40000 ALTER TABLE `musicas_das_playlists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `playlists`
--

DROP TABLE IF EXISTS `playlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `playlists` (
  `id_playlist` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  PRIMARY KEY (`id_playlist`),
  KEY `fk_playlist_usuario` (`id_usuario`),
  CONSTRAINT `fk_playlist_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `playlists`
--

LOCK TABLES `playlists` WRITE;
/*!40000 ALTER TABLE `playlists` DISABLE KEYS */;
/*!40000 ALTER TABLE `playlists` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
(7,'userteste','userteste@email.com','$argon2id$v=19$m=65536,t=4,p=1$R2diYjY3bGUxMkdHU2lKUA$moUEPc0LGUUlxtIXOC7tcYrIHupSIu+oo6e76FXveE8',0);
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

-- Dump completed on 2024-04-09 19:32:46
