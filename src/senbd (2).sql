-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 03 mars 2020 à 01:28
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `senbd`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `ID_CAT` int(11) NOT NULL,
  `IDFA` int(11) NOT NULL,
  `NOM_CAT` varchar(254) CHARACTER SET utf8 DEFAULT NULL,
  `ACHAT` int(11) NOT NULL,
  `VENTE` int(11) NOT NULL,
  `COMPT` int(11) NOT NULL,
  `flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`ID_CAT`, `IDFA`, `NOM_CAT`, `ACHAT`, `VENTE`, `COMPT`, `flag`) VALUES
(1, 1, 'CHAMBRES', 0, 1, 0, 0),
(2, 3, 'BOISSONS', 1, 1, 1, 0),
(3, 7, 'CHARGES FIXE', 1, 0, 0, 0),
(4, 7, 'CHARGES VARIABLES', 1, 0, 0, 0),
(5, 5, 'CIGARETTE', 1, 1, 1, 0),
(6, 2, 'REFFECTOIRE', 1, 1, 1, 0),
(7, 1, 'MATÃ‰RIELS  AUBERGE', 1, 0, 0, 0),
(8, 2, 'CHARGE RESTAURANT', 1, 0, 0, 0),
(9, 2, 'PLATS VENDU', 0, 1, 0, 0),
(10, 7, 'ADMINISTRATION ', 1, 0, 0, 0),
(11, 3, 'CHARGES BAR', 1, 0, 0, 0),
(12, 2, 'FOURNITURES RESTAURANT', 1, 0, 1, 0),
(13, 7, 'VERSEMENTS M. LW', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `condis`
--

CREATE TABLE `condis` (
  `IDC` int(11) NOT NULL,
  `NOMC` varchar(254) DEFAULT NULL,
  `FLAG` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `condis`
--

INSERT INTO `condis` (`IDC`, `NOMC`, `FLAG`) VALUES
(1, 'Kg', 0),
(2, 'Sachet', 0),
(3, 'Bidon 5L', 0),
(4, 'Bidons 10L', 0),
(5, 'Bouteille 1L', 0),
(6, 'Bouteille 0.5L', 0),
(7, 'Bouteille 66Cl', 0),
(8, 'Bouteille 33Cl', 0),
(9, 'Cannette', 0),
(10, 'Brique 1L', 0),
(11, 'Bouteille 1.5L', 0),
(12, 'Bouteille 2L', 0),
(13, 'Pacquet', 0),
(14, 'UnitÃ©', 0),
(15, 'Passe', 0),
(16, 'NuitÃ©e', 0),
(17, 'JournÃ©e', 0),
(18, 'Sac', 0),
(19, 'Filet', 0),
(20, 'Carton', 0),
(21, 'Seau 5L', 0),
(22, 'Seau 10L', 0),
(23, 'Seau 15L', 0),
(24, 'Bidons 20L', 0),
(25, 'Bagette', 0),
(26, 'Plat', 0),
(27, 'F ', 0),
(28, 'Boite', 0),
(29, 'Heure', 0),
(30, 'aucun', 0),
(31, 'Conso', 0),
(32, 'Boule', 0),
(33, 'ALVEOLS', 0),
(34, 'portion', 0);

-- --------------------------------------------------------

--
-- Structure de la table `department`
--

CREATE TABLE `department` (
  `iddep` int(11) NOT NULL,
  `ids` int(11) NOT NULL,
  `NOMD` varchar(254) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etat_compte`
--

