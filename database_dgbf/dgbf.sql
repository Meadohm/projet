-- phpMyAdmin SQL Dump
-- version 5.2.0-dev+20211230.cb650d2a2d
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 27 avr. 2022 à 18:25
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
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `CodeDoc` int UNSIGNED NOT NULL,
  `LibelleDoc` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `NatureDoc` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`CodeDoc`, `LibelleDoc`, `NatureDoc`) VALUES
(1, 'Document d\'identification', 'CNI'),
(2, 'Document d\'identification', 'PASSPORT'),
(3, 'Document d\'identification', 'ATTESTATION D\'IDENTITE'),
(4, 'Document d\'identification', 'PERMIS DE CONDUIRE');

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE `horaire` (
  `IdHoraire` int UNSIGNED NOT NULL,
  `LibelleHoraire` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`IdHoraire`, `LibelleHoraire`) VALUES
(1, '08h00 - 09h30'),
(2, '09h30 - 10h00'),
(3, '10h00 - 11h30'),
(4, '11h30 - 12h00'),
(5, '12h00 - 12h30'),
(6, '14h00 - 14h30'),
(7, '14h30 - 15h00'),
(8, '15h00 - 15h30'),
(9, '15h30 - 16h00');

-- --------------------------------------------------------

--
-- Structure de la table `horaire_joursprestations`
--

