-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20-Mar-2023 às 23:41
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `swgvpmj`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_usuarios`
--

DROP TABLE IF EXISTS `cad_usuarios`;
CREATE TABLE IF NOT EXISTS `cad_usuarios` (
  `id` int NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(220) DEFAULT NULL,
  `datanascimento` varchar(11) DEFAULT NULL,
  `email` varchar(220) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `RG` varchar(50) DEFAULT NULL,
  `orgaoExpedidor` varchar(10) DEFAULT NULL,
  `ufrg` varchar(2) DEFAULT NULL,
  `logradouro` varchar(220) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `bairro` varchar(220) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `cidade` varchar(60) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `complemento` varchar(60) DEFAULT NULL,
  `cnh` varchar(100) DEFAULT NULL,
  `categoria` varchar(2) DEFAULT NULL,
  `datavalidade` varchar(11) DEFAULT NULL,
  `dataprimeiracnh` varchar(11) DEFAULT NULL,
  `data_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cpf`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(220) DEFAULT NULL,
  `email` varchar(220) DEFAULT NULL,
  `usuario` varchar(220) DEFAULT NULL,
  `senha` char(60) DEFAULT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `cpf`, `nome`, `email`, `usuario`, `senha`, `data_criacao`) VALUES
(1, '95831244512', 'Larissa Soares Silva', 'larissa.ssilva@gmail.com', 'larissa', '$2y$10$Yqunv6iQdPD6JPuHboal0u91FMgfMBob8sVyHRpsR8TnGnaC.mCVe', '2023-03-20 20:38:33');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
