-- -----------------------------------------------------
-- Data for table `agora`.`profil`
-- -----------------------------------------------------
START TRANSACTION;
USE `agora`;
INSERT INTO `agora`.`profil` (`id`, `mail`, `nom`, `prenom`, `adresse`, `telephone`, `score`, `avatar`, `statut`, `pseudo`, `password`, `datep`) VALUES (1, 'otarino@live.fr', 'Delcourt', 'Christopher', '45 place des carpettes', '0678451296', 500, 'otarino.png', 'admin', 'oTaRiNo', '05121999', '1999-12-05');
INSERT INTO `agora`.`profil` (`id`, `mail`, `nom`, `prenom`, `adresse`, `telephone`, `score`, `avatar`, `statut`, `pseudo`, `password`, `datep`) VALUES (2, 'Erwan@gmail.com', 'Hacques', 'Erwan', '13 rue des champignons', '0636987456', 0, 'slunpp.jpg', 'visiteur', 'Slunpp', 'secret', '1997-04-12');
INSERT INTO `agora`.`profil` (`id`, `mail`, `nom`, `prenom`, `adresse`, `telephone`, `score`, `avatar`, `statut`, `pseudo`, `password`, `datep`) VALUES (3, 'barnabe@gmail.com', 'Barnabe', 'Morgan', '9 rue des chimpanzés', '0614783575', -50, 'ed.jpeg', 'visiteur', 'Ed', 'nulmomonul', '1900-01-01');
INSERT INTO `agora`.`profil` (`id`, `mail`, `nom`, `prenom`, `adresse`, `telephone`, `score`, `avatar`, `statut`, `pseudo`, `password`, `datep`) VALUES (4, 'olivier@hotmail.fr', 'Lespagnon', 'Olivier', '1 avenue chaise', '0798563250', 400, 'masoj.png', 'admin', 'Masoj', 'patoche', '1997-05-05');
INSERT INTO `agora`.`profil` (`id`, `mail`, `nom`, `prenom`, `adresse`, `telephone`, `score`, `avatar`, `statut`, `pseudo`, `password`, `datep`) VALUES (5, 'jean@wanadoo.fr', 'Neymar', 'Jean', '9 place du stade', '0684553859', 1000, 'god.jpg', 'visiteur', 'God', 'oklmpasbesoin', '1000-01-01');

COMMIT;


-- -----------------------------------------------------
-- Data for table `agora`.`categorie`
-- -----------------------------------------------------
START TRANSACTION;
USE `agora`;
INSERT INTO `agora`.`categorie` (`id`, `nom`) VALUES (1, 'php');
INSERT INTO `agora`.`categorie` (`id`, `nom`) VALUES (2, 'sql');
INSERT INTO `agora`.`categorie` (`id`, `nom`) VALUES (3, 'html');
INSERT INTO `agora`.`categorie` (`id`, `nom`) VALUES (4, 'js');

COMMIT;


-- -----------------------------------------------------
-- Data for table `agora`.`sujet`
-- -----------------------------------------------------
START TRANSACTION;
USE `agora`;
INSERT INTO `agora`.`sujet` (`id`, `nom`, `dateS`, `statut`, `profil`, `categorie`, `adresse`) VALUES (1, 'Problème de session', '2018-11-15 13:30:04', 'ferme', 1, 1, 'a85858b6-ee07-4a14-aaf1-0de5cd8a1e48.txt');
INSERT INTO `agora`.`sujet` (`id`, `nom`, `dateS`, `statut`, `profil`, `categorie`, `adresse`) VALUES (2, 'J\'ai un soucis avec le chemin de mon fichier', '2018-11-16 15:01:17', 'ouvert', 3, 1, '74f0cb9d-f507-401d-bb54-bd5421f27145.txt');
INSERT INTO `agora`.`sujet` (`id`, `nom`, `dateS`, `statut`, `profil`, `categorie`, `adresse`) VALUES (3, 'Mon formulaire ne fonctionne pas', '2018-10-20 19:57:03', 'ferme', 2, 3, '9387688e-96c6-4d20-937d-f07176b91706.txt');
INSERT INTO `agora`.`sujet` (`id`, `nom`, `dateS`, `statut`, `profil`, `categorie`, `adresse`) VALUES (4, 'Ma variable ne fonctionne pas', '2018-05-15 14:36:58', 'ferme', 4, 4, '811f9c69-e597-4c24-b11b-93cc4969aedf .txt');
INSERT INTO `agora`.`sujet` (`id`, `nom`, `dateS`, `statut`, `profil`, `categorie`, `adresse`) VALUES (5, 'Windows.exe ne fonctionne pas', ' 2017-12-17 18:49:14', 'ferme', 5, 1, '48330d7b-e5fe-4aae-bb1c-3017db9fe336.txt');

