-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Dez-2022 às 17:05
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
-- Banco de dados: `trip_east`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `hotel` varchar(100) NOT NULL,
  `hotel_stars` int(1) NOT NULL,
  `price` float NOT NULL,
  `departure_date` date NOT NULL,
  `date_back` date NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `packages`
--

INSERT INTO `packages` (`id`, `destination`, `hotel`, `hotel_stars`, `price`, `departure_date`, `date_back`, `image`) VALUES
(1, 'Terra Santa', 'Port and Blue TLV', 5, 14770, '2023-08-10', '2023-08-22', 'terra-santa.jpg'),
(2, 'Turquia', 'Hotel Romantic Mansion', 5, 15440, '2023-07-15', '2023-07-25', 'turquia.jpg'),
(3, 'Jordânia', 'Petra By Night', 3, 8730, '2023-08-25', '2023-08-09', 'jordania.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Marcelo Pereira', 'marcelo@tripeast.com.br', '81dc9bdb52d04dc20036dbd8313ed055'),
(68, 'Sohaib Mohammed', 'mohammed@tripeast.com.br', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
