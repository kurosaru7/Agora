-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 27 Novembre 2018 à 16:19
-- Version du serveur :  5.7.24-0ubuntu0.18.04.1
-- Version de PHP :  7.1.17-1+ubuntu17.10.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `agora`
--
CREATE DATABASE IF NOT EXISTS `agora` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `agora`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'php'),
(2, 'sql'),
(3, 'html'),
(4, 'js');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `reponse` int(11) NOT NULL,
  `datecom` datetime DEFAULT NULL,
  `profil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `points`, `adresse`, `reponse`, `datecom`, `profil`) VALUES
(1, 3, '893fa896-ceb1-4de6-aba9-284bf3baeb0f.txt', 4, '2018-01-01 18:05:03', 1);

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `sujet` varchar(45) DEFAULT NULL,
  `dateC` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `conversation`
--

INSERT INTO `conversation` (`id`, `sujet`, `dateC`) VALUES
(1, 'Aide PHP', '2018-11-16'),
(2, 'Demande de site web', '2018-10-26'),
(3, 'Envoie de script JS', '2018-11-03');

-- --------------------------------------------------------

--
-- Structure de la table `courrier`
--

CREATE TABLE `courrier` (
  `id` int(11) NOT NULL,
  `conversation` int(11) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `datecou` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `courrier`
--

INSERT INTO `courrier` (`id`, `conversation`, `adresse`, `datecou`) VALUES
(1, 1, 'f1363c3e-7060-4372-9c6a-4ee8ef7be4f5.txt', '2018-11-16 23:18:26'),
(2, 1, 'b8204175-9f0e-4e1c-96e6-7390090e8b32.txt', '2018-11-16 23:39:12'),
(3, 1, '2470eb70-200e-4faf-9c50-4743b5bdfdae.txt', '2018-11-16 23:40:59'),
(4, 2, '9de33958-3813-4ed5-9679-040bbf1e57cd.txt', '2018-10-26 13:00:14'),
(5, 2, '32bf6e5e-77ac-45e3-94c2-ebf98fb0fa7f.txt', '2018-10-18 19:01:42'),
(6, 3, '60ec461d-a8b4-476a-8fb1-7d35dd06195e.txt', '2018-11-03 08:19:09'),
(7, 3, 'de50d6c5-e31f-419b-ad8e-144fc5260b5d.txt', '2018-11-16 17:14:14');

-- --------------------------------------------------------

--
-- Structure de la table `discuter`
--

CREATE TABLE `discuter` (
  `id` int(11) NOT NULL,
  `conversation` int(11) NOT NULL,
  `profil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `discuter`
--

INSERT INTO `discuter` (`id`, `conversation`, `profil`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 2),
(4, 2, 4),
(5, 3, 2),
(6, 3, 5);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `statut` enum('admin','visiteur') DEFAULT NULL,
  `pseudo` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `datep` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `profil`
--

