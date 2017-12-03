-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03-Dez-2017 às 12:53
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemaeduzz`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidatos`
--

CREATE TABLE `candidatos` (
  `candidatos_id` int(11) NOT NULL,
  `candidatos_nome` varchar(255) DEFAULT NULL,
  `candidatos_rg` varchar(45) DEFAULT NULL,
  `candidatos_cpf` varchar(45) DEFAULT NULL,
  `candidatos_cep` varchar(45) DEFAULT NULL,
  `candidatos_endereco` varchar(255) DEFAULT NULL,
  `candidatos_cidade` varchar(255) DEFAULT NULL,
  `candidatos_uf` varchar(2) DEFAULT NULL,
  `candidatos_data_aniversario` date DEFAULT NULL,
  `candidatos_data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `candidatos_observacoes` text,
  `candidatos_chave` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compromissos`
--

CREATE TABLE `compromissos` (
  `compromissos_id` int(11) NOT NULL,
  `compromissos_hora_evento` time DEFAULT NULL,
  `compromissos_data_evento` date NOT NULL,
  `compromissos_numero` int(11) NOT NULL,
  `compromissos_unidade` varchar(30) NOT NULL,
  `compromissos_descricao` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Estrutura da tabela `configuracoes`
--

CREATE TABLE `configuracoes` (
  `itens_por_pagina_clientes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `convidados`
--

CREATE TABLE `convidados` (
  `idConvidado` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `familiaridade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estrutura da tabela `emails`
--

CREATE TABLE `emails` (
  `emails_id` int(11) NOT NULL,
  `emails_id_candidato` int(11) DEFAULT NULL,
  `emails_email` varchar(255) DEFAULT NULL,
  `emails_` varchar(45) DEFAULT NULL,
  `emails_chave` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Estrutura da tabela `telefones`
--

CREATE TABLE `telefones` (
  `telefones_id` int(11) NOT NULL,
  `telefones_id_candidato` int(11) DEFAULT NULL,
  `telefones_telefone` varchar(50) DEFAULT NULL,
  `telefones_chave` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`candidatos_id`);

--
-- Indexes for table `compromissos`
--
ALTER TABLE `compromissos`
  ADD PRIMARY KEY (`compromissos_id`);

--
-- Indexes for table `configuracoes`
--
ALTER TABLE `configuracoes`
  ADD PRIMARY KEY (`itens_por_pagina_clientes`);

--
-- Indexes for table `convidados`
--
ALTER TABLE `convidados`
  ADD PRIMARY KEY (`idConvidado`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`emails_id`);

--
-- Indexes for table `telefones`
--
ALTER TABLE `telefones`
  ADD PRIMARY KEY (`telefones_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `candidatos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `compromissos`
--
ALTER TABLE `compromissos`
  MODIFY `compromissos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `convidados`
--
ALTER TABLE `convidados`
  MODIFY `idConvidado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `emails_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `telefones`
--
ALTER TABLE `telefones`
  MODIFY `telefones_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
