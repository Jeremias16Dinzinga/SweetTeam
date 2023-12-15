-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Dez-2023 às 03:09
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sweetteambd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `collaborator`
--

CREATE TABLE `collaborator` (
  `id_collaborator` int(32) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `profession` varchar(20) NOT NULL,
  `resume` varchar(250) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `linkedinUrl` varchar(500) DEFAULT NULL,
  `twitterUrl` varchar(500) DEFAULT NULL,
  `githubUrl` varchar(500) DEFAULT NULL,
  `country` varchar(250) NOT NULL,
  `create_date` datetime DEFAULT current_timestamp(),
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `message`
--

CREATE TABLE `message` (
  `id_message` int(32) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(300) NOT NULL,
  `id_sender` int(32) NOT NULL,
  `id_destin` int(32) NOT NULL,
  `status` varchar(20) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notice`
--

CREATE TABLE `notice` (
  `id_notice` int(32) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(200) NOT NULL,
  `id_destin` int(32) NOT NULL,
  `status` varchar(20) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `project`
--

CREATE TABLE `project` (
  `id_project` int(32) NOT NULL,
  `description` varchar(100) NOT NULL,
  `scope` varchar(700) NOT NULL,
  `deadline` datetime NOT NULL,
  `id_leader` int(32) NOT NULL,
  `status` varchar(20) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `project_collaborator`
--

CREATE TABLE `project_collaborator` (
  `id_collaborator` int(32) NOT NULL,
  `id_project` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `task`
--

CREATE TABLE `task` (
  `id_task` int(32) NOT NULL,
  `description` varchar(100) NOT NULL,
  `resume` varchar(300) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_project` int(32) NOT NULL,
  `id_collaborator` int(32) NOT NULL,
  `deadline` date NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `collaborator`
--
ALTER TABLE `collaborator`
  ADD PRIMARY KEY (`id_collaborator`);

--
-- Índices para tabela `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Índices para tabela `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id_notice`);

--
-- Índices para tabela `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Índices para tabela `project_collaborator`
--
ALTER TABLE `project_collaborator`
  ADD KEY `id_project` (`id_project`);

--
-- Índices para tabela `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `id_project` (`id_project`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `collaborator`
--
ALTER TABLE `collaborator`
  MODIFY `id_collaborator` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notice`
--
ALTER TABLE `notice`
  MODIFY `id_notice` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `task`
--
ALTER TABLE `task`
  MODIFY `id_task` int(32) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
