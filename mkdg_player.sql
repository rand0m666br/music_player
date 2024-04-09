-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 05, 2024 at 06:57 PM
-- Server version: 10.6.12-MariaDB-1:10.6.12+maria~ubu2004
-- PHP Version: 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mkdg_player`
--

-- --------------------------------------------------------

--
-- Table structure for table `albuns`
--

CREATE TABLE `albuns` (
  `id_album` int(11) NOT NULL,
  `id_artista` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `link_capa` varchar(255) DEFAULT NULL,
  `ano_lancamento` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `albuns`
--

INSERT INTO `albuns` (`id_album`, `id_artista`, `nome`, `link_capa`, `ano_lancamento`) VALUES
(1, 1, 'teste album', '0', 2008);

-- --------------------------------------------------------

--
-- Table structure for table `artistas`
--

CREATE TABLE `artistas` (
  `id_artista` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `descricao` text DEFAULT NULL,
  `link_foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artistas`
--

INSERT INTO `artistas` (`id_artista`, `nome`, `descricao`, `link_foto`) VALUES
(1, 'teste', 'aaaa', '0');

-- --------------------------------------------------------

--
-- Table structure for table `musicas`
--

CREATE TABLE `musicas` (
  `id_musica` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `link_arquivo` varchar(255) NOT NULL,
  `compositor` varchar(200) NOT NULL,
  `id_album` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `musicas`
--

INSERT INTO `musicas` (`id_musica`, `nome`, `link_arquivo`, `compositor`, `id_album`) VALUES
(1, 'teste musica', 'Garotos Podres - Papai Noel filho da puta [jDDlLtZFgNo].mp3', 'teste', 1),
(2, 'teste musica', 'i believe he is trans.mp3', 'teste', 1),
(3, 'My Funeral', 'darkfuneral.mp3', 'teste', 1),
(4, 'Papai Noel Filho da Puta', 'Garotos Podres - Papai Noel filho da puta [jDDlLtZFgNo].mp3', 'teste', 1),
(5, 'Transbordando ódio', 'WORST ＂Transbordando Ódio＂ [XXwknzOeAws].mp3', 'teste', 1);

-- --------------------------------------------------------

--
-- Table structure for table `musicas_das_playlists`
--

CREATE TABLE `musicas_das_playlists` (
  `id_mus_play` int(11) NOT NULL,
  `id_musica` int(11) NOT NULL,
  `id_playlist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id_playlist` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`, `nivel`) VALUES
(1, 'Márcio', 'mar@sana', '11', 0),
(2, 'a', 'a@a', '44', 0),
(3, 'B', 'aa@b', '$argon2id$v=19$m=65536,t=4,p=1$NWo5SFg5TzR1WGlub2JJZw$V2Ra5A5go5i5yZ4ODyZgA1CoxYF/KssU42/zRWSKg4w', 0),
(4, 'teste', 'teste@email.com', '$argon2id$v=19$m=65536,t=4,p=1$NnMuTTZwMVpOR0J5a0ViSQ$om/t69Hu93PDUp1RofL3uoCTXOLoSLscAPUgwaiDGFE', 0),
(5, 'heitor', 'heitor@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$YmRleS5oMFdISWsubWFQRQ$PPA8kjBX2ogRqiGIXN5NX9mgEgt7hs62WYIAPNfwncY', 1),
(6, 'userr', 'userr@email.com', '$argon2id$v=19$m=65536,t=4,p=1$OUd2Lzc5UFhLVi9YdWR1bA$ItiJiGLRq6Bmy4VaixZNCNk2e8Q1MXch4ohOH7W5Yes', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albuns`
--
ALTER TABLE `albuns`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `fk_album_artista` (`id_artista`);

--
-- Indexes for table `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`id_artista`);

--
-- Indexes for table `musicas`
--
ALTER TABLE `musicas`
  ADD PRIMARY KEY (`id_musica`),
  ADD KEY `fk_musica_album` (`id_album`);

--
-- Indexes for table `musicas_das_playlists`
--
ALTER TABLE `musicas_das_playlists`
  ADD PRIMARY KEY (`id_mus_play`),
  ADD KEY `fk_musica_p` (`id_musica`),
  ADD KEY `fk_playlist_m` (`id_playlist`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id_playlist`),
  ADD KEY `fk_playlist_usuario` (`id_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albuns`
--
ALTER TABLE `albuns`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artistas`
--
ALTER TABLE `artistas`
  MODIFY `id_artista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `musicas`
--
ALTER TABLE `musicas`
  MODIFY `id_musica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `musicas_das_playlists`
--
ALTER TABLE `musicas_das_playlists`
  MODIFY `id_mus_play` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id_playlist` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albuns`
--
ALTER TABLE `albuns`
  ADD CONSTRAINT `fk_album_artista` FOREIGN KEY (`id_artista`) REFERENCES `artistas` (`id_artista`);

--
-- Constraints for table `musicas`
--
ALTER TABLE `musicas`
  ADD CONSTRAINT `fk_musica_album` FOREIGN KEY (`id_album`) REFERENCES `albuns` (`id_album`);

--
-- Constraints for table `musicas_das_playlists`
--
ALTER TABLE `musicas_das_playlists`
  ADD CONSTRAINT `fk_musica_p` FOREIGN KEY (`id_musica`) REFERENCES `musicas` (`id_musica`),
  ADD CONSTRAINT `fk_playlist_m` FOREIGN KEY (`id_playlist`) REFERENCES `playlists` (`id_playlist`);

--
-- Constraints for table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `fk_playlist_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
