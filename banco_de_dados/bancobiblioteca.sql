-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 30-Maio-2019 às 21:32
-- Versão do servidor: 10.3.14-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bancobiblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimos`
--

CREATE TABLE `emprestimos` (
  `FK_id_livro` int(11) NOT NULL,
  `Matricula` int(11) DEFAULT NULL,
  `Usuario` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Data_inicial` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Data_final` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `Id_livro` int(11) NOT NULL,
  `Genero` varchar(30) DEFAULT NULL,
  `Titulo` varchar(100) DEFAULT NULL,
  `Autor` varchar(30) DEFAULT NULL,
  `Quantidade` int(11) DEFAULT NULL,
  `Quantidadedisponivel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`Id_livro`, `Genero`, `Titulo`, `Autor`, `Quantidade`, `Quantidadedisponivel`) VALUES
(1, 'Classico', 'Xom Zuixote', 'Miguel da Arantes', 3, 3),
(2, 'Classico', 'Zuixote Jp', 'Vantes', 4, 4),
(3, 'Classico', 'Zui xote', 'Miguel da vantes', 3, 3),
(4, 'Romance', 'Amorz', 'Miguels', 4, 4),
(5, 'Suspense', 'Dak', 'Mikkelz', 5, 5),
(6, 'Suspense', 'Arkd', 'Michael', 3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `Id_user` int(11) NOT NULL,
  `Matricula` int(11) NOT NULL,
  `Nome` varchar(30) DEFAULT NULL,
  `Senha` varchar(30) DEFAULT NULL,
  `Tipo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`Id_user`, `Matricula`, `Nome`, `Senha`, `Tipo`) VALUES
(1, 2298963, 'ADMIN - Eduardo', '123', 'ADMIN'),
(2, 2222222, 'ALUNO', '123', NULL),
(3, 2300371, 'ALUNO', '123', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariosescola`
--

CREATE TABLE `usuariosescola` (
  `Matricula` int(11) DEFAULT NULL,
  `Nome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuariosescola`
--

INSERT INTO `usuariosescola` (`Matricula`, `Nome`) VALUES
(2298963, 'ADMIN'),
(2222222, 'ALUNO'),
(2300371, 'ALUNO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`Id_livro`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_user`),
  ADD UNIQUE KEY `matricula` (`Matricula`);

--
-- Indexes for table `usuariosescola`
--
ALTER TABLE `usuariosescola`
  ADD UNIQUE KEY `matricula` (`Matricula`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `livros`
--
ALTER TABLE `livros`
  MODIFY `Id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
