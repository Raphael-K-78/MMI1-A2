
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `Admin` (
  `id_ad` int NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
)

CREATE TABLE `Client` (
  `id_cl` int NOT NULL,
  `nom` varchar(32) DEFAULT NULL,
  `prenom` varchar(64) DEFAULT NULL,
  `Email` varchar(128) DEFAULT NULL,
  `Adresse` varchar(256) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL
)
CREATE TABLE `Facture` (
  `id_fac` int NOT NULL,
  `id_cl` int DEFAULT NULL,
  `prix_ht` int DEFAULT NULL,
  `TVA` int DEFAULT NULL,
  `prix_TTC` int DEFAULT NULL,
  `temps` int DEFAULT NULL,
  `id_res` int DEFAULT NULL
)
CREATE TABLE `Reservation` (
  `id_res` int NOT NULL,
  `id_cl` int DEFAULT NULL,
  `id_voit` int DEFAULT NULL,
  `datetime_d` datetime DEFAULT NULL,
  `datetime_r` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--

CREATE TABLE `Voiture` (
  `id_voit` int NOT NULL,
  `marque` varchar(32) DEFAULT NULL,
  `modele` varchar(32) DEFAULT NULL,
  `image` varchar(128) NOT NULL,
  `prix` int DEFAULT NULL
)-
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id_ad`);

ALTER TABLE `Client`
  ADD PRIMARY KEY (`id_cl`);
ALTER TABLE `Facture`
  ADD PRIMARY KEY (`id_fac`),
  ADD KEY `id_res` (`id_res`) USING BTREE,
  ADD KEY `id_cl` (`id_cl`) USING BTREE;
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`id_res`),
  ADD KEY `id_cl` (`id_cl`) USING BTREE,
  ADD KEY `id_voit` (`id_voit`) USING BTREE;
ALTER TABLE `Voiture`
  ADD PRIMARY KEY (`id_voit`);
ALTER TABLE `Admin`
  MODIFY `id_ad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `Client`
  MODIFY `id_cl` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
ALTER TABLE `Facture`
  MODIFY `id_fac` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
ALTER TABLE `Reservation`
  MODIFY `id_res` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
ALTER TABLE `Voiture`
  MODIFY `id_voit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
ALTER TABLE `Facture`
  ADD CONSTRAINT `Facture_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `Client` (`id_cl`),
  ADD CONSTRAINT `fk_facture_reservation` FOREIGN KEY (`id_res`) REFERENCES `Reservation` (`id_res`);
ALTER TABLE `Reservation`
  ADD CONSTRAINT `fk_reservation_client` FOREIGN KEY (`id_cl`) REFERENCES `Client` (`id_cl`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_reservation_voiture` FOREIGN KEY (`id_voit`) REFERENCES `Voiture` (`id_voit`) ON DELETE CASCADE;
COMMIT;
