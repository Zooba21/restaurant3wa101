-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 14 Décembre 2017 à 12:21
-- Version du serveur :  5.7.20-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `restaurant101`
--
CREATE DATABASE IF NOT EXISTS `restaurant101` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `restaurant101`;

-- --------------------------------------------------------

--
-- Structure de la table `deliveryplaces`
--

CREATE TABLE `deliveryplaces` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `adresse` text NOT NULL,
  `adresse2` text NOT NULL,
  `postalCode` int(10) NOT NULL,
  `city` varchar(40) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `itemSold`
--

CREATE TABLE `itemSold` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `buyPrice` int(11) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(70) NOT NULL,
  `url` varchar(50) NOT NULL,
  `quantityStock` int(11) NOT NULL,
  `salePrice` int(11) NOT NULL,
  `visibility` enum('1','0') NOT NULL,
  `alt` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `itemSold`
--

INSERT INTO `itemSold` (`id`, `type`, `buyPrice`, `description`, `name`, `url`, `quantityStock`, `salePrice`, `visibility`, `alt`) VALUES
(1, 'plat', 4, 'fromage,steak,lardon,salade,tomate', 'Cheesburger', 'images/meals/bacon_cheesburger.jpg,', 10, 12, '1', 'image cheesburger'),
(2, 'entrée', 4, 'fromage,thon,salade,tomate', 'Bagel au Thon', 'images/meals/bagel_thon.jpg,', 10, 10, '1', 'image bagel'),
(3, 'dessert', 1, 'oeuf,crème,carotte', 'Carrot Cake', 'images/meals/carrot_cake.jpg', 10, 5, '1', 'image carrot cake'),
(4, 'boisson', 1, 'gaz, coke', 'Coca-Cola', 'images/meals/coca.jpg', 10, 2, '1', 'image coca-cola');

-- --------------------------------------------------------

--
-- Structure de la table `orderDetails`
--

CREATE TABLE `orderDetails` (
  `id` int(11) NOT NULL,
  `orderLineNumber` int(11) NOT NULL,
  `orderNumber` int(11) NOT NULL,
  `itemSoldId` int(11) NOT NULL,
  `quantityOrdered` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `orderDate` datetime NOT NULL,
  `requiredDate` datetime NOT NULL,
  `shippedDate` datetime NOT NULL,
  `status` enum('En cours de Préparation','Livré','Payé','En cours de Livraison') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `password`
--

CREATE TABLE `password` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `password`
--

INSERT INTO `password` (`id`, `userId`, `password`) VALUES
(1, 1, 'adminPSD'),
(13, 22, 'test'),
(14, 25, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `phone` int(13) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `reservationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ressourcesUser`
--

CREATE TABLE `ressourcesUser` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `alt` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ressourcesUser`
--

INSERT INTO `ressourcesUser` (`id`, `userId`, `url`, `alt`) VALUES
(1, 1, 'images/user/1.jpg', 'avatarUser');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `address` text,
  `address2` text,
  `postCode` int(6) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `mail` varchar(40) NOT NULL,
  `inscriptionDate` datetime DEFAULT NULL,
  `rights` enum('User','Employed') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `firstName`, `address`, `address2`, `postCode`, `city`, `phone`, `mail`, `inscriptionDate`, `rights`) VALUES
(1, 'admin', 'admin', '87 rue lolo', '', 75000, 'Paris', 658989898, 'administrator@restaurant101.fr', '2017-12-11 00:00:00', 'User'),
(22, 'Masi', 'Benjamin', NULL, NULL, NULL, NULL, NULL, 'test@hotmail.fr', NULL, 'User'),
(25, 'Benjamin', 'Masi', NULL, NULL, NULL, NULL, NULL, 'test2@hotmail.fr', NULL, 'User');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `deliveryplaces`
--
ALTER TABLE `deliveryplaces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `itemSold`
--
ALTER TABLE `itemSold`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orderDetails`
--
ALTER TABLE `orderDetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemSoldId` (`itemSoldId`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`userId`);

--
-- Index pour la table `password`
--
ALTER TABLE `password`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`userId`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Index pour la table `ressourcesUser`
--
ALTER TABLE `ressourcesUser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemSoldId` (`userId`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `deliveryplaces`
--
ALTER TABLE `deliveryplaces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `itemSold`
--
ALTER TABLE `itemSold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `orderDetails`
--
ALTER TABLE `orderDetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `password`
--
ALTER TABLE `password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ressourcesUser`
--
ALTER TABLE `ressourcesUser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `deliveryplaces`
--
ALTER TABLE `deliveryplaces`
  ADD CONSTRAINT `deliveryplaces_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `orderDetails`
--
ALTER TABLE `orderDetails`
  ADD CONSTRAINT `orderDetails_ibfk_1` FOREIGN KEY (`itemSoldId`) REFERENCES `itemSold` (`id`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `password`
--
ALTER TABLE `password`
  ADD CONSTRAINT `password_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `ressourcesUser`
--
ALTER TABLE `ressourcesUser`
  ADD CONSTRAINT `ressourcesUser_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
