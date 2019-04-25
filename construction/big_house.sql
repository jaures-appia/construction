-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 25 Avril 2019 à 13:26
-- Version du serveur :  5.7.25-0ubuntu0.18.04.2
-- Version de PHP :  7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `big_house`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `addresse` varchar(150) NOT NULL,
  `nom_compagnie` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dateInscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `email`, `telephone`, `addresse`, `nom_compagnie`, `password`, `dateInscription`) VALUES
(1, 'appia', 'jaures', 'appia@gmail.com', '45556213', 'koumassi', 'joblack', '', '2019-04-19 01:24:25'),
(2, 'apo', 'claire', 'apo@gmail.com', '11223344', 'angre', 'apocompagnie', '1234', '2019-04-19 01:52:59'),
(3, 'bini', 'loel', 'bini@gmail.com', '11446688', 'marcory', '', '1234', '2019-04-24 12:59:54');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_fournisseur` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `statu` int(11) NOT NULL,
  `dateCommande` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_client`, `id_fournisseur`, `description`, `statu`, `dateCommande`) VALUES
(1, 2, 1, '1 camion de gravier', 1, '2019-04-23 16:01:32'),
(2, 2, 0, '3 000 briques', 0, '2019-04-23 16:01:37'),
(3, 2, 2, 'hgfdsfghjk', 2, '2019-04-24 14:55:31'),
(6, 2, 5, '5000 briques', 2, '2019-04-24 23:43:33'),
(7, 2, 6, '2000 briques', 1, '2019-04-25 00:08:47');

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `id_devis` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `statu` int(11) NOT NULL DEFAULT '0',
  `dateDevis` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `devis`
--

INSERT INTO `devis` (`id_devis`, `nom`, `prenom`, `telephone`, `email`, `description`, `statu`, `dateDevis`) VALUES
(1, 'jaures', 'patrick', 4567, 'jja@gmail.com', 'maison basse trois pieces', 2, '2019-04-16 16:06:28'),
(12, 'apo', 'claire', 35343231, 'apo@gmail.com', '2 chambres salon', 1, '2019-04-25 00:10:26');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id_fournisseur` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nom` varchar(150) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `description` text,
  `actualite` text,
  `dateAjout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id_fournisseur`, `username`, `password`, `nom`, `adresse`, `email`, `contact`, `description`, `actualite`, `dateAjout`) VALUES
(2, 'username2', 'username2', 'la grande sableuse', 'koumassi prodomo', 'jja@gmail.com', '12131415', 'nous vendons du sable de construction en grande quantite pour toute vos construction', 'nous avons actuelement en stock 30 tonnes de sable', '2019-04-16 17:36:21'),
(6, 'nan', 'nan', 'nan construction', 'cocody, angre 8ieme tranche', 'nan@gmail.com', '11111111', 'nous vendons des briques', 'nous avons 10000 briques en stock', '2019-04-25 00:05:57');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id_devis`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id_fournisseur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `id_devis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
