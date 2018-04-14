-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2018 at 10:26 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `comanda`
--

CREATE TABLE `comanda` (
  `id_comanda` int(11) NOT NULL,
  `data_comanda` datetime NOT NULL,
  `user_account` int(11) NOT NULL,
  `nume_facturare` varchar(100) NOT NULL,
  `telefon_facturare` varchar(12) NOT NULL,
  `adresa_facturare` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comanda`
--

INSERT INTO `comanda` (`id_comanda`, `data_comanda`, `user_account`, `nume_facturare`, `telefon_facturare`, `adresa_facturare`) VALUES
(1, '2018-04-13 15:00:00', 1, 'Iordan Ionut Catalin', '0760272631', 'Pitesti'),
(2, '2018-04-13 15:06:08', 1, 'Iordan Ionut Catalin', '0760272631', 'Pitesti'),
(3, '2018-04-13 15:06:30', 1, 'Iordan Ionut Catalin', '0760272631', 'Pitesti'),
(4, '2018-04-13 15:33:40', 1, 'Iordan Ionut Catalin', '0760272631', 'Pitesti'),
(5, '2018-04-13 16:12:29', 1, 'Iordan Ionut Catalin', '0760272631', 'Pitesti, Stranda Aleee, Nr .36, Bloc 4, Ap 20 '),
(6, '2018-04-13 16:16:11', 1, 'Iordan Ionut Catalin', '0760272631', 'Pitesti'),
(7, '2018-04-13 16:16:14', 1, 'Iordan Ionut Catalin', '0760272631', 'Pitesti'),
(8, '2018-04-13 16:16:18', 1, 'Iordan Ionut Catalin', '0760272631', 'Pitesti'),
(9, '2018-04-13 16:16:59', 1, 'Iordan Ionut Catalin', '0760272631', 'Pitesti');

-- --------------------------------------------------------

--
-- Table structure for table `comanda_preparat`
--

CREATE TABLE `comanda_preparat` (
  `id` int(11) NOT NULL,
  `id_comanda` int(11) NOT NULL,
  `id_preparat` int(11) NOT NULL,
  `numar_preparate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comanda_preparat`
--

INSERT INTO `comanda_preparat` (`id`, `id_comanda`, `id_preparat`, `numar_preparate`) VALUES
(1, 1, 4, 1),
(2, 1, 3, 1),
(3, 2, 4, 1),
(4, 2, 3, 1),
(5, 3, 4, 1),
(6, 3, 3, 1),
(7, 4, 4, 1),
(8, 4, 3, 2),
(9, 4, 1, 1),
(10, 4, 2, 1),
(11, 4, 8, 1),
(12, 4, 10, 3),
(13, 4, 9, 1),
(14, 4, 7, 1),
(15, 4, 6, 1),
(16, 5, 2, 1),
(17, 5, 3, 1),
(18, 5, 1, 1),
(19, 5, 4, 1),
(20, 6, 2, 1),
(21, 6, 3, 1),
(22, 6, 1, 1),
(23, 6, 4, 1),
(24, 7, 2, 1),
(25, 7, 3, 1),
(26, 7, 1, 1),
(27, 7, 4, 1),
(28, 8, 2, 1),
(29, 8, 3, 1),
(30, 8, 1, 1),
(31, 8, 4, 1),
(32, 9, 2, 2),
(33, 9, 3, 1),
(34, 9, 1, 1),
(35, 9, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `preparat`
--

CREATE TABLE `preparat` (
  `id_preparat` int(11) NOT NULL,
  `denumire` varchar(100) NOT NULL,
  `imagine_path` varchar(300) NOT NULL,
  `pret` decimal(10,2) NOT NULL,
  `categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preparat`
--

INSERT INTO `preparat` (`id_preparat`, `denumire`, `imagine_path`, `pret`, `categorie`) VALUES
(1, 'Coca cola', 'images/preparate/coca-cola.jpg', '5.00', 'Bauturi'),
(2, 'Fanta', 'images/preparate/fanta.jpg', '5.00', 'Bauturi'),
(3, 'Sprite', 'images/preparate/sprite.png', '6.00', 'Bauturi'),
(4, 'Pepsi', 'images/preparate/pepsi.jpg', '4.00', 'Bauturi'),
(5, 'Jack Daniels.jpeg', 'images/preparate/jack-daniels.jpeg', '120.00', 'Bauturi'),
(6, 'Pate de ficat de pui, reteta frantuzeasa', 'images/preparate/pate-de-ficat-de-pui-reteta-frantuzeasca.jpg', '35.00', 'Aperitive'),
(7, 'Check aperitiv multicolor by Ana', 'images/preparate/chec-aperitiv-multicolor-by-ana.jpg', '15.99', 'Aperitive'),
(8, 'Dovlecei crocanti la cuptor', 'images/preparate/dovlecei-crocanti-la-cuptor.jpg', '16.00', 'Aperitive'),
(9, 'Oua umplute', 'images/preparate/oua-umplute-un-aperitiv-delicios-cu-36-de-umpluturi.jpg', '22.00', 'Aperitive'),
(10, 'Shakshuka', 'images/preparate/shakshuka.jpg', '40.00', 'Aperitive');

-- --------------------------------------------------------

--
-- Table structure for table `rezervare`
--

CREATE TABLE `rezervare` (
  `id_rezervare` int(11) NOT NULL,
  `data_inceput` datetime NOT NULL,
  `data_final` datetime NOT NULL,
  `user_accout` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id_account` int(11) NOT NULL,
  `nume` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `parola` varchar(1000) NOT NULL,
  `adresa` varchar(1000) NOT NULL,
  `telefon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id_account`, `nume`, `email`, `parola`, `adresa`, `telefon`) VALUES
