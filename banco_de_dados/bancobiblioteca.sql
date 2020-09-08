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
-- Database: `id9573816_bancobiblioteca`
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
(1, 'Classico', 'Dom Quixote', 'Miguel de Cervantes', 3, 3),
(2, 'Romance', 'Guerra e Paz', 'Liev Tolstói', 5, 5),
(3, 'Fantasia', 'A Montanha Mágica', 'Thomas Mann', 2, 2),
(4, 'Imaginação', 'Cem Anos de Solidão', 'Gabriel García Márquez', 1, 1),
(5, 'Biografia', 'Ulisses', 'James Joyce', 4, 4),
(6, 'Fantasia', 'Em Busca do Tempo Perdido', 'Marcel Proust', 2, 2),
(7, 'Comédia', 'A Divina Comédia', 'Dante Alighieri', 2, 2),
(8, 'Fantasia', 'O Homem sem Qualidades', 'Robert Musil', 2, 2),
(9, 'Terror', 'O Processo', 'Franz Kafka', 2, 2),
(10, 'Terror', 'O Som e a Fúria', 'William Faulkner', 2, 2),
(11, 'Historia', 'Crime e Castigo', 'Fiódor Dostoiévski', 2, 2),
(12, 'Classico', 'Orgulho e Preconceito', 'Jane Austen,', 3, 3),
(13, 'Biografia', 'Anna Kariênina', 'Liev Tolstói', 2, 2),
(14, 'Fantasia', 'O Leopardo', 'Tomaso di Lampedusa', 7, 7),
(15, 'Classico', 'Édipo Rei', 'Sófocles', 5, 5);

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
(6, 2222222, 'edu', '123', NULL),
(7, 2298963, 'Ant Eduardo', '123', 'ADMIN'),
(8, 2300371, 'ZZ', '123', NULL);

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
(2298963, 'Antonio Eduardo'),
(2222222, 'edu'),
(2300371, 'Patchola');

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
