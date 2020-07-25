-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 18 sep. 2019 à 09:00
-- Version du serveur :  10.1.40-MariaDB
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `agsdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_categorie` bigint(255) NOT NULL,
  `nom_article` varchar(254) DEFAULT NULL,
  `pxa_article` double DEFAULT NULL,
  `pxv_article` double DEFAULT NULL,
  `type_article` int(11) DEFAULT NULL,
  `tabidp` varchar(254) DEFAULT NULL,
  `tabqnt` varchar(254) DEFAULT NULL,
  `tabmts` varchar(254) DEFAULT NULL,
  `pxrv` double DEFAULT NULL,
  `flag_article` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `atelier`
--

CREATE TABLE `atelier` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `nom_atelier` varchar(254) DEFAULT NULL,
  `ls_employee_atelier` varchar(254) DEFAULT NULL,
  `coutmaindoeuve_atelier` double DEFAULT NULL,
  `flag_atelier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `caisse`
--

CREATE TABLE `caisse` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `date_caisse` datetime DEFAULT NULL,
  `solde_caisse` double DEFAULT NULL,
  `depense_caisse` double DEFAULT NULL,
  `gain_caisse` double DEFAULT NULL,
  `flag_caisse` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_famille` bigint(255) NOT NULL,
  `nom_categorie` varchar(254) DEFAULT NULL,
  `nbr_produit_categorie` bigint(255) DEFAULT NULL,
  `valeur_categorie` double NOT NULL,
  `flag_categorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `id_service`, `id_famille`, `nom_categorie`, `nbr_produit_categorie`, `valeur_categorie`, `flag_categorie`) VALUES
(1, 1, 1, 'Bierre', 0, 0, 0),
(2, 1, 2, 'Fruits', 0, 0, 0),
(3, 1, 2, 'Legumes', 0, 0, 0),
(7, 1, 1, 'Vins', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `categorie_pro`
--

CREATE TABLE `categorie_pro` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `nom_categorie_pro` varchar(254) DEFAULT NULL,
  `salaire_base` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commercial`
--

CREATE TABLE `commercial` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `avatar_commercial` varchar(254) DEFAULT NULL,
  `nom_commercial` varchar(254) DEFAULT NULL,
  `tel_commercial` varchar(254) DEFAULT NULL,
  `email_commercial` varchar(254) DEFAULT NULL,
  `adresse_commercial` varchar(254) DEFAULT NULL,
  `localisation_commercial` varchar(254) DEFAULT NULL,
  `info_commercial` varchar(254) DEFAULT NULL,
  `flag_commercial` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commercial_groupe`
--

CREATE TABLE `commercial_groupe` (
  `id_commercial` bigint(255) NOT NULL,
  `id_groupe` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commercial_status`
--

