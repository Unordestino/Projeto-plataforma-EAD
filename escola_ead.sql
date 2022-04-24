-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Abr-2022 às 19:29
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `escola_ead`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao_curta` varchar(100) NOT NULL,
  `conteudo` longtext NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `titulo`, `descricao_curta`, `conteudo`, `data_cadastro`, `preco`, `imagem`) VALUES
(8, 'CURSO PHP 2', 'MELHOR CUERSO DE PHP', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/s09aB2gz-OA\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2022-04-24 11:15:37', '30.00', 'upload/62655b89cb7fa.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorio`
--

CREATE TABLE `relatorio` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `data_compra` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `relatorio`
--

INSERT INTO `relatorio` (`id`, `id_usuario`, `id_curso`, `valor`, `data_compra`) VALUES
(2, 3, 8, '30', '2022-04-24 11:54:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `creditos` decimal(10,2) DEFAULT 0.00,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `data_cadastro`, `creditos`, `admin`) VALUES
(1, 'davi silvieira', 'hzpck17@gmail.comv', '$2y$10$aRjTkDHyC/4gdlun/DCFg.ssD32l5WON8uX6lS9eV60nCVGTXBQfm', '2022-04-23 23:38:09', '50.00', NULL),
(3, 'luciano vidal de souza', 'davi11silveira@gmail.com', '$2y$10$DXIl7nfiTVFNrCv63LELfuaxc5hvDWeHZkHqihyb/MtE6AYHgh71i', '2022-04-23 23:56:27', '10.00', NULL),
(4, 'davi da silveira souza', 'hzpck17@gmail.com', '$2y$10$0nbGY5hNpQiU4fb2GsGwNe3YT8TwWcUxHkvwu25KHCL3NKs96BE.e', '2022-04-24 08:15:03', '15.00', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `relatorio`
--
ALTER TABLE `relatorio`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `relatorio`
--
ALTER TABLE `relatorio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
