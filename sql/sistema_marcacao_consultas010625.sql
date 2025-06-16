-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/06/2025 às 22:11
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
-- Banco de dados: `sistema_marcacao_consultas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `login`, `senha`, `nome`) VALUES
(9, '81999401091', '$2y$10$FKzQqmL19FEbMxx1Phvvpe5hlz2JLGiQdxM/G/FI7kARhft7j9bKG', 'Renato Leal'),
(10, '81987609828', '$2y$10$utPHNNLAHSKG3qkYjm98Z.BL/M24NuEl8yaBZRCQ/xgsNORLN8.hS', 'Sam');

-- --------------------------------------------------------

--
-- Estrutura para tabela `consultas_marcadas`
--

CREATE TABLE `consultas_marcadas` (
  `id` int(11) NOT NULL,
  `data_consulta` varchar(10) DEFAULT NULL,
  `horario` varchar(5) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `consultas_marcadas`
--

INSERT INTO `consultas_marcadas` (`id`, `data_consulta`, `horario`, `nome`, `telefone`, `criado_em`) VALUES
(2, '17/06/2025', '09:00', 'Renato Leal', '81999401091', '2025-06-01 18:52:21');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medicos`
--

CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medicos`
--

INSERT INTO `medicos` (`id`, `nome`, `login`, `senha`) VALUES
(1, 'Renato', 'renato@email.com', '$2y$10$yAZge4xCFRmRpETXdmm9v.x4GYz.9o7hYtrfS3/.EvjUAnMAn3O2u'),
(2, 'João', 'joao@email.com', '$2y$10$R0FptvkAB.LX/wgvcjjdU.4gDcEwsFwroZZRmJpir/n9PWJn9BhgS');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pacientes_consultas`
--

CREATE TABLE `pacientes_consultas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `data_consulta` date NOT NULL,
  `horario` time NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `selecoes_consultas`
--

CREATE TABLE `selecoes_consultas` (
  `id` int(11) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `horario` varchar(5) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `medico_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `selecoes_consultas`
--

INSERT INTO `selecoes_consultas` (`id`, `dia`, `horario`, `criado_em`, `medico_id`) VALUES
(80, '17/06/2025', '15:00', '2025-05-31 01:44:03', 1),
(81, '17/06/2025', '17:00', '2025-05-31 01:44:03', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Índices de tabela `consultas_marcadas`
--
ALTER TABLE `consultas_marcadas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Índices de tabela `pacientes_consultas`
--
ALTER TABLE `pacientes_consultas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `selecoes_consultas`
--
ALTER TABLE `selecoes_consultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_medico` (`medico_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `consultas_marcadas`
--
ALTER TABLE `consultas_marcadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `pacientes_consultas`
--
ALTER TABLE `pacientes_consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `selecoes_consultas`
--
ALTER TABLE `selecoes_consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `selecoes_consultas`
--
ALTER TABLE `selecoes_consultas`
  ADD CONSTRAINT `fk_medico` FOREIGN KEY (`medico_id`) REFERENCES `medicos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
