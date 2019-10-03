-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Dez-2018 às 04:40
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpvi_web_voto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comissao`
--

CREATE TABLE `comissao` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `comissao`
--

INSERT INTO `comissao` (`id`, `nome`) VALUES
(1, 'Comissão do Curso de Engenharia de Software');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itempauta`
--

CREATE TABLE `itempauta` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `votada` int(11) DEFAULT '0',
  `relator` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `segundoTurno` tinyint(4) DEFAULT NULL,
  `idReuniao` int(11) NOT NULL,
  `idTipoItemReuniao` int(11) NOT NULL,
  `emVotacao` tinyint(1) NOT NULL,
  `emSegundoTurno` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `itempauta`
--

INSERT INTO `itempauta` (`id`, `descricao`, `votada`, `relator`, `segundoTurno`, `idReuniao`, `idTipoItemReuniao`, `emVotacao`, `emSegundoTurno`) VALUES
(3, 'Item de pauta de teste', 0, 'Fulano', NULL, 3, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `opcaodevoto`
--

CREATE TABLE `opcaodevoto` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idItemPauta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reuniao`
--

CREATE TABLE `reuniao` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datahora` datetime DEFAULT NULL,
  `aberta` tinyint(4) DEFAULT '0',
  `idTipoReuniao` int(11) NOT NULL,
  `idComissao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `reuniao`
--

INSERT INTO `reuniao` (`id`, `nome`, `datahora`, `aberta`, `idTipoReuniao`, `idComissao`) VALUES
(1, 'Reunião da Comissão do Curso de Engenharia de Software', '2018-11-14 18:30:00', 0, 1, 1),
(2, '1ª Reunião Extraordinária da Engenharia de Software ', '2018-10-31 20:30:00', 0, 2, 1),
(3, 'Reunião Semestral da Engenharia de Software', '2018-12-20 14:00:00', 0, 1, 1),
(4, '2ª Reunião Extraordinária de Engenharia de Software', '2018-11-22 17:30:00', 0, 2, 1),
(5, 'Reunião Semanal do Curso de Engenahria de Software', '2018-11-01 15:00:00', 0, 1, 1),
(6, 'Reunião Mensal do Curso de Engenharia de Software', '2018-11-13 18:00:00', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sseitempauta`
--

CREATE TABLE `sseitempauta` (
  `id` int(11) NOT NULL,
  `mensagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idItemPauta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoitempauta`
--

CREATE TABLE `tipoitempauta` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tipoitempauta`
--

INSERT INTO `tipoitempauta` (`id`, `nome`) VALUES
(1, 'Padrão'),
(2, 'Personalizada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tiporeuniao`
--

CREATE TABLE `tiporeuniao` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tiporeuniao`
--

INSERT INTO `tiporeuniao` (`id`, `nome`) VALUES
(1, 'Ordinária'),
(2, 'Extraordinária');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tipousuario`
--

INSERT INTO `tipousuario` (`id`, `nome`) VALUES
(1, 'Moderador'),
(2, 'Secretário'),
(3, 'Membro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `senha`, `usuario`) VALUES
(1, 'Guilherme Bolfe', '123456', 'guilhermebolfe11@gmail.com'),
(2, 'Filipe Garcia', '123456', 'filipe1997@gmail.com'),
(3, 'Victor Ribeiro', '123456', 'victorqribeiro@gmail.com'),
(4, 'Giliardi Schmidt', '123456', 'gili.schmidt@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarioreuniao`
--

CREATE TABLE `usuarioreuniao` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idReuniao` int(11) NOT NULL,
  `idTipoUsuario` int(11) NOT NULL,
  `registrado` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarioreuniao`
--

INSERT INTO `usuarioreuniao` (`id`, `idUsuario`, `idReuniao`, `idTipoUsuario`, `registrado`) VALUES
(1, 1, 1, 3, 0),
(2, 1, 2, 3, 0),
(3, 1, 3, 3, 0),
(4, 1, 4, 3, 0),
(5, 1, 5, 3, 0),
(6, 1, 6, 3, 0),
(7, 2, 2, 3, 0),
(8, 2, 2, 2, 0),
(9, 2, 4, 3, 0),
(10, 2, 1, 3, 0),
(11, 2, 6, 3, 0),
(12, 2, 5, 3, 0),
(14, 2, 3, 3, 0),
(15, 2, 6, 1, 0),
(16, 2, 1, 2, 0),
(17, 3, 1, 3, 0),
(18, 3, 2, 3, 1),
(19, 3, 3, 3, 0),
(20, 3, 4, 3, 0),
(21, 3, 5, 3, 0),
(22, 3, 6, 3, 0),
(23, 3, 6, 2, 0),
(24, 3, 5, 2, 0),
(25, 3, 3, 1, 0),
(26, 3, 4, 1, 0),
(27, 4, 1, 3, 0),
(28, 4, 2, 3, 0),
(29, 4, 4, 3, 0),
(30, 4, 3, 3, 0),
(31, 4, 5, 3, 0),
(32, 4, 6, 3, 0),
(33, 2, 2, 1, 0),
(34, 4, 5, 1, 0),
(35, 4, 1, 1, 0),
(36, 4, 3, 2, 0),
(37, 4, 4, 2, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `voto`
--

CREATE TABLE `voto` (
  `id` int(11) NOT NULL,
  `idOpcaoVoto` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `segundoTurno` tinyint(4) DEFAULT NULL,
  `datahora` datetime DEFAULT CURRENT_TIMESTAMP,
  `idItemPauta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comissao`
--
ALTER TABLE `comissao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itempauta`
--
ALTER TABLE `itempauta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ItemPauta_Reuniao1_idx` (`idReuniao`),
  ADD KEY `fk_ItemPauta_TipoItemPauta1_idx` (`idTipoItemReuniao`);

--
-- Indexes for table `opcaodevoto`
--
ALTER TABLE `opcaodevoto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_OpcaoDeVoto_ItemPauta1_idx` (`idItemPauta`);

--
-- Indexes for table `reuniao`
--
ALTER TABLE `reuniao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Reuniao_TipoReuniao1_idx` (`idTipoReuniao`),
  ADD KEY `fk_Reuniao_Comissao1_idx` (`idComissao`);

--
-- Indexes for table `sseitempauta`
--
ALTER TABLE `sseitempauta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idItemPauta` (`idItemPauta`);

--
-- Indexes for table `tipoitempauta`
--
ALTER TABLE `tipoitempauta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiporeuniao`
--
ALTER TABLE `tiporeuniao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarioreuniao`
--
ALTER TABLE `usuarioreuniao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_UsuarioReuniao_Usuario_idx` (`idUsuario`),
  ADD KEY `fk_UsuarioReuniao_Reuniao1_idx` (`idReuniao`),
  ADD KEY `fk_UsuarioReuniao_TipoUsuario1_idx` (`idTipoUsuario`);

--
-- Indexes for table `voto`
--
ALTER TABLE `voto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Voto_Usuario1_idx` (`idUsuario`),
  ADD KEY `fk_Voto_OpcaoDeVoto1_idx` (`idOpcaoVoto`),
  ADD KEY `idItemPauta` (`idItemPauta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comissao`
--
ALTER TABLE `comissao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `itempauta`
--
ALTER TABLE `itempauta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `opcaodevoto`
--
ALTER TABLE `opcaodevoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reuniao`
--
ALTER TABLE `reuniao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sseitempauta`
--
ALTER TABLE `sseitempauta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tipoitempauta`
--
ALTER TABLE `tipoitempauta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tiporeuniao`
--
ALTER TABLE `tiporeuniao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarioreuniao`
--
ALTER TABLE `usuarioreuniao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `voto`
--
ALTER TABLE `voto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `itempauta`
--
ALTER TABLE `itempauta`
  ADD CONSTRAINT `fk_ItemPauta_Reuniao1` FOREIGN KEY (`idReuniao`) REFERENCES `reuniao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ItemPauta_TipoItemPauta1` FOREIGN KEY (`idTipoItemReuniao`) REFERENCES `tipoitempauta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `opcaodevoto`
--
ALTER TABLE `opcaodevoto`
  ADD CONSTRAINT `fk_OpcaoDeVoto_ItemPauta1` FOREIGN KEY (`idItemPauta`) REFERENCES `itempauta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `reuniao`
--
ALTER TABLE `reuniao`
  ADD CONSTRAINT `fk_Reuniao_Comissao1` FOREIGN KEY (`idComissao`) REFERENCES `comissao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reuniao_TipoReuniao1` FOREIGN KEY (`idTipoReuniao`) REFERENCES `tiporeuniao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sseitempauta`
--
ALTER TABLE `sseitempauta`
  ADD CONSTRAINT `sseitempauta_ibfk_1` FOREIGN KEY (`idItemPauta`) REFERENCES `itempauta` (`id`);

--
-- Limitadores para a tabela `usuarioreuniao`
--
ALTER TABLE `usuarioreuniao`
  ADD CONSTRAINT `fk_UsuarioReuniao_Reuniao1` FOREIGN KEY (`idReuniao`) REFERENCES `reuniao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_UsuarioReuniao_TipoUsuario1` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_UsuarioReuniao_Usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `voto`
--
ALTER TABLE `voto`
  ADD CONSTRAINT `fk_Voto_OpcaoDeVoto1` FOREIGN KEY (`idOpcaoVoto`) REFERENCES `opcaodevoto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Voto_Usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `voto_ibfk_1` FOREIGN KEY (`idItemPauta`) REFERENCES `itempauta` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
