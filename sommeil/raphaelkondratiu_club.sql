-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmy   nt2002.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 11 sep. 2024 à 14:30
-- Version du serveur : 8.0.37
-- Version de PHP : 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `raphaelkondratiu_club`
--

-- --------------------------------------------------------

--
-- Structure de la table `Identifiant`
--

CREATE TABLE `Identifiant` (
  `ID` int NOT NULL,
  `Identifiant` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Identifiant`
--

INSERT INTO `Identifiant` (`ID`, `Identifiant`, `password`) VALUES
(1, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `Match`
--

CREATE TABLE `Match` (
  `ID` int NOT NULL,
  `NOM` varchar(256) NOT NULL,
  `Adversaire` varchar(128) NOT NULL,
  `Date` date NOT NULL,
  `Resultat` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Match`
--

INSERT INTO `Match` (`ID`, `NOM`, `Adversaire`, `Date`, `Resultat`) VALUES
(6, 'Doe', 'Smith', '2023-03-26', 'Victoire'),
(7, 'Johnson', 'Doe', '2023-06-15', 'Défaite'),
(8, 'Williams', 'Johnson', '2023-09-20', 'Victoire'),
(9, 'Brown', 'Williams', '2023-12-25', 'Victoire'),
(10, 'Jones', 'Brown', '2024-03-01', 'Défaite'),
(11, 'Garcia', 'Jones', '2024-05-05', 'Victoire'),
(12, 'Miller', 'Garcia', '2024-07-10', 'Défaite'),
(13, 'Davis', 'Miller', '2024-10-15', 'Victoire'),
(14, 'Martinez', 'Davis', '2024-01-20', 'Victoire'),
(15, 'Hernandez', 'Martinez', '2024-05-25', 'Défaite'),
(16, 'vlouch', 'vlad', '1212-12-12', 'Victoire');

-- --------------------------------------------------------

--
-- Structure de la table `Membres`
--

CREATE TABLE `Membres` (
  `ID` int NOT NULL,
  `Nom` varchar(64) NOT NULL,
  `Prenom` varchar(64) NOT NULL,
  `Age` int NOT NULL,
  `Status` varchar(13) NOT NULL DEFAULT '"Amateur"',
  `Adresse` varchar(256) NOT NULL,
  `Record` time NOT NULL,
  `MatchWin` int NOT NULL DEFAULT '0',
  `MatchLoose` int NOT NULL DEFAULT '0',
  `phone` int NOT NULL,
  `Sexe` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Membres`
--

INSERT INTO `Membres` (`ID`, `Nom`, `Prenom`, `Age`, `Status`, `Adresse`, `Record`, `MatchWin`, `MatchLoose`, `phone`, `Sexe`) VALUES
(56, 'Cassetete', 'Jean', 36, 'Professionnel', '13 rue de Paris Paris', '22:55:00', 123, 100, 101010101, 'LGBTQIA+'),
(57, 'Mbappé', 'Kylian', 22, 'Professionnel', 'chez moi', '01:02:00', 1, 1, 101010101, 'LGBTQIA+'),
(58, 'Poubelle', 'Ruel', 13, 'Amateur', 'Poubelle du batiment 2', '23:03:00', 1, 0, 1010101, 'LGBTQIA+'),
(139, 'inshape', 'tibo', 23, 'Professionnel', '13 rue du paradis - Thun', '04:02:00', 0, 1, 1208970, 'Homme'),
(140, 'Dupont', 'Jean', 30, 'Professionnel', '1 rue de Paris', '10:30:00', 10, 5, 123456789, 'Homme'),
(141, 'Durand', 'Marie', 25, 'Amateur', '2 avenue des Champs', '09:45:00', 8, 7, 987654321, 'Femme'),
(142, 'Martin', 'Luc', 35, 'Professionnel', '3 rue de la Liberté', '11:20:00', 15, 3, 456789123, 'Homme'),
(143, 'Lefevre', 'Sophie', 28, 'Amateur', '4 rue du Commerce', '08:15:00', 6, 9, 789456123, 'Femme'),
(144, 'Dubois', 'Thomas', 32, 'Professionnel', '5 avenue Victor Hugo', '09:55:00', 12, 6, 159357486, 'Homme'),
(145, 'Moreau', 'Camille', 29, 'Amateur', '6 rue Saint-Michel', '07:45:00', 7, 8, 369258147, 'Femme'),
(146, 'Petit', 'Pierre', 31, 'Professionnel', '7 rue des Lilas', '10:10:00', 14, 4, 258147369, 'Homme'),
(147, 'Robert', 'Julie', 27, 'Amateur', '8 avenue Foch', '06:30:00', 5, 10, 147258369, 'Femme'),
(148, 'Dupuis', 'Nicolas', 33, 'Professionnel', '9 rue du Bac', '11:40:00', 11, 7, 963852741, 'Homme'),
(149, 'Simon', 'Elodie', 26, 'Amateur', '10 avenue Montaigne', '05:20:00', 4, 11, 852963147, 'Femme'),
(150, 'Bertrand', 'Alexandre', 34, 'Professionnel', '11 rue Royale', '11:00:00', 13, 3, 741852963, 'Homme'),
(151, 'Lemoine', 'Charlotte', 29, 'Amateur', '12 avenue de l\'Opéra', '07:35:00', 6, 9, 654789123, 'Femme'),
(152, 'Roux', 'Antoine', 35, 'Professionnel', '13 rue de Rivoli', '11:55:00', 16, 2, 369147258, 'Homme'),
(153, 'Garcia', 'Manon', 28, 'Amateur', '14 avenue Marceau', '08:45:00', 8, 8, 852147369, 'Femme'),
(154, 'Fournier', 'Guillaume', 36, 'Professionnel', '15 rue de la Paix', '12:30:00', 18, 1, 147963852, 'Homme'),
(155, 'Michel', 'Laura', 27, 'Amateur', '16 avenue des Ternes', '06:15:00', 5, 10, 369852147, 'Femme'),
(156, 'Lefort', 'Mathieu', 37, 'Professionnel', '17 rue de la Roquette', '12:50:00', 20, 0, 963147852, 'Homme'),
(157, 'Leroy', 'Emma', 26, 'Amateur', '18 avenue de la République', '05:10:00', 3, 12, 741369258, 'Femme'),
(158, 'Girard', 'Vincent', 38, 'Professionnel', '19 rue de la Gare', '13:20:00', 22, 0, 852369147, 'Homme'),
(159, 'Roy', 'Lea', 25, 'Amateur', '20 avenue Gambetta', '04:40:00', 2, 13, 369741258, 'Femme'),
(160, 'Martin', 'Alice', 23, 'Amateur', '21 rue de la Liberté', '08:30:00', 7, 6, 123456789, 'Femme'),
(161, 'Dubois', 'Arthur', 30, 'Professionnel', '22 avenue des Champs', '10:00:00', 12, 5, 987654321, 'Homme'),
(162, 'Lefevre', 'Emma', 28, 'Amateur', '23 rue de Paris', '09:15:00', 6, 8, 456789123, 'Femme'),
(163, 'Durand', 'Louis', 35, 'Professionnel', '24 rue du Commerce', '11:20:00', 15, 3, 789456123, 'Homme'),
(164, 'Garcia', 'Chloé', 26, 'Amateur', '25 avenue Victor Hugo', '07:45:00', 5, 9, 159357486, 'Femme'),
(165, 'Moreau', 'Hugo', 32, 'Professionnel', '26 rue Saint-Michel', '10:30:00', 13, 4, 369258147, 'Homme'),
(166, 'Petit', 'Manon', 29, 'Amateur', '27 avenue Foch', '08:00:00', 8, 7, 258147369, 'Femme'),
(167, 'Roux', 'Lucas', 33, 'Professionnel', '28 rue des Lilas', '11:45:00', 10, 6, 147258369, 'Homme'),
(168, 'Bertrand', 'Inès', 27, 'Amateur', '29 avenue Montaigne', '06:20:00', 4, 10, 369852147, 'Femme'),
(169, 'Fournier', 'Paul', 34, 'Professionnel', '30 rue Royale', '10:50:00', 14, 3, 741852963, 'Homme'),
(170, 'Girard', 'Léa', 25, 'Amateur', '31 avenue Marceau', '07:35:00', 7, 6, 369741258, 'Femme'),
(171, 'Michel', 'Gabriel', 31, 'Professionnel', '32 rue de la Paix', '10:10:00', 11, 5, 963147852, 'Homme'),
(172, 'Leroy', 'Jade', 24, 'Amateur', '33 avenue des Ternes', '06:45:00', 5, 8, 852963147, 'Femme'),
(173, 'Lemoine', 'Nathan', 30, 'Professionnel', '34 rue de la Roquette', '10:40:00', 13, 2, 147963852, 'Homme'),
(174, 'Roy', 'Louise', 26, 'Amateur', '35 avenue de la République', '07:20:00', 6, 7, 963852741, 'Femme'),
(175, 'Garnier', 'Mathis', 29, 'Professionnel', '36 rue de la Gare', '10:20:00', 12, 4, 741369258, 'Homme'),
(176, 'Marie', 'Lina', 23, 'Amateur', '37 avenue Gambetta', '06:10:00', 4, 9, 852369147, 'Femme'),
(177, 'Lefort', 'Noah', 28, 'Professionnel', '38 rue de Rivoli', '09:50:00', 9, 5, 369147258, 'Homme'),
(178, 'Simon', 'Zoé', 22, 'Amateur', '39 avenue de l\'Opéra', '05:30:00', 3, 8, 741258369, 'Femme'),
(179, 'Robert', 'Théo', 27, 'Professionnel', '40 rue du Bac', '09:30:00', 10, 4, 258369147, 'Homme'),
(180, 'oui', 'oui', 130, 'Professionnel', 'oui', '23:02:00', 19812, 1, 12, 'LGBTQIA+');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Identifiant`
--
ALTER TABLE `Identifiant`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Match`
--
ALTER TABLE `Match`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Membres`
--
ALTER TABLE `Membres`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Identifiant`
--
ALTER TABLE `Identifiant`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Match`
--
ALTER TABLE `Match`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `Membres`
--
ALTER TABLE `Membres`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
