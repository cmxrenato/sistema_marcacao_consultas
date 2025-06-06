-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/06/2025 às 22:38
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
(11, '81987609828', '$2y$10$5LhB1OWn6wT6yGeQ094rsuw5uP1ivcanFsHU91MvZhnsypZ9voewu', 'Sam');

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
(91, '19/06/2025', '09:00', '2025-06-03 23:07:01', 1),
(92, '19/06/2025', '12:00', '2025-06-03 23:07:01', 1),
(93, '19/06/2025', '14:00', '2025-06-03 23:07:01', 1),
(94, '19/06/2025', '16:00', '2025-06-03 23:07:01', 1),
(97, '17/06/2025', '09:00', '2025-06-04 21:03:51', 1),
(98, '12/06/2025', '09:00', '2025-06-04 21:04:08', 1),
(99, '11/06/2025', '10:00', '2025-06-04 21:06:27', 1),
(100, '11/06/2025', '13:00', '2025-06-04 21:06:43', 1),
(102, '11/06/2025', '14:00', '2025-06-04 21:11:08', 1),
(103, '12/06/2025', '16:00', '2025-06-06 20:26:50', 1),
(104, '12/06/2025', '15:00', '2025-06-06 20:26:51', 1),
(105, '12/06/2025', '14:00', '2025-06-06 20:26:57', 1),
(106, '12/06/2025', '11:00', '2025-06-06 20:27:00', 1),
(107, '12/06/2025', '10:00', '2025-06-06 20:27:02', 1),
(108, '17/06/2025', '15:00', '2025-06-06 20:27:33', 1),
(109, '17/06/2025', '17:00', '2025-06-06 20:27:37', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `consultas_marcadas`
--
ALTER TABLE `consultas_marcadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

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
