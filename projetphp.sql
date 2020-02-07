-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 07 fév. 2020 à 12:03
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `numchambre` int(10) NOT NULL,
  `prix` int(10) NOT NULL,
  `nblits` int(10) NOT NULL,
  `nbpers` int(10) NOT NULL,
  `confort` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`numchambre`, `prix`, `nblits`, `nbpers`, `confort`, `image`, `description`) VALUES
(1, 80, 3, 5, 'lit King size ,t&eacute;l&eacute; &eacute;cran plat, canal+,baignoire, balcon', 'chambre3.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis pretium urna. Cras tempor tellus iaculis, finibus ante in, congue diam. Praesent nisi velit, auctor ut mauris sollicitudin, semper blandit sapien. Nulla facilisis, sem a mollis finibus, neque felis maximus arcu, eu ultrices orci'),
(2, 100, 3, 3, 'rien', 'chambre2.png', 'fjfjfer'),
(3, 40, 2, 3, 'rien', 'chambre1.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis pretium urna. Cras tempor tellus iaculis, finibus ante in, congue diam. Praesent nisi velit, auctor ut mauris sollicitudin, semper blandit sapien. Nulla facilisis, sem a mollis finibus, neque felis maximus arcu, eu ultrices orci'),
(4, 100, 2, 4, 'lit King size ,tele ecran plat, canal+,baignoire, balcon', 'chambre4.png', 'azeeeeeee'),
(5, 150, 1, 2, 'lit King size ,t&eacute;l&eacute; &eacute;cran plat, canal+,baignoire, balcon', 'chambre5.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(6, 200, 3, 4, 'lit King size ,t&eacute;l&eacute; &eacute;cran plat, canal+,baignoire, balcon', 'chambre6.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `numclient` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `tel` int(10) NOT NULL,
  `adresse` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`numclient`, `nom`, `prenom`, `tel`, `adresse`) VALUES
(1, 'Sanchez', 'emanuel', 78, '30 avenue des champs elys&eacute;es'),
(2, 'eric', 'ribeiro', 0, '1 avenue foch'),
(3, 'perrin', 'laetitia', 6548, 'egRZHGHR'),
(4, 'eric', 'ribeiro', 78, '30 avenue des champs elys&eacute;es');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `numclient` int(11) NOT NULL,
  `numchambre` int(11) NOT NULL,
  `datearivee` varchar(30) NOT NULL,
  `datedepart` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`numclient`, `numchambre`, `datearivee`, `datedepart`) VALUES
(1, 2, '2020', '2020-02-20'),
(2, 1, '2020-02-14', '2020-02-16'),
(4, 1, '2020-02-08', '2020-02-09');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idutil` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idutil`, `login`, `pass`, `role`) VALUES
(1, 'eric', 'c58c9e414019dc5679e83f6244f7876e', 1),
(2, 'receptioniste', '81dc9bdb52d04dc20036dbd8313ed055', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`numchambre`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`numclient`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`numclient`,`numchambre`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`idutil`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `numchambre` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `numclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idutil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`numclient`) REFERENCES `client` (`numclient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
