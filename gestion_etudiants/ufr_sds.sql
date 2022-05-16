-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 17 mai 2022 à 00:50
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ufr_sds`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_ufr`
--

CREATE TABLE `admin_ufr` (
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin_ufr`
--

INSERT INTO `admin_ufr` (`nom`, `prenom`, `email`, `passe`) VALUES
('Zoetaba', 'Wendtoin Elie', 'mr@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant_sds`
--

CREATE TABLE `etudiant_sds` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `naissance` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `id_tuteur` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant_sds`
--

INSERT INTO `etudiant_sds` (`id`, `nom`, `prenom`, `naissance`, `email`, `tel`, `id_tuteur`) VALUES
(76, 'Christian', 'KINDA', '2022-05-04', 'chris@gmail.com', '00001', ''),
(74, 'Elie', 'Zoetaba', '2022-05-06', 'elie@gmail.com', '53272646', 'b2222');

-- --------------------------------------------------------

--
-- Structure de la table `tuteur`
--

CREATE TABLE `tuteur` (
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `numero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tuteur`
--

INSERT INTO `tuteur` (`nom`, `prenom`, `email`, `numero`) VALUES
('b2', 'b2', 'b2@gmail.com', ''),
('Zoetaba', 'Elie', 'zoetabaelie@gmail.com', '0323443344'),
('A', 'B', 'elie@gmail.com', '1002002002'),
('Elie', 'Zoetaba', 'e@gmail.com', '1122'),
('Elie', 'Zoetaba', 'zoetabaelie@gmail.com', '1122334'),
('Elie', 'Zoetaba', 'ttee@gmail.com', '1200232'),
('Elie', 'Zoetaba', 'zoetaba@gmail.com', '2004'),
('1', '2', '2@gmail.com', '32'),
('Elie', 'Zoetaba', 'texte@gmail.com', '37345432'),
('Elie', 'Zoetaba', 'cewfcqewf@bgmail.com', '37345432fefwff'),
('Elie', 'Zoetaba', 'dd@gmail.com', '37345456788'),
('q', 'w', 'ert@gmail.com', '53272646'),
('b2', 'b2', 'b2@gmail.com', 'b2222'),
('g2', 'g2', 'g2@gmail.com', 'g22332'),
('w', 'e', 'react@gmail.com', 'rff');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin_ufr`
--
ALTER TABLE `admin_ufr`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `etudiant_sds`
--
ALTER TABLE `etudiant_sds`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_tuteur` (`id_tuteur`);

--
-- Index pour la table `tuteur`
--
ALTER TABLE `tuteur`
  ADD PRIMARY KEY (`numero`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etudiant_sds`
--
ALTER TABLE `etudiant_sds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etudiant_sds`
--
ALTER TABLE `etudiant_sds`
  ADD CONSTRAINT `etudiant_sds_ibfk_1` FOREIGN KEY (`id_tuteur`) REFERENCES `tuteur` (`numero`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