INSERT INTO `profil` (`id`, `mail`, `nom`, `prenom`, `adresse`, `telephone`, `score`, `avatar`, `statut`, `pseudo`, `password`, `datep`) VALUES
(1, 'otarino@live.fr', 'Delcourt', 'Christopher', '45 place des carpettes', '0678451296', 500, 'otarino.png', 'admin', 'oTaRiNo', '05121999', '1999-12-05'),
(2, 'Erwan@gmail.com', 'Hacques', 'Erwan', '13 rue des champignons', '0636987456', 0, 'slunpp.png\r\n', 'visiteur', 'Slunpp', 'secret', '1997-04-12'),
(3, 'barnabe@gmail.com', 'Barnabe', 'Morgan', '9 rue des chimpanzés', '0614783575', -50, 'ed.jpeg', 'visiteur', 'Ed', 'nulmomonul', '1900-01-01'),
(4, 'olivier@hotmail.fr', 'Lespagnon', 'Olivier', '1 avenue chaise', '0798563250', 400, 'masoj.jpg', 'admin', 'Masoj', 'patoche', '1997-05-05'),
(5, 'jean@wanadoo.fr', 'Neymar', 'Jean', '9 place du stade', '0684553859', 1000, 'god.jpg', 'visiteur', 'God', 'oklmpasbesoin', '1000-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id` int(11) NOT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `datem` datetime DEFAULT NULL,
  `sujet` int(11) NOT NULL,
  `profil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`id`, `adresse`, `points`, `datem`, `sujet`, `profil`) VALUES
(1, '1.txt', 1, '2018-11-16 03:09:04', 1, 1),
(2, '2.txt', 103, '2018-11-25 09:04:48', 1, 2),
(3, '3.txt', 1, '2018-11-01 14:04:03', 3, 3),
(4, '4.txt', 1, '2018-01-01 18:00:01', 5, 1),
(5, '5.txt', 1, '2018-05-02 00:00:00', 1, 1),
(6, '6.txt', 1, '2018-11-26 14:54:13', 1, 1),
(11, '5bfd4c8ca6481.txt', 1, '2018-11-27 14:54:20', 1, 4),
(12, '5bfd4c988e562.txt', 1, '2018-11-27 14:54:32', 1, 4),
(13, '5bfd51321a099.txt', 1, '2018-11-27 15:14:10', 1, 3),
(14, '5bfd59773e043.txt', 1, '2018-11-27 15:49:27', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `signaler`
--

CREATE TABLE `signaler` (
  `id` int(11) NOT NULL,
  `dateSi` datetime DEFAULT NULL,
  `type` enum('sujet','reponse','commentaire') DEFAULT NULL,
  `profil` int(11) NOT NULL,
  `id_contenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `signaler`
--

INSERT INTO `signaler` (`id`, `dateSi`, `type`, `profil`, `id_contenu`) VALUES
(1, '2018-11-16 00:00:00', 'sujet', 1, 5),
(2, '2018-11-19 00:00:00', 'reponse', 3, 3),
(3, '2018-11-20 00:00:00', 'commentaire', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE `sujet` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `dateS` datetime DEFAULT NULL,
  `statut` enum('ouvert','ferme') DEFAULT NULL,
  `profil` int(11) NOT NULL,
  `categorie` int(11) NOT NULL,
  `adresse` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sujet`
--

INSERT INTO `sujet` (`id`, `nom`, `dateS`, `statut`, `profil`, `categorie`, `adresse`) VALUES
(1, 'Problème de session', '2018-11-15 13:30:04', 'ferme', 1, 1, 'a85858b6-ee07-4a14-aaf1-0de5cd8a1e48.txt'),
(2, 'J\'ai un soucis avec le chemin de mon fichier', '2018-11-16 15:01:17', 'ouvert', 3, 1, '74f0cb9d-f507-401d-bb54-bd5421f27145.txt'),
(3, 'Mon formulaire ne fonctionne pas', '2018-10-20 19:57:03', 'ferme', 2, 3, '9387688e-96c6-4d20-937d-f07176b91706.txt'),
(4, 'Ma variable ne fonctionne pas', '2018-05-15 14:36:58', 'ferme', 4, 4, '811f9c69-e597-4c24-b11b-93cc4969aedf .txt'),
(5, 'Windows.exe ne fonctionne pas', '2017-12-17 18:49:14', 'ferme', 5, 1, '48330d7b-e5fe-4aae-bb1c-3017db9fe336.txt'),
(6, 'regeg', '2018-11-27 14:24:58', 'ouvert', 3, 1, '5bfd45aa75836.txt'),
(7, 'fzefEZFZQEFQZEF', '2018-11-27 15:48:53', 'ouvert', 3, 1, '5bfd5955525b8.txt');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `sujet` varchar(255) DEFAULT NULL,
  `dateT` date DEFAULT NULL,
  `profil` int(11) NOT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `pieces_jointe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ticket`
--

INSERT INTO `ticket` (`id`, `sujet`, `dateT`, `profil`, `adresse`, `pieces_jointe`) VALUES
(1, 'Le boutton pour envoyer sa réponse sur la page d\'un sujet ne marche pas', '2018-11-08', 3, 'c38c6717-33fc-4912-ae0d-4bef26bd5290.txt', '27781f59-af23-445a-9905-483c89f3fdda.txt'),
(2, 'La catégorie PHP n\'affiche rien', '2018-11-15', 2, 'a54b5fc8-4167-48e4-88cf-d3cd5faa0d49.txt', NULL),
(3, 'Je ne vois pas mes messages privés', '2018-10-09', 1, 'f1ac60c6-b017-4d3d-805c-e5d41b7cc75f.txt', '66a3ae44-043f-4c29-a7eb-8818cf7c5e9c.txt');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_commentaire_message1_idx` (`reponse`),
  ADD KEY `fk_commentaire_profil1_idx` (`profil`);

--
-- Index pour la table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `courrier`
--
ALTER TABLE `courrier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_courrier_correspondance1_idx` (`conversation`);

--
-- Index pour la table `discuter`
--
ALTER TABLE `discuter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_discuter_conversation1_idx` (`conversation`),
  ADD KEY `fk_discuter_profil1_idx` (`profil`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_message_sujet1_idx` (`sujet`),
  ADD KEY `fk_reponse_profil1_idx` (`profil`);

--
-- Index pour la table `signaler`
--
ALTER TABLE `signaler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_signaler_profil1_idx` (`profil`);

--
-- Index pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sujet_profil1_idx` (`profil`),
  ADD KEY `fk_sujet_categorie1_idx` (`categorie`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ticket_profil1_idx` (`profil`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `courrier`
--
ALTER TABLE `courrier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `discuter`
--
ALTER TABLE `discuter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `signaler`
--
ALTER TABLE `signaler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_commentaire_message1` FOREIGN KEY (`reponse`) REFERENCES `reponse` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_commentaire_profil1` FOREIGN KEY (`profil`) REFERENCES `profil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `courrier`
--
ALTER TABLE `courrier`
  ADD CONSTRAINT `fk_courrier_correspondance1` FOREIGN KEY (`conversation`) REFERENCES `conversation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `discuter`
--
ALTER TABLE `discuter`
  ADD CONSTRAINT `fk_discuter_conversation1` FOREIGN KEY (`conversation`) REFERENCES `conversation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_discuter_profil1` FOREIGN KEY (`profil`) REFERENCES `profil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `fk_message_sujet1` FOREIGN KEY (`sujet`) REFERENCES `sujet` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reponse_profil1` FOREIGN KEY (`profil`) REFERENCES `profil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `signaler`
--
ALTER TABLE `signaler`
  ADD CONSTRAINT `fk_signaler_profil1` FOREIGN KEY (`profil`) REFERENCES `profil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD CONSTRAINT `fk_sujet_categorie1` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sujet_profil1` FOREIGN KEY (`profil`) REFERENCES `profil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_ticket_profil1` FOREIGN KEY (`profil`) REFERENCES `profil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;