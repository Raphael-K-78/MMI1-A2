-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 11 sep. 2024 à 14:33
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
-- Base de données : `raphaelkondratiu_location`
--

-- --------------------------------------------------------

--
-- Structure de la table `Admin`
--

CREATE TABLE `Admin` (
  `id_ad` int NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Admin`
--

INSERT INTO `Admin` (`id_ad`, `login`, `password`) VALUES
(1, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `Client`
--

CREATE TABLE `Client` (
  `id_cl` int NOT NULL,
  `nom` varchar(32) DEFAULT NULL,
  `prenom` varchar(64) DEFAULT NULL,
  `Email` varchar(128) DEFAULT NULL,
  `Adresse` varchar(256) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Client`
--

INSERT INTO `Client` (`id_cl`, `nom`, `prenom`, `Email`, `Adresse`, `password`) VALUES
(1, 'Louis', 'Louis', 'jeanlouis@mail.com', '13 rue de paris', 'motdepasse'),
(2, 'Lecompte', 'Luck', 'fauxmail@mail.com', '13 rue anonyme  Paris', 'password'),
(3, 'test', 'test', 'test@test.test', '13 rue test test', 'test'),
(4, 'Jean', 'David', 'jd@jd.fr', '1 rue du jd', 'jdjd'),
(5, 'toi', 'toi', 'toi@toi.toi', 'toi rue toi toi', 'toi'),
(6, 'ee', 'ee', 'e@e.e', 'e rue e', 'e'),
(7, 'depart', 'lina', 'departlina@gmail.com', '15 rue du castel', 'departhadjeb'),
(10, 'dede', 'dede', 'dede@gmail.com', 'dede', 'dede1'),
(11, '1', '1', '1@1.1', '1 rue 1', '1'),
(12, 'moi', 'moi', 'moi@moi.moi', 'moi rue moi', 'moi'),
(13, 'Smith', 'Barry', 'b.smith@smith.nets', '1 RUE SMITH A BARRY VILLE', '123'),
(14, 'De carvalho', 'Tony', 'tonydecarvalho04@gmail.com', 'Rue Josianne balascauld 45', 'Tony'),
(15, 'oli', 'oli', 'oli@oli.fr', 'oli', 'oli');

-- --------------------------------------------------------

--
-- Structure de la table `Facture`
--

CREATE TABLE `Facture` (
  `id_fac` int NOT NULL,
  `id_cl` int DEFAULT NULL,
  `prix_ht` int DEFAULT NULL,
  `TVA` int DEFAULT NULL,
  `prix_TTC` int DEFAULT NULL,
  `temps` int DEFAULT NULL,
  `id_res` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Facture`
--

INSERT INTO `Facture` (`id_fac`, `id_cl`, `prix_ht`, `TVA`, `prix_TTC`, `temps`, `id_res`) VALUES
(1, 1, 40, 8, 48, 1, 1),
(2, 4, 50, 10, 60, 1, 2),
(3, 1, 165, 33, 198, 4, 3),
(4, 1, 960, 192, 1152, 24, 4),
(5, 1, 50, 10, 60, 1, 5),
(6, 1, 50, 10, 60, 1, 6),
(7, 5, 100, 20, 120, 2, 7),
(8, 1, 6993, 1399, 8392, 78, 8),
(9, 1, 60, 12, 72, 1, 9),
(10, 6, 60, 12, 72, 1, 10),
(11, 1, 60, 12, 72, 1, 11),
(12, 7, 6600, 1320, 7920, 220, 12),
(13, 10, 1000, 200, 1200, 25, 13),
(14, 11, 40, 8, 48, 1, 14),
(15, 5, 10670, 2134, 12804, 97, 15),
(16, 13, 10275785, 2055157, 12330942, 158089, 16),
(17, 5, 1920, 384, 2304, 48, 17),
(18, 14, 60, 12, 72, 2, 18),
(19, 15, 116761740, 23352348, 140114088, 1946029, 19),
(20, 15, 30504040, 6100808, 36604848, 762601, 20),
(21, 15, 1061938332, 212387666, 1274325998, 8761, 21);

-- --------------------------------------------------------

--
-- Structure de la table `Reservation`
--

CREATE TABLE `Reservation` (
  `id_res` int NOT NULL,
  `id_cl` int DEFAULT NULL,
  `id_voit` int DEFAULT NULL,
  `datetime_d` datetime DEFAULT NULL,
  `datetime_r` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Reservation`
--

INSERT INTO `Reservation` (`id_res`, `id_cl`, `id_voit`, `datetime_d`, `datetime_r`) VALUES
(1, 1, 2, '2024-05-19 16:02:00', '2024-05-19 17:02:00'),
(2, 4, 1, '2024-05-19 17:13:00', '2024-05-19 18:13:00'),
(3, 1, 2, '2024-05-20 05:22:00', '2024-05-20 09:30:00'),
(4, 1, 2, '2024-05-20 09:34:00', '2024-05-21 09:34:00'),
(5, 1, 1, '2024-05-20 05:43:00', '2024-05-20 06:43:00'),
(6, 1, 1, '2024-05-20 07:48:00', '2024-05-20 08:48:00'),
(7, 5, 1, '2024-05-20 10:00:00', '2024-05-20 12:00:00'),
(8, 1, 9, '2024-05-20 18:17:00', '2024-05-23 23:59:00'),
(9, 1, 1, '2024-05-20 19:59:00', '2024-05-20 20:59:00'),
(10, 6, 1, '2024-05-20 21:59:00', '2024-05-20 22:59:00'),
(11, 1, 1, '2024-05-21 09:29:00', '2024-05-21 10:29:00'),
(12, 7, 7, '2024-05-21 09:43:00', '2024-05-30 13:43:00'),
(13, 10, 2, '2024-05-22 10:08:00', '2024-05-23 11:08:00'),
(14, 11, 2, '2024-05-21 11:16:00', '2024-05-21 12:16:00'),
(15, 5, 28, '2024-05-21 16:30:00', '2024-05-25 17:30:00'),
(16, 13, 27, '2024-05-22 09:17:00', '2042-06-04 10:17:00'),
(17, 5, 2, '2024-05-28 14:00:00', '2024-05-30 14:00:00'),
(18, 14, 7, '2024-06-01 14:00:00', '2024-06-01 16:00:00'),
(19, 15, 1, '2222-12-12 12:19:00', '2444-12-12 01:19:00'),
(20, 15, 2, '2024-12-12 00:20:00', '2111-12-12 01:20:00'),
(21, 15, 31, '2024-06-18 00:29:00', '2025-06-18 01:29:00');

-- --------------------------------------------------------

--
-- Structure de la table `Voiture`
--

CREATE TABLE `Voiture` (
  `id_voit` int NOT NULL,
  `marque` varchar(32) DEFAULT NULL,
  `modele` varchar(32) DEFAULT NULL,
  `image` varchar(128) NOT NULL,
  `prix` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Voiture`
--

INSERT INTO `Voiture` (`id_voit`, `marque`, `modele`, `image`, `prix`) VALUES
(1, 'lamborghini', 'Aventador', 'media/aventador.jpg', 60),
(2, 'Ferrari', 'f40', 'media/f40.jpg', 40),
(7, 'Ford', 'Shelby 1967', 'media/fordshelby.jpg', 30),
(9, 'Lamborghini', 'Veneno', 'media/Veneno.jpg', 90),
(27, 'Ford', 'GT40', 'media/1966-ford-gt40-mki-road-car-mecum-auction-kissimmee-2024.webp', 65),
(28, 'Rolls-Royce', 'Boat Tail', 'media/rolls-royce-boat-tail.jpg', 110),
(29, 'Pagani', 'Zonda HP Barchetta', 'media/pagani-zonda-hp-barchetta.jpg', 100),
(30, 'Rolls-Royce', 'Sweptail', 'media/rolls-royce-sweptail-c216520052018014046_1.jpg', 200),
(31, 'Perforati', 'à vapeur', 'media/voiture.jpg', 121212);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id_ad`);

--
-- Index pour la table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`id_cl`);

--
-- Index pour la table `Facture`
--
ALTER TABLE `Facture`
  ADD PRIMARY KEY (`id_fac`),
  ADD KEY `id_res` (`id_res`) USING BTREE,
  ADD KEY `id_cl` (`id_cl`) USING BTREE;

--
-- Index pour la table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`id_res`),
  ADD KEY `id_cl` (`id_cl`) USING BTREE,
  ADD KEY `id_voit` (`id_voit`) USING BTREE;

--
-- Index pour la table `Voiture`
--
ALTER TABLE `Voiture`
  ADD PRIMARY KEY (`id_voit`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `id_ad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Client`
--
ALTER TABLE `Client`
  MODIFY `id_cl` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `Facture`
--
ALTER TABLE `Facture`
  MODIFY `id_fac` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `id_res` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `Voiture`
--
ALTER TABLE `Voiture`
  MODIFY `id_voit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Facture`
--
ALTER TABLE `Facture`
  ADD CONSTRAINT `Facture_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `Client` (`id_cl`),
  ADD CONSTRAINT `fk_facture_reservation` FOREIGN KEY (`id_res`) REFERENCES `Reservation` (`id_res`);

--
-- Contraintes pour la table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `fk_reservation_client` FOREIGN KEY (`id_cl`) REFERENCES `Client` (`id_cl`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_reservation_voiture` FOREIGN KEY (`id_voit`) REFERENCES `Voiture` (`id_voit`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
