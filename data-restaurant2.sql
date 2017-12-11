-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 11 Décembre 2017 à 15:01
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
-- Structure de la table `itemssold`
--

CREATE TABLE `itemssold` (
  `id` int(11) NOT NULL,
  `type` enum('Drink','Entrée','Plat','Dessert','Autre') NOT NULL,
  `buyPrice` int(11) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(70) NOT NULL,
  `picture` text NOT NULL,
  `quantityStock` int(11) NOT NULL,
  `salePrice` int(11) NOT NULL,
  `visibility` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `orderDate` datetime NOT NULL,
  `requiredDate` datetime NOT NULL,
  `shippedDate` datetime NOT NULL,
  `status` enum('En cours de Préparation','Livré','Payé','En cours de Livraison') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `orderLineNumber` int(11) NOT NULL,
  `orderNumber` int(11) NOT NULL,
  `itemSold_id` int(11) NOT NULL,
  `quantityOrdered` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `password`
--

CREATE TABLE `password` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `password` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Structure de la table `ressources`
--

CREATE TABLE `ressources` (
  `id` int(11) NOT NULL,
  `itemSoldId` int(11) NOT NULL,
  `url` int(11) NOT NULL,
  `alt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `address2` text NOT NULL,
  `postCode` int(6) NOT NULL,
  `city` varchar(40) NOT NULL,
  `phone` int(11) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `inscriptionDate` datetime NOT NULL,
  `rights` enum('User','Employed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `firstName`, `address`, `address2`, `postCode`, `city`, `phone`, `mail`, `inscriptionDate`, `rights`) VALUES
(1, 'test', 'test', '87 rue lolo', '', 75000, 'Paris', 658989898, 'petitlulu@hotmail.fr', '2017-12-11 00:00:00', 'User');

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
-- Index pour la table `itemssold`
--
ALTER TABLE `itemssold`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password`
--
ALTER TABLE `password`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ressources`
--
ALTER TABLE `ressources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemSoldId` (`itemSoldId`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `deliveryplaces`
--
ALTER TABLE `deliveryplaces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `itemssold`
--
ALTER TABLE `itemssold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `password`
--
ALTER TABLE `password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ressources`
--
ALTER TABLE `ressources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `deliveryplaces`
--
ALTER TABLE `deliveryplaces`
  ADD CONSTRAINT `deliveryplaces_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `ressources`
--
ALTER TABLE `ressources`
  ADD CONSTRAINT `ressources_ibfk_1` FOREIGN KEY (`itemSoldId`) REFERENCES `itemssold` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
