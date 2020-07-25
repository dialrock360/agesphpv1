SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
--
-- Database: `senbd`
--




CREATE TABLE `categorie` (
  `ID_CAT` int(11) NOT NULL AUTO_INCREMENT,
  `IDFA` int(11) NOT NULL,
  `NOM_CAT` varchar(254) CHARACTER SET utf8 DEFAULT NULL,
  `ACHAT` int(11) NOT NULL,
  `VENTE` int(11) NOT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_CAT`),
  KEY `IDFA` (`IDFA`),
  CONSTRAINT `categorie_ibfk_1` FOREIGN KEY (`IDFA`) REFERENCES `famille` (`IDFA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `chambre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numchambre` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `condis` (
  `IDC` int(11) NOT NULL AUTO_INCREMENT,
  `NOMC` varchar(254) DEFAULT NULL,
  `FLAG` int(11) NOT NULL,
  PRIMARY KEY (`IDC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `consultation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idrendevous` int(11) NOT NULL,
  `dateconsultation` datetime NOT NULL,
  `tailleconsultation` double DEFAULT NULL,
  `poidsconsultation` double NOT NULL,
  `poulsconsultation` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idrendevous` (`idrendevous`),
  CONSTRAINT `consultation_ibfk_1` FOREIGN KEY (`idrendevous`) REFERENCES `rendevous` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `department` (
  `iddep` int(11) NOT NULL AUTO_INCREMENT,
  `ids` int(11) NOT NULL,
  `NOMD` varchar(254) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddep`),
  KEY `ids` (`ids`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `dossiermedical` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpatient` int(11) NOT NULL,
  `âge` varchar(250) DEFAULT NULL,
  `groupes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idpersonne` (`idpatient`),
  CONSTRAINT `dossiermedical_ibfk_1` FOREIGN KEY (`idpatient`) REFERENCES `personne` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `employee_name` varchar(255) NOT NULL COMMENT 'employee name',
  `employee_salary` double NOT NULL COMMENT 'employee salary',
  `employee_age` int(11) NOT NULL COMMENT 'employee age',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;


INSERT INTO employee VALUES
("1","Tiger Nixon","3208000","61"),
("2","Garrett Winters","170750","63"),
("3","Ashton Cox","86000","66"),
("4","Cedric Kelly","433060","22"),
("5","Airi Satou","162700","33"),
("6","Brielle Williamsons","372000","61"),
("7","Herrod Chandler","137500","59"),
("8","Rhona Davidson","327900","55");




CREATE TABLE `etat_compte` (
  `IDE` int(11) NOT NULL AUTO_INCREMENT,
  `IDFA` int(11) NOT NULL,
  `FLUX` varchar(254) NOT NULL,
  `MONTANT` double NOT NULL,
  `DATEE` datetime NOT NULL,
  PRIMARY KEY (`IDE`),
  KEY `IDFA` (`IDFA`),
  CONSTRAINT `etat_compte_ibfk_1` FOREIGN KEY (`IDFA`) REFERENCES `famille` (`IDFA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `facture` (
  `IDF` int(11) NOT NULL AUTO_INCREMENT,
  `IDMV` int(11) NOT NULL,
  `IDFA` int(11) NOT NULL,
  `IDP` int(11) NOT NULL,
  `PU` double DEFAULT NULL,
  `QNT2` double DEFAULT NULL,
  `MTS` double DEFAULT NULL,
  `TYPEF` varchar(254) NOT NULL,
  `DATEF` datetime NOT NULL,
  `ROWF` int(11) NOT NULL,
  `FDESI` varchar(254) DEFAULT NULL,
  `FCONDIS` varchar(254) DEFAULT NULL,
  `FLAG` int(11) NOT NULL,
  PRIMARY KEY (`IDF`),
  KEY `IDFA` (`IDFA`),
  KEY `IDP` (`IDP`),
  KEY `IDMV` (`IDMV`),
  CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`IDFA`) REFERENCES `famille` (`IDFA`),
  CONSTRAINT `facture_ibfk_3` FOREIGN KEY (`IDMV`) REFERENCES `mouvement` (`IDMV`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `famille` (
  `IDFA` int(11) NOT NULL AUTO_INCREMENT,
  `DESI` varchar(254) NOT NULL,
  `DEPENSE` double DEFAULT NULL,
  `GAINS` double DEFAULT NULL,
  `STOCK` double DEFAULT NULL,
  `COLOR` varchar(254) NOT NULL,
  `FLAG` int(11) NOT NULL,
  PRIMARY KEY (`IDFA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `fichedobservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idhospitalisation` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idhospitalisation` (`idhospitalisation`),
  CONSTRAINT `fichedobservation_ibfk_1` FOREIGN KEY (`idhospitalisation`) REFERENCES `hospitalisation` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `frontend` (
  `IDFT` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `LIBELE3` varchar(254) NOT NULL,
  `CIBLE` varchar(254) NOT NULL,
  `FSECTION` varchar(254) NOT NULL,
  PRIMARY KEY (`IDFT`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


INSERT INTO frontend VALUES
("1","1","default","appdseting","slidebar"),
("2","1","bleu","appdseting","theme");




CREATE TABLE `hospitalisation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idconsultation` int(11) NOT NULL,
  `iddossiermedical` int(11) NOT NULL,
  `idlit` int(11) NOT NULL,
  `priseencharge` int(11) NOT NULL,
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idconsultation` (`idconsultation`),
  KEY `idlit` (`idlit`),
  KEY `hospitalisation_ibfk_3` (`iddossiermedical`),
  CONSTRAINT `hospitalisation_ibfk_2` FOREIGN KEY (`idlit`) REFERENCES `lit` (`id`),
  CONSTRAINT `hospitalisation_ibfk_3` FOREIGN KEY (`iddossiermedical`) REFERENCES `dossiermedical` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `image` (
  `IDIMG` int(11) NOT NULL AUTO_INCREMENT,
  `IDO` int(11) NOT NULL,
  `LINK` varchar(254) DEFAULT NULL,
  `ORIGIN` varchar(254) DEFAULT NULL,
  `FLAG` int(11) NOT NULL,
  PRIMARY KEY (`IDIMG`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `lit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idchambre` int(11) NOT NULL,
  `numlit` varchar(11) NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idchambre` (`idchambre`),
  CONSTRAINT `lit_ibfk_1` FOREIGN KEY (`idchambre`) REFERENCES `chambre` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `log` (
  `idl` int(11) NOT NULL AUTO_INCREMENT,
  `IDMV` int(11) NOT NULL,
  `conten` varchar(254) DEFAULT NULL,
  `datelog` datetime DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`idl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `mouvement` (
  `IDMV` int(11) NOT NULL,
  `NOMMV` varchar(254) DEFAULT NULL,
  `DATE_DEL` datetime DEFAULT NULL,
  `OBJET` varchar(254) DEFAULT NULL,
  `CONTEN` varchar(254) DEFAULT NULL,
  `TOTALHT` double DEFAULT NULL,
  `TVA` double DEFAULT NULL,
  `MTSCH` double DEFAULT NULL,
  `MTSLTR` varchar(254) DEFAULT NULL,
  `REG` varchar(254) DEFAULT NULL,
  `AVANS` double DEFAULT NULL,
  `RESTE` double DEFAULT NULL,
  `FLAG` int(11) NOT NULL,
  PRIMARY KEY (`IDMV`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `notification` (
  `IDN` int(11) NOT NULL AUTO_INCREMENT,
  `IDO` int(11) NOT NULL,
  `ORIGINE` varchar(254) DEFAULT NULL,
  `CIBLE` varchar(254) DEFAULT NULL,
  `LIBELE` varchar(254) NOT NULL,
  `DATEE` datetime NOT NULL,
  `ETAT` int(11) DEFAULT NULL,
  `FLAG` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `personne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `datenais` date NOT NULL,
  `civilite` varchar(11) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `statut` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `produit` (
  `IDP` int(11) NOT NULL AUTO_INCREMENT,
  `IDC` int(11) NOT NULL,
  `ID_CAT` int(11) NOT NULL,
  `DESI` varchar(55) DEFAULT NULL,
  `PHOTO` varchar(256) NOT NULL,
  `PRIXA` double DEFAULT NULL,
  `PRIXV` double DEFAULT NULL,
  `QNT` double NOT NULL,
  `FTECH` text,
  `FLAG` smallint(6) NOT NULL,
  PRIMARY KEY (`IDP`),
  KEY `IDC` (`IDC`),
  KEY `ID_CAT` (`ID_CAT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `produit_cmp` (
  `idpcmp` int(11) NOT NULL AUTO_INCREMENT,
  `IDP` int(11) DEFAULT NULL,
  `tabidp` varchar(355) DEFAULT NULL,
  `tabqnt` varchar(355) DEFAULT NULL,
  `tabmts` varchar(355) DEFAULT NULL,
  `prv` double DEFAULT NULL,
  PRIMARY KEY (`idpcmp`),
  KEY `IDP` (`IDP`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `rendevous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idmedecin` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `daterendevous` datetime NOT NULL,
  `objet` varchar(250) DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idmedecin` (`idmedecin`),
  KEY `idpatient` (`idpatient`),
  CONSTRAINT `rendevous_ibfk_1` FOREIGN KEY (`idmedecin`) REFERENCES `personne` (`id`),
  CONSTRAINT `rendevous_ibfk_2` FOREIGN KEY (`idpatient`) REFERENCES `personne` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `service` (
  `ids` int(11) NOT NULL,
  `ninea` varchar(254) NOT NULL,
  `nom` varchar(254) NOT NULL,
  `sigle` varchar(254) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `tel` varchar(254) NOT NULL,
  `adress` varchar(254) NOT NULL,
  `secteur_E` varchar(254) NOT NULL,
  `type` varchar(254) NOT NULL,
  `ca` varchar(254) DEFAULT NULL,
  `logo` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`ids`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `tbl_members` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `position` varchar(25) NOT NULL,
  `office` varchar(25) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


INSERT INTO tbl_members VALUES
("1","Ashton","Bradshaw","ashtonbrad@mail.com","Software Engineer","Florida"),
("2","Garrett","Winters","garrettwin@mail.com","Sales Assistant","Singapore"),
("3","Jackson","Silva","jacksilva@mail.com","Support Engineer","New York"),
("4","Jenette","Caldwell","jenettewell@mail.com","Director","London"),
("5","Rhona","Walton","rhonawalt@mail.com","System Architect","San Francisco");




CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(35) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;


INSERT INTO tbl_products VALUES
("1","Galaxy Jmax","0"),
("2","Killer Note5","0"),
("3","Asus ZenFone2","0"),
("4","Moto Xplay","0"),
("5","Lenovo Vibe k5 Plus","0"),
("6","Redme Note 3","1"),
("7","LeEco Le 2","1"),
("8","Apple iPhone 6S Plus","1");




CREATE TABLE `traitement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idfichedobservation` int(11) NOT NULL,
  `idinfimier` int(11) NOT NULL,
  `datetraitement` datetime NOT NULL,
  `poidstraitement` double NOT NULL,
  `poulstraitement` double NOT NULL,
  `fretraitement` double DEFAULT NULL,
  `temtraitement` double DEFAULT NULL,
  `observation` text,
  PRIMARY KEY (`id`),
  KEY `idfichedobservation` (`idfichedobservation`),
  KEY `idinfimier` (`idinfimier`),
  CONSTRAINT `traitement_ibfk_1` FOREIGN KEY (`idfichedobservation`) REFERENCES `fichedobservation` (`id`),
  CONSTRAINT `traitement_ibfk_2` FOREIGN KEY (`idinfimier`) REFERENCES `personne` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `utilisateur` (
  `IDU` int(11) NOT NULL AUTO_INCREMENT,
  `iddep` int(11) NOT NULL,
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
  `FLAG` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDU`),
  KEY `iddep` (`iddep`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;


INSERT INTO utilisateur VALUES
("15","1","12345","admin","admin","admin","FEMME","DIRECTEUR","1000000","user","2018-09-26","2018-11-26","3","root","...","admin@gmail.com","77755533222","admin.jpg","...","DIAL","0");




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */; 
