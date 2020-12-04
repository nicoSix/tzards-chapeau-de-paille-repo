-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  sam. 14 sep. 2019 à 07:32
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `api_rest`
--
DROP DATABASE IF EXISTS `surf`;
CREATE DATABASE IF NOT EXISTS `surf` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `surf`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Mode', 'Catégorie pour tout ce qui est en rapport avec la mode.', '2019-06-01 00:32:07', '2019-08-30 15:34:33'),
(2, 'Electronique', 'Gadgets, drones et plus.', '2018-06-03 02:34:11', '2019-01-30 16:34:33'),
(3, 'Moteurs', 'Sports mécaniques', '2018-06-01 10:33:07', '2019-07-30 15:34:54'),
(5, 'Films', 'Produits cinématographiques.', '2018-06-01 10:33:07', '2018-01-08 12:27:26'),
(6, 'Livres', 'E-books, livres audio...', '2018-06-01 10:33:07', '2019-01-08 12:27:47'),
(13, 'Sports', 'Articles de sport.', '2018-01-09 02:24:24', '2019-01-09 00:24:24');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`, `categories_id`, `created_at`, `updated_at`) VALUES
(65, 'Samsung Galaxy S 10', 'Le dernier né des téléphones Samsung', '899', 2, '2019-09-07 21:19:09', '2019-09-07 19:19:09'),
(66, 'Habemus Piratam', 'Le livre à propos dun pirate informatique', '13', 6, '2019-09-07 21:21:11', '2019-09-07 19:21:11');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- --------------------------------------------------------

--
-- Structure de la table `alerte`
--

CREATE TABLE `alerte` (
  `idAlerte` int(30) NOT NULL,
  `dateAlerte` date NOT NULL,
  `photoAlerte` text NOT NULL,
  `descrAlerte` varchar(20) NOT NULL,
  `idPollution` int(11) NOT NULL,
  `idZoneProtegee` int(11) NOT NULL,
  `idAnimalDangereux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `animaldangereux`
--

