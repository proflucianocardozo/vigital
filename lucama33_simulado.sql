-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 16/05/2024 às 14:41
-- Versão do servidor: 5.7.23-23
-- Versão do PHP: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lucama33_simulado`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL,
  `nome_categoria` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `nome_categoria`) VALUES
(1, 'Super Usuário'),
(2, 'Administrador'),
(3, 'Autor'),
(4, 'Moderador');

-- --------------------------------------------------------

--
-- Estrutura para tabela `conhecimento`
--

CREATE TABLE `conhecimento` (
  `id_conhecimento` int(11) NOT NULL,
  `tema_principal` longtext CHARACTER SET utf8 NOT NULL,
  `tema` longtext CHARACTER SET utf8 NOT NULL,
  `titulo` longtext CHARACTER SET utf8 NOT NULL,
  `subtitulo` longtext CHARACTER SET utf8 NOT NULL,
  `subtitulo2` longtext CHARACTER SET utf8 NOT NULL,
  `subtitulo3` longtext CHARACTER SET utf8 NOT NULL,
  `texto` text COLLATE utf8_unicode_ci NOT NULL,
  `url_texto` longtext CHARACTER SET utf8 NOT NULL,
  `url_video` longtext CHARACTER SET utf8 NOT NULL,
  `url_imagem` longtext CHARACTER SET utf8 NOT NULL,
  `url_audio` longtext CHARACTER SET utf8 NOT NULL,
  `idusuario` int(11) NOT NULL,
  `sts_conhecimento` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `dth_conhecimento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `usuario_nome` varchar(45) CHARACTER SET utf8 NOT NULL,
  `usuario_login` varchar(45) CHARACTER SET utf8 NOT NULL,
  `usuario_senha` longtext CHARACTER SET utf8 NOT NULL,
  `usuario_email` longtext COLLATE latin1_general_ci NOT NULL,
  `usuario_ativo` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario_nome`, `usuario_login`, `usuario_senha`, `usuario_email`, `usuario_ativo`, `categoria_id`) VALUES
(1, 'Luciano Cardozo Magalh', 'administrador', '827ccb0eea8a706c4c34a16891f84e7b', 'proflucianocardozo@proflucianocardozo', 1, 1),
(2, 'Clene Bizarria dos Santos junior', 'clene', '827ccb0eea8a706c4c34a16891f84e7b', 'clenebjr@gmail.com', 1, 3),
(5, 'Inclusão de Usuário Autor', 'autor', '827ccb0eea8a706c4c34a16891f84e7b', 'xx@xx.com', 1, 3),
(6, 'Moderador', 'moderador', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Índices de tabela `conhecimento`
--
ALTER TABLE `conhecimento`
  ADD PRIMARY KEY (`id_conhecimento`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `conhecimento`
--
ALTER TABLE `conhecimento`
  MODIFY `id_conhecimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=509;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `conhecimento`
--
ALTER TABLE `conhecimento`
  ADD CONSTRAINT `conhecimento_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
