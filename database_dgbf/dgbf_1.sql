-- phpMyAdmin SQL Dump
-- version 5.2.0-dev+20211230.cb650d2a2d
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 26 jan. 2022 à 14:09
-- Version du serveur : 8.0.27
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dgbf`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte_utilisateur`
--

CREATE TABLE `compte_utilisateur` (
  `NumComptUt` int(10) UNSIGNED ZEROFILL NOT NULL,
  `LoginComptUt` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MdpComptUt` varchar(11) NOT NULL,
  `DatCreaComptUt` date NOT NULL,
  `CodeUs` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `CodeDoc` int(10) UNSIGNED ZEROFILL NOT NULL,
  `LibelleDoc` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TypeDoc` varchar(45) NOT NULL,
  `NumRdv` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `horaire_reception`
--

CREATE TABLE `horaire_reception` (
  `CodeHorRec` int(10) UNSIGNED ZEROFILL NOT NULL,
  `LibelleHorRec` varchar(255) NOT NULL,
  `IdServ` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `CodeNotif` int(10) UNSIGNED ZEROFILL NOT NULL,
  `LibelleNotif` varchar(255) NOT NULL,
  `DateNotif` date NOT NULL,
  `HeureNotif` time(6) NOT NULL,
  `NumRdv` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `prestation`
--

CREATE TABLE `prestation` (
  `idPres` int(10) UNSIGNED ZEROFILL NOT NULL,
  `LibellePres` varchar(255) NOT NULL,
  `IdServ` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `numRdv` int(10) UNSIGNED ZEROFILL NOT NULL,
  `DesignRdv` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DatPriseRdv` date NOT NULL,
  `DateRdv` date NOT NULL,
  `HeureRdv` time(6) NOT NULL,
  `CodeUs` int(10) UNSIGNED ZEROFILL NOT NULL,
  `IdServ` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `IdServ` int(10) UNSIGNED ZEROFILL NOT NULL,
  `LibelleServ` varchar(255) NOT NULL,
  `ParenServ` varchar(255) NOT NULL,
  `TelServ` varchar(16) NOT NULL,
  `FaxServ` varchar(45) NOT NULL,
  `InfoServ` varchar(255) NOT NULL,
  `TypeServ` varchar(255) NOT NULL,
  `UtrServ` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `suggestion`
--

CREATE TABLE `suggestion` (
  `NumSugg` int(10) UNSIGNED ZEROFILL NOT NULL,
  `ContenuSugg` varchar(255) NOT NULL,
  `DateSugg` date NOT NULL,
  `HeureSugg` time(6) NOT NULL,
  `NumRdv` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `type_usager`
--

CREATE TABLE `type_usager` (
  `CodeTypeUs` int(10) UNSIGNED ZEROFILL NOT NULL,
  `LibelleTypeUs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `usager`
--

CREATE TABLE `usager` (
  `CodeUs` int(10) UNSIGNED ZEROFILL NOT NULL,
  `NomUs` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PrenUs` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `EmailUs` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TelUs` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `CodeTypeUs` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compte_utilisateur`
--
ALTER TABLE `compte_utilisateur`
  ADD PRIMARY KEY (`NumComptUt`),
  ADD KEY `CodeUs` (`CodeUs`);

--
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`CodeDoc`),
  ADD KEY `NumRdv` (`NumRdv`);

--
-- Index pour la table `horaire_reception`
--
ALTER TABLE `horaire_reception`
  ADD PRIMARY KEY (`CodeHorRec`),
  ADD KEY `IdServ` (`IdServ`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`CodeNotif`),
  ADD KEY `NumRdv` (`NumRdv`);

--
-- Index pour la table `prestation`
--
ALTER TABLE `prestation`
  ADD PRIMARY KEY (`idPres`),
  ADD KEY `IdServ` (`IdServ`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`numRdv`),
  ADD KEY `CodeUs` (`CodeUs`),
  ADD KEY `IdServ` (`IdServ`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`IdServ`);

--
-- Index pour la table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`NumSugg`),
  ADD KEY `NumRdv` (`NumRdv`);

--
-- Index pour la table `type_usager`
--
ALTER TABLE `type_usager`
  ADD PRIMARY KEY (`CodeTypeUs`);

--
-- Index pour la table `usager`
--
ALTER TABLE `usager`
  ADD PRIMARY KEY (`CodeUs`),
  ADD KEY `fk_usager_typeusager` (`CodeTypeUs`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compte_utilisateur`
--
ALTER TABLE `compte_utilisateur`
  MODIFY `NumComptUt` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `document`
--
ALTER TABLE `document`
  MODIFY `CodeDoc` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `horaire_reception`
--
ALTER TABLE `horaire_reception`
  MODIFY `CodeHorRec` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `CodeNotif` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prestation`
--
ALTER TABLE `prestation`
  MODIFY `idPres` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `numRdv` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `IdServ` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `NumSugg` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_usager`
--
ALTER TABLE `type_usager`
  MODIFY `CodeTypeUs` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `usager`
--
ALTER TABLE `usager`
  MODIFY `CodeUs` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `compte_utilisateur`
--
ALTER TABLE `compte_utilisateur`
  ADD CONSTRAINT `fk_comptutilisat_usager` FOREIGN KEY (`CodeUs`) REFERENCES `usager` (`CodeUs`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `fk_doc_rdv` FOREIGN KEY (`NumRdv`) REFERENCES `rendez_vous` (`numRdv`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `horaire_reception`
--
ALTER TABLE `horaire_reception`
  ADD CONSTRAINT `fk_horRecep_serv` FOREIGN KEY (`IdServ`) REFERENCES `service` (`IdServ`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `fk_notif_rdv` FOREIGN KEY (`NumRdv`) REFERENCES `rendez_vous` (`numRdv`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `prestation`
--
ALTER TABLE `prestation`
  ADD CONSTRAINT `fk_prest_serv` FOREIGN KEY (`IdServ`) REFERENCES `service` (`IdServ`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD CONSTRAINT `fk_rdv_serv` FOREIGN KEY (`IdServ`) REFERENCES `service` (`IdServ`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_rdv_usager` FOREIGN KEY (`CodeUs`) REFERENCES `usager` (`CodeUs`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `suggestion`
--
ALTER TABLE `suggestion`
  ADD CONSTRAINT `fk_sugg_rdv` FOREIGN KEY (`NumRdv`) REFERENCES `rendez_vous` (`numRdv`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `usager`
--
ALTER TABLE `usager`
  ADD CONSTRAINT `fk_usager_typeusager` FOREIGN KEY (`CodeTypeUs`) REFERENCES `type_usager` (`CodeTypeUs`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
