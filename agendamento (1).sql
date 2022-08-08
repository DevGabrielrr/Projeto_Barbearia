-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Jun-2022 às 06:01
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agendamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_clientes` int(2) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `sobrenome` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `contato` varchar(30) NOT NULL,
  `servico` varchar(30) NOT NULL,
  `dia` date NOT NULL,
  `hora` time NOT NULL,
  `barbeiro` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `nome`, `sobrenome`, `email`, `telefone`, `contato`, `servico`, `dia`, `hora`, `barbeiro`) VALUES
(33, 'Tiago', 'Brad', 'tiagbra@gmail.com', '982648393', 'email', 'servico', '2022-07-07', '17:30:00', 'Willian'),
(35, 'Gabriel', 'Rodrigues', 'gabrielrr@gmail.com', '5198365842', 'whatsApp', 'cabelo+barba', '2022-07-07', '05:52:00', 'Marcos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` int(3) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(90) NOT NULL,
  `senha` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id_funcionario`, `nome`, `cpf`, `email`, `senha`) VALUES
(1, 'marcos', '8562884714', 'marcos14@gamil.com', 123),
(2, 'paulo', '85606634015', 'paulo15@gmail.com', 123),
(3, 'willian', '85639928516', 'wullian16@gmail.com', 123),
(4, 'joão', '86397736417', 'joao17@gmail.com', 123),
(5, 'lucas', '86398823718', 'lucas18@gmail.com', 123);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(3) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `valor` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `descricao`, `valor`) VALUES
(1, 'cabelo', 30),
(2, 'barba', 20),
(3, 'cabelo e barba', 45);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_clientes`,`telefone`),
  ADD KEY `telefone` (`telefone`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_funcionario`,`cpf`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`,`descricao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_clientes` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