COMMIT;


-- -----------------------------------------------------
-- Data for table `agora`.`reponse`
-- -----------------------------------------------------
START TRANSACTION;
USE `agora`;
INSERT INTO `agora`.`reponse` (`id`, `adresse`, `points`, `datem`, `sujet`, `profil`) VALUES (1, '7c788ddc-360e-4279-b59c-4a2c00caa634.txt', 1, '2018-11-16 03:09:04', 1, 1);
INSERT INTO `agora`.`reponse` (`id`, `adresse`, `points`, `datem`, `sujet`, `profil`) VALUES (2, '9d970dbd-3b33-4b6c-823d-17783770911e', 103, '2018-11-25 09:04:48', 1, 2);
INSERT INTO `agora`.`reponse` (`id`, `adresse`, `points`, `datem`, `sujet`, `profil`) VALUES (3, '0ac886d4-4f57-41d9-897f-a368f607ad9a', 1, '2018-11-01 14:04:03', 3, 3);
INSERT INTO `agora`.`reponse` (`id`, `adresse`, `points`, `datem`, `sujet`, `profil`) VALUES (4, '9363f414-2ca1-42fb-8023-c805bbc92a70', 1, '2018-01-01 18:00:01', 5, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `agora`.`conversation`
-- -----------------------------------------------------
START TRANSACTION;
USE `agora`;
INSERT INTO `agora`.`conversation` (`id`, `sujet`, `dateC`) VALUES (1, 'Aide PHP', '2018-11-16');
INSERT INTO `agora`.`conversation` (`id`, `sujet`, `dateC`) VALUES (2, 'Demande de site web', '2018-10-26');
INSERT INTO `agora`.`conversation` (`id`, `sujet`, `dateC`) VALUES (3, 'Envoie de script JS', '2018-11-03');

COMMIT;


-- -----------------------------------------------------
-- Data for table `agora`.`courrier`
-- -----------------------------------------------------
START TRANSACTION;
USE `agora`;
INSERT INTO `agora`.`courrier` (`id`, `conversation`, `adresse`, `datecou`) VALUES (1, 1, 'f1363c3e-7060-4372-9c6a-4ee8ef7be4f5.txt', '2018-11-16 23:18:26');
INSERT INTO `agora`.`courrier` (`id`, `conversation`, `adresse`, `datecou`) VALUES (2, 1, 'b8204175-9f0e-4e1c-96e6-7390090e8b32.txt', '2018-11-16 23:39:12');
INSERT INTO `agora`.`courrier` (`id`, `conversation`, `adresse`, `datecou`) VALUES (3, 1, '2470eb70-200e-4faf-9c50-4743b5bdfdae.txt', '2018-11-16 23:40:59');
INSERT INTO `agora`.`courrier` (`id`, `conversation`, `adresse`, `datecou`) VALUES (4, 2, '9de33958-3813-4ed5-9679-040bbf1e57cd.txt', '2018-10-26 13:00:14');
INSERT INTO `agora`.`courrier` (`id`, `conversation`, `adresse`, `datecou`) VALUES (5, 2, '32bf6e5e-77ac-45e3-94c2-ebf98fb0fa7f.txt', '2018-10-18 19:01:42');
INSERT INTO `agora`.`courrier` (`id`, `conversation`, `adresse`, `datecou`) VALUES (6, 3, '60ec461d-a8b4-476a-8fb1-7d35dd06195e.txt', '2018-11-03 8:19:09');
INSERT INTO `agora`.`courrier` (`id`, `conversation`, `adresse`, `datecou`) VALUES (7, 3, 'de50d6c5-e31f-419b-ad8e-144fc5260b5d.txt', '2018-11-16 17:14:14');

COMMIT;


-- -----------------------------------------------------
-- Data for table `agora`.`commentaire`
-- -----------------------------------------------------
START TRANSACTION;
USE `agora`;
INSERT INTO `agora`.`commentaire` (`id`, `points`, `adresse`, `reponse`, `datecom`, `profil`) VALUES (1, 3, '893fa896-ceb1-4de6-aba9-284bf3baeb0f.txt', 4, '2018-01-01 18:05:03', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `agora`.`ticket`
-- -----------------------------------------------------
START TRANSACTION;
USE `agora`;
INSERT INTO `agora`.`ticket` (`id`, `sujet`, `dateT`, `profil`, `adresse`, `pieces_jointe`) VALUES (1, 'Le boutton pour envoyer sa réponse sur la page d\'un sujet ne marche pas', '2018-11-08', 3, 'c38c6717-33fc-4912-ae0d-4bef26bd5290.txt', '27781f59-af23-445a-9905-483c89f3fdda.txt');
INSERT INTO `agora`.`ticket` (`id`, `sujet`, `dateT`, `profil`, `adresse`, `pieces_jointe`) VALUES (2, 'La catégorie PHP n\'affiche rien', '2018-11-15', 2, 'a54b5fc8-4167-48e4-88cf-d3cd5faa0d49.txt', NULL);
INSERT INTO `agora`.`ticket` (`id`, `sujet`, `dateT`, `profil`, `adresse`, `pieces_jointe`) VALUES (3, 'Je ne vois pas mes messages privés', '2018-10-09', 1, 'f1ac60c6-b017-4d3d-805c-e5d41b7cc75f.txt', '66a3ae44-043f-4c29-a7eb-8818cf7c5e9c.txt');

COMMIT;


-- -----------------------------------------------------
-- Data for table `agora`.`discuter`
-- -----------------------------------------------------
START TRANSACTION;
USE `agora`;
INSERT INTO `agora`.`discuter` (`id`, `conversation`, `profil`) VALUES (1, 1, 1);
INSERT INTO `agora`.`discuter` (`id`, `conversation`, `profil`) VALUES (2, 1, 3);
INSERT INTO `agora`.`discuter` (`id`, `conversation`, `profil`) VALUES (3, 2, 2);
INSERT INTO `agora`.`discuter` (`id`, `conversation`, `profil`) VALUES (4, 2, 4);
INSERT INTO `agora`.`discuter` (`id`, `conversation`, `profil`) VALUES (5, 3, 2);
INSERT INTO `agora`.`discuter` (`id`, `conversation`, `profil`) VALUES (6, 3, 5);

COMMIT;


-- -----------------------------------------------------
-- Data for table `agora`.`signaler`
-- -----------------------------------------------------
START TRANSACTION;
USE `agora`;
INSERT INTO `agora`.`signaler` (`id`, `dateSi`, `type`, `profil`, `id_contenu`) VALUES (1, '2018-11-16', 'sujet', 1, 5);
INSERT INTO `agora`.`signaler` (`id`, `dateSi`, `type`, `profil`, `id_contenu`) VALUES (2, '2018-11-19', 'reponse', 3, 3);
INSERT INTO `agora`.`signaler` (`id`, `dateSi`, `type`, `profil`, `id_contenu`) VALUES (3, '2018-11-20', 'commentaire', 4, 1);

COMMIT;