CREATE TABLE `etat_compte` (
  `IDE` bigint(255) NOT NULL,
  `IDFA` int(11) NOT NULL,
  `IDMOUV` bigint(255) NOT NULL,
  `DEPENSE` double NOT NULL,
  `GAINS` double NOT NULL,
  `STOCK` double NOT NULL,
  `DATEE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etat_stock`
--

CREATE TABLE `etat_stock` (
  `id` bigint(255) NOT NULL,
  `IDF` bigint(255) NOT NULL,
  `QNT_AV` double NOT NULL,
  `QNT_APR` double NOT NULL,
  `DATESTK` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etat_stock`
--

INSERT INTO `etat_stock` (`id`, `IDF`, `QNT_AV`, `QNT_APR`, `DATESTK`) VALUES
(1, 1, 1, 0, '2020-03-01'),
(2, 2, 1, -1, '2020-03-01'),
(3, 3, 1, -3, '2020-03-01'),
(4, 4, 1, -2, '2020-03-01'),
(5, 5, 1, 0, '2020-03-01'),
(6, 6, 1, -2, '2020-03-01'),
(7, 7, 1, 0, '2020-03-01'),
(8, 8, 1, -1, '2020-03-01'),
(9, 9, 1, -5, '2020-03-01'),
(10, 10, 1, -2, '2020-03-01'),
(11, 11, 15, 16, '2020-03-01'),
(12, 12, 10, 12, '2020-03-01'),
(13, 13, 10, 12, '2020-03-01'),
(14, 14, 15, 16, '2020-03-01'),
(15, 15, 27, 30, '2020-03-01'),
(16, 16, 24, 26, '2020-03-01'),
(17, 17, 7, 10, '2020-03-01'),
(18, 18, 17, 18, '2020-03-01'),
(19, 19, 36, 39, '2020-03-01'),
(20, 20, 30, 12, '2020-03-01'),
(21, 21, 48, 24, '2020-03-01'),
(22, 22, 20, 18, '2020-03-01'),
(23, 23, 24, 19, '2020-03-01'),
(24, 24, 15, 14, '2020-03-01'),
(25, 25, 27, 22, '2020-03-01'),
(26, 26, 27, 19, '2020-03-01'),
(27, 27, 15, 9, '2020-03-01'),
(28, 28, 9, 8, '2020-03-01'),
(29, 29, 33, 19, '2020-03-01'),
(30, 30, 10, 5, '2020-03-01'),
(31, 31, 3, 0, '2020-03-01'),
(32, 32, 58, 44, '2020-03-01'),
(33, 33, 11, 6, '2020-03-01'),
(34, 34, 10, 5, '2020-03-01'),
(35, 35, 1, 2, '2020-03-01'),
(36, 36, 1, 2, '2020-03-01');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `IDF` bigint(255) NOT NULL,
  `IDMV` int(11) NOT NULL,
  `IDP` int(11) DEFAULT NULL,
  `PU` double DEFAULT NULL,
  `QNT` double DEFAULT NULL,
  `MTS` double DEFAULT NULL,
  `ROW` int(11) NOT NULL,
  `FDESI` varchar(50) DEFAULT NULL,
  `FCONDIS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`IDF`, `IDMV`, `IDP`, `PU`, `QNT`, `MTS`, `ROW`, `FDESI`, `FCONDIS`) VALUES
(1, 1, 232, 10000, 1, 10000, 0, '', ''),
(2, 1, 230, 15000, 2, 30000, 1, '', ''),
(3, 1, 231, 5000, 4, 20000, 2, '', ''),
(4, 1, 354, 5000, 3, 15000, 3, '', ''),
(5, 2, 130, 1500, 1, 1500, 0, '', ''),
(6, 2, 191, 3500, 3, 10500, 1, '', ''),
(7, 2, 218, 1500, 1, 1500, 2, '', ''),
(8, 2, 247, 5500, 2, 11000, 3, '', ''),
(9, 2, 265, 6000, 6, 36000, 4, '', ''),
(10, 2, 364, 4000, 3, 12000, 5, '', ''),
(11, 3, 82, 1000, 1, 1000, 0, '33 EXPORT GM', 'Bouteille 33Cl'),
(12, 3, 94, 4000, 2, 8000, 1, 'CLUB7 GM', 'Bouteille 1L'),
(13, 3, 396, 2500, 2, 5000, 2, 'CLUB7 PM', 'UnitÃ©'),
(14, 3, 413, 2000, 1, 2000, 3, 'DESPERADO', 'UnitÃ©'),
(15, 3, 85, 2000, 3, 6000, 4, 'ENERGIE GM', 'Cannette'),
(16, 3, 344, 1000, 2, 2000, 5, 'ENERGIE PM', 'Cannette'),
(17, 3, 122, 1000, 3, 3000, 6, 'EXCELLENCE', 'Pacquet'),
(18, 3, 77, 1500, 1, 1500, 7, 'FLAG GM', 'Bouteille 33Cl'),
(19, 3, 78, 1000, 3, 3000, 8, 'FLAGUETTES', 'Bouteille 33Cl'),
(20, 3, 75, 1000, 18, 18000, 9, '', ''),
(21, 3, 330, 1000, 24, 24000, 10, '', ''),
(22, 3, 353, 1000, 2, 2000, 11, '', ''),
(23, 3, 331, 1000, 5, 5000, 12, '', ''),
(24, 3, 90, 1000, 1, 1000, 13, '', ''),
(25, 3, 89, 500, 5, 2500, 14, '', ''),
(26, 3, 121, 1000, 8, 8000, 15, '', ''),
(27, 3, 111, 2000, 6, 12000, 16, '', ''),
(28, 3, 86, 2000, 1, 2000, 17, '', ''),
(29, 3, 81, 1000, 14, 14000, 18, '', ''),
(30, 3, 83, 1000, 5, 5000, 19, '', ''),
(31, 3, 79, 1000, 3, 3000, 20, '', ''),
(32, 3, 84, 500, 14, 7000, 21, '', ''),
(33, 3, 88, 500, 5, 2500, 22, '', ''),
(34, 3, 356, 500, 5, 2500, 23, '', ''),
(35, 4, 343, 50000, 1, 50000, 0, '', ''),
(36, 4, 166, 40000, 1, 40000, 1, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE `famille` (
  `IDFA` int(11) NOT NULL,
  `DESI` varchar(254) NOT NULL,
  `COLOR` varchar(254) NOT NULL,
  `FLAG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`IDFA`, `DESI`, `COLOR`, `FLAG`) VALUES
(1, 'AUBERGE', '#1E90FF', 0),
(2, 'RESTAURANT', '#008000', 0),
(3, 'BAR ', '#FFFF33', 0),
(4, 'DIVERS', '#DA70D6', 0),
(5, 'TABAC', '#FF0000', 0),
(6, 'CAISSE', '#fffff', 3),
(7, 'CHARGES ', '#000000', 0),
(8, 'CHARGES PATRON', '#FFC0CB', 0);

-- --------------------------------------------------------

--
-- Structure de la table `fiche_inventaire`
--

CREATE TABLE `fiche_inventaire` (
  `idl` bigint(255) NOT NULL,
  `IDE` bigint(255) NOT NULL,
  `conten` varchar(254) DEFAULT NULL,
  `datefiche` datetime DEFAULT NULL,
  `flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fond`
--

CREATE TABLE `fond` (
  `id` int(11) NOT NULL,
  `capital` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fond`
--

INSERT INTO `fond` (`id`, `capital`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `frontend`
--

CREATE TABLE `frontend` (
  `IDFR` int(11) NOT NULL,
  `LIBELE` varchar(254) NOT NULL,
  `CIBLE` varchar(254) NOT NULL,
  `FSECTION` varchar(254) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `frontend`
--

INSERT INTO `frontend` (`IDFR`, `LIBELE`, `CIBLE`, `FSECTION`) VALUES
(1, 'default', 'appdseting', 'slidebar'),
(2, 'noire', 'appdseting', 'theme');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `IDIMG` int(11) NOT NULL,
  `IDO` int(11) NOT NULL,
  `LINK` varchar(254) DEFAULT NULL,
  `ORIGIN` varchar(254) DEFAULT NULL,
  `FLAG` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `log`
--

CREATE TABLE `log` (
  `idl` int(11) NOT NULL,
  `IDMV` int(11) NOT NULL,
  `conten` varchar(254) DEFAULT NULL,
  `datelog` datetime DEFAULT NULL,
  `flag` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `log`
--

INSERT INTO `log` (`idl`, `IDMV`, `conten`, `datelog`, `flag`) VALUES
(1, 1, '&lt;table align=&quot;center&quot; border=&quot;1&quot; cellpadding=&quot;1&quot; cellspacing=&quot;1&quot; style=&quot;width:1000px&quot;&gt; &lt;caption&gt;ENREGISTREMENT DE TRANSACTIONS DU 03-03-2020 00:50:47 &lt;/caption&gt; &lt;thead&gt; &lt;tr&gt; ', '0000-00-00 00:00:00', 0),
(2, 2, '&lt;table align=&quot;center&quot; border=&quot;1&quot; cellpadding=&quot;1&quot; cellspacing=&quot;1&quot; style=&quot;width:1000px&quot;&gt; &lt;caption&gt;ENREGISTREMENT DE TRANSACTIONS DU 03-03-2020 00:57:31 &lt;/caption&gt; &lt;thead&gt; &lt;tr&gt; ', '0000-00-00 00:00:00', 0),
(3, 3, '&lt;table align=&quot;center&quot; border=&quot;1&quot; cellpadding=&quot;1&quot; cellspacing=&quot;1&quot; style=&quot;width:1000px&quot;&gt; &lt;caption&gt;ENREGISTREMENT DE TRANSACTIONS DU 03-03-2020 01:05:00 &lt;/caption&gt; &lt;thead&gt; &lt;tr&gt; ', '0000-00-00 00:00:00', 0),
(4, 1, '&lt;table align=&quot;center&quot; border=&quot;1&quot; cellpadding=&quot;1&quot; cellspacing=&quot;1&quot; style=&quot;width:1000px&quot;&gt; &lt;caption&gt;MODIFICATION DE TRANSACTIONS DU 03-03-2020 01:14:35 &lt;/caption&gt; &lt;thead&gt; &lt;tr&gt; &l', '0000-00-00 00:00:00', 0),
(5, 4, '&lt;table align=&quot;center&quot; border=&quot;1&quot; cellpadding=&quot;1&quot; cellspacing=&quot;1&quot; style=&quot;width:1000px&quot;&gt; &lt;caption&gt;ENREGISTREMENT DE TRANSACTIONS DU 03-03-2020 01:27:41 &lt;/caption&gt; &lt;thead&gt; &lt;tr&gt; ', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `mouvement`
--

CREATE TABLE `mouvement` (
  `IDMV` bigint(255) NOT NULL,
  `IDU` int(11) NOT NULL,
  `NOMMV` varchar(254) DEFAULT NULL,
  `DATE_DEL` date DEFAULT NULL,
  `OBJET` varchar(254) DEFAULT NULL,
  `CONTEN` longtext DEFAULT NULL,
  `TOTALHT` double DEFAULT NULL,
  `TVA` double DEFAULT NULL,
  `MTSCH` double DEFAULT NULL,
  `MTSLTR` varchar(254) DEFAULT NULL,
  `REG` varchar(254) DEFAULT NULL,
  `AVANS` double DEFAULT NULL,
  `RESTE` double DEFAULT NULL,
  `CACHER` int(11) NOT NULL,
  `FLAG` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mouvement`
--

INSERT INTO `mouvement` (`IDMV`, `IDU`, `NOMMV`, `DATE_DEL`, `OBJET`, `CONTEN`, `TOTALHT`, `TVA`, `MTSCH`, `MTSLTR`, `REG`, `AVANS`, `RESTE`, `CACHER`, `FLAG`) VALUES
(1, 15, 'facture', '2020-03-01', 'RECETTE CHAMBRES', '...', 75000, 0, 75000, 'soixante-quinze mille', 'Espèce', 0, 0, 6, 0),
(2, 15, 'facture', '2020-03-01', 'RECETTE CUISINE', '...', 72500, 0, 72500, 'soixante-douze mille cinq cents', 'Espèce', 0, 0, 6, 0),
(3, 15, 'facture', '2020-03-01', 'RECETTE BAR', '...', 0, 0, 140000, 'cent quarante mille', 'Espèce', 0, 0, 6, 0),
(4, 7, 'recu', '2020-03-01', 'Dépense du 01-03-2020', '...', 90000, 0, 90000, 'quatre-vingt-dix mille', 'Espèce', 0, 0, 6, 0);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `IDN` int(11) NOT NULL,
  `IDO` int(11) NOT NULL,
  `ORIGINE` varchar(254) DEFAULT NULL,
  `CIBLE` varchar(254) DEFAULT NULL,
  `LIBELE` varchar(254) NOT NULL,
  `DATEE` datetime NOT NULL,
  `ETAT` int(11) DEFAULT NULL,
  `FLAG` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

CREATE TABLE `poste` (
  `id` int(11) NOT NULL,
  `libelle` varchar(58) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `poste`
--

INSERT INTO `poste` (`id`, `libelle`) VALUES
(1, 'BARMAID'),
(2, 'CUISINIER'),
(3, 'CUISINIERE'),
(4, 'DIRECTRICE'),
(5, 'GARDIEN'),
(6, 'MENAGERE'),
(7, 'HOTESSE'),
(8, 'PATRON'),
(9, 'SERVEUR'),
(10, 'SERVEUSE');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `IDP` bigint(255) NOT NULL,
  `IDC` int(11) NOT NULL,
  `ID_CAT` int(11) NOT NULL,
  `DESI` varchar(55) DEFAULT NULL,
  `PHOTO` varchar(256) NOT NULL,
  `PRIXA` double DEFAULT NULL,
  `PRIXV` double DEFAULT NULL,
  `QNT` double NOT NULL,
  `COMPOSER` tinyint(4) NOT NULL,
  `FTECH` text DEFAULT NULL,
  `FLAG` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`IDP`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `COMPOSER`, `FTECH`, `FLAG`) VALUES
(63, 14, 1, 'CHAMBRE NUIT&Eacute;E CLIM', '.', 0, 20000, 1, 0, '                                    ', 0),
(64, 14, 1, 'CHAMBRE PASSE CLIM', '.', 0, 15000, 1, 0, '							                                    							', 0),
(66, 14, 1, 'PISCINE ADULTES', '.', 0, 2000, 1, 0, '\r\n                                    ', 0),
(67, 14, 1, 'PISCINE ENFANTS', '.', 0, 1000, 1, 0, '\r\n                                    ', 0),
(68, 5, 2, 'MERLOT ROUGE', '.', 1500, 3500, 0, 0, '                                    ', 0),
(69, 9, 2, 'KLEINIENNE ', '.', 730, 1000, 0, 0, '\r\n                                    ', 0),
(73, 14, 4, 'TRANSPORT', '.', 0, 0, 1, 0, '\r\n                                    ', 0),
(75, 8, 2, 'GAZELLES GM', '.', 562.5, 1000, 12, 0, '                                    ', 0),
(77, 8, 2, 'FLAG GM', '.', 719, 1500, 1, 0, '														                                    														', 0),
(78, 8, 2, 'FLAGUETTES', '.', 437.5, 1000, 3, 0, '		vrai prix 437,5				  						                                    																					', 0),
(79, 8, 2, 'MEISTERS', '.', 510, 1000, 0, 0, '                                    ', 0),
(80, 0, 0, 'DSP', '', 1100, 2000, 0, 18, '', 0),
(81, 9, 2, 'ROYALS', '...', 510, 1000, 19, 0, 'VRAIE PRIX 			470.83', 0),
(82, 8, 2, '33 EXPORT GM', '...', 500, 1000, 1, 0, 'VRAIE PRIX 531,25                       							', 0),
(83, 8, 2, 'SAGRES', '...', 590, 1000, 5, 0, '\r\n                                    ', 0),
(84, 8, 2, 'SUCRE BOUTEILLE', '...', 170, 500, 44, 0, '\r\n                                    ', 0),
(85, 9, 2, 'ENERGIE GM', '...', 850, 2000, 3, 0, '\r\n                                    ', 0),
(86, 10, 2, 'PRESEA', '...', 1000, 2000, 8, 0, '							\r\n                                    							', 0),
(87, 9, 2, 'RANIS', '...', 300, 1000, 0, 0, '													\r\n                                    														', 0),
(88, 8, 2, 'VIMTO', '...', 250, 500, 6, 0, '							\r\n                                    							', 0),
(89, 6, 2, 'KIRENE PM', '...', 208, 500, 22, 0, '                                    ', 0),
(90, 11, 2, 'KIRENE GM', '...', 250, 1000, 14, 0, '\r\n                                    ', 0),
(91, 5, 2, 'VALMERAS', '...', 1600, 2500, 10, 0, '\r\n                                    ', 0),
(92, 6, 2, 'GIN DRY', '...', 1100, 2000, 1, 0, '\r\n                                    ', 0),
(93, 7, 2, 'BARONS RAMONE', '...', 1600, 3500, 9, 0, '							\r\n                                    							', 0),
(94, 5, 2, 'CLUB7 GM', '...', 1840, 4000, 2, 0, '\r\n                                    ', 0),
(95, 9, 2, 'TUBORG', '...', 650, 1500, 20, 0, '\r\n                                    ', 0),
(96, 9, 2, 'RED BULL', '...', 1000, 2000, 10, 0, '							\r\n                                    							', 0),
(97, 5, 2, 'JUS NATURELLE GM', '...', 1250, 2000, 0, 0, '\r\n                                    ', 0),
(98, 5, 2, 'EAU GAZEUSE', '...', 450, 1000, 0, 0, '                                    ', 0),
(99, 5, 2, 'SIROP MENTHE', '...', 1900, 500, 0, 0, '\r\n                                    ', 0),
(100, 5, 2, 'SIROP ORANGE', '...', 2500, 500, 0, 0, '\r\n                                    ', 0),
(101, 14, 2, 'CAFES', '...', 2000, 500, 0, 0, '\r\n                                    ', 0),
(102, 14, 2, 'THES', '...', 100, 500, 0, 0, '\r\n                                    ', 0),
(103, 31, 2, 'RED LABEL GM', '...', 18500, 25000, 0, 0, '\r\n                                    ', 0),
(104, 31, 2, 'GRANTS pm', '...', 500, 2000, 0, 0, '							\r\n                                    							', 0),
(105, 31, 2, 'GIN GORDON', '...', 500, 1000, 0, 0, '							\r\n                                    							', 0),
(106, 31, 2, 'JB GM', '...', 18500, 25000, 0, 0, '\r\n                                    ', 0),
(107, 31, 2, 'CLAN CAMBEL GM', '...', 18500, 1000, 25, 0, '\r\n                                    ', 0),
(108, 31, 2, 'GET 27', '...', 500, 2000, 0, 0, '\r\n                                    ', 0),
(109, 31, 2, 'BAYLEYS', '...', 500, 2000, 0, 0, '\r\n                                    ', 0),
(110, 31, 2, 'MARGARITA', '...', 500, 3500, 0, 0, '\r\n                                    ', 0),
(111, 31, 2, 'MARTINI BLANC', '...', 500, 2000, 9, 0, '\r\n                                    ', 0),
(112, 31, 2, 'MARTINI ROUGE', '...', 500, 2000, 0, 0, '\r\n                                    ', 0),
(113, 31, 2, 'MARTINI ROSE', '...', 500, 2000, 40, 0, '\r\n                                    ', 0),
(114, 31, 2, 'VODKA ASB', '...', 6500, 18500, 3, 0, '\r\n                                    ', 0),
(115, 31, 2, 'RICARD', '...', 500, 2000, 0, 0, '\r\n                                    ', 0),
(116, 31, 2, 'WILLIAM PEEL', '...', 1100, 1000, 39, 0, '							\r\n                                    							', 0),
(117, 7, 2, 'CUVE DU PATRON', '...', 1600, 3500, 0, 0, '							\r\n                                    							', 0),
(118, 7, 2, 'MINERVOIX', '...', 3500, 6000, 5, 0, '\r\n                                    ', 0),
(119, 7, 2, 'COTE DE PROVINCE', '...', 4500, 7500, 0, 0, '\r\n                                    ', 0),
(120, 7, 2, 'COTE DE RHONE', '...', 4500, 7500, 0, 0, '\r\n                                    ', 0),
(121, 13, 5, 'MALBOROS', '...', 720, 1000, 19, 0, '', 0),
(122, 13, 5, 'EXCELLENCE', '...', 570, 1000, 3, 0, '\r\n                                    ', 0),
(124, 27, 4, '0000', '...', 0, 0, 1, 0, '														\r\n                                    														', 1),
(125, 14, 13, 'DEPENSE PATRON', '...', 0, 0, 1, 0, '																					...\r\n                                    																					', 0),
(126, 14, 12, 'CHAUX ET CAROTTE', '...', 0, 0, -1, 0, '							                                    							', 0),
(127, 13, 8, 'STEACK', '...', 1500, 4000, 1, 0, '							\r\n                                    							', 0),
(128, 14, 9, 'PLAT OMELETTES SIMPLE', '...', 500, 1000, 1, 1, '                                    ', 0),
(129, 14, 9, 'PLAT OMELETTE GARNIE', '...', 1000, 2500, 1, 0, '                                    ', 0),
(130, 14, 9, 'PETIT DEJEUNER', '...', 0, 1500, 1, 0, '                                    ', 0),
(131, 13, 8, 'FRITTES', '...', 1250, 1000, 1, 0, '																					\r\n                                    																					', 0),
(132, 13, 8, 'ALLOKO', '...', 0, 1000, 1, 0, '														                                    														', 0),
(133, 13, 9, 'PLAT ATIEKE', '...', 500, 1500, 1, 0, '                                    ', 0),
(134, 2, 8, 'L&Eacute;GUMES SAUTER', '...', 1650, 5000, 1, 0, '                                    ', 0),
(135, 14, 9, 'PLAT DESSERT', '...', 750, 2000, 1, 0, '                                    ', 0),
(137, 13, 6, 'PORC BRAISER', '...', 625, 3500, 0, 0, '\r\n                                    ', 0),
(138, 14, 9, 'PLAT BOUILLONS', '...', 0, 0, 1, 0, '                                    ', 0),
(147, 14, 8, 'POISSONS', '...', 0, 0, 1, 0, '														\r\n                                    														', 0),
(148, 14, 8, 'GAZ MENAGER PM', '...', 3500, 0, 1, 0, '														...                                    														', 0),
(149, 14, 8, 'GAZ  MENAGER GM', '...', 6500, 0, 1, 0, '...                                    ', 0),
(150, 14, 8, 'POULETS ', '...', 7000, 3000, 1, 0, '														                                    														', 0),
(151, 26, 6, 'PX 0.5', '...', 2000, 3500, 0, 0, '																					                                    																					', 1),
(152, 14, 4, 'ELECTRICIEN', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(153, 14, 4, 'PLOMBIER', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(154, 14, 4, 'GROUPISTE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(155, 14, 4, 'ENTRETIEN GROUPE ELECTROGENE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(156, 14, 4, 'ENTRETIENS PISCINE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(157, 14, 4, 'PEINTRE  MAIN D&rsquo;&OElig;UVRE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(158, 14, 4, 'SAVONS CLIENTS', '...', 0, 0, 1, 0, '																					\r\n                                    																					', 0),
(159, 14, 4, 'INSECTIDES', '...', 1500, 0, 1, 0, '							\r\n                                    							', 0),
(160, 14, 4, 'DETERGENTS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(161, 14, 4, 'MA&Ccedil;ONNERIE SABLE', '...', 0, 0, 1, 0, '														\r\n                                    														', 0),
(162, 14, 4, 'PRODUITS CUISINE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(163, 14, 3, 'MARCHER EMPLOYER', '...', 40000, 0, 1, 0, '							\r\n                                    							', 0),
(164, 14, 3, 'SALAIRE GERANTE', '...', 0, 115000, 1, 0, '\r\n                                    ', 0),
(165, 14, 3, 'SALAIRE BARMAIDE', '...', 0, 80000, 1, 0, '\r\n                                    ', 0),
(166, 14, 3, 'SALAIRE MENAGERE', '...', 0, 40000, 2, 0, '\r\n                                    ', 0),
(167, 14, 3, 'SALAIRE CUISINIERE', '...', 0, 55000, 1, 0, '\r\n                                    ', 0),
(168, 14, 3, 'SALAIRE SERVEUSE', '...', 0, 30000, 1, 0, '\r\n                                    ', 0),
(169, 14, 3, 'SALAIRE JARDINIER', '...', 0, 35000, 1, 0, '\r\n                                    ', 0),
(170, 14, 3, 'SALAIRE PAPE PISCINE', '...', 0, 30000, 1, 0, '\r\n                                    ', 0),
(171, 14, 3, 'SALAIRE GARDIEN', '...', 0, 35000, 1, 0, '\r\n                                    ', 0),
(172, 14, 3, 'SALAIRE  PAPOY GARDIEN TERRAIN', '...', 0, 80000, 1, 0, '\r\n                                    ', 0),
(173, 14, 3, 'SALAIRE GARDIEN TERRAIN', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(174, 14, 3, 'SALAIRE GARDIEN TERRAIN 3', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(175, 14, 4, 'CANONS PORTE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(176, 14, 4, 'POIGNETS PORTE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(177, 14, 3, 'MOUCHOIRS  JETABLE', '...', 0, 500, 1, 0, '							\r\n                                    							', 0),
(178, 14, 2, 'CACAOUETTES', '...', 0, 0, 0, 0, '																												\r\n                                    																												', 0),
(179, 14, 2, 'SHIPS', '...', 1500, 0, 0, 0, '							...\r\n                                    							', 0),
(180, 14, 1, 'PRESERVATIFS', '...', 250, 500, 1, 0, '														\r\n                                    														', 0),
(181, 14, 1, 'CHAMBRE PRIX SPECIAUX', '...', 0, 12500, 1, 0, '														\r\n                                    														', 0),
(183, 13, 8, 'PACK HAMBURGER', '...', 0, 0, 1, 0, '														...                                    														', 1),
(184, 14, 9, 'PLATS RIZ', '...', 0, 0, 1, 0, '...                                    ', 0),
(185, 14, 9, 'PLATS DU JOURS', '...', 0, 0, 1, 0, '...                                    ', 0),
(186, 14, 12, 'OEUFS', '...', 0, 0, 0, 0, '														...\r\n                                    														', 0),
(187, 14, 9, 'PLAT SALADE DE LEGUMES', '...', 0, 0, 1, 0, '                                    ', 0),
(188, 14, 9, 'PLAT SALADE DE FRUITS', '...', 0, 0, 1, 0, '                                    ', 0),
(189, 27, 9, '0000', '...', 0, 0, 1, 0, '							...                                    							', 1),
(190, 14, 9, 'PLAT DE FRITTE', '...', 0, 0, 1, 1, '...                                    ', 0),
(191, 14, 9, 'PLAT CREVETTE', '...', 1000, 3500, 1, 1, '                                    ', 0),
(192, 14, 4, 'POUBELIER', '...', 0, 0, 1, 0, '...\r\n                                    ', 0),
(193, 25, 9, 'PLAT BLANQUETTE DE POULET', '...', 0, 0, 1, 1, '							...                                    							', 0),
(194, 14, 8, 'BARQUETTES PLAT A EMPORTER', '...', 0, 0, 1, 0, '							...\r\n                                    							', 0),
(195, 14, 4, 'GRESIL', '...', 0, 0, 1, 0, '...\r\n                                    ', 0),
(196, 13, 4, 'BATTERIE DE RECHARE APPPAREILLE', '...', 0, 0, 1, 0, '...\r\n                                    ', 0),
(197, 18, 4, 'SAVONS LESSIVE', '...', 0, 0, 1, 0, '...\r\n                                    ', 0),
(198, 14, 4, 'PRODUITS MENAGER', '...', 0, 0, 1, 0, '...\r\n                                    ', 0),
(199, 14, 2, 'VERRES BAR', '...', 0, 0, 0, 0, '														...\r\n                                    														', 0),
(200, 14, 4, 'DETTES  LOGICIEL DE COMPTABILIT&amp;Eacute;', '...', 500000, 0, 1, 0, '							CONTRAT DE 100.000 AV = 30.000      														', 0),
(201, 14, 8, 'VIANDE HEMBURGER', '...', 0, 0, 1, 0, '																												...\r\n                                    																												', 0),
(202, 14, 8, 'HAMBURGER FROMAGE', '...', 0, 0, 1, 0, '														...\r\n                                    														', 0),
(203, 14, 4, 'PAPIER FILME ET ALLUMINIM', '...', 0, 0, 1, 0, '...\r\n                                    ', 0),
(204, 14, 8, 'SUCRE CLIENTS', '...', 0, 0, 1, 0, '							...\r\n                                    							', 0),
(206, 14, 4, 'MOUTARDE', '...', 0, 0, 1, 0, '...\r\n                                    ', 0),
(207, 14, 3, 'KETCHUPS', '...', 3500, 0, 1, 0, '							...\r\n                                    							', 0),
(208, 14, 4, 'OGNIONS', '...', 0, 0, 1, 0, '...\r\n                                    ', 0),
(209, 14, 8, 'AILS CUISINE', '...', 0, 0, 1, 0, '							...\r\n                                    							', 0),
(210, 14, 8, 'CUBE MAGGIS', '...', 0, 0, 1, 0, '							...\r\n                                    							', 0),
(211, 14, 4, 'DETERGENT  VAISSELLES ', '...', 0, 0, 1, 0, '...\r\n                                    ', 0),
(212, 14, 8, 'PETIT DEJ EMPLOYER', '...', 0, 0, 1, 0, '							...\r\n                                    							', 0),
(213, 14, 4, 'DEPENSE AUBERGEMENT', '...', 0, 0, 1, 0, '...\r\n                                    ', 0),
(214, 14, 9, 'NORV&Eacute;GIEN ', '...', 0, 100, 1, 0, '...                                    ', 0),
(215, 14, 4, 'MACONNERIE CIMENT', '...', 0, 0, 1, 0, '...\r\n                                    ', 0),
(216, 14, 4, 'MACONNERIE GRAVIERS ', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(217, 14, 4, 'MA&Ccedil;ONNERIE COQUILLAGE', '...', 0, 0, 1, 0, '							\r\n                                    							', 0),
(218, 14, 9, 'PLAT HAMBURGER', '...', 1000, 1500, 1, 0, '																					...\r\n                                    																					', 0),
(219, 14, 8, 'SAC DE RIZ', '...', 0, 0, 1, 0, '							...\r\n                                    							', 0),
(220, 14, 4, 'LESSIVEUSE', '...', 0, 0, 1, 0, '...\r\n                                    ', 0),
(221, 14, 10, 'IPRESS', '...', 0, 0, 1, 0, '...\r\n                                    ', 0),
(222, 14, 10, 'CAISSE DE SECURITE SOCIALE', '...', 0, 0, 1, 0, '...\r\n                                    ', 0),
(223, 14, 10, 'PAPIER A 4', '...', 0, 0, 1, 0, '...\r\n                                    ', 0),
(224, 14, 11, 'OFFERTE', '...', 0, 0, 1, 0, '							...\r\n                                    							', 0),
(225, 14, 9, 'PLAT DU JOUR', '...', 0, 1000, 1, 0, '							...\r\n                                    							', 0),
(226, 14, 9, 'PLATS FILET DE BOEUFS', '...', 0, 0, 1, 1, '							...\r\n                                    							', 0),
(227, 14, 12, 'FILET DE BOEUF ', '...', 0, 0, 2, 0, '							...\r\n                                    							', 0),
(228, 14, 8, 'HUILE 5 LITRES', '...', 0, 0, 1, 0, '							...\r\n                                    							', 0),
(229, 14, 4, '0000', '...', 0, 0, 1, 0, '														...\r\n                                    														', 1),
(230, 14, 1, 'CHAMBRE NUITEE VENTILO', '...', 0, 15000, 1, 0, '\r\n                                    ', 0),
(231, 14, 1, 'CHAMBRE PASSE JOURNEE', '...', 0, 5000, 1, 0, '\r\n                                    ', 0),
(232, 14, 1, 'CHAMBRE JOURNEE VENTILO', '...', 0, 10000, 1, 0, '\r\n                                    ', 0),
(233, 14, 1, 'CHAMBRE JOUNEE CLIM', '...', 0, 15000, 1, 0, '\r\n                                    ', 0),
(234, 14, 1, 'CHAMBRE DEMI JOUNEE', '...', 0, 7500, 1, 0, '...\r\n                                    ', 0),
(235, 14, 10, 'CARTE ORANGE', '...', 0, 0, 1, 0, '...\r\n                                    ', 0),
(236, 14, 10, 'COMPTABLE', '...', 0, 0, 1, 0, '...\r\n                                    ', 0),
(237, 14, 8, ' PAIN  HAMBURGER', '...', 190, 0, 1, 0, '														...\r\n                                    														', 0),
(238, 14, 6, 'WWWW', '...', 0, 0, 0, 0, '							...\r\n                                    							', 1),
(239, 14, 4, 'PARFUM AUBERGE ', '...', 0, 0, 1, 0, '							...\r\n                                    							', 0),
(240, 14, 4, 'FACTURE SONATEL', '...', 0, 0, 1, 0, '...\r\n                                    ', 0),
(241, 14, 3, 'CANAL HORIZON', '...', 0, 0, 1, 0, '							...\r\n                                    							', 0),
(242, 14, 2, 'RHUM  LIQUEUR ', '...', 5200, 10000, 0, 0, '...\r\n                                    ', 0),
(243, 14, 8, 'ALLUME FEU', '...', 0, 0, 1, 0, '							...\r\n                                    							', 0),
(244, 14, 9, 'PLAT POISSONS PETITS', '...', 0, 0, 1, 0, '                                    ', 1),
(245, 14, 9, 'PLAT POISSON MOYENS', '...', 0, 0, 1, 0, '                                    ', 1),
(246, 14, 9, 'PLAT POISSONS GRAND', '...', 0, 0, 1, 0, '                                    ', 1),
(247, 14, 9, 'PLAT POISSONS ', '...', 0, 0, 1, 1, '...\r\n                                    ', 0),
(248, 14, 9, 'PLAT QUART POULET ', '...', 0, 2500, 1, 1, '...\r\n                                    ', 0),
(249, 14, 4, 'MATERIELLE  ELECTRIQUE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(250, 14, 4, 'MATÃ‰RIELLE MENUISERIE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(251, 14, 12, 'PAIN NORVEGIEN', '...', 0, 0, 0, 0, '\r\n                                    ', 0),
(252, 14, 12, 'SAUCISSE NORVEGIEN', '...', 0, 0, 0, 0, '\r\n                                    ', 0),
(253, 14, 8, 'PIMENTS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(254, 14, 8, 'CONDIMENT VERT', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(255, 14, 9, 'PLAT STEACK', '...', 0, 0, 1, 1, '\r\n                                    ', 0),
(256, 14, 8, 'OIGNIONS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(257, 14, 8, 'POIVRE ', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(258, 14, 4, 'PHARMACIE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(259, 14, 9, 'PLAT FILLET', '...', 0, 0, 1, 0, '\r\n                                    ', 1),
(260, 14, 4, 'SENELEC', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(261, 14, 4, 'SDE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(262, 14, 4, 'MATERIELS  AUBERGE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(263, 14, 7, 'OUTILLES ET AUTRE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(264, 14, 8, 'PAPIERS HAMBURGER', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(265, 14, 9, 'PLAT POULET ENTIER', '...', 0, 7000, 1, 1, '\r\n                                    ', 0),
(266, 14, 9, 'PLAT DEMI POULET', '...', 0, 3500, 1, 1, '\r\n                                    ', 0),
(267, 14, 12, 'BLANQUETTE DE POULET', '...', 1850, 5000, 0, 0, '....', 0),
(268, 14, 8, 'LEGUMES', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(269, 14, 7, 'PAPIER HYGENIQUE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(270, 14, 7, 'ESTEINTEURS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(271, 14, 8, 'MAYONAISE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(272, 14, 4, 'PRODUITS PISCINE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(273, 14, 7, 'AJAX WC', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(274, 14, 8, 'CONFITURE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(275, 14, 8, 'LAIT CLIENTS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(276, 14, 8, 'BECK A GAZ', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(277, 14, 2, 'GODYS', '...', 510, 1000, 0, 0, '\r\n                                    ', 0),
(278, 14, 8, 'MAMI', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(279, 14, 8, 'MADAR VAISELLES', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(280, 14, 7, 'SERPENTIN', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(281, 14, 12, 'ATIEKE', '...', 0, 0, 0, 0, '\r\n                                    ', 0),
(282, 14, 4, 'MAT&Eacute;RIELS  BAR', '...', 0, 0, 1, 0, '							\r\n                                    							', 0),
(283, 14, 7, 'EMPOULES', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(284, 14, 8, 'TOMATE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(285, 14, 2, 'OFFRE BAR', '...', 0, 0, 0, 0, '							\r\n                                    							', 0),
(286, 14, 4, 'DIVERS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(287, 14, 4, 'VIDANGE FAUSSE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(288, 14, 4, 'FUMIER ET FLEURES', '...', 1500, 0, 1, 0, '\r\n                                    ', 0),
(289, 14, 4, 'GAZOLE GROUPE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(290, 14, 8, 'SAVONS VAISELLE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(291, 14, 4, 'GLACE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(292, 14, 4, 'REFFECTION PORTES', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(293, 14, 4, 'PEINTURE ET MATERIELS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(294, 14, 1, 'SORTIE DE GROUPE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(295, 14, 4, 'MAIN Dâ€™Å’UVRE MAÃ‡ON', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(296, 14, 4, 'MATERIEL PLOMBERIE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(297, 14, 8, 'POIVRONS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(298, 14, 1, 'CHAMBRE SUITES', '...', 0, 20000, 1, 0, '\r\n                                    ', 0),
(299, 14, 2, 'EAU GAZEUSE PM', '...', 0, 0, 0, 0, '\r\n                                    ', 0),
(300, 14, 4, 'D&Eacute;PENSE ORANGE ET CANAL', '...', 0, 0, 1, 0, '							\r\n                                    							', 0),
(301, 14, 8, 'SALADE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(302, 14, 8, 'CONCOMBRE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(303, 14, 8, 'OGNIONS VERT', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(304, 14, 8, 'SEL ET POIVRE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(305, 14, 8, 'THE DIVERSE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(306, 14, 4, 'LITERIE UBERGE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(307, 14, 7, 'BALLAIT ET PELLE  A ORDURE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(308, 14, 4, 'SEAU ET BASSINE  M&Eacute;NAGE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(309, 14, 3, 'FACTURE ORANGE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(310, 14, 3, 'CERTIFICAT MEDICAL', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(311, 14, 8, 'BEURRE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(312, 14, 4, 'PINCES A LINGE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(313, 14, 1, 'SERVIETTE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(314, 14, 1, 'DRAPS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(315, 14, 2, 'RUHME', '...', 0, 0, 0, 0, '\r\n                                    ', 0),
(316, 14, 8, 'VINAIGRE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(317, 14, 4, 'TRAVAUX AUBERGE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(318, 14, 4, 'CHAUFFE EAU', '...', 0, 0, 1, 0, '							\r\n                                    							', 0),
(319, 14, 13, 'TRANSFERTS PATRON', '...', 0, 0, 1, 0, '....', 0),
(320, 14, 9, 'SADWISCHE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(321, 14, 4, 'MACONNERIE FER', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(322, 14, 1, 'M.L', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(323, 14, 2, 'APPAREILLE MUSICAL', '...', 0, 0, 0, 0, '\r\n                                    ', 0),
(324, 14, 4, 'MACONNERIE BRIQUE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(325, 14, 4, 'DONATIONS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(326, 14, 4, 'MACONNERIE CARREAUX ', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(327, 14, 4, 'CIMENT BLANC', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(328, 14, 4, 'OXYDE  COULEURS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(329, 14, 2, 'ENTRETIEN FRIGO', '...', 0, 0, 0, 0, '\r\n                                    ', 0),
(330, 14, 2, 'HEINEKEN BOUTEILLE', '...', 770, 1000, 24, 0, '\r\n                                    ', 0),
(331, 14, 2, 'JUS NATURELLE PM', '...', 500, 1000, 19, 0, '\r\n                                    ', 0),
(332, 14, 4, 'ENTRETIEN CLIM', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(333, 14, 4, 'PESTICIDE ET TERRO', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(334, 14, 1, 'LOCATION MOIS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(335, 14, 2, 'JACK DANIELS', '...', 19500, 2500, 0, 0, '\r\n                                    ', 0),
(336, 14, 4, 'IMPOTS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(337, 14, 4, 'MENUISSIER METALIQUE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(338, 14, 4, 'INSTALLATIONS G.', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(339, 14, 4, 'MAINS Dâ€™Å’UVRE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(340, 14, 2, 'MATERIELS BAR', '...', 0, 0, 0, 0, '\r\n                                    ', 0),
(341, 14, 2, 'CHAMPAGNE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(342, 14, 4, 'PRODUITS DE SANTE ', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(343, 14, 13, 'LOYER', '...', 0, 0, 2, 0, '\r\n                                    ', 0),
(344, 9, 2, 'ENERGIE PM', '...', 400, 1000, 2, 0, '							\r\n                                    							', 0),
(345, 14, 2, 'GLACONS', '...', 0, 0, 0, 0, '\r\n                                    ', 0),
(346, 14, 2, 'VALMERAS CASSABLE', '...', 1800, 4000, 9, 0, '\r\n                                    ', 0),
(347, 14, 4, 'MATERIELS DE JARDINAGE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(348, 14, 3, 'SALAIRE 2&eacute;me men', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(349, 14, 4, 'ACIDE BOUCHEUR', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(350, 14, 4, 'MATERIELS DE BUREAU', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(351, 14, 2, 'VALMERAS PM', '...', 1100, 2000, 0, 0, '\r\n                                    ', 0),
(352, 14, 2, 'EMBALLAGE', '...', 0, 0, 0, 0, '\r\n                                    ', 0),
(353, 14, 2, 'HEINEKEN CANETTE PM', '...', 700, 1000, 18, 0, '\r\n                                    ', 0),
(354, 14, 1, 'CHAMBRE PASSE NUIT', '...', 0, 5000, 1, 0, '\r\n                                    ', 0),
(355, 14, 2, 'CARTE NOIR PM', '...', 1000, 2000, 4, 0, '\r\n                                    ', 0),
(356, 14, 2, ' SUCRE CANETTES', '...', 250, 500, 5, 0, '\r\n                                    ', 0),
(357, 14, 4, 'DETTE ', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(358, 14, 2, 'PERTE BAR', '...', 0, 0, 0, 0, '\r\n                                    ', 0),
(359, 14, 4, 'FAUX BILLET', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(360, 14, 2, 'PICHET', '...', 1700, 4000, 2, 0, '\r\n                                    ', 0),
(361, 14, 2, 'PASTIS B', '...', 3000, 1000, 80, 0, '\r\n                                    ', 0),
(362, 14, 2, 'CORNICHONS ET OLIVE', '...', 0, 0, 0, 0, '\r\n                                    ', 0),
(363, 14, 2, 'JET27', '...', 500, 1000, 30, 0, '\r\n                                    ', 0),
(364, 14, 9, 'PLATS BROCHETTES BOEUF', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(365, 14, 9, 'ENTRE-COTTES', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(366, 14, 8, 'CHARBON', '...', 3500, 0, 1, 0, '\r\n                                    ', 0),
(367, 14, 2, 'BEAUFORT', '...', 540, 1000, 0, 0, '\r\n                                    ', 0),
(368, 14, 1, 'ENTRETIEN ET VOITURE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(369, 14, 4, 'SERVICE D HYGENE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(370, 14, 4, 'MACONNERIE CARREAUX ', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(371, 14, 9, 'FILLE DE POISSONS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(372, 14, 3, 'SALAIRE FRANCIS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(373, 14, 2, 'GAZELLES PM', '...', 350, 1000, 29, 0, '\r\n                                    ', 0),
(374, 14, 7, 'ANCRE IMPRIMANTE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(375, 14, 7, 'EAU DE JAVEL', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(376, 14, 8, 'EPICES CUISINE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(377, 14, 8, 'SAUCE  CUISINE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(378, 14, 8, 'FROMAGE CLIENTS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(379, 14, 4, 'DECORATION DE NOEL', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(380, 14, 8, 'AGRUME', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(381, 14, 2, 'VINS MOUSEUX', '...', 4500, 6500, 3, 0, '\r\n                                    ', 0),
(382, 14, 4, 'ENTRETIEN DIVERSE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(383, 14, 4, 'NOEL DECO ', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(384, 14, 2, 'GOLD BEER', '...', 510, 1000, 0, 0, '\r\n                                    ', 0),
(385, 14, 2, 'AMSTLES', '...', 510, 1000, 26, 0, '\r\n                                    ', 0),
(386, 14, 9, 'PLAT MOUTONS', '...', 2000, 3500, 1, 0, '\r\n                                    ', 0),
(387, 14, 9, 'PLAT MOUTONS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(388, 14, 9, 'MOUTONS', '...', 4000, 0, 1, 0, '\r\n                                    ', 0),
(389, 14, 2, 'PASTIS 51', '...', 15500, 1000, 20, 0, '\r\n                                    ', 0),
(390, 14, 9, 'PLATS MOUTONS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(391, 14, 2, 'RED LABEL PM', '...', 14500, 20000, 0, 0, '\r\n                                    ', 0),
(392, 14, 2, 'JB PM', '...', 14500, 1000, 0, 0, '\r\n                                    ', 0),
(393, 14, 2, 'CARTE NOIR GM', '...', 1750, 4000, 0, 0, '\r\n                                    ', 0),
(394, 14, 9, 'SPAGHETTI BOLOGNAISE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(395, 14, 4, 'Voiture et Entretien', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(396, 14, 2, 'CLUB7 PM', '...', 1500, 2500, 2, 0, '\r\n                                    ', 0),
(397, 14, 12, 'BETTERAVE', '...', 0, 0, 0, 0, '\r\n                                    ', 0),
(398, 14, 3, 'SALAIRE SOPHIE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(399, 14, 4, 'CONSIGNE', '...', 0, 0, 1, 0, '....', 0),
(400, 14, 4, 'FACTURE SENELEC', '...', 0, 0, 1, 0, '....', 0),
(401, 14, 4, 'FACTURE SDE', '...', 0, 0, 1, 0, '....', 0),
(402, 14, 8, 'CAROTTES', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(403, 14, 12, 'CREVETTE', '...', 3290, 3500, 0, 0, '\r\n                                    ', 0),
(404, 14, 12, 'PETIT POIDS', '...', 0, 0, 0, 0, '\r\n                                    ', 0),
(405, 14, 12, 'POMME DE TERRE', '...', 0, 0, 0, 0, '\r\n                                    ', 0),
(406, 14, 12, 'FRUITS', '...', 0, 0, 0, 0, '\r\n                                    ', 0),
(407, 14, 12, 'DESERT', '...', 0, 0, 0, 0, '\r\n                                    ', 0),
(408, 14, 4, 'INCOMPRIT', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(409, 14, 2, 'MINERVOIS', '...', 2000, 6000, 0, 0, '\r\n                                    ', 0),
(410, 14, 9, 'PLATS BOUILLONS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(411, 14, 8, 'VIANDE BOUILLONS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(412, 14, 9, 'BROCHETTE DE POISSONS', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(413, 14, 2, 'DESPERADO', '...', 1100, 2000, 1, 0, '\r\n                                    ', 0),
(414, 14, 2, 'WYSKI SCOTCH ', 'whisky-black--pm_251051_20191221.jpg', 0, 0, 0, 0, '\r\n                                    ', 0),
(415, 14, 12, 'VIANDE RESTAURANTE', '...', 0, 0, 0, 0, '\r\n                                    ', 0),
(416, 14, 9, 'PLATS DE VIANDE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(417, 14, 9, 'PLATS DU JOUR', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(418, 14, 3, 'ASSURANCE', '...', 0, 0, 1, 0, '\r\n                                    ', 0),
(419, 14, 12, 'PATTES ALIMENTAIRE', '...', 0, 0, 0, 0, '\r\n                                    ', 0),
(420, 14, 9, 'PATTES ET SAUCE', '...', 0, 0, 1, 0, '\r\n                                    ', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit_cmp`
--

CREATE TABLE `produit_cmp` (
  `idpcmp` bigint(255) NOT NULL,
  `IDP` bigint(255) DEFAULT NULL,
  `tabidp` varchar(355) DEFAULT NULL,
  `tabqnt` varchar(355) DEFAULT NULL,
  `tabmts` varchar(355) DEFAULT NULL,
  `prv` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit_cmp`
--

INSERT INTO `produit_cmp` (`idpcmp`, `IDP`, `tabidp`, `tabqnt`, `tabmts`, `prv`) VALUES
(2, 128, '186', '3', '0', 0),
(3, 247, '131, 147', '1, 1', '325, 0', 325),
(5, 191, '126, 131', '1, 1', '0, 325', 325),
(6, 190, '131', '1', '325', 325),
(7, 265, '131, 150', '1, 1', '325, 3000', 3325),
(8, 266, '131, 150', '1, 0.5', '325, 1500', 1825),
(9, 248, '131, 150', '1, 0.25', '325, 750', 1075),
(10, 255, '131, 127', '1, 1', '325, 1500', 1825),
(11, 193, '267, 131', '1, 1', '1850, 325', 2175),
(12, 226, '227, 131', '1, 1', '0, 325', 325);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `ids` int(11) NOT NULL,
  `ninea` varchar(250) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `sigle` varchar(10) NOT NULL,
  `email` varchar(250) NOT NULL,
  `tel` varchar(250) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `secteur_E` varchar(250) NOT NULL,
  `type` varchar(100) NOT NULL,
  `ca` varchar(255) NOT NULL,
  `logo` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`ids`, `ninea`, `nom`, `sigle`, `email`, `tel`, `adress`, `secteur_E`, `type`, `ca`, `logo`) VALUES
(1, '0047759802E1', 'AUBERGE DE SENDOU', 'ADS', 'senauberge@gmail.com', '00221338361819', 'Entreprise', 'Secteur tertiaire', 'PE', '10000000', '830341.png');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `IDU` int(11) NOT NULL,
  `CNI` varchar(40) DEFAULT NULL,
  `PRENOM_USER` varchar(40) DEFAULT NULL,
  `NOM_USER` varchar(40) DEFAULT NULL,
  `LOGIN` varchar(50) DEFAULT NULL,
  `SEXE_USER` varchar(10) DEFAULT NULL,
  `POSTE` varchar(40) DEFAULT NULL,
  `SALAIRE` double DEFAULT NULL,
  `STATUT` varchar(10) DEFAULT NULL,
  `DATNAIS` date DEFAULT NULL,
  `DATEM` date NOT NULL,
  `LEVESECURITY` smallint(6) NOT NULL,
  `PASSE` varchar(100) NOT NULL,
  `ADRESS` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `NUM_UER` varchar(255) NOT NULL,
  `PHOTO` varchar(250) NOT NULL,
  `INFOS` text NOT NULL,
  `CACHER` varchar(40) DEFAULT NULL,
  `FLAG` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IDU`, `CNI`, `PRENOM_USER`, `NOM_USER`, `LOGIN`, `SEXE_USER`, `POSTE`, `SALAIRE`, `STATUT`, `DATNAIS`, `DATEM`, `LEVESECURITY`, `PASSE`, `ADRESS`, `EMAIL`, `NUM_UER`, `PHOTO`, `INFOS`, `CACHER`, `FLAG`) VALUES
(6, '1027017', 'Martine ( TINA)', 'Mback Yem', 'tina', 'FEMME', 'DIRECTRICE ET GÃ‰RANTE ', 150000, 'user', '1977-09-26', '2015-11-26', 3, 'admin', '...', 'mmtine7@gmail.com', '777838601', '22798.jpg', '...', 'DIAL', 0),
(7, '67667676', '0', 'dial', '.', 'AUTRE', '0', 0, 'four', '2017-12-25', '2017-12-25', 0, '0', '0', '...', '45688899990', '...', '...', '6', 0),
(8, '1234', '0', 'HERBERGEMENT', '.', 'SOCIETE', '0', 0, 'cli', '2018-02-02', '2018-02-02', 1, '0', '...', '...', '******', '...', '...', '6', 0),
(9, '23396972E1', '0', 'AUBERGE DE SENDOU', '.', 'commerce ', '0', 0, 'service', '2018-02-03', '2018-02-03', 0, '0', '...', '...', '00221338361819', '185020.png', '...', 'tina', 0),
(10, '2756196707347', 'Natalie Suzanne', 'Fassinou', '...', 'FEMME', 'BARMAID', 0, 'user', '1967-10-10', '2016-08-08', 1, '', '...', '...', '00221772498544', '...', '...', '6', 0),
(11, '2756197202196', 'AISSATOU', 'NDIAYE', '...', 'FEMME', 'CUISINIER ASSISTANTE', 70000, 'user', '1972-03-16', '2013-07-30', 1, '', '...', '...', '00221776884269', '...', '...', '6', 0),
(12, '', '0', '', '.', 'AUTRE', '0', 0, 'cli', '2018-02-02', '2018-02-02', 0, '0', '0', '...', '', '...', '...', '6', 2),
(13, '20819861130000070', 'AISSATOU', 'DIOP', '...', 'FEMME', 'MENAGERE', 40000, 'user', '1987-11-30', '2016-08-02', 1, '', '...', '...', '...', '395259.jpg', '...', '6', 0),
(14, '000221000', 'DJENABA', 'BA', '...', 'FEMME', 'SERVEUSE', 25000, 'user', '1970-03-12', '2017-05-06', 1, '', '...', '...', '...', '...', '...', '6', 0),
(15, '0047759802E1', '0', 'AUBERGE DE SENDOU', '.', 'SOCIETE', '0', 0, 'cli', '2018-03-29', '2018-03-29', 1, '0', '...', 'senauberge@gmail.com', '00221338361819', '263006.png', '...', '6', 0),
(16, '0247632', 'Suzanne Patricia', 'NGO HONGLA', '...', 'FEMME', 'BARMAID', 65000, 'user', '1988-08-04', '2018-06-11', 1, '', '...', '...', '777154249', '...', '...', '6', 0),
(17, '27751197113844', 'FATOU KINE', 'GAYE', '...', 'FEMME', 'BARMAID', 65000, 'user', '1971-10-28', '2018-07-05', 1, '', '...', '...', '00221776323552', '...', '...', '6', 0),
(18, '1752199201030', 'FRANCIS TEVI IVAN', 'LAWSON', '...', 'FEMME', 'DÃ‰LÃ‰GUÃ‰ ADMINISTRATIF', 100000, 'user', '1992-07-23', '2018-06-29', 1, '', '...', '...', '00221776113535', '...', '...', '6', 0),
(19, '1751195103014', 'ANSELME OSTER LATEVI', 'LAWSON', '...', 'HOMME', 'PATRON', 500000, 'user', '1951-04-21', '2004-02-20', 2, '', '...', '...', '0021775570420', '...', '...', '6', 0),
(20, '011988122600030', 'BAYE MEDOUNE', 'NDIR', '...', 'HOMME', 'GARDIEN- VIDER', 70000, 'user', '1988-12-26', '2019-11-15', 1, 'admin', '...', '...', '...', '...', '...', '6', 0),
(21, '1021987100500003 9', 'NARCISSE', 'MENDY', '...', 'HOMME', 'CUISINIER EN CHEF', 70000, 'user', '1987-10-05', '2019-11-13', 1, 'admin', '...', 'SENAUBERGE@GMAIL.COM', '00221774050401', '...', '...', '6', 0);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_categorie`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_categorie` (
`ID_CAT` int(11)
,`IDFA` int(11)
,`NOM_CAT` varchar(254)
,`ACHAT` int(11)
,`VENTE` int(11)
,`COMPT` int(11)
,`flag` int(11)
,`DESI` varchar(254)
,`COLOR` varchar(254)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_facture`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_facture` (
`IDF` bigint(255)
,`IDMV` int(11)
,`IDP` int(11)
,`PU` double
,`QNT` double
,`MTS` double
,`ROW` int(11)
,`FDESI` varchar(50)
,`FCONDIS` varchar(50)
,`NOMMV` varchar(254)
,`DATE_DEL` date
,`IDC` int(11)
,`ID_CAT` int(11)
,`DESI` varchar(55)
,`PHOTO` varchar(256)
,`PRIXA` double
,`PRIXV` double
,`QNTSTK` double
,`COMPOSER` tinyint(4)
,`FTECH` text
,`FLAG` smallint(6)
,`IDFA` int(11)
,`NOM_CAT` varchar(254)
,`ACHAT` int(11)
,`VENTE` int(11)
,`COMPT` int(11)
,`NOMF` varchar(254)
,`COLOR` varchar(254)
,`NOMC` varchar(254)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_grp_etat_compte`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_grp_etat_compte` (
`IDE` bigint(255)
,`IDFA` int(11)
,`IDMOUV` bigint(255)
,`DEPENSE` double
,`GAINS` double
,`STOCK` double
,`DATEE` date
,`DESI` varchar(254)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_prd_details`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_prd_details` (
`idc` int(11)
,`nomc` varchar(254)
,`desi` varchar(55)
,`img` varchar(256)
,`idp` bigint(255)
,`idcp` int(11)
,`pxa` double
,`pxv` double
,`qnt` double
,`flag` smallint(6)
,`idcat` int(11)
,`idfam` int(11)
,`nomcat` varchar(254)
,`achat` int(11)
,`vente` int(11)
,`COMPT` int(11)
,`idfa` int(11)
,`fdesi` varchar(254)
,`COLOR` varchar(254)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_produit`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_produit` (
`IDP` bigint(255)
,`IDC` int(11)
,`ID_CAT` int(11)
,`DESI` varchar(55)
,`PHOTO` varchar(256)
,`PRIXA` double
,`PRIXV` double
,`QNT` double
,`COMPOSER` tinyint(4)
,`FTECH` text
,`FLAG` smallint(6)
,`IDFA` int(11)
,`NOM_CAT` varchar(254)
,`ACHAT` int(11)
,`VENTE` int(11)
,`COMPT` int(11)
,`NOMF` varchar(254)
,`COLOR` varchar(254)
,`NOMC` varchar(254)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_produit_cmp`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_produit_cmp` (
`idpcmp` bigint(255)
,`IDP` bigint(255)
,`tabidp` varchar(355)
,`tabqnt` varchar(355)
,`tabmts` varchar(355)
,`prv` double
,`IDC` int(11)
,`ID_CAT` int(11)
,`DESI` varchar(55)
,`PHOTO` varchar(256)
,`PRIXA` double
,`PRIXV` double
,`QNT` double
,`FTECH` text
,`FLAG` smallint(6)
,`IDFA` int(11)
,`NOM_CAT` varchar(254)
,`ACHAT` int(11)
,`VENTE` int(11)
,`COMPT` int(11)
,`NOMF` varchar(254)
,`COLOR` varchar(254)
,`NOMC` varchar(254)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_select_produit_charge`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_select_produit_charge` (
`IDP` bigint(255)
,`IDC` int(11)
,`ID_CAT` int(11)
,`DESI` varchar(55)
,`PHOTO` varchar(256)
,`PRIXA` double
,`PRIXV` double
,`QNT` double
,`COMPOSER` tinyint(4)
,`FTECH` text
,`FLAG` smallint(6)
,`IDFA` int(11)
,`NOM_CAT` varchar(254)
,`ACHAT` int(11)
,`VENTE` int(11)
,`COMPT` int(11)
,`NOMF` varchar(254)
,`COLOR` varchar(254)
,`NOMC` varchar(254)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_select_produit_composer`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_select_produit_composer` (
`IDP` bigint(255)
,`IDC` int(11)
,`ID_CAT` int(11)
,`DESI` varchar(55)
,`PHOTO` varchar(256)
,`PRIXA` double
,`PRIXV` double
,`QNT` double
,`COMPOSER` tinyint(4)
,`FTECH` text
,`FLAG` smallint(6)
,`IDFA` int(11)
,`NOM_CAT` varchar(254)
,`ACHAT` int(11)
,`VENTE` int(11)
,`COMPT` int(11)
,`NOMF` varchar(254)
,`COLOR` varchar(254)
,`NOMC` varchar(254)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_select_produit_comptabiliser`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_select_produit_comptabiliser` (
`IDP` bigint(255)
,`IDC` int(11)
,`ID_CAT` int(11)
,`DESI` varchar(55)
,`PHOTO` varchar(256)
,`PRIXA` double
,`PRIXV` double
,`QNT` double
,`COMPOSER` tinyint(4)
,`FTECH` text
,`FLAG` smallint(6)
,`IDFA` int(11)
,`NOM_CAT` varchar(254)
,`ACHAT` int(11)
,`VENTE` int(11)
,`COMPT` int(11)
,`NOMF` varchar(254)
,`COLOR` varchar(254)
,`NOMC` varchar(254)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_select_produit_facture`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_select_produit_facture` (
`IDP` bigint(255)
,`IDC` int(11)
,`ID_CAT` int(11)
,`DESI` varchar(55)
,`PHOTO` varchar(256)
,`PRIXA` double
,`PRIXV` double
,`QNT` double
,`COMPOSER` tinyint(4)
,`FTECH` text
,`FLAG` smallint(6)
,`IDFA` int(11)
,`NOM_CAT` varchar(254)
,`ACHAT` int(11)
,`VENTE` int(11)
,`COMPT` int(11)
,`NOMF` varchar(254)
,`COLOR` varchar(254)
,`NOMC` varchar(254)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_select_produit_recu`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_select_produit_recu` (
`IDP` bigint(255)
,`IDC` int(11)
,`ID_CAT` int(11)
,`DESI` varchar(55)
,`PHOTO` varchar(256)
,`PRIXA` double
,`PRIXV` double
,`QNT` double
,`COMPOSER` tinyint(4)
,`FTECH` text
,`FLAG` smallint(6)
,`IDFA` int(11)
,`NOM_CAT` varchar(254)
,`ACHAT` int(11)
,`VENTE` int(11)
,`COMPT` int(11)
,`NOMF` varchar(254)
,`COLOR` varchar(254)
,`NOMC` varchar(254)
);

-- --------------------------------------------------------

--
-- Structure de la vue `v_categorie`
--
DROP TABLE IF EXISTS `v_categorie`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_categorie`  AS  select `c`.`ID_CAT` AS `ID_CAT`,`c`.`IDFA` AS `IDFA`,`c`.`NOM_CAT` AS `NOM_CAT`,`c`.`ACHAT` AS `ACHAT`,`c`.`VENTE` AS `VENTE`,`c`.`COMPT` AS `COMPT`,`c`.`flag` AS `flag`,`f`.`DESI` AS `DESI`,`f`.`COLOR` AS `COLOR` from (`categorie` `c` join `famille` `f` on(`f`.`IDFA` = `c`.`IDFA`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_facture`
--
DROP TABLE IF EXISTS `v_facture`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_facture`  AS  select `f`.`IDF` AS `IDF`,`f`.`IDMV` AS `IDMV`,`f`.`IDP` AS `IDP`,`f`.`PU` AS `PU`,`f`.`QNT` AS `QNT`,`f`.`MTS` AS `MTS`,`f`.`ROW` AS `ROW`,`f`.`FDESI` AS `FDESI`,`f`.`FCONDIS` AS `FCONDIS`,`m`.`NOMMV` AS `NOMMV`,`m`.`DATE_DEL` AS `DATE_DEL`,`p`.`IDC` AS `IDC`,`p`.`ID_CAT` AS `ID_CAT`,`p`.`DESI` AS `DESI`,`p`.`PHOTO` AS `PHOTO`,`p`.`PRIXA` AS `PRIXA`,`p`.`PRIXV` AS `PRIXV`,`p`.`QNT` AS `QNTSTK`,`p`.`COMPOSER` AS `COMPOSER`,`p`.`FTECH` AS `FTECH`,`p`.`FLAG` AS `FLAG`,`p`.`IDFA` AS `IDFA`,`p`.`NOM_CAT` AS `NOM_CAT`,`p`.`ACHAT` AS `ACHAT`,`p`.`VENTE` AS `VENTE`,`p`.`COMPT` AS `COMPT`,`p`.`NOMF` AS `NOMF`,`p`.`COLOR` AS `COLOR`,`p`.`NOMC` AS `NOMC` from ((`facture` `f` join `mouvement` `m` on(`m`.`IDMV` = `f`.`IDMV`)) left join `v_produit` `p` on(`p`.`IDP` = `f`.`IDP`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_grp_etat_compte`
--
DROP TABLE IF EXISTS `v_grp_etat_compte`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_grp_etat_compte`  AS  select `e`.`IDE` AS `IDE`,`e`.`IDFA` AS `IDFA`,`e`.`IDMOUV` AS `IDMOUV`,`e`.`DEPENSE` AS `DEPENSE`,`e`.`GAINS` AS `GAINS`,`e`.`STOCK` AS `STOCK`,`e`.`DATEE` AS `DATEE`,`f`.`DESI` AS `DESI` from (`etat_compte` `e` join `famille` `f` on(`f`.`IDFA` = `e`.`IDFA`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_prd_details`
--
DROP TABLE IF EXISTS `v_prd_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_prd_details`  AS  select `c`.`IDC` AS `idc`,`c`.`NOMC` AS `nomc`,`p`.`DESI` AS `desi`,`p`.`PHOTO` AS `img`,`p`.`IDP` AS `idp`,`p`.`IDC` AS `idcp`,`p`.`PRIXA` AS `pxa`,`p`.`PRIXV` AS `pxv`,`p`.`QNT` AS `qnt`,`p`.`FLAG` AS `flag`,`ct`.`ID_CAT` AS `idcat`,`ct`.`IDFA` AS `idfam`,`ct`.`NOM_CAT` AS `nomcat`,`ct`.`ACHAT` AS `achat`,`ct`.`VENTE` AS `vente`,`ct`.`COMPT` AS `COMPT`,`f`.`IDFA` AS `idfa`,`f`.`DESI` AS `fdesi`,`f`.`COLOR` AS `COLOR` from (((`produit` `p` join `condis` `c` on(`c`.`IDC` = `p`.`IDC`)) join `categorie` `ct` on(`p`.`ID_CAT` = `ct`.`ID_CAT`)) join `famille` `f` on(`ct`.`IDFA` = `f`.`IDFA`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_produit`
--
DROP TABLE IF EXISTS `v_produit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_produit`  AS  select `p`.`IDP` AS `IDP`,`p`.`IDC` AS `IDC`,`p`.`ID_CAT` AS `ID_CAT`,`p`.`DESI` AS `DESI`,`p`.`PHOTO` AS `PHOTO`,`p`.`PRIXA` AS `PRIXA`,`p`.`PRIXV` AS `PRIXV`,`p`.`QNT` AS `QNT`,`p`.`COMPOSER` AS `COMPOSER`,`p`.`FTECH` AS `FTECH`,`p`.`FLAG` AS `FLAG`,`c`.`IDFA` AS `IDFA`,`c`.`NOM_CAT` AS `NOM_CAT`,`c`.`ACHAT` AS `ACHAT`,`c`.`VENTE` AS `VENTE`,`c`.`COMPT` AS `COMPT`,`c`.`DESI` AS `NOMF`,`c`.`COLOR` AS `COLOR`,`cnd`.`NOMC` AS `NOMC` from ((`produit` `p` left join `v_categorie` `c` on(`c`.`ID_CAT` = `p`.`ID_CAT`)) left join `condis` `cnd` on(`cnd`.`IDC` = `p`.`IDC`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_produit_cmp`
--
DROP TABLE IF EXISTS `v_produit_cmp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_produit_cmp`  AS  select `pc`.`idpcmp` AS `idpcmp`,`pc`.`IDP` AS `IDP`,`pc`.`tabidp` AS `tabidp`,`pc`.`tabqnt` AS `tabqnt`,`pc`.`tabmts` AS `tabmts`,`pc`.`prv` AS `prv`,`p`.`IDC` AS `IDC`,`p`.`ID_CAT` AS `ID_CAT`,`p`.`DESI` AS `DESI`,`p`.`PHOTO` AS `PHOTO`,`p`.`PRIXA` AS `PRIXA`,`p`.`PRIXV` AS `PRIXV`,`p`.`QNT` AS `QNT`,`p`.`FTECH` AS `FTECH`,`p`.`FLAG` AS `FLAG`,`p`.`IDFA` AS `IDFA`,`p`.`NOM_CAT` AS `NOM_CAT`,`p`.`ACHAT` AS `ACHAT`,`p`.`VENTE` AS `VENTE`,`p`.`COMPT` AS `COMPT`,`p`.`NOMF` AS `NOMF`,`p`.`COLOR` AS `COLOR`,`p`.`NOMC` AS `NOMC` from (`produit_cmp` `pc` join `v_produit` `p` on(`p`.`IDP` = `pc`.`IDP`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_select_produit_charge`
--
DROP TABLE IF EXISTS `v_select_produit_charge`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_select_produit_charge`  AS  select `v_produit`.`IDP` AS `IDP`,`v_produit`.`IDC` AS `IDC`,`v_produit`.`ID_CAT` AS `ID_CAT`,`v_produit`.`DESI` AS `DESI`,`v_produit`.`PHOTO` AS `PHOTO`,`v_produit`.`PRIXA` AS `PRIXA`,`v_produit`.`PRIXV` AS `PRIXV`,`v_produit`.`QNT` AS `QNT`,`v_produit`.`COMPOSER` AS `COMPOSER`,`v_produit`.`FTECH` AS `FTECH`,`v_produit`.`FLAG` AS `FLAG`,`v_produit`.`IDFA` AS `IDFA`,`v_produit`.`NOM_CAT` AS `NOM_CAT`,`v_produit`.`ACHAT` AS `ACHAT`,`v_produit`.`VENTE` AS `VENTE`,`v_produit`.`COMPT` AS `COMPT`,`v_produit`.`NOMF` AS `NOMF`,`v_produit`.`COLOR` AS `COLOR`,`v_produit`.`NOMC` AS `NOMC` from `v_produit` where `v_produit`.`ACHAT` = 1 and `v_produit`.`VENTE` = 0 and `v_produit`.`COMPT` = 0 and `v_produit`.`FLAG` = 0 order by `v_produit`.`DESI` ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_select_produit_composer`
--
DROP TABLE IF EXISTS `v_select_produit_composer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_select_produit_composer`  AS  select `v_produit`.`IDP` AS `IDP`,`v_produit`.`IDC` AS `IDC`,`v_produit`.`ID_CAT` AS `ID_CAT`,`v_produit`.`DESI` AS `DESI`,`v_produit`.`PHOTO` AS `PHOTO`,`v_produit`.`PRIXA` AS `PRIXA`,`v_produit`.`PRIXV` AS `PRIXV`,`v_produit`.`QNT` AS `QNT`,`v_produit`.`COMPOSER` AS `COMPOSER`,`v_produit`.`FTECH` AS `FTECH`,`v_produit`.`FLAG` AS `FLAG`,`v_produit`.`IDFA` AS `IDFA`,`v_produit`.`NOM_CAT` AS `NOM_CAT`,`v_produit`.`ACHAT` AS `ACHAT`,`v_produit`.`VENTE` AS `VENTE`,`v_produit`.`COMPT` AS `COMPT`,`v_produit`.`NOMF` AS `NOMF`,`v_produit`.`COLOR` AS `COLOR`,`v_produit`.`NOMC` AS `NOMC` from `v_produit` where `v_produit`.`VENTE` = 1 and `v_produit`.`ACHAT` = 0 and `v_produit`.`COMPT` = 0 and `v_produit`.`FLAG` = 0 and `v_produit`.`QNT` > 0 order by `v_produit`.`DESI` ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_select_produit_comptabiliser`
--
DROP TABLE IF EXISTS `v_select_produit_comptabiliser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_select_produit_comptabiliser`  AS  select `v_produit`.`IDP` AS `IDP`,`v_produit`.`IDC` AS `IDC`,`v_produit`.`ID_CAT` AS `ID_CAT`,`v_produit`.`DESI` AS `DESI`,`v_produit`.`PHOTO` AS `PHOTO`,`v_produit`.`PRIXA` AS `PRIXA`,`v_produit`.`PRIXV` AS `PRIXV`,`v_produit`.`QNT` AS `QNT`,`v_produit`.`COMPOSER` AS `COMPOSER`,`v_produit`.`FTECH` AS `FTECH`,`v_produit`.`FLAG` AS `FLAG`,`v_produit`.`IDFA` AS `IDFA`,`v_produit`.`NOM_CAT` AS `NOM_CAT`,`v_produit`.`ACHAT` AS `ACHAT`,`v_produit`.`VENTE` AS `VENTE`,`v_produit`.`COMPT` AS `COMPT`,`v_produit`.`NOMF` AS `NOMF`,`v_produit`.`COLOR` AS `COLOR`,`v_produit`.`NOMC` AS `NOMC` from `v_produit` where `v_produit`.`VENTE` = 1 and `v_produit`.`ACHAT` = 0 and `v_produit`.`COMPT` = 1 and `v_produit`.`FLAG` = 0 and `v_produit`.`QNT` > 0 order by `v_produit`.`DESI` ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_select_produit_facture`
--
DROP TABLE IF EXISTS `v_select_produit_facture`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_select_produit_facture`  AS  select `v_produit`.`IDP` AS `IDP`,`v_produit`.`IDC` AS `IDC`,`v_produit`.`ID_CAT` AS `ID_CAT`,`v_produit`.`DESI` AS `DESI`,`v_produit`.`PHOTO` AS `PHOTO`,`v_produit`.`PRIXA` AS `PRIXA`,`v_produit`.`PRIXV` AS `PRIXV`,`v_produit`.`QNT` AS `QNT`,`v_produit`.`COMPOSER` AS `COMPOSER`,`v_produit`.`FTECH` AS `FTECH`,`v_produit`.`FLAG` AS `FLAG`,`v_produit`.`IDFA` AS `IDFA`,`v_produit`.`NOM_CAT` AS `NOM_CAT`,`v_produit`.`ACHAT` AS `ACHAT`,`v_produit`.`VENTE` AS `VENTE`,`v_produit`.`COMPT` AS `COMPT`,`v_produit`.`NOMF` AS `NOMF`,`v_produit`.`COLOR` AS `COLOR`,`v_produit`.`NOMC` AS `NOMC` from `v_produit` where `v_produit`.`VENTE` = 1 and `v_produit`.`ACHAT` = 1 and `v_produit`.`COMPT` = 1 and `v_produit`.`FLAG` = 0 and `v_produit`.`QNT` > 0 order by `v_produit`.`DESI` ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_select_produit_recu`
--
DROP TABLE IF EXISTS `v_select_produit_recu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_select_produit_recu`  AS  select `v_produit`.`IDP` AS `IDP`,`v_produit`.`IDC` AS `IDC`,`v_produit`.`ID_CAT` AS `ID_CAT`,`v_produit`.`DESI` AS `DESI`,`v_produit`.`PHOTO` AS `PHOTO`,`v_produit`.`PRIXA` AS `PRIXA`,`v_produit`.`PRIXV` AS `PRIXV`,`v_produit`.`QNT` AS `QNT`,`v_produit`.`COMPOSER` AS `COMPOSER`,`v_produit`.`FTECH` AS `FTECH`,`v_produit`.`FLAG` AS `FLAG`,`v_produit`.`IDFA` AS `IDFA`,`v_produit`.`NOM_CAT` AS `NOM_CAT`,`v_produit`.`ACHAT` AS `ACHAT`,`v_produit`.`VENTE` AS `VENTE`,`v_produit`.`COMPT` AS `COMPT`,`v_produit`.`NOMF` AS `NOMF`,`v_produit`.`COLOR` AS `COLOR`,`v_produit`.`NOMC` AS `NOMC` from `v_produit` where `v_produit`.`ACHAT` = 1 and `v_produit`.`VENTE` = 1 and `v_produit`.`FLAG` = 0 order by `v_produit`.`DESI` ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID_CAT`),
  ADD KEY `IDFA` (`IDFA`);

--
-- Index pour la table `condis`
--
ALTER TABLE `condis`
  ADD PRIMARY KEY (`IDC`);

--
-- Index pour la table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`iddep`),
  ADD KEY `ids` (`ids`);

--
-- Index pour la table `etat_compte`
--
ALTER TABLE `etat_compte`
  ADD PRIMARY KEY (`IDE`);

--
-- Index pour la table `etat_stock`
--
ALTER TABLE `etat_stock`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`IDF`);

--
-- Index pour la table `famille`
--
ALTER TABLE `famille`
  ADD PRIMARY KEY (`IDFA`);

--
-- Index pour la table `fiche_inventaire`
--
ALTER TABLE `fiche_inventaire`
  ADD PRIMARY KEY (`idl`),
  ADD UNIQUE KEY `datefiche` (`datefiche`),
  ADD KEY `IDE` (`IDE`);

--
-- Index pour la table `fond`
--
ALTER TABLE `fond`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `frontend`
--
ALTER TABLE `frontend`
  ADD PRIMARY KEY (`IDFR`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`IDIMG`);

--
-- Index pour la table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`idl`);

--
-- Index pour la table `mouvement`
--
ALTER TABLE `mouvement`
  ADD PRIMARY KEY (`IDMV`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`IDN`);

--
-- Index pour la table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libelle` (`libelle`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`IDP`),
  ADD KEY `IDC` (`IDC`),
  ADD KEY `ID_CAT` (`ID_CAT`);

--
-- Index pour la table `produit_cmp`
--
ALTER TABLE `produit_cmp`
  ADD PRIMARY KEY (`idpcmp`),
  ADD UNIQUE KEY `unikidp` (`IDP`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ids`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`IDU`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `ID_CAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `condis`
--
ALTER TABLE `condis`
  MODIFY `IDC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `department`
--
ALTER TABLE `department`
  MODIFY `iddep` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etat_compte`
--
ALTER TABLE `etat_compte`
  MODIFY `IDE` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etat_stock`
--
ALTER TABLE `etat_stock`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `IDF` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `famille`
--
ALTER TABLE `famille`
  MODIFY `IDFA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `fiche_inventaire`
--
ALTER TABLE `fiche_inventaire`
  MODIFY `idl` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;

--
-- AUTO_INCREMENT pour la table `fond`
--
ALTER TABLE `fond`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `frontend`
--
ALTER TABLE `frontend`
  MODIFY `IDFR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `IDIMG` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `log`
--
ALTER TABLE `log`
  MODIFY `idl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `mouvement`
--
ALTER TABLE `mouvement`
  MODIFY `IDMV` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `IDN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `poste`
--
ALTER TABLE `poste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `IDP` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;

--
-- AUTO_INCREMENT pour la table `produit_cmp`
--
ALTER TABLE `produit_cmp`
  MODIFY `idpcmp` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IDU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `fiche_inventaire`
--
ALTER TABLE `fiche_inventaire`
  ADD CONSTRAINT `fiche_inventaire_ibfk_1` FOREIGN KEY (`IDE`) REFERENCES `fiche_inventaire` (`idl`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
