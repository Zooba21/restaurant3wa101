-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 08 Décembre 2017 à 10:30
-- Version du serveur :  5.7.20-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `resto`
--

-- --------------------------------------------------------

--
-- Structure de la table `Clientcoordonnees`
--

CREATE TABLE `Clientcoordonnees` (
  `NumeroClient` int(11) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Ville` varchar(70) NOT NULL,
  `Telephone` varchar(70) NOT NULL,
  `Autres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Livraison`
--

CREATE TABLE `Livraison` (
  `Id` int(11) NOT NULL,
  `Datepreparation` varchar(70) NOT NULL,
  `Datenvoi` varchar(70) NOT NULL,
  `Datelivraison` varchar(70) NOT NULL,
  `Status` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Menu`
--

CREATE TABLE `Menu` (
  `Id` int(11) NOT NULL,
  `Name` varchar(70) NOT NULL,
  `Categorie` enum('Boisson','Plat','Dessert') NOT NULL,
  `Description` text NOT NULL,
  `Photo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `QuantityInStock` int(11) NOT NULL,
  `BuyPrice` int(11) NOT NULL,
  `SalePrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Menu`
--

INSERT INTO `Menu` (`Id`, `Name`, `Categorie`, `Description`, `Photo`, `QuantityInStock`, `BuyPrice`, `SalePrice`) VALUES
(1, 'Coca-Cola', 'Boisson', 'Mmmm, le Coca-Cola avec 10 morceaux de sucres et tout plein de caféine !', 'coca.jpg', 72, 1, 3),
(4, 'Carrot Cake', 'Dessert', 'Le carrot cake maison ravira les plus gourmands et les puristes : tous les ingrédients sont naturels !\r\nÀ consommer sans modération', 'carrot_cake.jpg', 9, 3, 7),
(5, 'Donut Chocolat', 'Dessert', 'Les donuts sont fabriqués le matin même et sont recouvert d\'une délicieuse sauce au chocolat !', 'chocolate_donut.jpg', 16, 3, 6),
(6, 'Dr. Pepper', 'Boisson', 'Son goût sucré avec de l\'amande vous ravira !', 'drpepper.jpg', 53, 1, 3),
(7, 'Milkshake', 'Dessert', 'Notre milkshake bien crémeux contient des morceaux d\'Oréos et est accompagné de crème chantilly et de smarties en guise de topping. Il éblouira vos papilles !', 'milkshake.jpg', 12, 2, 5),
(8, 'Fanta', 'Boisson', 'boisson à l\'orange', '', 55, 1, 3),
(9, 'Orangina', 'Boisson', 'boisson à l\'orange. Secouez-moi !', '', 35, 1, 3),
(10, 'Tacos steak hache', 'Plat', 'Tacos de steack haché avec du fromage et sauce au choix.', '', 100, 3, 7),
(11, 'Burger triple cheese', 'Plat', 'Burger triple cheese, fromage de qualité supérieur avec steack haché, salade, tomate et oignon frais.\r\n(Sauce au choix)', '', 100, 3, 7);

-- --------------------------------------------------------

--
-- Structure de la table `Paiements`
--

CREATE TABLE `Paiements` (
  `Id` int(11) NOT NULL,
  `Datepaiement` varchar(70) NOT NULL,
  `DateAchat` varchar(70) NOT NULL,
  `Numerocommande` int(11) NOT NULL,
  `status` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Reservation`
--

CREATE TABLE `Reservation` (
  `Id` int(11) NOT NULL,
  `Numeroclient` int(11) NOT NULL,
  `Numerocommande` int(11) NOT NULL,
  `Datereservation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Clientcoordonnees`
--
ALTER TABLE `Clientcoordonnees`
  ADD PRIMARY KEY (`NumeroClient`);

--
-- Index pour la table `Livraison`
--
ALTER TABLE `Livraison`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Menu`
--
ALTER TABLE `Menu`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Paiements`
--
ALTER TABLE `Paiements`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Clientcoordonnees`
--
ALTER TABLE `Clientcoordonnees`
  MODIFY `NumeroClient` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Livraison`
--
ALTER TABLE `Livraison`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Menu`
--
ALTER TABLE `Menu`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `Paiements`
--
ALTER TABLE `Paiements`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