CREATE TABLE `horaire_joursprestations` (
  `IdHoraireJrsPres` int UNSIGNED NOT NULL,
  `IdJrsPres` int UNSIGNED NOT NULL,
  `IdHoraire` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `horaire_joursprestations`
--

INSERT INTO `horaire_joursprestations` (`IdHoraireJrsPres`, `IdJrsPres`, `IdHoraire`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 6),
(6, 2, 7),
(7, 2, 8),
(8, 2, 9),
(9, 3, 1),
(10, 3, 2),
(11, 3, 3),
(12, 3, 4),
(13, 4, 3),
(14, 4, 4),
(15, 4, 5),
(16, 4, 6),
(17, 4, 7),
(18, 4, 8),
(19, 4, 9),
(20, 5, 2),
(21, 5, 3),
(22, 5, 4),
(23, 5, 5),
(24, 5, 6),
(25, 5, 7);

-- --------------------------------------------------------

--
-- Structure de la table `horaire_reception`
--

CREATE TABLE `horaire_reception` (
  `CodeHorRec` int UNSIGNED NOT NULL,
  `LibelleHorRec` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `DateHorRec` date DEFAULT NULL,
  `HeurHorRec` time DEFAULT NULL,
  `IdServ` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `horaire_reception`
--

INSERT INTO `horaire_reception` (`CodeHorRec`, `LibelleHorRec`, `DateHorRec`, `HeurHorRec`, `IdServ`) VALUES
(1, 'Horaire de la direction de solde', NULL, NULL, 1),
(2, 'horaire de la direction des ressources humaines', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `jour`
--

CREATE TABLE `jour` (
  `IdJour` int UNSIGNED NOT NULL,
  `LibelleJour` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `jour`
--

INSERT INTO `jour` (`IdJour`, `LibelleJour`) VALUES
(1, 'Lundi'),
(2, 'Mardi'),
(3, 'Mercredi'),
(4, 'Jeudi'),
(5, 'Vendredi');

-- --------------------------------------------------------

--
-- Structure de la table `joursprestations`
--

CREATE TABLE `joursprestations` (
  `IdJrsPres` int UNSIGNED NOT NULL,
  `IdJour` int UNSIGNED NOT NULL,
  `IdPres` int UNSIGNED NOT NULL,
  `DateJrsPres` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `joursprestations`
--

INSERT INTO `joursprestations` (`IdJrsPres`, `IdJour`, `IdPres`, `DateJrsPres`) VALUES
(1, 1, 1, '0000-00-00'),
(2, 2, 1, '0000-00-00'),
(3, 3, 1, '0000-00-00'),
(4, 4, 2, '0000-00-00'),
(5, 5, 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `IdNote` int NOT NULL,
  `DateNote` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `DateEdition` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`IdNote`, `DateNote`, `Message`, `DateEdition`) VALUES
(1, 'Le mardi 14 décembre 2021', 'Monsieur Mahamadou KEITA, le nouveau Directeur de la DTI', '2022-03-22 14:36:04');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `CodeNotif` int UNSIGNED NOT NULL,
  `LibelleNotif` varchar(255) NOT NULL,
  `DateNotif` date NOT NULL,
  `HeureNotif` time(6) NOT NULL,
  `NumRdv` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `prestation`
--

CREATE TABLE `prestation` (
  `IdPres` int UNSIGNED NOT NULL,
  `LibellePres` varchar(255) NOT NULL,
  `IdServ` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `prestation`
--

INSERT INTO `prestation` (`IdPres`, `LibellePres`, `IdServ`) VALUES
(1, 'Retrait du bulletin de solde', 1),
(2, 'Dépôt de dossier de demande de stage', 2);

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `NumRdv` int(10) UNSIGNED ZEROFILL NOT NULL,
  `DesignRdv` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `DatPriseRdv` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `JourRdv` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `HeureRdv` varchar(20) DEFAULT NULL,
  `DateRdv` varchar(15) NOT NULL,
  `StatutRdv` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `NumDocFournir` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CodeUs` int UNSIGNED DEFAULT NULL,
  `IdPres` int UNSIGNED DEFAULT NULL,
  `CodeDoc` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `IdServ` int UNSIGNED NOT NULL,
  `LibelleServ` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TelServ` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `FaxServ` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ParenServ` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `InfoServ` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TypeServ` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `UtrServ` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`IdServ`, `LibelleServ`, `TelServ`, `FaxServ`, `ParenServ`, `InfoServ`, `TypeServ`, `UtrServ`) VALUES
(1, 'Direction de la Solde', '+225 2720215252', '+413 213525814188', 'Direction Générale du Budget et des Finances', 'L\'une des missions principale de la Direction des Soldes (DS) est le traitement des mouvements de solde pour l’ensemble des agents de l’Etat, de la gestion des rémunérations des personnels en poste à l’étranger et des prestations de services', NULL, '30 à 45minutes'),
(2, 'Direction des ressources humaine', '+225 27 22558888', '+1710 56977444123', 'Direction Générale du Budget et des Finances', 'La DRH est chargée :\r\n-d\'archiver les actes de gestion du  personnel et  de tenir  à jour le fichier  du personnel  du Ministère;', NULL, '30 à 45 min');

-- --------------------------------------------------------

--
-- Structure de la table `suggestion`
--

CREATE TABLE `suggestion` (
  `NumSugg` int UNSIGNED NOT NULL,
  `ContenuSugg` varchar(255) NOT NULL,
  `DateSugg` date NOT NULL,
  `HeureSugg` time(6) NOT NULL,
  `NumRdv` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `type_usager`
--

CREATE TABLE `type_usager` (
  `CodeTypeUs` int UNSIGNED NOT NULL,
  `LibelleTypeUs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `type_usager`
--

INSERT INTO `type_usager` (`CodeTypeUs`, `LibelleTypeUs`) VALUES
(1, 'Administrateur'),
(2, 'Gestionnaire'),
(3, 'Usager');

-- --------------------------------------------------------

--
-- Structure de la table `usager`
--

CREATE TABLE `usager` (
  `CodeUs` int UNSIGNED NOT NULL,
  `NomUs` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PrenUs` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `EmailUs` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TelUs` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MdpUs` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `code` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Date_Inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CodeTypeUs` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `usager`
--

INSERT INTO `usager` (`CodeUs`, `NomUs`, `PrenUs`, `EmailUs`, `TelUs`, `MdpUs`, `code`, `updated_time`, `Date_Inscription`, `CodeTypeUs`) VALUES
(34, 'konaté', 'mariam', 'konate@gmail.com', '+225 07 78963320', '202cb962ac59075b964b07152d234b70', 'P4LW5J1FHQ', '2022-03-11 23:19:34', '2022-03-08 10:02:26', 3),
(36, 'fally ipupa', 'El Mara', 'moh.fofana21@gmail.com', '+225 08 78963210', '896633d74462aae566ff42d1fa020777', 'TG9KU5YBI2', '2022-04-17 05:26:29', '2022-03-09 12:55:04', 1),
(37, 'N&#039;DRI', 'Stephane', 'ndriaime@univmetiers.ci', '0758696284', '16eea5ceb559a4341be35a989b2a2f87', NULL, '2022-03-11 23:18:56', '2022-03-10 14:32:07', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`CodeDoc`);

--
-- Index pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`IdHoraire`);

--
-- Index pour la table `horaire_joursprestations`
--
ALTER TABLE `horaire_joursprestations`
  ADD PRIMARY KEY (`IdHoraireJrsPres`),
  ADD UNIQUE KEY `IdJrsPres_2` (`IdJrsPres`,`IdHoraire`),
  ADD KEY `IdJrsPres` (`IdJrsPres`,`IdHoraire`),
  ADD KEY `IdJrsPres_3` (`IdJrsPres`,`IdHoraire`),
  ADD KEY `fk_horaire_joursprestations_hor` (`IdHoraire`);

--
-- Index pour la table `horaire_reception`
--
ALTER TABLE `horaire_reception`
  ADD PRIMARY KEY (`CodeHorRec`),
  ADD KEY `IdServ` (`IdServ`);

--
-- Index pour la table `jour`
--
ALTER TABLE `jour`
  ADD PRIMARY KEY (`IdJour`);

--
-- Index pour la table `joursprestations`
--
ALTER TABLE `joursprestations`
  ADD PRIMARY KEY (`IdJrsPres`),
  ADD KEY `IdJour` (`IdJour`,`IdPres`),
  ADD KEY `fk_joursprestations_prestation` (`IdPres`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`IdNote`);

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
  ADD PRIMARY KEY (`IdPres`),
  ADD KEY `IdServ` (`IdServ`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`NumRdv`),
  ADD KEY `fk_rdv_CodeUs` (`CodeUs`),
  ADD KEY `fk_rdv_IdServ` (`IdPres`),
  ADD KEY `fk_rdv_CodeDoc` (`CodeDoc`) USING BTREE,
  ADD KEY `CodeDoc` (`CodeDoc`);

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
  ADD UNIQUE KEY `EmailUs` (`EmailUs`),
  ADD KEY `fk_usager_typeusager` (`CodeTypeUs`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `document`
--
ALTER TABLE `document`
  MODIFY `CodeDoc` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `horaire`
--
ALTER TABLE `horaire`
  MODIFY `IdHoraire` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `horaire_joursprestations`
--
ALTER TABLE `horaire_joursprestations`
  MODIFY `IdHoraireJrsPres` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `horaire_reception`
--
ALTER TABLE `horaire_reception`
  MODIFY `CodeHorRec` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `jour`
--
ALTER TABLE `jour`
  MODIFY `IdJour` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `joursprestations`
--
ALTER TABLE `joursprestations`
  MODIFY `IdJrsPres` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `IdNote` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `CodeNotif` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prestation`
--
ALTER TABLE `prestation`
  MODIFY `IdPres` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `NumRdv` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `IdServ` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `NumSugg` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_usager`
--
ALTER TABLE `type_usager`
  MODIFY `CodeTypeUs` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `usager`
--
ALTER TABLE `usager`
  MODIFY `CodeUs` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `horaire_joursprestations`
--
ALTER TABLE `horaire_joursprestations`
  ADD CONSTRAINT `fk_horaire_joursprestations_hor` FOREIGN KEY (`IdHoraire`) REFERENCES `horaire` (`IdHoraire`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_horairejoursprestations_jrsprest` FOREIGN KEY (`IdJrsPres`) REFERENCES `joursprestations` (`IdJrsPres`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `horaire_reception`
--
ALTER TABLE `horaire_reception`
  ADD CONSTRAINT `fk_horRecep_serv` FOREIGN KEY (`IdServ`) REFERENCES `service` (`IdServ`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `joursprestations`
--
ALTER TABLE `joursprestations`
  ADD CONSTRAINT `fk_joursprestations_jour` FOREIGN KEY (`IdJour`) REFERENCES `jour` (`IdJour`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_joursprestations_prestation` FOREIGN KEY (`IdPres`) REFERENCES `prestation` (`IdPres`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `fk_notif_rdv` FOREIGN KEY (`NumRdv`) REFERENCES `rendez_vous` (`NumRdv`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `prestation`
--
ALTER TABLE `prestation`
  ADD CONSTRAINT `fk_prest_serv` FOREIGN KEY (`IdServ`) REFERENCES `service` (`IdServ`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD CONSTRAINT `fk_rdv_prestation` FOREIGN KEY (`IdPres`) REFERENCES `prestation` (`IdPres`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_rdv_usager` FOREIGN KEY (`CodeUs`) REFERENCES `usager` (`CodeUs`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `rendez_vous_ibfk_1` FOREIGN KEY (`CodeDoc`) REFERENCES `document` (`CodeDoc`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `suggestion`
--
ALTER TABLE `suggestion`
  ADD CONSTRAINT `fk_sugg_rdv` FOREIGN KEY (`NumRdv`) REFERENCES `rendez_vous` (`NumRdv`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `usager`
--
ALTER TABLE `usager`
  ADD CONSTRAINT `fk_usager_typeusager` FOREIGN KEY (`CodeTypeUs`) REFERENCES `type_usager` (`CodeTypeUs`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
