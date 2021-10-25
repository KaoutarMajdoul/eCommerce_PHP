-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 24, 2017 at 05:34 PM
-- Server version: 5.5.47-0+deb8u1
-- PHP Version: 7.0.4-1~dotdeb+8.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `graptinr`
--

-- --------------------------------------------------------

--
-- Table structure for table `Achat`
--

CREATE TABLE `Achat` (
  `idUser` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `dateAchat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Produits`
--

CREATE TABLE `Produits` (
  `idProduit` int(11) NOT NULL,
  `idVendeur` int(11) NOT NULL,
  `nomProduit` varchar(100) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `prix` int(5) NOT NULL,
  `genre` int(1) NOT NULL,
  `couleur` varchar(30) NOT NULL,
  `taille` int(5) NOT NULL,
  `photo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateurs`
--

CREATE TABLE `Utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `dateInscription` date NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `nomVille` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Achat`
--
ALTER TABLE `Achat`
  ADD PRIMARY KEY (`idUser`,`idProduit`),
  ADD KEY `idProduit` (`idProduit`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`nom`),
  ADD UNIQUE KEY `nom_2` (`nom`),
  ADD KEY `nom` (`nom`);

--
-- Indexes for table `Produits`
--
ALTER TABLE `Produits`
  ADD PRIMARY KEY (`idProduit`),
  ADD UNIQUE KEY `idProduit` (`idProduit`),
  ADD KEY `categorie` (`categorie`),
  ADD KEY `idVendeur` (`idVendeur`);

--
-- Indexes for table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Produits`
--
ALTER TABLE `Produits`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Achat`
--
ALTER TABLE `Achat`
  ADD CONSTRAINT `Achat_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `Produits` (`idProduit`),
  ADD CONSTRAINT `Achat_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Utilisateurs` (`id`);

--
-- Constraints for table `Produits`
--
ALTER TABLE `Produits`
  ADD CONSTRAINT `Produits_ibfk_2` FOREIGN KEY (`idVendeur`) REFERENCES `Utilisateurs` (`id`),
  ADD CONSTRAINT `Produits_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `Categories` (`nom`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