CREATE TABLE `animaldangereux` (
  `idAnimalDangereux` int(11) NOT NULL,
  `nomAnimal` varchar(30) NOT NULL,
  `dateAnimal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `compochimiqueeau`
--

CREATE TABLE `compochimiqueeau` (
  `idCompo` int(11) NOT NULL,
  `dateCompo` date NOT NULL,
  `typeCompo` text NOT NULL,
  `idTauxOxyEau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evenementcollaboratif`
--

CREATE TABLE `evenementcollaboratif` (
  `idEvenement` int(11) NOT NULL,
  `nomEvenement` varchar(30) NOT NULL,
  `dateEvenement` date NOT NULL,
  `descrEvenement` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `houle`
--

CREATE TABLE `houle` (
  `idHoule` int(11) NOT NULL,
  `mesureHoule` double NOT NULL,
  `dateHoule` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE `lieu` (
  `idLieu` int(11) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `photoLieu` text NOT NULL,
  `idTemperatureEau` int(11) NOT NULL,
  `idHoule` double NOT NULL,
  `idMaree` int(11) NOT NULL,
  `idEvenement` int(11) NOT NULL,
  `idCompo` int(11) NOT NULL,
  `idMeteo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `maree`
--

CREATE TABLE `maree` (
  `idMaree` int(11) NOT NULL,
  `descrMaree` varchar(50) NOT NULL,
  `dateMaree` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `meteo`
--

CREATE TABLE `meteo` (
  `idMeteo` int(11) NOT NULL,
  `dateMeteo` date NOT NULL,
  `typeTemps` varchar(50) NOT NULL,
  `idVent` int(11) NOT NULL,
  `idPrecipitation` int(11) NOT NULL,
  `idTemperature` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pollution`
--

CREATE TABLE `pollution` (
  `idPollution` int(11) NOT NULL,
  `nomPollution` varchar(30) NOT NULL,
  `datePollution` date NOT NULL,
  `typePollution` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `precipitation`
--

CREATE TABLE `precipitation` (
  `idPrecipitation` int(11) NOT NULL,
  `datePrecipitation` date NOT NULL,
  `intensitePrecipitation` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sessionsurf`
--

CREATE TABLE `sessionsurf` (
  `idSessionSurf` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `avisSession` tinyint(1) NOT NULL,
  `frequentation` varchar(50) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `idLieu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sessionsurf`
--

INSERT INTO `sessionsurf` (`idSessionSurf`, `dateDebut`, `dateFin`, `avisSession`, `frequentation`, `latitude`, `longitude`, `idLieu`) VALUES
(2, '0000-00-00', '0000-00-00', 0, '1263', 12.63, 24.63, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tauxoxygeneeau`
--

CREATE TABLE `tauxoxygeneeau` (
  `idTauxOxyEau` int(11) NOT NULL,
  `dateTauxOxy` date NOT NULL,
  `mesureTauxOxyEau` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `temperature`
--

CREATE TABLE `temperature` (
  `idTemperature` int(11) NOT NULL,
  `dateTemperature` date NOT NULL,
  `mesureTemperature` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `temperatureeau`
--

CREATE TABLE `temperatureeau` (
  `idTemperatureEau` int(11) NOT NULL,
  `dateTemperatureEau` date NOT NULL,
  `mesureTemperatureEau` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUti` int(11) NOT NULL,
  `nomUti` varchar(20) NOT NULL,
  `prenomUti` varchar(20) NOT NULL,
  `numTelUti` int(11) NOT NULL,
  `mailUti` text NOT NULL,
  `mdpUti` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUti`, `nomUti`, `prenomUti`, `numTelUti`, `mailUti`, `mdpUti`, `admin`) VALUES
(1, 'azed', 'azea', 96432, 'azed@', 'azed', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vent`
--

CREATE TABLE `vent` (
  `idVent` int(11) NOT NULL,
  `dateVitesse` date NOT NULL,
  `vitesseVent` double NOT NULL,
  `directionVent` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `zoneprotegee`
--

CREATE TABLE `zoneprotegee` (
  `idZoneProtegee` int(11) NOT NULL,
  `dateZoneProtegee` date NOT NULL,
  `typeZoneProtegee` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `alerte`
--
ALTER TABLE `alerte`
  ADD PRIMARY KEY (`idAlerte`),
  ADD UNIQUE KEY `idPollution` (`idPollution`),
  ADD UNIQUE KEY `idZoneProtegee` (`idZoneProtegee`),
  ADD UNIQUE KEY `idAnimalDangereux` (`idAnimalDangereux`);

--
-- Index pour la table `animaldangereux`
--
ALTER TABLE `animaldangereux`
  ADD PRIMARY KEY (`idAnimalDangereux`);

--
-- Index pour la table `compochimiqueeau`
--
ALTER TABLE `compochimiqueeau`
  ADD PRIMARY KEY (`idCompo`),
  ADD UNIQUE KEY `idTauxOxyEau` (`idTauxOxyEau`);

--
-- Index pour la table `evenementcollaboratif`
--
ALTER TABLE `evenementcollaboratif`
  ADD PRIMARY KEY (`idEvenement`);

--
-- Index pour la table `houle`
--
ALTER TABLE `houle`
  ADD PRIMARY KEY (`idHoule`);

--
-- Index pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD PRIMARY KEY (`idLieu`),
  ADD UNIQUE KEY `idTemperatureEau` (`idTemperatureEau`) USING BTREE,
  ADD UNIQUE KEY `idHoule` (`idHoule`) USING BTREE,
  ADD UNIQUE KEY `idMaree` (`idMaree`),
  ADD UNIQUE KEY `idEvenement` (`idEvenement`),
  ADD UNIQUE KEY `idCompo` (`idCompo`),
  ADD UNIQUE KEY `idMeteo` (`idMeteo`);

--
-- Index pour la table `maree`
--
ALTER TABLE `maree`
  ADD PRIMARY KEY (`idMaree`);

--
-- Index pour la table `meteo`
--
ALTER TABLE `meteo`
  ADD PRIMARY KEY (`idMeteo`),
  ADD UNIQUE KEY `idVent` (`idVent`),
  ADD UNIQUE KEY `idPrecipitation` (`idPrecipitation`),
  ADD UNIQUE KEY `idTemperature` (`idTemperature`);

--
-- Index pour la table `pollution`
--
ALTER TABLE `pollution`
  ADD PRIMARY KEY (`idPollution`);

--
-- Index pour la table `precipitation`
--
ALTER TABLE `precipitation`
  ADD PRIMARY KEY (`idPrecipitation`);

--
-- Index pour la table `sessionsurf`
--
ALTER TABLE `sessionsurf`
  ADD PRIMARY KEY (`idSessionSurf`),
  ADD UNIQUE KEY `idLieu` (`idLieu`);

--
-- Index pour la table `tauxoxygeneeau`
--
ALTER TABLE `tauxoxygeneeau`
  ADD PRIMARY KEY (`idTauxOxyEau`);

--
-- Index pour la table `temperature`
--
ALTER TABLE `temperature`
  ADD PRIMARY KEY (`idTemperature`);

--
-- Index pour la table `temperatureeau`
--
ALTER TABLE `temperatureeau`
  ADD PRIMARY KEY (`idTemperatureEau`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUti`);

--
-- Index pour la table `vent`
--
ALTER TABLE `vent`
  ADD PRIMARY KEY (`idVent`);

--
-- Index pour la table `zoneprotegee`
--
ALTER TABLE `zoneprotegee`
  ADD PRIMARY KEY (`idZoneProtegee`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `alerte`
--
ALTER TABLE `alerte`
  MODIFY `idAlerte` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `animaldangereux`
--
ALTER TABLE `animaldangereux`
  MODIFY `idAnimalDangereux` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `compochimiqueeau`
--
ALTER TABLE `compochimiqueeau`
  MODIFY `idCompo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `evenementcollaboratif`
--
ALTER TABLE `evenementcollaboratif`
  MODIFY `idEvenement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `houle`
--
ALTER TABLE `houle`
  MODIFY `idHoule` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lieu`
--
ALTER TABLE `lieu`
  MODIFY `idLieu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `maree`
--
ALTER TABLE `maree`
  MODIFY `idMaree` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `meteo`
--
ALTER TABLE `meteo`
  MODIFY `idMeteo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pollution`
--
ALTER TABLE `pollution`
  MODIFY `idPollution` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `precipitation`
--
ALTER TABLE `precipitation`
  MODIFY `idPrecipitation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sessionsurf`
--
ALTER TABLE `sessionsurf`
  MODIFY `idSessionSurf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tauxoxygeneeau`
--
ALTER TABLE `tauxoxygeneeau`
  MODIFY `idTauxOxyEau` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `temperature`
--
ALTER TABLE `temperature`
  MODIFY `idTemperature` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `vent`
--
ALTER TABLE `vent`
  MODIFY `idVent` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `zoneprotegee`
--
ALTER TABLE `zoneprotegee`
  MODIFY `idZoneProtegee` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `compochimiqueeau`
--
ALTER TABLE `compochimiqueeau`
  ADD CONSTRAINT `compochimiqueeau_ibfk_1` FOREIGN KEY (`idCompo`) REFERENCES `lieu` (`idLieu`);

--
-- Contraintes pour la table `maree`
--
ALTER TABLE `maree`
  ADD CONSTRAINT `maree_ibfk_1` FOREIGN KEY (`idMaree`) REFERENCES `lieu` (`idLieu`);

--
-- Contraintes pour la table `meteo`
--
ALTER TABLE `meteo`
  ADD CONSTRAINT `meteo_ibfk_1` FOREIGN KEY (`idMeteo`) REFERENCES `lieu` (`idLieu`);

--
-- Contraintes pour la table `temperatureeau`
--
ALTER TABLE `temperatureeau`
  ADD CONSTRAINT `temperatureeau_ibfk_1` FOREIGN KEY (`idTemperatureEau`) REFERENCES `lieu` (`idTemperatureEau`);
COMMIT;
