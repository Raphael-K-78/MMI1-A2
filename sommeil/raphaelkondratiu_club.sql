CREATE TABLE `Identifiant` (
  `ID` int NOT NULL,
  `Identifiant` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL
)

CREATE TABLE `Match` (
  `ID` int NOT NULL,
  `NOM` varchar(256) NOT NULL,
  `Adversaire` varchar(128) NOT NULL,
  `Date` date NOT NULL,
  `Resultat` varchar(8) NOT NULL
)
  
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
)
ALTER TABLE `Identifiant`
  ADD PRIMARY KEY (`ID`);
ALTER TABLE `Match`
  ADD PRIMARY KEY (`ID`);
ALTER TABLE `Membres`
  ADD PRIMARY KEY (`ID`);
ALTER TABLE `Identifiant`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `Match`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

ALTER TABLE `Membres`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;
COMMIT;