(1, 'Iordan Ionut Catalin', 'catalin.iordan97@gmail.com', '$2y$10$3uVut61ftCLzCxCnMLvmi.PJN.niGxgFYQLFLNyKAr0eRqtXbW12C', 'Pitesti', '0760272631');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`id_comanda`),
  ADD KEY `user_accout` (`user_account`);

--
-- Indexes for table `comanda_preparat`
--
ALTER TABLE `comanda_preparat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comanda` (`id_comanda`),
  ADD KEY `id_preparat` (`id_preparat`);

--
-- Indexes for table `preparat`
--
ALTER TABLE `preparat`
  ADD PRIMARY KEY (`id_preparat`);

--
-- Indexes for table `rezervare`
--
ALTER TABLE `rezervare`
  ADD PRIMARY KEY (`id_rezervare`),
  ADD KEY `user_accout` (`user_accout`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id_account`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comanda`
--
ALTER TABLE `comanda`
  MODIFY `id_comanda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comanda_preparat`
--
ALTER TABLE `comanda_preparat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `preparat`
--
ALTER TABLE `preparat`
  MODIFY `id_preparat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rezervare`
--
ALTER TABLE `rezervare`
  MODIFY `id_rezervare` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `comanda_ibfk_1` FOREIGN KEY (`user_account`) REFERENCES `user_account` (`id_account`);

--
-- Constraints for table `comanda_preparat`
--
ALTER TABLE `comanda_preparat`
  ADD CONSTRAINT `comanda_preparat_ibfk_1` FOREIGN KEY (`id_comanda`) REFERENCES `comanda` (`id_comanda`),
  ADD CONSTRAINT `comanda_preparat_ibfk_2` FOREIGN KEY (`id_preparat`) REFERENCES `preparat` (`id_preparat`);

--
-- Constraints for table `rezervare`
--
ALTER TABLE `rezervare`
  ADD CONSTRAINT `rezervare_ibfk_1` FOREIGN KEY (`user_accout`) REFERENCES `user_account` (`id_account`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