CREATE TABLE `commercial_status` (
  `id_commercial` bigint(255) NOT NULL,
  `id_status` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `conditionement`
--

CREATE TABLE `conditionement` (
  `id` bigint(255) NOT NULL,
  `nom_conditionement` varchar(254) DEFAULT NULL,
  `nbr_utilisation` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conditionement`
--

INSERT INTO `conditionement` (`id`, `nom_conditionement`, `nbr_utilisation`) VALUES
(1, 'cartons', 0),
(2, 'paquets', 0),
(3, 'sac', 0);

-- --------------------------------------------------------

--
-- Structure de la table `conditionement_article`
--

CREATE TABLE `conditionement_article` (
  `id` bigint(255) NOT NULL,
  `qnt_unite` real NOT NULL,
  `id_conditionement` bigint(255) NOT NULL,
  `id_article` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE `contrat` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_fiche_paie` bigint(255) NOT NULL,
  `typ_contrat` int(11) DEFAULT NULL,
  `datedebut_contrat` datetime DEFAULT NULL,
  `datefin_contrat` datetime DEFAULT NULL,
  `etat_contrat` int(11) DEFAULT NULL,
  `flag_contrat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `nom_departement` varchar(254) DEFAULT NULL,
  `nbr_employee` bigint(255) DEFAULT NULL,
  `id_chefdepartement` bigint(255) DEFAULT NULL,
  `info_departement` varchar(254) DEFAULT NULL,
  `flag_departement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_contrat` bigint(255) DEFAULT NULL,
  `id_poste` bigint(255) NOT NULL,
  `id_departement` bigint(255) NOT NULL,
  `id_categorie_pro` bigint(255) NOT NULL,
  `id_ruperieur_hierarchique` bigint(255) DEFAULT NULL,
  `avatar_employe` varchar(254) DEFAULT NULL,
  `matricul_employee` varchar(254) DEFAULT NULL,
  `cv_employee` varchar(254) DEFAULT NULL,
  `salaire_employee` double DEFAULT NULL,
  `nom_employee` varchar(254) DEFAULT NULL,
  `nature_employee` varchar(254) DEFAULT NULL,
  `tel_employee` varchar(254) DEFAULT NULL,
  `email_employee` varchar(254) DEFAULT NULL,
  `info_employee` varchar(254) DEFAULT NULL,
  `flag_employee` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `employee_equipe`
--

CREATE TABLE `employee_equipe` (
  `id_equipe` bigint(255) NOT NULL,
  `id_employee` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `nom_equipe` varchar(254) DEFAULT NULL,
  `nbr_membre` bigint(255) DEFAULT NULL,
  `info_equipe` varchar(254) DEFAULT NULL,
  `flag_equipe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `equipe_projet`
--

CREATE TABLE `equipe_projet` (
  `id_equipe` bigint(255) NOT NULL,
  `id_projet` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etat_compte`
--

CREATE TABLE `etat_compte` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_famille` bigint(255) NOT NULL,
  `id_mouvement` bigint(255) NOT NULL,
  `date_etat_compte` datetime DEFAULT NULL,
  `depense_etat_compte` double DEFAULT NULL,
  `gain_etat_compte` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etat_stock`
--

CREATE TABLE `etat_stock` (
  `id` bigint(255) NOT NULL,
  `id_stock` bigint(255) NOT NULL,
  `date_etat_stock` date NOT NULL,
  `valeur_stock` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE `famille` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `nom_famille` varchar(254) DEFAULT NULL,
  `color_famille` varchar(254) DEFAULT NULL,
  `nbr_categorie_famille` bigint(255) DEFAULT NULL,
  `valeur_famille` double NOT NULL,
  `flag_famille` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`id`, `id_service`, `nom_famille`, `color_famille`, `nbr_categorie_famille`, `valeur_famille`, `flag_famille`) VALUES
(1, 1, 'BOISSON', '#151314', 2, 0, 0),
(2, 1, 'VIVRES', '#5af0c5', 2, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `fiche_paie`
--

CREATE TABLE `fiche_paie` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_model` bigint(255) NOT NULL,
  `nom_fiche_paie` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `frais_production`
--

CREATE TABLE `frais_production` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_production` bigint(255) NOT NULL,
  `nom_frais_production` varchar(254) DEFAULT NULL,
  `valeur_frais_production` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `frontend`
--

CREATE TABLE `frontend` (
  `id` int(11) NOT NULL,
  `libele` varchar(254) NOT NULL,
  `slidebar` varchar(254) NOT NULL,
  `id_slidebar` varchar(254) NOT NULL,
  `classe_slidebar` varchar(254) NOT NULL,
  `nmain` varchar(254) NOT NULL,
  `vmain` varchar(254) NOT NULL,
  `skin` varchar(254) NOT NULL,
  `theme` varchar(254) NOT NULL,
  `cible` varchar(254) NOT NULL,
  `section` varchar(254) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `nom_groupe` varchar(254) DEFAULT NULL,
  `nbr_membre_groupe` bigint(255) DEFAULT NULL,
  `info_groupe` varchar(254) DEFAULT NULL,
  `flag_groupe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_mouvement`
--

CREATE TABLE `ligne_mouvement` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_mouvement` bigint(255) NOT NULL,
  `id_article` bigint(255) DEFAULT NULL,
  `pu_ligne_mouvement` double DEFAULT NULL,
  `qnt_ligne_mouvement` double DEFAULT NULL,
  `mts_ligne_mouvement` double DEFAULT NULL,
  `position_ligne_mouvement` int(11) DEFAULT NULL,
  `designation_ligne_mouvement` varchar(254) DEFAULT NULL,
  `conditionement_ligne_mouvement` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_producion`
--

CREATE TABLE `ligne_producion` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_article` bigint(255) NOT NULL,
  `id_production` bigint(255) NOT NULL,
  `pxa_ligne_producion` double DEFAULT NULL,
  `qnt_ligne_producion` double DEFAULT NULL,
  `mts_ligne_producion` double DEFAULT NULL,
  `position_ligne_producion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `date_message` datetime DEFAULT NULL,
  `object_message` varchar(254) DEFAULT NULL,
  `pj_message` varchar(254) DEFAULT NULL,
  `origine_message` varchar(254) DEFAULT NULL,
  `cible_message` varchar(254) DEFAULT NULL,
  `Attribute_10` varchar(254) DEFAULT NULL,
  `Attribute_11` varchar(254) DEFAULT NULL,
  `id_origine` bigint(255) DEFAULT NULL,
  `id_sible` bigint(255) DEFAULT NULL,
  `content_message` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `model_fiche`
--

CREATE TABLE `model_fiche` (
  `id` bigint(255) NOT NULL,
  `nom_model` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mouvement`
--

CREATE TABLE `mouvement` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_typemouvement` bigint(255) NOT NULL,
  `id_commercial` bigint(255) NOT NULL,
  `id_users` bigint(255) NOT NULL,
  `date_mouvement` datetime DEFAULT NULL,
  `object_mouvement` varchar(254) DEFAULT NULL,
  `content_mouvement` varchar(254) DEFAULT NULL,
  `total_ht_mouvement` double DEFAULT NULL,
  `tva_mouvement` double DEFAULT NULL,
  `totalttc_mouvement` double DEFAULT NULL,
  `totalltr_mouvement` varchar(254) DEFAULT NULL,
  `avance_mouvement` double DEFAULT NULL,
  `reste_mouvement` double DEFAULT NULL,
  `flag_mouvement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `payement`
--

CREATE TABLE `payement` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_typemouvement` bigint(255) NOT NULL,
  `id_mouvement` bigint(255) NOT NULL,
  `type_payement` varchar(254) DEFAULT NULL,
  `mts_payement` bigint(255) DEFAULT NULL,
  `date_payement` varchar(254) DEFAULT NULL,
  `detail_payement` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_article` bigint(255) NOT NULL,
  `path_photo` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `piece_jointe`
--

CREATE TABLE `piece_jointe` (
  `id` bigint(255) NOT NULL,
  `id_tache` bigint(255) NOT NULL,
  `path_piece_jointe` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pointer`
--

CREATE TABLE `pointer` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `prev_id_etat_stock` bigint(255) NOT NULL,
  `cur_id_etat_stock` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

CREATE TABLE `poste` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `nom_poste` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `production`
--

CREATE TABLE `production` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_atelier` bigint(255) NOT NULL,
  `id_users` bigint(255) NOT NULL,
  `date_production` datetime DEFAULT NULL,
  `nbr_produit_production` double DEFAULT NULL,
  `cout_achat` double DEFAULT NULL,
  `frais_production` double DEFAULT NULL,
  `cout_production` double DEFAULT NULL,
  `flag_production` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `programme`
--

CREATE TABLE `programme` (
  `id` bigint(255) NOT NULL,
  `nom_programme` varchar(254) DEFAULT NULL,
  `id_service` int(11) NOT NULL,
  `date_programme` datetime DEFAULT NULL,
  `datefin_programme` datetime DEFAULT NULL,
  `nbr_projet_programme` varchar(254) DEFAULT NULL,
  `etat_programme` int(11) DEFAULT NULL,
  `flag_programme` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` bigint(255) NOT NULL,
  `id_programme` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_type_projet` bigint(255) NOT NULL,
  `nom_projet` varchar(254) DEFAULT NULL,
  `date_projet` varchar(254) DEFAULT NULL,
  `datefin_projet` datetime DEFAULT NULL,
  `color_projet` varchar(254) DEFAULT NULL,
  `etat_projet` int(11) DEFAULT NULL,
  `flag_projet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rubrique`
--

CREATE TABLE `rubrique` (
  `id` bigint(255) NOT NULL,
  `id_model` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `nom_rubrique` varchar(254) DEFAULT NULL,
  `valeur_rubrique` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rubrique_sous_rubrique`
--

CREATE TABLE `rubrique_sous_rubrique` (
  `id` bigint(255) NOT NULL,
  `id_rubrique` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `nom_service` varchar(254) DEFAULT NULL,
  `sigle_service` varchar(254) DEFAULT NULL,
  `ninea_service` varchar(254) DEFAULT NULL,
  `nrc_service` varchar(254) DEFAULT NULL,
  `activitecommercial_service` varchar(254) DEFAULT NULL,
  `ca_service` varchar(254) DEFAULT NULL,
  `logo_service` varchar(254) DEFAULT NULL,
  `theme_service` varchar(254) DEFAULT NULL,
  `flag_service` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `nom_service`, `sigle_service`, `ninea_service`, `nrc_service`, `activitecommercial_service`, `ca_service`, `logo_service`, `theme_service`, `flag_service`) VALUES
(1, 'Minam', 'mn', '45555555555555566', 'fg444444444444', 'commerce', '10000000', 'logo.png', 'primary', 0);

-- --------------------------------------------------------

--
-- Structure de la table `sous_rubrique`
--

CREATE TABLE `sous_rubrique` (
  `id` bigint(255) NOT NULL,
  `id_model` bigint(255) NOT NULL,
  `nom_sous_rubrique` varchar(254) DEFAULT NULL,
  `valeur_sous_rubrique` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE `status` (
  `id` bigint(255) NOT NULL,
  `nom_status` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `nom_stock` varchar(254) DEFAULT NULL,
  `nbrarticle` bigint(255) NOT NULL,
  `valeur` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`id`, `id_service`, `nom_stock`, `nbrarticle`, `valeur`) VALUES
(5, 1, 'Stock 2', 0, 0),
(7, 1, 'Stock 3', 0, 0),
(16, 1, 'Stock 1', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE `tache` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_projet` bigint(255) NOT NULL,
  `nom_tache` varchar(254) DEFAULT NULL,
  `ls_membre_tache` varchar(254) DEFAULT NULL,
  `date_tache` datetime DEFAULT NULL,
  `datelimit_tache` datetime DEFAULT NULL,
  `etiquette_tache` varchar(254) DEFAULT NULL,
  `etat_tache` int(11) DEFAULT NULL,
  `info_tache` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_mouvement`
--

CREATE TABLE `type_mouvement` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `nom_typemouvement` varchar(254) DEFAULT NULL,
  `navigation_typemouvement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_projet`
--

CREATE TABLE `type_projet` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_departement` bigint(255) NOT NULL,
  `nom_type_projet` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(255) NOT NULL,
  `id_service` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `login` varchar(254) DEFAULT NULL,
  `password` varchar(254) DEFAULT NULL,
  `levelsecurity` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `id_service`, `nom`, `avatar`, `login`, `password`, `levelsecurity`) VALUES
(1, 1, 'dialrock', 'dial.png', 'dial', 'root', '3');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_categorie`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_categorie` (
`id` bigint(255)
,`id_service` int(11)
,`id_famille` bigint(255)
,`nom_categorie` varchar(254)
,`nbr_produit_categorie` bigint(255)
,`valeur_categorie` double
,`flag_categorie` int(11)
,`nom_famille` varchar(254)
,`color_famille` varchar(254)
,`nbr_categorie_famille` bigint(255)
,`valeur_famille` double
,`flag_famille` int(11)
);

-- --------------------------------------------------------

--
-- Structure de la vue `v_categorie`
--
DROP TABLE IF EXISTS `v_categorie`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_categorie`  AS  select `c`.`id` AS `id`,`c`.`id_service` AS `id_service`,`c`.`id_famille` AS `id_famille`,`c`.`nom_categorie` AS `nom_categorie`,`c`.`nbr_produit_categorie` AS `nbr_produit_categorie`,`c`.`valeur_categorie` AS `valeur_categorie`,`c`.`flag_categorie` AS `flag_categorie`,`f`.`nom_famille` AS `nom_famille`,`f`.`color_famille` AS `color_famille`,`f`.`nbr_categorie_famille` AS `nbr_categorie_famille`,`f`.`valeur_famille` AS `valeur_famille`,`f`.`flag_famille` AS `flag_famille` from (`categorie` `c` join `famille` `f` on((`c`.`id_famille` = `f`.`id`))) ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_service` (`id_service`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `atelier`
--
ALTER TABLE `atelier`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `caisse`
--
ALTER TABLE `caisse`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_famille` (`id_famille`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `categorie_pro`
--
ALTER TABLE `categorie_pro`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `commercial`
--
ALTER TABLE `commercial`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `commercial_groupe`
--
ALTER TABLE `commercial_groupe`
  ADD PRIMARY KEY (`id_commercial`,`id_service`,`id_groupe`),
  ADD KEY `id_groupe` (`id_groupe`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `commercial_status`
--
ALTER TABLE `commercial_status`
  ADD PRIMARY KEY (`id_commercial`,`id_service`,`id_status`),
  ADD KEY `id_service` (`id_service`),
  ADD KEY `id_status` (`id_status`);

--
-- Index pour la table `conditionement`
--
ALTER TABLE `conditionement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom_conditionement` (`nom_conditionement`);

--
-- Index pour la table `conditionement_article`
--
ALTER TABLE `conditionement_article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_conditionement` (`id_conditionement`);

--
-- Index pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_fiche_paie` (`id_fiche_paie`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_categorie_pro` (`id_categorie_pro`),
  ADD KEY `id_poste` (`id_poste`),
  ADD KEY `id_service` (`id_service`),
  ADD KEY `id_departement` (`id_departement`);

--
-- Index pour la table `employee_equipe`
--
ALTER TABLE `employee_equipe`
  ADD PRIMARY KEY (`id_equipe`,`id_service`,`id_employee`),
  ADD KEY `id_employee` (`id_employee`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `equipe_projet`
--
ALTER TABLE `equipe_projet`
  ADD PRIMARY KEY (`id_equipe`,`id_service`,`id_projet`),
  ADD KEY `id_projet` (`id_projet`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `etat_compte`
--
ALTER TABLE `etat_compte`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_famille` (`id_famille`),
  ADD KEY `id_mouvement` (`id_mouvement`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `etat_stock`
--
ALTER TABLE `etat_stock`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `famille`
--
ALTER TABLE `famille`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `fiche_paie`
--
ALTER TABLE `fiche_paie`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_service` (`id_service`),
  ADD KEY `id_model` (`id_model`);

--
-- Index pour la table `frais_production`
--
ALTER TABLE `frais_production`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_production` (`id_production`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `ligne_mouvement`
--
ALTER TABLE `ligne_mouvement`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_mouvement` (`id_mouvement`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `ligne_producion`
--
ALTER TABLE `ligne_producion`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_production` (`id_production`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `model_fiche`
--
ALTER TABLE `model_fiche`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mouvement`
--
ALTER TABLE `mouvement`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_commercial` (`id_commercial`),
  ADD KEY `id_service` (`id_service`),
  ADD KEY `id_typemouvement` (`id_typemouvement`),
  ADD KEY `id_users` (`id_users`);

--
-- Index pour la table `payement`
--
ALTER TABLE `payement`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_mouvement` (`id_mouvement`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `piece_jointe`
--
ALTER TABLE `piece_jointe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tache` (`id_tache`);

--
-- Index pour la table `pointer`
--
ALTER TABLE `pointer`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `cur_id_etat_stock` (`cur_id_etat_stock`),
  ADD KEY `prev_etat_stock` (`prev_etat_stock`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_atelier` (`id_atelier`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_programme` (`id_programme`),
  ADD KEY `id_service` (`id_service`),
  ADD KEY `id_type_projet` (`id_type_projet`);

--
-- Index pour la table `rubrique`
--
ALTER TABLE `rubrique`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_model` (`id_model`);

--
-- Index pour la table `rubrique_sous_rubrique`
--
ALTER TABLE `rubrique_sous_rubrique`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sous_rubrique`
--
ALTER TABLE `sous_rubrique`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_model` (`id_model`);

--
-- Index pour la table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_projet` (`id_projet`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `type_mouvement`
--
ALTER TABLE `type_mouvement`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `type_projet`
--
ALTER TABLE `type_projet`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_departement` (`id_departement`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_service` (`id_service`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `atelier`
--
ALTER TABLE `atelier`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `caisse`
--
ALTER TABLE `caisse`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `categorie_pro`
--
ALTER TABLE `categorie_pro`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commercial`
--
ALTER TABLE `commercial`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `conditionement`
--
ALTER TABLE `conditionement`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etat_compte`
--
ALTER TABLE `etat_compte`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etat_stock`
--
ALTER TABLE `etat_stock`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `famille`
--
ALTER TABLE `famille`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `fiche_paie`
--
ALTER TABLE `fiche_paie`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `frais_production`
--
ALTER TABLE `frais_production`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ligne_mouvement`
--
ALTER TABLE `ligne_mouvement`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ligne_producion`
--
ALTER TABLE `ligne_producion`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `model_fiche`
--
ALTER TABLE `model_fiche`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mouvement`
--
ALTER TABLE `mouvement`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `payement`
--
ALTER TABLE `payement`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `piece_jointe`
--
ALTER TABLE `piece_jointe`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pointer`
--
ALTER TABLE `pointer`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `poste`
--
ALTER TABLE `poste`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `production`
--
ALTER TABLE `production`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `programme`
--
ALTER TABLE `programme`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rubrique`
--
ALTER TABLE `rubrique`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rubrique_sous_rubrique`
--
ALTER TABLE `rubrique_sous_rubrique`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sous_rubrique`
--
ALTER TABLE `sous_rubrique`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `tache`
--
ALTER TABLE `tache`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_mouvement`
--
ALTER TABLE `type_mouvement`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_projet`
--
ALTER TABLE `type_projet`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `atelier`
--
ALTER TABLE `atelier`
  ADD CONSTRAINT `atelier_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `caisse`
--
ALTER TABLE `caisse`
  ADD CONSTRAINT `caisse_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `categorie_ibfk_1` FOREIGN KEY (`id_famille`) REFERENCES `famille` (`id`),
  ADD CONSTRAINT `categorie_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `categorie_pro`
--
ALTER TABLE `categorie_pro`
  ADD CONSTRAINT `categorie_pro_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `commercial`
--
ALTER TABLE `commercial`
  ADD CONSTRAINT `commercial_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `commercial_groupe`
--
ALTER TABLE `commercial_groupe`
  ADD CONSTRAINT `commercial_groupe_ibfk_1` FOREIGN KEY (`id_commercial`) REFERENCES `commercial` (`id`),
  ADD CONSTRAINT `commercial_groupe_ibfk_2` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id`),
  ADD CONSTRAINT `commercial_groupe_ibfk_3` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `commercial_status`
--
ALTER TABLE `commercial_status`
  ADD CONSTRAINT `commercial_status_ibfk_1` FOREIGN KEY (`id_commercial`) REFERENCES `commercial` (`id`),
  ADD CONSTRAINT `commercial_status_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `commercial_status_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`);

--
-- Contraintes pour la table `conditionement_article`
--
ALTER TABLE `conditionement_article`
  ADD CONSTRAINT `conditionement_article_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `conditionement_article_ibfk_2` FOREIGN KEY (`id_conditionement`) REFERENCES `conditionement` (`id`);

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `contrat_ibfk_1` FOREIGN KEY (`id_fiche_paie`) REFERENCES `fiche_paie` (`id`),
  ADD CONSTRAINT `contrat_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `departement_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`id_categorie_pro`) REFERENCES `categorie_pro` (`id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`id_poste`) REFERENCES `poste` (`id`),
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `employee_ibfk_4` FOREIGN KEY (`id_departement`) REFERENCES `departement` (`id`);

--
-- Contraintes pour la table `employee_equipe`
--
ALTER TABLE `employee_equipe`
  ADD CONSTRAINT `employee_equipe_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `employee_equipe_ibfk_2` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id`),
  ADD CONSTRAINT `employee_equipe_ibfk_3` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `equipe_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `equipe_projet`
--
ALTER TABLE `equipe_projet`
  ADD CONSTRAINT `equipe_projet_ibfk_1` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id`),
  ADD CONSTRAINT `equipe_projet_ibfk_2` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id`),
  ADD CONSTRAINT `equipe_projet_ibfk_3` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `etat_compte`
--
ALTER TABLE `etat_compte`
  ADD CONSTRAINT `etat_compte_ibfk_1` FOREIGN KEY (`id_famille`) REFERENCES `famille` (`id`),
  ADD CONSTRAINT `etat_compte_ibfk_2` FOREIGN KEY (`id_mouvement`) REFERENCES `mouvement` (`id`),
  ADD CONSTRAINT `etat_compte_ibfk_3` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `famille`
--
ALTER TABLE `famille`
  ADD CONSTRAINT `famille_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `fiche_paie`
--
ALTER TABLE `fiche_paie`
  ADD CONSTRAINT `fiche_paie_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `fiche_paie_ibfk_2` FOREIGN KEY (`id_model`) REFERENCES `model_fiche` (`id`);

--
-- Contraintes pour la table `frais_production`
--
ALTER TABLE `frais_production`
  ADD CONSTRAINT `frais_production_ibfk_1` FOREIGN KEY (`id_production`) REFERENCES `production` (`id`),
  ADD CONSTRAINT `frais_production_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `ligne_mouvement`
--
ALTER TABLE `ligne_mouvement`
  ADD CONSTRAINT `ligne_mouvement_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `ligne_mouvement_ibfk_2` FOREIGN KEY (`id_mouvement`) REFERENCES `mouvement` (`id`),
  ADD CONSTRAINT `ligne_mouvement_ibfk_3` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `ligne_producion`
--
ALTER TABLE `ligne_producion`
  ADD CONSTRAINT `ligne_producion_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `ligne_producion_ibfk_2` FOREIGN KEY (`id_production`) REFERENCES `production` (`id`),
  ADD CONSTRAINT `ligne_producion_ibfk_3` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `mouvement`
--
ALTER TABLE `mouvement`
  ADD CONSTRAINT `mouvement_ibfk_1` FOREIGN KEY (`id_commercial`) REFERENCES `commercial` (`id`),
  ADD CONSTRAINT `mouvement_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `mouvement_ibfk_3` FOREIGN KEY (`id_typemouvement`) REFERENCES `type_mouvement` (`id`),
  ADD CONSTRAINT `mouvement_ibfk_4` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `payement`
--
ALTER TABLE `payement`
  ADD CONSTRAINT `payement_ibfk_1` FOREIGN KEY (`id_mouvement`) REFERENCES `mouvement` (`id`),
  ADD CONSTRAINT `payement_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `photo_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `piece_jointe`
--
ALTER TABLE `piece_jointe`
  ADD CONSTRAINT `piece_jointe_ibfk_1` FOREIGN KEY (`id_tache`) REFERENCES `tache` (`id`);

--
-- Contraintes pour la table `pointer`
--
ALTER TABLE `pointer`
  ADD CONSTRAINT `pointer_ibfk_1` FOREIGN KEY (`cur_id_etat_stock`) REFERENCES `etat_stock` (`id`),
  ADD CONSTRAINT `pointer_ibfk_2` FOREIGN KEY (`prev_etat_stock`) REFERENCES `etat_stock` (`id`),
  ADD CONSTRAINT `pointer_ibfk_3` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `production`
--
ALTER TABLE `production`
  ADD CONSTRAINT `production_ibfk_1` FOREIGN KEY (`id_atelier`) REFERENCES `atelier` (`id`),
  ADD CONSTRAINT `production_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `production_ibfk_3` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `programme`
--
ALTER TABLE `programme`
  ADD CONSTRAINT `programme_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`id_programme`) REFERENCES `programme` (`id`),
  ADD CONSTRAINT `projet_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `projet_ibfk_3` FOREIGN KEY (`id_type_projet`) REFERENCES `type_projet` (`id`);

--
-- Contraintes pour la table `rubrique`
--
ALTER TABLE `rubrique`
  ADD CONSTRAINT `rubrique_ibfk_1` FOREIGN KEY (`id_model`) REFERENCES `model_fiche` (`id`);

--
-- Contraintes pour la table `sous_rubrique`
--
ALTER TABLE `sous_rubrique`
  ADD CONSTRAINT `sous_rubrique_ibfk_1` FOREIGN KEY (`id_model`) REFERENCES `model_fiche` (`id`);

--
-- Contraintes pour la table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `tache_ibfk_1` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id`),
  ADD CONSTRAINT `tache_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `type_mouvement`
--
ALTER TABLE `type_mouvement`
  ADD CONSTRAINT `type_mouvement_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `type_projet`
--
ALTER TABLE `type_projet`
  ADD CONSTRAINT `type_projet_ibfk_1` FOREIGN KEY (`id_departement`) REFERENCES `departement` (`id`),
  ADD CONSTRAINT `type_projet_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
