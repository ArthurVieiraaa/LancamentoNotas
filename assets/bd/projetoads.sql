-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Set-2024 às 00:18
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `projetoads`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `idAvaliacao` int(11) NOT NULL,
  `materia` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `assunto` varchar(255) NOT NULL,
  `nota` decimal(10,0) NOT NULL,
  `prova` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `boletim`
--

CREATE TABLE `boletim` (
  `idBoletim` int(11) NOT NULL,
  `materia` varchar(255) NOT NULL,
  `media` decimal(10,0) NOT NULL,
  `feedbackAlunos` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `idCurso` int(11) NOT NULL,
  `nomeCurso` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `dtInicio` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `forum`
--

CREATE TABLE `forum` (
  `idForum` int(11) NOT NULL,
  `imagem` blob NOT NULL,
  `mensagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(80) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`idAvaliacao`);

--
-- Índices para tabela `boletim`
--
ALTER TABLE `boletim`
  ADD PRIMARY KEY (`idBoletim`);

--
-- Índices para tabela `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`idForum`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `boletim`
--
ALTER TABLE `boletim`
  MODIFY `idBoletim` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `forum`
--
ALTER TABLE `forum`
  MODIFY `idForum` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
