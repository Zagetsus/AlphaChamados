-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 12-Mar-2019 às 01:24
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alphachamados`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `area_responsavel`
--

DROP TABLE IF EXISTS `area_responsavel`;
CREATE TABLE IF NOT EXISTS `area_responsavel` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `nome_area` varchar(70) NOT NULL,
  `desc_area` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `area_responsavel`
--

INSERT INTO `area_responsavel` (`id_area`, `nome_area`, `desc_area`) VALUES
(1, 'TI', 'Suporte a Empresa'),
(2, 'Financeiro', NULL),
(3, 'Recursos Humanos', NULL),
(4, 'Setor Comercial', NULL),
(5, 'Setor Operacional', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamados`
--

DROP TABLE IF EXISTS `chamados`;
CREATE TABLE IF NOT EXISTS `chamados` (
  `id_chamado` int(11) NOT NULL AUTO_INCREMENT,
  `area_responsavel` int(11) NOT NULL,
  `desc_problema` text NOT NULL,
  `unidade` int(11) NOT NULL,
  `nome_contato` varchar(25) NOT NULL,
  `data_agendar` varchar(50) NOT NULL,
  `prioridade` int(11) NOT NULL,
  `tipo_problema` int(11) NOT NULL,
  `ramal` int(11) NOT NULL,
  `encaminhar` int(11) NOT NULL,
  `data_abertura` date NOT NULL,
  `tempo_solucao` int(11) NOT NULL,
  `situacao_chamado` int(11) NOT NULL,
  PRIMARY KEY (`id_chamado`),
  KEY `FK_CHAMADOS_UNIDADE` (`unidade`),
  KEY `FK_CHAMADOS_PRIORIDADE` (`prioridade`),
  KEY `FK_CHAMADOS_TIPO_PROBLEMA` (`area_responsavel`),
  KEY `FK_CHAMADOS_ENCAMINHAR` (`encaminhar`),
  KEY `FK_CHAMADOS_TEMPO_SOLUCAO` (`tempo_solucao`),
  KEY `FK_CHAMADOS_SITUACAO_CHAMADO` (`situacao_chamado`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `chamados`
--

INSERT INTO `chamados` (`id_chamado`, `area_responsavel`, `desc_problema`, `unidade`, `nome_contato`, `data_agendar`, `prioridade`, `tipo_problema`, `ramal`, `encaminhar`, `data_abertura`, `tempo_solucao`, `situacao_chamado`) VALUES
(1, 1, 'Mouse Muito ruim', 1, 'Diogo', 'Amanha', 1, 1, 14, 1, '2018-11-27', 1, 2),
(2, 1, 'Teclado Ruim', 1, 'Luan', 'Amanha', 1, 1, 15, 1, '2018-11-27', 1, 2),
(3, 1, 'Sistema com falhas', 1, 'João', 'Amanha', 1, 1, 15, 1, '2018-11-27', 1, 2),
(19, 1, 'acabou a tinta', 4, 'admin', 'amanha', 2, 6, 33, 1, '2018-12-01', 1, 2),
(20, 1, 'Sem tinta', 4, 'admin', 'amanha', 2, 6, 33, 1, '2018-12-01', 1, 2),
(21, 1, 'Impressora não tem tinta', 1, 'admin', '2019-02-26', 1, 6, 465, 2, '2019-02-25', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mural_avisos`
--

DROP TABLE IF EXISTS `mural_avisos`;
CREATE TABLE IF NOT EXISTS `mural_avisos` (
  `id_aviso` int(11) NOT NULL AUTO_INCREMENT,
  `nome_aviso` varchar(25) NOT NULL,
  `desc_aviso` text NOT NULL,
  PRIMARY KEY (`id_aviso`),
  UNIQUE KEY `nome_aviso` (`nome_aviso`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mural_avisos`
--

INSERT INTO `mural_avisos` (`id_aviso`, `nome_aviso`, `desc_aviso`) VALUES
(1, 'Sem Equipamentos', 'Estamos sem equipamentos de hardware'),
(2, 'Bom Dia', 'Queria desejar a todos um bom dia!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel`
--

DROP TABLE IF EXISTS `nivel`;
CREATE TABLE IF NOT EXISTS `nivel` (
  `id_nivel` int(11) NOT NULL AUTO_INCREMENT,
  `nome_nivel` varchar(50) NOT NULL,
  `desc_nivel` text,
  PRIMARY KEY (`id_nivel`),
  UNIQUE KEY `nome_nivel` (`nome_nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `nivel`
--

INSERT INTO `nivel` (`id_nivel`, `nome_nivel`, `desc_nivel`) VALUES
(1, 'Administrador', 'Controle Total'),
(2, 'Técnico', 'Controle Moderado'),
(3, 'Usuario', 'Controle Restrito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prioridades`
--

DROP TABLE IF EXISTS `prioridades`;
CREATE TABLE IF NOT EXISTS `prioridades` (
  `id_prioridade` int(11) NOT NULL AUTO_INCREMENT,
  `nome_prioridade` varchar(25) NOT NULL,
  PRIMARY KEY (`id_prioridade`),
  UNIQUE KEY `nome_prioridade` (`nome_prioridade`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `prioridades`
--

INSERT INTO `prioridades` (`id_prioridade`, `nome_prioridade`) VALUES
(3, 'Alta'),
(1, 'Baixa'),
(2, 'Média');

-- --------------------------------------------------------

--
-- Estrutura da tabela `problemas`
--

DROP TABLE IF EXISTS `problemas`;
CREATE TABLE IF NOT EXISTS `problemas` (
  `id_problema` int(11) NOT NULL AUTO_INCREMENT,
  `nome_problema` varchar(30) NOT NULL,
  `desc_problema` text NOT NULL,
  `tempo_solucao` int(11) NOT NULL,
  `prioridade` int(11) NOT NULL,
  PRIMARY KEY (`id_problema`),
  UNIQUE KEY `nome_problema` (`nome_problema`),
  KEY `FK_PROBLEMAS_TEMPO_SOLUCAO` (`tempo_solucao`),
  KEY `FK_PROBLEMAS_PRIORIDADE` (`prioridade`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `problemas`
--

INSERT INTO `problemas` (`id_problema`, `nome_problema`, `desc_problema`, `tempo_solucao`, `prioridade`) VALUES
(1, 'Mouse quebrado', 'Mouse nao funciona corretamento', 1, 1),
(2, 'Sistema Operacional', 'Sistema Operacional', 1, 1),
(6, 'Impressora', 'Quebrou ', 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacoes`
--

DROP TABLE IF EXISTS `situacoes`;
CREATE TABLE IF NOT EXISTS `situacoes` (
  `id_situacao` int(11) NOT NULL AUTO_INCREMENT,
  `nome_situacao` varchar(25) NOT NULL,
  PRIMARY KEY (`id_situacao`),
  UNIQUE KEY `nome_situacao` (`nome_situacao`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `situacoes`
--

INSERT INTO `situacoes` (`id_situacao`, `nome_situacao`) VALUES
(3, 'Em Atendimento'),
(2, 'Finalizado'),
(1, 'Pendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tempo_solucoes`
--

DROP TABLE IF EXISTS `tempo_solucoes`;
CREATE TABLE IF NOT EXISTS `tempo_solucoes` (
  `id_tempo_solucao` int(11) NOT NULL AUTO_INCREMENT,
  `tempo_solucao` time NOT NULL,
  PRIMARY KEY (`id_tempo_solucao`),
  UNIQUE KEY `tempo_solucao` (`tempo_solucao`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tempo_solucoes`
--

INSERT INTO `tempo_solucoes` (`id_tempo_solucao`, `tempo_solucao`) VALUES
(1, '00:00:30'),
(2, '00:30:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidades`
--

DROP TABLE IF EXISTS `unidades`;
CREATE TABLE IF NOT EXISTS `unidades` (
  `id_unidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome_unidade` varchar(50) NOT NULL,
  PRIMARY KEY (`id_unidade`),
  UNIQUE KEY `nome_unidade` (`nome_unidade`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `unidades`
--

INSERT INTO `unidades` (`id_unidade`, `nome_unidade`) VALUES
(4, 'Atendimento'),
(1, 'RH'),
(5, 'Setor comercial'),
(3, 'Setor de Marketing');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `login_usuario` varchar(24) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `data_cadastro` date NOT NULL,
  `data_contratacao` date NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `login_usuario_UNIQUE` (`login_usuario`),
  KEY `FK_USUARIOS_AREA` (`area`),
  KEY `FK_USUARIOS_NIVEL` (`nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `login_usuario`, `email`, `telefone`, `area`, `nivel`, `senha`, `data_cadastro`, `data_contratacao`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 46411200, 1, 1, 'admin', '2018-11-24', '2018-11-24'),
(2, 'Tecnico', 'Tecnico', 'tecnico@gmail.com', 46411255, 1, 2, 'tecnico', '2018-11-27', '2018-11-27'),
(3, 'Luan', 'Wolf', 'luanverdelho642@gmail.com', 46483810, 1, 3, 'verdelho', '2018-11-27', '2018-11-27'),
(4, 'Diogo', 'dihenry', 'diogometeoro@gmail.com', 1146411200, 3, 3, 'diogo', '2018-11-27', '2018-11-27'),
(10, 'Luan', 'Freitas', 'luan.freitas5@etec.sp.gov.br', 46483810, 4, 3, 'cleitonrasta', '2018-11-29', '2018-11-29'),
(11, 'Diogo', 'dihenry101', 'diogometeoro2@gmail.com', 1146411200, 4, 1, '7815696ecbf1c96e6894b779456d330e', '2018-11-30', '2018-11-30'),
(12, 'Robson', 'robson', 'robson2@gmail.com', 78459632, 3, 3, '1235', '2018-11-30', '2018-11-30'),
(13, 'David', 'david', 'davidsantana@gmail.com', 4569782, 1, 1, '789', '2018-12-01', '2018-12-01');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
