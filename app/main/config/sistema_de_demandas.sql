-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/11/2025 às 19:58
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_de_demandas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_secao` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `assunto` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `planilhas`
--

CREATE TABLE `planilhas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `secoes`
--

CREATE TABLE `secoes` (
  `id` int(11) NOT NULL,
  `id_planilha` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` char(14) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefone` char(14) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `perfil` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf` ,`email`, `telefone` ,`senha`, `perfil`) VALUES
(1, 'Cássio Holanda Gomes Severiano', '038.423.523-51' ,'cassio.holanda@gmail.com', '(85) 8423-6440' ,'$2y$10$AgqCALRH6Vo0T/jvgAwkJ.T4yebRtfreufruaqp8I1imDdgBoQcHK', '#201C56'),
(2, 'Kauan Cristian Santos de Lima', '024.648.453-53' ,'kauan.cristian@gmail.com', '(85) 2342-0583' ,'$2y$10$Cdcs6Yzx5FnYJYXBGm2hQunQo5k2O3vKDsTawCH3A.yaVj6VOdGQy', '#4C829F');

--
-- Reestartando AUTO_INCREMENT para a tabela `usuarios`
--

ALTER TABLE `usuarios`
  AUTO_INCREMENT = 3;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_secao` (`id_secao`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `planilhas`
--
ALTER TABLE `planilhas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `secoes`
--
ALTER TABLE `secoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_planilha` (`id_planilha`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `telefone` (`telefone`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `planilhas`
--
ALTER TABLE `planilhas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `secoes`
--
ALTER TABLE `secoes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_secao`) REFERENCES `secoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `planilhas`
--
ALTER TABLE `planilhas`
  ADD CONSTRAINT `planilhas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `secoes`
--
ALTER TABLE `secoes`
  ADD CONSTRAINT `secoes_ibfk_1` FOREIGN KEY (`id_planilha`) REFERENCES `planilhas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
