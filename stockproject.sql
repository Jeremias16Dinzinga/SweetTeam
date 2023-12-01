-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Dez-2023 às 01:44
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
-- Banco de dados: `stockproject`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `moviment`
--

CREATE TABLE `moviment` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type` varchar(40) NOT NULL,
  `qt` int(32) NOT NULL,
  `date_regist` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `moviment`
--

INSERT INTO `moviment` (`id`, `id_product`, `id_user`, `type`, `qt`, `date_regist`) VALUES
(1, 1, 2, 'takeOff', 10, '2022-08-12 11:26:07'),
(2, 3, 2, 'stockUp', 15, '2022-08-12 11:26:15'),
(3, 2, 2, 'takeOff', 2, '2022-08-12 11:26:24'),
(4, 2, 2, 'stockUp', 3, '2022-08-12 00:29:08'),
(5, 1, 4, 'stockUp', 5, '2023-04-03 06:30:26'),
(6, 1, 4, 'takeOff', 1000, '2023-04-03 06:30:39'),
(7, 1, 4, 'stockUp', 1000, '2023-04-03 06:31:35'),
(8, 1, 4, 'takeOff', 30, '2023-04-03 06:40:28'),
(9, 1, 4, 'stockUp', 25, '2023-04-03 06:44:19'),
(10, 1, 4, 'takeOff', 27, '2023-04-03 06:44:46'),
(11, 1, 4, 'stockUp', 25, '2023-04-03 06:47:01'),
(12, 1, 4, 'takeOff', 27, '2023-04-03 06:47:19'),
(13, 1, 4, 'takeOff', 2, '2023-04-03 07:09:27'),
(14, 1, 4, 'takeOff', 1, '2023-04-03 07:11:13'),
(15, 1, 4, 'takeOff', 1, '2023-04-03 07:18:00'),
(16, 1, 4, 'takeOff', 1, '2023-04-03 07:20:21'),
(17, 1, 4, 'takeOff', 1, '2023-04-03 07:21:21'),
(18, 1, 4, 'takeOff', 1, '2023-04-03 07:25:10'),
(19, 1, 4, 'stockUp', 4, '2023-04-03 07:31:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `type` varchar(80) NOT NULL,
  `picture` varchar(125) NOT NULL,
  `date_regist` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `qt` int(32) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `product`
--

INSERT INTO `product` (`id`, `product_name`, `type`, `picture`, `date_regist`, `qt`, `price`) VALUES
(1, 'Tv plasma LG 32p', 'electronic tool', 'Files/product/62f30388868b3.jpg', '2023-10-30 09:44:50', 23, '40000'),
(2, 'Impriter Hp smart', 'electronic tool', 'Files/product/62f303a20d8c7.jpg', '2023-10-30 09:45:57', 18, '40000'),
(3, 'T-shirt', 'clothing', 'Files/product/62f57cf32c163.jpg', '2023-10-30 09:46:50', 51, '2500');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL,
  `indentity` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `picture` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `indentity`, `phone`, `picture`) VALUES
(2, 'Jeremias Dinzinga', 'jere@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '005089468LA043', '941747137', 'Files/user/64f7c60a79e90.jpg'),
(3, 'Kaleb Dinzinga', 'kaleb@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '004045476LA033', '923457623', 'Files/user/64f7c6c52fc7e.jpg'),
(4, 'Ana Fernandes', 'ana@gmail.com', 'ec79d4bed810ed64267d169b0d37373e', '012084568KS034', '952547647', 'Files/user/64f7c66d024c2.jpg'),
(5, 'Benedita Dinzinga', 'benedita@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '48737373LA048', '952543647', 'Files/user/64f7c5c2a2feb.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `moviment`
--
ALTER TABLE `moviment`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `moviment`
--
ALTER TABLE `moviment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
