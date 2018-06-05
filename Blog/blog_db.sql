-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 21 mai 2018 à 20:26
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

DROP TABLE IF EXISTS `billets`;
CREATE TABLE IF NOT EXISTS `billets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `billets`
--

INSERT INTO `billets` (`id`, `titre`, `contenu`, `date_creation`) VALUES
(1, 'Bienvenue sur mon blog !', ' Je vous souhaite à toutes et à tous la bienvenue sur mon blog !', '2010-03-25 16:28:41'),
(2, 'La locataire provoque deux départs de feu !', ' Le 10 novembre 2015, Mme Y obtient un logement social dans un immeuble géré par le bailleur Paris Habitat. Le 2 mai 2016, de la fumée blanche sortant par ses fenêtres, les pompiers, appelés par des voisins, bloquent la rue, et déploient leur échelle, afin d’accéder à son appartement. La police intervient aussi, mais doit négocier pendant vingt minutes avec Mme Y, pour qu’elle ouvre sa porte.\r\n.\r\n\r\nElle constate que l’appartement est enfumé, la locataire ayant fait brûler des papiers dans l’évier. Le 3 mai 2016, Mme Y brûle cette fois des cartons dans la cave de l’immeuble, et la gardienne appelle à nouveau les pompiers. A chaque fois, un périmètre de sécurité empêche les autres locataires de rentrer chez eux; ils constatent ensuite que le gaz a été coupé collectivement.\r\n\r\nLe 4 mai 2016, par arrêté du préfet de police de Paris, Mme Y est admise en soins psychiatriques au centre hospitalier du 13e arrondissement de Paris. Un certificat médical délivré le 30 mai 2016 indique qu’elle présente un délire de persécution. ', '2010-03-27 18:31:11');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_billet` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_billet`, `auteur`, `commentaire`, `date_commentaire`) VALUES
(1, 1, 'M@teo21', 'Un peu court ce billet !', '2010-03-25 16:49:53'),
(2, 1, 'Maxime', 'Oui, ça commence pas très fort ce blog...', '2010-03-25 16:57:16'),
(3, 1, 'MultiKiller', '+1 !', '2010-03-25 17:12:52'),
(4, 2, 'John', 'Preum\'s !', '2010-03-27 18:59:49'),
(5, 2, 'Maxime', 'Excellente analyse de la situation !\r\nIl y arrivera plus tôt qu\'on ne le pense !', '2010-03-27 22:02:13'),
(6, 2, 'Julien', 'Julien', '2018-05-21 09:54:30'),
(7, 5, 'Mr.Koro', 'Un test ?', '2018-05-21 12:09:07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
