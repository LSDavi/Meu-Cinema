-- phpMyAdmin SQL Dump
-- version 5.2.0-rc1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Dez-2022 às 17:36
-- Versão do servidor: 8.0.20
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `meucinema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `id_genero` int NOT NULL,
  `genero` varchar(30) NOT NULL,
  `pasta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`id_genero`, `genero`, `pasta`) VALUES
(1, 'Musical', ''),
(2, 'Ação', ''),
(3, 'Aventura', ''),
(4, 'Comédia', ''),
(5, 'Comédia Romântica ', ''),
(6, 'Documentário', ''),
(7, 'Drama', ''),
(8, 'Espionagem', ''),
(9, 'Fantasia', ''),
(10, 'Ficção', ''),
(11, 'Ficção Científica', ''),
(12, 'Guerra', ''),
(16, 'Policial', ''),
(17, 'Romance', ''),
(18, 'Suspense', ''),
(19, 'Animação', '../Animação/');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`),
  ADD UNIQUE KEY `genero` (`genero`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
