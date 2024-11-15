
CREATE TABLE `Admin` (
  `id_admin` int NOT NULL,
  `Identifiant` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Mot_de_passe` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL
)
CREATE TABLE `Question` (
  `id_question` int NOT NULL,
  `id_quizz` int NOT NULL,
  `Question` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Reponse1` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Reponse2` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Reponse3` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Reponse4` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Reponse` int NOT NULL
)

CREATE TABLE `Quizz` (
  `id_quizz` int NOT NULL,
  `Nom` varchar(256) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `text` varchar(256) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Date` date NOT NULL
)

CREATE TABLE `Reponse_Quizz` (
  `id_repquizz` int NOT NULL,
  `id_quizz` int NOT NULL,
  `id_user` int NOT NULL,
  `Reponse` int NOT NULL,
  `Date` date DEFAULT NULL
)

CREATE TABLE `Utilisateur` (
  `id_user` int NOT NULL,
  `Nom` varchar(64) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `Prenom` varchar(32) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `Pseudo` varchar(16) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `Email` varchar(256) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `Mot_de_passe` varchar(64) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `Photo_de_profil` varchar(128) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
)-
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id_admin`);

ALTER TABLE `Question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `Question_ibfk_1` (`id_quizz`);

ALTER TABLE `Quizz`
  ADD PRIMARY KEY (`id_quizz`);

ALTER TABLE `Reponse_Quizz`
  ADD PRIMARY KEY (`id_repquizz`),
  ADD KEY `Reponse_Quizz_ibfk_1` (`id_quizz`),
  ADD KEY `Reponse_Quizz_ibfk_2` (`id_user`);

ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id_user`);

ALTER TABLE `Admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `Question`
  MODIFY `id_question` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `Quizz`
  MODIFY `id_quizz` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `Reponse_Quizz`
  MODIFY `id_repquizz` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `Utilisateur`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `Question`
  ADD CONSTRAINT `Question_ibfk_1` FOREIGN KEY (`id_quizz`) REFERENCES `Quizz` (`id_quizz`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Reponse_Quizz`
  ADD CONSTRAINT `Reponse_Quizz_ibfk_1` FOREIGN KEY (`id_quizz`) REFERENCES `Quizz` (`id_quizz`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Reponse_Quizz_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `Utilisateur` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
