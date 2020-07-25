BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "tes" (
	"ID"	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	"VAL"	TEXT NOT NULL UNIQUE,
	"USERID"	INTEGER NOT NULL
);
CREATE TABLE IF NOT EXISTS "utilisateur" (
	"IDU"	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	"CNI"	TEXT DEFAULT NULL,
	"PRENOM_USER"	TEXT DEFAULT NULL,
	"NOM_USER"	TEXT DEFAULT NULL,
	"LOGIN"	TEXT DEFAULT NULL UNIQUE,
	"SEXE_USER"	TEXT DEFAULT NULL,
	"POSTE"	TEXT DEFAULT NULL,
	"SALAIRE"	REAL DEFAULT NULL,
	"STATUT"	TEXT DEFAULT NULL,
	"DATNAIS"	date DEFAULT NULL,
	"DATEM"	date NOT NULL,
	"LEVESECURITY"	INTEGER NOT NULL,
	"PASSE"	TEXT NOT NULL,
	"ADRESS"	TEXT NOT NULL,
	"EMAIL"	TEXT NOT NULL UNIQUE,
	"NUM_UER"	TEXT NOT NULL UNIQUE,
	"PHOTO"	TEXT NOT NULL,
	"INFOS"	text NOT NULL,
	"CACHER"	TEXT DEFAULT NULL,
	"FLAG"	INTEGER DEFAULT NULL
);
CREATE TABLE IF NOT EXISTS "service" (
	"ids"	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	"ninea"	TEXT NOT NULL UNIQUE,
	"nom"	TEXT NOT NULL UNIQUE,
	"sigle"	TEXT NOT NULL,
	"email"	TEXT NOT NULL UNIQUE,
	"tel"	TEXT NOT NULL UNIQUE,
	"adress"	TEXT NOT NULL,
	"secteur_E"	TEXT NOT NULL,
	"type"	TEXT NOT NULL,
	"ca"	TEXT NOT NULL,
	"logo"	TEXT NOT NULL
);
CREATE TABLE IF NOT EXISTS "produit_cmp" (
	"idpcmp"	 INTEGER NOT NULL PRIMARY  KEY AUTOINCREMENT,
	"IDP"	 INTEGER DEFAULT NULL,
	"tabidp"	TEXT DEFAULT NULL,
	"tabqnt"	TEXT DEFAULT NULL,
	"tabmts"	TEXT DEFAULT NULL,
	"prv"	REAL DEFAULT NULL
);
CREATE TABLE IF NOT EXISTS "produit" (
	"IDP"	 INTEGER NOT NULL PRIMARY  KEY AUTOINCREMENT,
	"IDC"	INTEGER NOT NULL,
	"ID_CAT"	INTEGER NOT NULL,
	"DESI"	TEXT DEFAULT NULL UNIQUE,
	"PHOTO"	TEXT NOT NULL,
	"PRIXA"	REAL DEFAULT NULL,
	"PRIXV"	REAL DEFAULT NULL,
	"QNT"	REAL NOT NULL,
	"COMPOSER"	INTEGER NOT NULL,
	"FTECH"	text,
	"FLAG"	INTEGER NOT NULL
);
CREATE TABLE IF NOT EXISTS "poste" (
	"id"	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	"libelle"	TEXT NOT NULL  UNIQUE
);
CREATE TABLE IF NOT EXISTS "notification" (
	"IDN"	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	"IDO"	INTEGER NOT NULL,
	"ORIGINE"	TEXT DEFAULT NULL,
	"CIBLE"	TEXT DEFAULT NULL,
	"LIBELE"	TEXT NOT NULL,
	"DATEE"	datetime NOT NULL,
	"ETAT"	INTEGER DEFAULT NULL,
	"FLAG"	INTEGER DEFAULT NULL
);
CREATE TABLE IF NOT EXISTS "mouvement" (
	"IDMV"	 INTEGER NOT NULL PRIMARY  KEY AUTOINCREMENT,
	"IDU"	INTEGER NOT NULL,
	"NOMMV"	TEXT DEFAULT NULL,
	"DATE_DEL"	date DEFAULT NULL,
	"OBJET"	TEXT DEFAULT NULL,
	"CONTEN"	longtext,
	"TOTALHT"	REAL DEFAULT NULL,
	"TVA"	REAL DEFAULT NULL,
	"MTSCH"	REAL DEFAULT NULL,
	"MTSLTR"	TEXT DEFAULT NULL,
	"REG"	TEXT DEFAULT NULL,
	"AVANS"	REAL DEFAULT NULL,
	"RESTE"	REAL DEFAULT NULL,
	"CACHER"	INTEGER NOT NULL,
	"FLAG"	INTEGER NOT NULL
);
CREATE TABLE IF NOT EXISTS "log" (
	"idl"	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	"IDMV"	INTEGER NOT NULL,
	"conten"	TEXT DEFAULT NULL,
	"datelog"	datetime DEFAULT NULL,
	"flag"	INTEGER DEFAULT NULL
);
CREATE TABLE IF NOT EXISTS "image" (
	"IDIMG"	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	"IDO"	INTEGER NOT NULL,
	"LINK"	TEXT DEFAULT NULL,
	"ORIGIN"	TEXT DEFAULT NULL,
	"FLAG"	INTEGER NOT NULL
);
CREATE TABLE IF NOT EXISTS "frontend" (
	"IDFR"	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	"LIBELE"	TEXT NOT NULL UNIQUE,
	"CIBLE"	TEXT NOT NULL,
	"FSECTION"	TEXT NOT NULL
);
CREATE TABLE IF NOT EXISTS "fond" (
	"id"	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	"capital"	REAL NOT NULL
);
CREATE TABLE IF NOT EXISTS "fiche_inventaire" (
	"idl"	 INTEGER NOT NULL PRIMARY  KEY AUTOINCREMENT,
	"IDE"	 INTEGER NOT NULL,
	"conten"	TEXT DEFAULT NULL,
	"datefiche"	datetime DEFAULT NULL,
	"flag"	INTEGER DEFAULT NULL
);
CREATE TABLE IF NOT EXISTS "famille" (
	"IDFA"	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	"DESI"	TEXT NOT NULL UNIQUE,
	"COLOR"	TEXT NOT NULL,
	"FLAG"	INTEGER NOT NULL
);
CREATE TABLE IF NOT EXISTS "facture" (
	"IDF"	 INTEGER NOT NULL PRIMARY  KEY AUTOINCREMENT,
	"IDMV"	INTEGER NOT NULL,
	"IDP"	INTEGER DEFAULT NULL,
	"PU"	REAL DEFAULT NULL,
	"QNT"	REAL DEFAULT NULL,
	"MTS"	REAL DEFAULT NULL,
	"ROW"	INTEGER NOT NULL,
	"FDESI"	TEXT DEFAULT NULL,
	"FCONDIS"	TEXT DEFAULT NULL
);
CREATE TABLE IF NOT EXISTS "etat_stock" (
	"id"	 INTEGER NOT NULL PRIMARY  KEY AUTOINCREMENT,
	"IDF"	 INTEGER NOT NULL,
	"QNT_AV"	REAL NOT NULL,
	"QNT_APR"	REAL NOT NULL,
	"DATESTK"	date NOT NULL
);
CREATE TABLE IF NOT EXISTS "etat_compte" (
	"IDE"	 INTEGER NOT NULL PRIMARY  KEY AUTOINCREMENT,
	"IDFA"	INTEGER NOT NULL,
	"IDMOUV"	 INTEGER NOT NULL,
	"DEPENSE"	REAL NOT NULL,
	"GAINS"	REAL NOT NULL,
	"STOCK"	REAL NOT NULL,
	"DATEE"	date NOT NULL
);
CREATE TABLE IF NOT EXISTS "department" (
	"iddep"	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	"ids"	INTEGER NOT NULL,
	"NOMD"	TEXT DEFAULT NULL UNIQUE,
	"flag"	INTEGER DEFAULT NULL
);
CREATE TABLE IF NOT EXISTS "condis" (
	"IDC"	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	"NOMC"	TEXT NOT NULL UNIQUE,
	"FLAG"	INTEGER DEFAULT 0
);
CREATE TABLE IF NOT EXISTS "categorie" (
	"ID_CAT"	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	"IDFA"	INTEGER,
	"NOM_CAT"	TEXT UNIQUE,
	"ACHAT"	REAL,
	"VENTE"	REAL,
	"COMPT"	REAL,
	"flag"	INTEGER 
);
INSERT INTO "utilisateur" VALUES (6,'1027017','Martine ( TINA)','Mback Yem','tina','FEMME','DIRECTRICE ET GÃ‰RANTE ',150000.0,'user','1977-09-26','2015-11-26',3,'admin',NULL,'mmtine7@gmail.com','777838601','22798.jpg',NULL,'DIAL',0);
INSERT INTO "utilisateur" VALUES (7,'67667676','0','dial',NULL,'AUTRE','0',0.0,'four','2017-12-25','2017-12-25',0,'0','0',NULL,'45688899990',NULL,NULL,'6',0);
INSERT INTO "utilisateur" VALUES (8,'1234','0','HERBERGEMENT',NULL,'SOCIETE','0',0.0,'cli','2018-02-02','2018-02-02',1,'0',NULL,NULL,'******',NULL,NULL,'6',0);
INSERT INTO "utilisateur" VALUES (9,'23396972E1','0','AUBERGE DE SENDOU',NULL,'commerce ','0',0.0,'service','2018-02-03','2018-02-03',0,'0',NULL,NULL,'00221338361819','185020.png',NULL,'tina',0);
INSERT INTO "utilisateur" VALUES (10,'2756196707347','Natalie Suzanne','Fassinou',NULL,'FEMME','BARMAID',0.0,'user','1967-10-10','2016-08-08',1,'',NULL,NULL,'00221772498544',NULL,NULL,'6',0);
INSERT INTO "utilisateur" VALUES (11,'2756197202196','AISSATOU','NDIAYE',NULL,'FEMME','CUISINIER ASSISTANTE',70000.0,'user','1972-03-16','2013-07-30',1,'',NULL,NULL,'00221776884269',NULL,NULL,'6',0);
INSERT INTO "utilisateur" VALUES (12,'','0','',NULL,'AUTRE','0',0.0,'cli','2018-02-02','2018-02-02',0,'0','0',NULL,'',NULL,NULL,'6',2);
INSERT INTO "utilisateur" VALUES (13,'20819861130000070','AISSATOU','DIOP',NULL,'FEMME','MENAGERE',40000.0,'user','1987-11-30','2016-08-02',1,'',NULL,NULL,NULL,'395259.jpg',NULL,'6',0);
INSERT INTO "utilisateur" VALUES (14,'000221000','DJENABA','BA',NULL,'FEMME','SERVEUSE',25000.0,'user','1970-03-12','2017-05-06',1,'',NULL,NULL,NULL,NULL,NULL,'6',0);
INSERT INTO "utilisateur" VALUES (15,'0047759802E1','0','AUBERGE DE SENDOU',NULL,'SOCIETE','0',0.0,'cli','2018-03-29','2018-03-29',1,'0',NULL,'senauberge@gmail.com','00221338361819','263006.png',NULL,'6',0);
INSERT INTO "utilisateur" VALUES (16,'0247632','Suzanne Patricia','NGO HONGLA',NULL,'FEMME','BARMAID',65000.0,'user','1988-08-04','2018-06-11',1,'',NULL,NULL,'777154249',NULL,NULL,'6',0);
INSERT INTO "utilisateur" VALUES (17,'27751197113844','FATOU KINE','GAYE',NULL,'FEMME','BARMAID',65000.0,'user','1971-10-28','2018-07-05',1,'',NULL,NULL,'00221776323552',NULL,NULL,'6',0);
INSERT INTO "utilisateur" VALUES (18,'1752199201030','FRANCIS TEVI IVAN','LAWSON',NULL,'FEMME','DÃ‰LÃ‰GUÃ‰ ADMINISTRATIF',100000.0,'user','1992-07-23','2018-06-29',1,'',NULL,NULL,'00221776113535',NULL,NULL,'6',0);
INSERT INTO "utilisateur" VALUES (19,'1751195103014','ANSELME OSTER LATEVI','LAWSON',NULL,'HOMME','PATRON',500000.0,'user','1951-04-21','2004-02-20',2,'',NULL,NULL,'0021775570420',NULL,NULL,'6',0);
INSERT INTO "utilisateur" VALUES (20,'011988122600030','BAYE MEDOUNE','NDIR',NULL,'HOMME','GARDIEN- VIDER',70000.0,'user','1988-12-26','2019-11-15',1,'admin',NULL,NULL,NULL,NULL,NULL,'6',0);
INSERT INTO "utilisateur" VALUES (21,'1021987100500003 9','NARCISSE','MENDY',NULL,'HOMME','CUISINIER EN CHEF',70000.0,'user','1987-10-05','2019-11-13',1,'admin',NULL,'SENAUBERGE@GMAIL.COM','00221774050401',NULL,NULL,'6',0);
INSERT INTO "service" VALUES (1,'0047759802E1','AUBERGE DE SENDOU','ADS','senauberge@gmail.com','00221338361819','Entreprise','Secteur tertiaire','PE','10000000','830341.png');
INSERT INTO "produit_cmp" VALUES (2,128,'186','3','0',0.0);
INSERT INTO "produit_cmp" VALUES (3,247,'131, 147','1, 1','325, 0',325.0);
INSERT INTO "produit_cmp" VALUES (5,191,'126, 131','1, 1','0, 325',325.0);
INSERT INTO "produit_cmp" VALUES (6,190,'131','1','325',325.0);
INSERT INTO "produit_cmp" VALUES (7,265,'131, 150','1, 1','325, 3000',3325.0);
INSERT INTO "produit_cmp" VALUES (8,266,'131, 150','1, 0.5','325, 1500',1825.0);
INSERT INTO "produit_cmp" VALUES (9,248,'131, 150','1, 0.25','325, 750',1075.0);
INSERT INTO "produit_cmp" VALUES (10,255,'131, 127','1, 1','325, 1500',1825.0);
INSERT INTO "produit_cmp" VALUES (11,193,'267, 131','1, 1','1850, 325',2175.0);
INSERT INTO "produit_cmp" VALUES (12,226,'227, 131','1, 1','0, 325',325.0);
INSERT INTO "produit" VALUES (63,14,1,'CHAMBRE NUIT&Eacute;E CLIM','.',0.0,20000.0,1.0,0,'                                    ',0);
INSERT INTO "produit" VALUES (64,14,1,'CHAMBRE PASSE CLIM','.',0.0,15000.0,1.0,0,'							                                    							',0);
INSERT INTO "produit" VALUES (66,14,1,'PISCINE ADULTES','.',0.0,2000.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (67,14,1,'PISCINE ENFANTS','.',0.0,1000.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (68,5,2,'ENERGIE XL','.',1000.0,1000.0,0.0,0,'                                    ',0);
INSERT INTO "produit" VALUES (69,9,2,'KLEINIENNE ','.',730.0,1000.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (73,14,4,'TRANSPORT','.',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (75,8,2,'GAZELLES GM','.',562.5,1000.0,39.0,0,'                                    ',0);
INSERT INTO "produit" VALUES (77,8,2,'FLAG GM','.',719.0,1500.0,7.0,0,'														                                    														',0);
INSERT INTO "produit" VALUES (78,8,2,'FLAGUETTES','.',437.5,1000.0,30.0,0,'		vrai prix 437,5				  						                                    																					',0);
INSERT INTO "produit" VALUES (79,8,2,'MEISTERS','.',510.0,1000.0,65.0,0,'                                    ',0);
INSERT INTO "produit" VALUES (80,0,0,'DSP','',1100.0,2000.0,0.0,18,'',0);
INSERT INTO "produit" VALUES (81,9,2,'ROYALS','...',510.0,1000.0,58.0,0,'VRAIE PRIX 			470.83',0);
INSERT INTO "produit" VALUES (82,8,2,'33 EXPORT GM','...',500.0,1000.0,1.0,0,'VRAIE PRIX 531,25                       							',0);
INSERT INTO "produit" VALUES (83,8,2,'SAGRES','...',590.0,1000.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (84,8,2,'SUCRE BOUTEILLE','...',170.0,500.0,103.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (85,9,2,'ENERGIE GM','...',850.0,1500.0,23.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (86,10,2,'PRESEA','...',1000.0,1500.0,10.0,0,'							\r\n                                    							',0);
INSERT INTO "produit" VALUES (87,9,2,'RANIS','...',300.0,1000.0,0.0,0,'													\r\n                                    														',0);
INSERT INTO "produit" VALUES (88,8,2,'VIMTO','...',250.0,500.0,63.0,0,'							\r\n                                    							',0);
INSERT INTO "produit" VALUES (89,6,2,'KIRENE PM','...',208.0,500.0,37.0,0,'                                    ',0);
INSERT INTO "produit" VALUES (90,11,2,'KIRENE GM','...',250.0,1000.0,27.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (91,5,2,'VALMERAS','...',1600.0,2500.0,24.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (92,6,2,'GIN DRY','...',1100.0,1500.0,18.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (93,7,2,'BARONS RAMONE','...',1600.0,3000.0,4.0,0,'							\r\n                                    							',0);
INSERT INTO "produit" VALUES (94,5,2,'CLUB7 GM','...',2200.0,4000.0,16.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (95,9,2,'TUBORG','...',650.0,1500.0,20.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (96,9,2,'RED BULL','...',1000.0,2000.0,0.0,0,'							\r\n                                    							',0);
INSERT INTO "produit" VALUES (97,5,2,'JUS NATURELLE GM','...',1250.0,2000.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (98,5,2,'EAU GAZEUSE','...',450.0,1000.0,0.0,0,'                                    ',0);
INSERT INTO "produit" VALUES (99,5,2,'SIROP MENTHE','...',1900.0,500.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (100,5,2,'SIROP ORANGE','...',2500.0,500.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (101,14,2,'CAFES','...',2000.0,500.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (102,14,2,'THES','...',100.0,500.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (103,31,2,'RED LABEL GM','...',18500.0,25000.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (104,31,2,'GRANTS pm','...',500.0,2000.0,0.0,0,'							\r\n                                    							',0);
INSERT INTO "produit" VALUES (105,31,2,'GIN GORDON','...',500.0,1000.0,0.0,0,'							\r\n                                    							',0);
INSERT INTO "produit" VALUES (106,31,2,'JB GM','...',18500.0,25000.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (107,31,2,'CLAN CAMBEL GM','...',18500.0,1000.0,25.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (108,31,2,'GET 27','...',500.0,2000.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (109,31,2,'BAYLEYS','...',500.0,2000.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (110,31,2,'MARGARITA','...',500.0,3500.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (111,31,2,'MARTINI BLANC','...',500.0,2000.0,2.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (112,31,2,'MARTINI ROUGE','...',500.0,2000.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (113,31,2,'MARTINI ROSE','...',500.0,2000.0,40.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (114,31,2,'VODKA ASB','...',6500.0,18500.0,3.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (115,31,2,'RICARD','...',500.0,2000.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (116,31,2,'WILLIAM PEEL','...',1100.0,1000.0,40.0,0,'							\r\n                                    							',0);
INSERT INTO "produit" VALUES (117,7,2,'CUVE DU PATRON','...',1600.0,3500.0,0.0,0,'							\r\n                                    							',0);
INSERT INTO "produit" VALUES (118,7,2,'MINERVOIX','...',3500.0,6000.0,5.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (119,7,2,'COTE DE PROVINCE','...',4500.0,7500.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (120,7,2,'COTE DE RHONE','...',4500.0,7500.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (121,13,5,'MALBOROS','...',720.0,1000.0,7.0,0,'',0);
INSERT INTO "produit" VALUES (122,13,5,'EXCELLENCE','...',570.0,1000.0,8.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (124,27,4,'0000','...',0.0,0.0,1.0,0,'														\r\n                                    														',1);
INSERT INTO "produit" VALUES (125,14,13,'DEPENSE PATRON','...',0.0,0.0,1.0,0,'																					...\r\n                                    																					',0);
INSERT INTO "produit" VALUES (126,14,12,'CHAUX ET CAROTTE','...',0.0,0.0,-17.0,0,'							                                    							',0);
INSERT INTO "produit" VALUES (127,13,8,'STEACK','...',1500.0,4000.0,1.0,0,'							\r\n                                    							',0);
INSERT INTO "produit" VALUES (128,14,9,'PLAT OMELETTES SIMPLE','...',500.0,1000.0,1.0,1,'                                    ',0);
INSERT INTO "produit" VALUES (129,14,9,'PLAT OMELETTE GARNIE','...',1000.0,2500.0,1.0,0,'                                    ',0);
INSERT INTO "produit" VALUES (130,14,9,'PETIT DEJEUNER','...',0.0,1500.0,1.0,0,'                                    ',0);
INSERT INTO "produit" VALUES (131,13,8,'FRITTES','...',1250.0,1000.0,1.0,0,'																					\r\n                                    																					',0);
INSERT INTO "produit" VALUES (132,13,8,'ALLOKO','...',0.0,1000.0,1.0,0,'														                                    														',0);
INSERT INTO "produit" VALUES (133,13,9,'PLAT ATIEKE','...',500.0,1500.0,1.0,0,'                                    ',0);
INSERT INTO "produit" VALUES (134,2,8,'L&Eacute;GUMES SAUTER','...',1650.0,5000.0,1.0,0,'                                    ',0);
INSERT INTO "produit" VALUES (135,14,9,'PLAT DESSERT','...',750.0,2000.0,1.0,0,'                                    ',0);
INSERT INTO "produit" VALUES (137,13,6,'PORC BRAISER','...',625.0,3500.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (138,14,9,'PLAT BOUILLONS','...',0.0,0.0,1.0,0,'                                    ',0);
INSERT INTO "produit" VALUES (147,14,8,'POISSONS','...',0.0,0.0,1.0,0,'														\r\n                                    														',0);
INSERT INTO "produit" VALUES (148,14,8,'GAZ MENAGER PM','...',3500.0,0.0,1.0,0,'														...                                    														',0);
INSERT INTO "produit" VALUES (149,14,8,'GAZ  MENAGER GM','...',6500.0,0.0,1.0,0,'...                                    ',0);
INSERT INTO "produit" VALUES (150,14,8,'POULETS ','...',7000.0,3000.0,1.0,0,'														                                    														',0);
INSERT INTO "produit" VALUES (151,26,6,'PX 0.5','...',2000.0,3500.0,0.0,0,'																					                                    																					',1);
INSERT INTO "produit" VALUES (152,14,4,'ELECTRICIEN','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (153,14,4,'PLOMBIER','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (154,14,4,'GROUPISTE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (155,14,4,'ENTRETIEN GROUPE ELECTROGENE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (156,14,4,'ENTRETIENS PISCINE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (157,14,4,'PEINTRE  MAIN D&rsquo;&OElig;UVRE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (158,14,4,'SAVONS CLIENTS','...',0.0,0.0,1.0,0,'																					\r\n                                    																					',0);
INSERT INTO "produit" VALUES (159,14,4,'INSECTIDES','...',1500.0,0.0,1.0,0,'							\r\n                                    							',0);
INSERT INTO "produit" VALUES (160,14,4,'DETERGENTS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (161,14,4,'MA&Ccedil;ONNERIE SABLE','...',0.0,0.0,1.0,0,'														\r\n                                    														',0);
INSERT INTO "produit" VALUES (162,14,4,'PRODUITS CUISINE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (163,14,3,'MARCHER EMPLOYER','...',40000.0,0.0,1.0,0,'							\r\n                                    							',0);
INSERT INTO "produit" VALUES (164,14,3,'SALAIRE GERANTE','...',0.0,115000.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (165,14,3,'SALAIRE BARMAIDE','...',0.0,80000.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (166,14,3,'SALAIRE MENAGERE','...',0.0,40000.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (167,14,3,'SALAIRE CUISINIERE','...',0.0,55000.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (168,14,3,'SALAIRE SERVEUSE','...',0.0,30000.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (169,14,3,'SALAIRE JARDINIER','...',0.0,35000.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (170,14,3,'SALAIRE PAPE PISCINE','...',0.0,30000.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (171,14,3,'SALAIRE GARDIEN','...',0.0,35000.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (172,14,3,'SALAIRE  PAPOY GARDIEN TERRAIN','...',0.0,80000.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (173,14,3,'SALAIRE GARDIEN TERRAIN','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (174,14,3,'SALAIRE GARDIEN TERRAIN 3','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (175,14,4,'CANONS PORTE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (176,14,4,'POIGNETS PORTE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (177,14,3,'MOUCHOIRS  JETABLE','...',0.0,500.0,1.0,0,'							\r\n                                    							',0);
INSERT INTO "produit" VALUES (178,14,2,'CACAOUETTES','...',0.0,0.0,2.0,0,'																												\r\n                                    																												',0);
INSERT INTO "produit" VALUES (179,14,2,'SHIPS','...',1500.0,0.0,2.0,0,'							...\r\n                                    							',0);
INSERT INTO "produit" VALUES (180,14,1,'PRESERVATIFS','...',250.0,500.0,1.0,0,'														\r\n                                    														',0);
INSERT INTO "produit" VALUES (181,14,1,'CHAMBRE PRIX SPECIAUX','...',0.0,12500.0,1.0,0,'														\r\n                                    														',0);
INSERT INTO "produit" VALUES (183,13,8,'PACK HAMBURGER','...',0.0,0.0,1.0,0,'														...                                    														',1);
INSERT INTO "produit" VALUES (184,14,9,'PLATS RIZ','...',0.0,0.0,1.0,0,'...                                    ',0);
INSERT INTO "produit" VALUES (185,14,9,'PLATS DU JOURS','...',0.0,0.0,1.0,0,'...                                    ',0);
INSERT INTO "produit" VALUES (186,14,12,'OEUFS','...',0.0,0.0,0.0,0,'														...\r\n                                    														',0);
INSERT INTO "produit" VALUES (187,14,9,'PLAT SALADE DE LEGUMES','...',0.0,0.0,1.0,0,'                                    ',0);
INSERT INTO "produit" VALUES (188,14,9,'PLAT SALADE DE FRUITS','...',0.0,0.0,1.0,0,'                                    ',0);
INSERT INTO "produit" VALUES (189,27,9,'0000','...',0.0,0.0,1.0,0,'							...                                    							',1);
INSERT INTO "produit" VALUES (190,14,9,'PLAT DE FRITTE','...',0.0,0.0,1.0,1,'...                                    ',0);
INSERT INTO "produit" VALUES (191,14,9,'PLAT CREVETTE','...',1000.0,3500.0,1.0,1,'                                    ',0);
INSERT INTO "produit" VALUES (192,14,4,'POUBELIER','...',0.0,0.0,1.0,0,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (193,25,9,'PLAT BLANQUETTE DE POULET','...',0.0,0.0,1.0,1,'							...                                    							',0);
INSERT INTO "produit" VALUES (194,14,8,'BARQUETTES PLAT A EMPORTER','...',0.0,0.0,1.0,0,'							...\r\n                                    							',0);
INSERT INTO "produit" VALUES (195,14,4,'GRESIL','...',0.0,0.0,1.0,0,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (196,13,4,'BATTERIE DE RECHARE APPPAREILLE','...',0.0,0.0,1.0,0,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (197,18,4,'SAVONS LESSIVE','...',0.0,0.0,1.0,0,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (198,14,4,'PRODUITS MENAGER','...',0.0,0.0,1.0,0,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (199,14,2,'VERRES BAR','...',0.0,0.0,2.0,0,'														...\r\n                                    														',0);
INSERT INTO "produit" VALUES (200,14,4,'DETTES  LOGICIEL DE COMPTABILIT&amp;Eacute;','...',500000.0,0.0,1.0,0,'							CONTRAT DE 100.000 AV = 30.000      														',0);
INSERT INTO "produit" VALUES (201,14,8,'VIANDE HEMBURGER','...',0.0,0.0,1.0,0,'																												...\r\n                                    																												',0);
INSERT INTO "produit" VALUES (202,14,8,'HAMBURGER FROMAGE','...',0.0,0.0,1.0,0,'														...\r\n                                    														',0);
INSERT INTO "produit" VALUES (203,14,4,'PAPIER FILME ET ALLUMINIM','...',0.0,0.0,1.0,0,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (204,14,8,'SUCRE CLIENTS','...',0.0,0.0,1.0,0,'							...\r\n                                    							',0);
INSERT INTO "produit" VALUES (206,14,4,'MOUTARDE','...',0.0,0.0,1.0,0,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (207,14,3,'KETCHUPS','...',3500.0,0.0,1.0,0,'							...\r\n                                    							',0);
INSERT INTO "produit" VALUES (208,14,4,'OGNIONS','...',0.0,0.0,1.0,0,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (209,14,8,'AILS CUISINE','...',0.0,0.0,1.0,0,'							...\r\n                                    							',0);
INSERT INTO "produit" VALUES (210,14,8,'CUBE MAGGIS','...',0.0,0.0,1.0,0,'							...\r\n                                    							',0);
INSERT INTO "produit" VALUES (211,14,4,'DETERGENT  VAISSELLES ','...',0.0,0.0,1.0,0,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (212,14,8,'PETIT DEJ EMPLOYER','...',0.0,0.0,1.0,0,'							...\r\n                                    							',0);
INSERT INTO "produit" VALUES (213,14,4,'DEPENSE AUBERGEMENT','...',0.0,0.0,1.0,0,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (214,14,9,'NORV&Eacute;GIEN ','...',0.0,100.0,1.0,0,'...                                    ',0);
INSERT INTO "produit" VALUES (215,14,4,'MACONNERIE CIMENT','...',0.0,0.0,1.0,0,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (216,14,4,'MACONNERIE GRAVIERS ','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (217,14,4,'MA&Ccedil;ONNERIE COQUILLAGE','...',0.0,0.0,1.0,0,'							\r\n                                    							',0);
INSERT INTO "produit" VALUES (218,14,9,'PLAT HAMBURGER','...',1000.0,1500.0,1.0,0,'																					...\r\n                                    																					',0);
INSERT INTO "produit" VALUES (219,14,8,'SAC DE RIZ','...',0.0,0.0,1.0,0,'							...\r\n                                    							',0);
INSERT INTO "produit" VALUES (220,14,4,'LESSIVEUSE','...',0.0,0.0,1.0,0,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (221,14,10,'IPRESS','...',0.0,0.0,1.0,0,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (222,14,10,'CAISSE DE SECURITE SOCIALE','...',0.0,0.0,1.0,0,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (223,14,10,'PAPIER A 4','...',0.0,0.0,1.0,0,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (224,14,11,'OFFERTE','...',0.0,0.0,1.0,0,'							...\r\n                                    							',0);
INSERT INTO "produit" VALUES (225,14,9,'PLAT DU JOUR','...',0.0,1000.0,1.0,0,'							...\r\n                                    							',0);
INSERT INTO "produit" VALUES (226,14,9,'PLATS FILET DE BOEUFS','...',0.0,0.0,1.0,1,'							...\r\n                                    							',0);
INSERT INTO "produit" VALUES (227,14,12,'FILET DE BOEUF ','...',0.0,0.0,-1.0,0,'							...\r\n                                    							',0);
INSERT INTO "produit" VALUES (228,14,8,'HUILE 5 LITRES','...',0.0,0.0,1.0,0,'							...\r\n                                    							',0);
INSERT INTO "produit" VALUES (229,14,4,'0000','...',0.0,0.0,1.0,0,'														...\r\n                                    														',1);
INSERT INTO "produit" VALUES (230,14,1,'CHAMBRE NUITEE VENTILO','...',0.0,15000.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (231,14,1,'CHAMBRE PASSE JOURNEE','...',0.0,5000.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (232,14,1,'CHAMBRE JOURNEE VENTILO','...',0.0,10000.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (233,14,1,'CHAMBRE JOUNEE CLIM','...',0.0,15000.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (234,14,1,'CHAMBRE DEMI JOUNEE','...',0.0,7500.0,1.0,0,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (235,14,10,'CARTE ORANGE','...',0.0,0.0,1.0,0,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (236,14,10,'COMPTABLE','...',0.0,0.0,1.0,0,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (237,14,8,' PAIN  HAMBURGER','...',190.0,0.0,1.0,0,'														...\r\n                                    														',0);
INSERT INTO "produit" VALUES (238,14,6,'WWWW','...',0.0,0.0,0.0,0,'							...\r\n                                    							',1);
INSERT INTO "produit" VALUES (239,14,4,'PARFUM AUBERGE ','...',0.0,0.0,1.0,0,'							...\r\n                                    							',0);
INSERT INTO "produit" VALUES (240,14,4,'FACTURE SONATEL','...',0.0,0.0,1.0,0,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (241,14,3,'CANAL HORIZON','...',0.0,0.0,1.0,0,'							...\r\n                                    							',0);
INSERT INTO "produit" VALUES (242,14,2,'RHUM  LIQUEUR ','...',5200.0,10000.0,0.0,0,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (243,14,8,'ALLUME FEU','...',0.0,0.0,1.0,0,'							...\r\n                                    							',0);
INSERT INTO "produit" VALUES (244,14,9,'PLAT POISSONS PETITS','...',0.0,0.0,1.0,0,'                                    ',1);
INSERT INTO "produit" VALUES (245,14,9,'PLAT POISSON MOYENS','...',0.0,0.0,1.0,0,'                                    ',1);
INSERT INTO "produit" VALUES (246,14,9,'PLAT POISSONS GRAND','...',0.0,0.0,1.0,0,'                                    ',1);
INSERT INTO "produit" VALUES (247,14,9,'PLAT POISSONS ','...',0.0,0.0,1.0,1,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (248,14,9,'PLAT QUART POULET ','...',0.0,2000.0,1.0,1,'...\r\n                                    ',0);
INSERT INTO "produit" VALUES (249,14,4,'MATERIELLE  ELECTRIQUE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (250,14,4,'MATÃ‰RIELLE MENUISERIE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (251,14,12,'PAIN NORVEGIEN','...',0.0,0.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (252,14,12,'SAUCISSE NORVEGIEN','...',0.0,0.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (253,14,8,'PIMENTS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (254,14,8,'CONDIMENT VERT','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (255,14,9,'PLAT STEACK','...',0.0,0.0,1.0,1,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (256,14,8,'OIGNIONS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (257,14,8,'POIVRE ','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (258,14,4,'PHARMACIE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (259,14,9,'PLAT FILLET','...',0.0,0.0,1.0,0,'\r\n                                    ',1);
INSERT INTO "produit" VALUES (260,14,4,'SENELEC','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (261,14,4,'SDE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (262,14,4,'MATERIELS  AUBERGE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (263,14,7,'OUTILLES ET AUTRE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (264,14,8,'PAPIERS HAMBURGER','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (265,14,9,'PLAT POULET ENTIER','...',0.0,6000.0,1.0,1,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (266,14,9,'PLAT DEMI POULET','...',0.0,3500.0,1.0,1,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (267,14,12,'BLANC DE POULET','...',1850.0,5000.0,0.0,0,'....',0);
INSERT INTO "produit" VALUES (268,14,8,'LEGUMES','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (269,14,7,'PAPIER HYGENIQUE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (270,14,7,'ESTEINTEURS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (271,14,8,'MAYONAISE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (272,14,4,'PRODUITS PISCINE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (273,14,7,'AJAX WC','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (274,14,8,'CONFITURE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (275,14,8,'LAIT CLIENTS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (276,14,8,'BECK A GAZ','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (277,14,2,'GODYS','...',510.0,1000.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (278,14,8,'MAMI','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (279,14,8,'MADAR VAISELLES','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (280,14,7,'SERPENTIN','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (281,14,12,'ATIEKE','...',0.0,0.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (282,14,4,'MAT&Eacute;RIELS  BAR','...',0.0,0.0,1.0,0,'							\r\n                                    							',0);
INSERT INTO "produit" VALUES (283,14,7,'EMPOULES','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (284,14,8,'TOMATE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (285,14,2,'OFFRE BAR','...',0.0,0.0,0.0,0,'							\r\n                                    							',0);
INSERT INTO "produit" VALUES (286,14,4,'DIVERS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (287,14,4,'VIDANGE FAUSSE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (288,14,4,'FUMIER ET FLEURES','...',1500.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (289,14,4,'GAZOLE GROUPE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (290,14,8,'SAVONS VAISELLE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (291,14,4,'GLACE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (292,14,4,'REFFECTION PORTES','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (293,14,4,'PEINTURE ET MATERIELS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (294,14,1,'SORTIE DE GROUPE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (295,14,4,'MAIN Dâ€™Å’UVRE MAÃ‡ON','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (296,14,4,'MATERIEL PLOMBERIE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (297,14,8,'POIVRONS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (298,14,1,'CHAMBRE SUITES','...',0.0,20000.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (299,14,2,'EAU GAZEUSE PM','...',0.0,0.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (300,14,4,'D&Eacute;PENSE ORANGE ET CANAL','...',0.0,0.0,1.0,0,'							\r\n                                    							',0);
INSERT INTO "produit" VALUES (301,14,8,'SALADE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (302,14,8,'CONCOMBRE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (303,14,8,'OGNIONS VERT','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (304,14,8,'SEL ET POIVRE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (305,14,8,'THE DIVERSE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (306,14,4,'LITERIE UBERGE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (307,14,7,'BALLAIT ET PELLE  A ORDURE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (308,14,4,'SEAU ET BASSINE  M&Eacute;NAGE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (309,14,3,'FACTURE ORANGE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (310,14,3,'CERTIFICAT MEDICAL','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (311,14,8,'BEURRE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (312,14,4,'PINCES A LINGE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (313,14,1,'SERVIETTE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (314,14,1,'DRAPS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (315,14,2,'RUHME','...',0.0,0.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (316,14,8,'VINAIGRE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (317,14,4,'TRAVAUX AUBERGE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (318,14,4,'CHAUFFE EAU','...',0.0,0.0,1.0,0,'							\r\n                                    							',0);
INSERT INTO "produit" VALUES (319,14,13,'TRANSFERTS PATRON','...',0.0,0.0,1.0,0,'....',0);
INSERT INTO "produit" VALUES (320,14,9,'SADWISCHE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (321,14,4,'MACONNERIE FER','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (322,14,1,'M.L','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (323,14,2,'APPAREILLE MUSICAL','...',0.0,0.0,2.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (324,14,4,'MACONNERIE BRIQUE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (325,14,4,'DONATIONS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (326,14,4,'MACONNERIE CARREAUX ','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (327,14,4,'CIMENT BLANC','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (328,14,4,'OXYDE  COULEURS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (329,14,2,'ENTRETIEN FRIGO','...',0.0,0.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (330,14,2,'HEINEKEN BOUTEILLE','...',770.0,1000.0,43.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (331,14,2,'JUS NATURELLE PM','...',250.0,500.0,25.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (332,14,4,'ENTRETIEN CLIM','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (333,14,4,'PESTICIDE ET TERRO','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (334,14,1,'LOCATION MOIS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (335,14,2,'JACK DANIELS','...',19500.0,2500.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (336,14,4,'IMPOTS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (337,14,4,'MENUISSIER METALIQUE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (338,14,4,'INSTALLATIONS G.','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (339,14,4,'MAINS Dâ€™Å’UVRE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (340,14,2,'MATERIELS BAR','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (341,14,2,'CHAMPAGNE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (342,14,4,'PRODUITS DE SANTE ','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (343,14,13,'LOYER','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (344,9,2,'ENERGIE PM','...',400.0,1000.0,25.0,0,'							\r\n                                    							',0);
INSERT INTO "produit" VALUES (345,14,2,'GLACONS','...',0.0,0.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (346,14,2,'VALMERAS CASSABLE','...',1800.0,4000.0,8.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (347,14,4,'MATERIELS DE JARDINAGE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (348,14,3,'SALAIRE 2&eacute;me men','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (349,14,4,'ACIDE BOUCHEUR','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (350,14,4,'MATERIELS DE BUREAU','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (351,14,2,'VALMERAS PM','...',1100.0,2000.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (352,14,2,'EMBALLAGE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (353,14,2,'HEINEKEN CANETTE PM','...',700.0,1000.0,13.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (354,14,1,'CHAMBRE PASSE NUIT','...',0.0,5000.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (355,14,2,'CARTE NOIR PM','...',1000.0,2000.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (356,14,2,' SUCRE CANETTES','...',250.0,500.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (357,14,4,'DETTE ','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (358,14,2,'PERTE BAR','...',0.0,0.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (359,14,4,'FAUX BILLET','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (360,14,2,'PICHET','...',1700.0,4000.0,5.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (361,14,2,'PASTIS B','...',3000.0,1000.0,80.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (362,14,2,'CORNICHONS ET OLIVE','...',0.0,0.0,4.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (363,14,2,'JET27','...',500.0,1000.0,30.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (364,14,9,'PLATS BROCHETTES BOEUF','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (365,14,9,'ENTRE-COTTES','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (366,14,8,'CHARBON','...',3500.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (367,14,2,'BEAUFORT','...',540.0,1000.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (368,14,1,'ENTRETIEN ET VOITURE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (369,14,4,'SERVICE D HYGENE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (370,14,4,'MACONNERIE CARREAUX ','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (371,14,9,'FILLE DE POISSONS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (372,14,3,'SALAIRE FRANCIS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (373,14,2,'GAZELLES PM','...',350.0,1000.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (374,14,7,'ANCRE IMPRIMANTE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (375,14,7,'EAU DE JAVEL','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (376,14,8,'EPICES CUISINE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (377,14,8,'SAUCE  CUISINE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (378,14,8,'FROMAGE CLIENTS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (379,14,4,'DECORATION DE NOEL','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (380,14,8,'AGRUME','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (381,14,2,'VINS MOUSEUX','...',4500.0,6500.0,3.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (382,14,4,'ENTRETIEN DIVERSE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (383,14,4,'NOEL DECO ','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (384,14,2,'GOLD BEER','...',510.0,1000.0,6.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (385,14,2,'AMSTLES','...',510.0,1000.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (386,14,9,'PLAT MOUTONS','...',2000.0,3500.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (387,14,9,'PLAT MOUTONS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (388,14,9,'MOUTONS','...',4000.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (389,14,2,'PASTIS 51','...',15500.0,1000.0,20.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (390,14,9,'PLATS MOUTONS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (391,14,2,'RED LABEL PM','...',14500.0,20000.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (392,14,2,'JB PM','...',14500.0,1000.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (393,14,2,'CARTE NOIR GM','...',1750.0,4000.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (394,14,9,'SPAGHETTI BOLOGNAISE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (395,14,4,'Voiture et Entretien','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (396,14,2,'CLUB7 PM','...',1500.0,2500.0,10.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (397,14,12,'BETTERAVE','...',0.0,0.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (398,14,3,'SALAIRE SOPHIE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (399,14,4,'CONSIGNE','...',0.0,0.0,1.0,0,'....',0);
INSERT INTO "produit" VALUES (400,14,4,'FACTURE SENELEC','...',0.0,0.0,1.0,0,'....',0);
INSERT INTO "produit" VALUES (401,14,4,'FACTURE SDE','...',0.0,0.0,1.0,0,'....',0);
INSERT INTO "produit" VALUES (402,14,8,'CAROTTES','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (403,14,12,'CREVETTE','...',3290.0,3500.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (404,14,12,'PETIT POIDS','...',0.0,0.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (405,14,12,'POMME DE TERRE','...',0.0,0.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (406,14,12,'FRUITS','...',0.0,0.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (407,14,12,'DESERT','...',0.0,0.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (408,14,4,'INCOMPRIT','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (409,14,2,'MINERVOIS','...',2000.0,6000.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (410,14,9,'PLATS BOUILLONS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (411,14,8,'VIANDE BOUILLONS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (412,14,9,'BROCHETTE DE POISSONS','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (413,14,2,'DESPERADO','...',1100.0,2000.0,20.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (414,14,2,'WYSKI SCOTCH ','whisky-black--pm_251051_20191221.jpg',0.0,0.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (415,14,12,'VIANDE RESTAURANTE','...',0.0,0.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (416,14,9,'PLATS DE VIANDE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (417,14,9,'PLATS DU JOUR','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (418,14,3,'ASSURANCE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (419,14,12,'PATTES ALIMENTAIRE','...',0.0,0.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (420,14,9,'PATTES ET SAUCE','...',0.0,0.0,1.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (421,14,2,'ENERGIE XL','...',1000.0,2000.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (422,14,12,'filets boeuf','...',4500.0,6000.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "produit" VALUES (423,14,12,'lotte','...',1000.0,2000.0,0.0,0,'\r\n                                    ',0);
INSERT INTO "poste" VALUES (1,'BARMAID');
INSERT INTO "poste" VALUES (2,'CUISINIER');
INSERT INTO "poste" VALUES (3,'CUISINIERE');
INSERT INTO "poste" VALUES (4,'DIRECTRICE');
INSERT INTO "poste" VALUES (5,'GARDIEN');
INSERT INTO "poste" VALUES (6,'MENAGERE');
INSERT INTO "poste" VALUES (7,'HOTESSE');
INSERT INTO "poste" VALUES (8,'PATRON');
INSERT INTO "poste" VALUES (9,'SERVEUR');
INSERT INTO "poste" VALUES (10,'SERVEUSE');
INSERT INTO "poste" VALUES (1,'BARMAID');
INSERT INTO "poste" VALUES (2,'CUISINIER');
INSERT INTO "poste" VALUES (3,'CUISINIERE');
INSERT INTO "poste" VALUES (4,'DIRECTRICE');
INSERT INTO "poste" VALUES (5,'GARDIEN');
INSERT INTO "poste" VALUES (6,'MENAGERE');
INSERT INTO "poste" VALUES (7,'HOTESSE');
INSERT INTO "poste" VALUES (8,'PATRON');
INSERT INTO "poste" VALUES (9,'SERVEUR');
INSERT INTO "poste" VALUES (10,'SERVEUSE');
INSERT INTO "frontend" VALUES (1,'default','appdseting','slidebar');
INSERT INTO "frontend" VALUES (2,'noire','appdseting','theme');
INSERT INTO "fond" VALUES (1,301850.0);
INSERT INTO "famille" VALUES (1,'AUBERGE','#1E90FF',0);
INSERT INTO "famille" VALUES (2,'RESTAURANT','#008000',0);
INSERT INTO "famille" VALUES (3,'BAR ','#FFFF33',0);
INSERT INTO "famille" VALUES (4,'DIVERS','#DA70D6',0);
INSERT INTO "famille" VALUES (5,'TABAC','#FF0000',0);
INSERT INTO "famille" VALUES (6,'CAISSE','#fffff',3);
INSERT INTO "famille" VALUES (7,'CHARGES ','#000000',0);
INSERT INTO "famille" VALUES (8,'CHARGES PATRON','#FFC0CB',0);
INSERT INTO "condis" VALUES (1,'Kg',0);
INSERT INTO "condis" VALUES (2,'Sachet',0);
INSERT INTO "condis" VALUES (3,'Bidon 5L',0);
INSERT INTO "condis" VALUES (4,'Bidons 10L',0);
INSERT INTO "condis" VALUES (5,'Bouteille 1L',0);
INSERT INTO "condis" VALUES (6,'Bouteille 0.5L',0);
INSERT INTO "condis" VALUES (7,'Bouteille 66Cl',0);
INSERT INTO "condis" VALUES (8,'Bouteille 33Cl',0);
INSERT INTO "condis" VALUES (9,'Cannette',0);
INSERT INTO "condis" VALUES (10,'Brique 1L',0);
INSERT INTO "condis" VALUES (11,'Bouteille 1.5L',0);
INSERT INTO "condis" VALUES (12,'Bouteille 2L',0);
INSERT INTO "condis" VALUES (13,'Pacquet',0);
INSERT INTO "condis" VALUES (14,'UnitÃ©',0);
INSERT INTO "condis" VALUES (15,'Passe',0);
INSERT INTO "condis" VALUES (16,'NuitÃ©e',0);
INSERT INTO "condis" VALUES (17,'JournÃ©e',0);
INSERT INTO "condis" VALUES (18,'Sac',0);
INSERT INTO "condis" VALUES (19,'Filet',0);
INSERT INTO "condis" VALUES (20,'Carton',0);
INSERT INTO "condis" VALUES (21,'Seau 5L',0);
INSERT INTO "condis" VALUES (22,'Seau 10L',0);
INSERT INTO "condis" VALUES (23,'Seau 15L',0);
INSERT INTO "condis" VALUES (24,'Bidons 20L',0);
INSERT INTO "condis" VALUES (25,'Bagette',0);
INSERT INTO "condis" VALUES (26,'Plat',0);
INSERT INTO "condis" VALUES (27,'F ',0);
INSERT INTO "condis" VALUES (28,'Boite',0);
INSERT INTO "condis" VALUES (29,'Heure',0);
INSERT INTO "condis" VALUES (30,'aucun',0);
INSERT INTO "condis" VALUES (31,'Conso',0);
INSERT INTO "condis" VALUES (32,'Boule',0);
INSERT INTO "condis" VALUES (33,'ALVEOLS',0);
INSERT INTO "condis" VALUES (34,'portion',0);
INSERT INTO "categorie" VALUES (1,1,'CHAMBRES',0.0,1.0,0.0,0);
INSERT INTO "categorie" VALUES (2,3,'BOISSONS',1.0,1.0,1.0,0);
INSERT INTO "categorie" VALUES (3,7,'CHARGES FIXE',1.0,0.0,0.0,0);
INSERT INTO "categorie" VALUES (4,7,'CHARGES VARIABLES',1.0,0.0,0.0,0);
INSERT INTO "categorie" VALUES (5,5,'CIGARETTE',1.0,1.0,1.0,0);
INSERT INTO "categorie" VALUES (6,2,'REFFECTOIRE',1.0,1.0,1.0,0);
INSERT INTO "categorie" VALUES (7,1,'MATÃ‰RIELS  AUBERGE',1.0,0.0,0.0,0);
INSERT INTO "categorie" VALUES (8,2,'CHARGE RESTAURANT',1.0,0.0,0.0,0);
INSERT INTO "categorie" VALUES (9,2,'PLATS VENDU',0.0,1.0,0.0,0);
INSERT INTO "categorie" VALUES (10,7,'ADMINISTRATION ',1.0,0.0,0.0,0);
INSERT INTO "categorie" VALUES (11,3,'CHARGES BAR',1.0,0.0,0.0,0);
INSERT INTO "categorie" VALUES (12,2,'FOURNITURES RESTAURANT',1.0,0.0,1.0,0);
INSERT INTO "categorie" VALUES (13,7,'VERSEMENTS M. LW',1.0,0.0,0.0,0);
CREATE VIEW v_select_produit_recu   AS  select  v_produit . IDP  AS  IDP , v_produit . IDC  AS  IDC , v_produit . ID_CAT  AS  ID_CAT , v_produit . DESI  AS  DESI , v_produit . PHOTO  AS  PHOTO , v_produit . PRIXA  AS  PRIXA , v_produit . PRIXV  AS  PRIXV , v_produit . QNT  AS  QNT , v_produit . COMPOSER  AS  COMPOSER , v_produit . FTECH  AS  FTECH , v_produit . FLAG  AS  FLAG , v_produit . IDFA  AS  IDFA , v_produit . NOM_CAT  AS  NOM_CAT , v_produit . ACHAT  AS  ACHAT , v_produit . VENTE  AS  VENTE , v_produit . COMPT  AS  COMPT , v_produit . NOMF  AS  NOMF , v_produit . COLOR  AS  COLOR , v_produit . NOMC  AS  NOMC  from  v_produit  where (( v_produit . ACHAT  = 1) and ( v_produit . VENTE  = 1) and ( v_produit . FLAG  = 0)) order by  v_produit . DESI;
CREATE VIEW v_select_produit_facture   AS  select  v_produit . IDP  AS  IDP , v_produit . IDC  AS  IDC , v_produit . ID_CAT  AS  ID_CAT , v_produit . DESI  AS  DESI , v_produit . PHOTO  AS  PHOTO , v_produit . PRIXA  AS  PRIXA , v_produit . PRIXV  AS  PRIXV , v_produit . QNT  AS  QNT , v_produit . COMPOSER  AS  COMPOSER , v_produit . FTECH  AS  FTECH , v_produit . FLAG  AS  FLAG , v_produit . IDFA  AS  IDFA , v_produit . NOM_CAT  AS  NOM_CAT , v_produit . ACHAT  AS  ACHAT , v_produit . VENTE  AS  VENTE , v_produit . COMPT  AS  COMPT , v_produit . NOMF  AS  NOMF , v_produit . COLOR  AS  COLOR , v_produit . NOMC  AS  NOMC  from  v_produit  where (( v_produit . VENTE  = 1) and ( v_produit . ACHAT  = 1) and ( v_produit . COMPT  = 1) and ( v_produit . FLAG  = 0) and ( v_produit . QNT  > 0)) order by  v_produit . DESI;
CREATE VIEW v_select_produit_comptabiliser   AS  select  v_produit . IDP  AS  IDP , v_produit . IDC  AS  IDC , v_produit . ID_CAT  AS  ID_CAT , v_produit . DESI  AS  DESI , v_produit . PHOTO  AS  PHOTO , v_produit . PRIXA  AS  PRIXA , v_produit . PRIXV  AS  PRIXV , v_produit . QNT  AS  QNT , v_produit . COMPOSER  AS  COMPOSER , v_produit . FTECH  AS  FTECH , v_produit . FLAG  AS  FLAG , v_produit . IDFA  AS  IDFA , v_produit . NOM_CAT  AS  NOM_CAT , v_produit . ACHAT  AS  ACHAT , v_produit . VENTE  AS  VENTE , v_produit . COMPT  AS  COMPT , v_produit . NOMF  AS  NOMF , v_produit . COLOR  AS  COLOR , v_produit . NOMC  AS  NOMC  from  v_produit  where (( v_produit . VENTE  = 1) and ( v_produit . ACHAT  = 0) and ( v_produit . COMPT  = 1) and ( v_produit . FLAG  = 0) and ( v_produit . QNT  > 0)) order by  v_produit . DESI;
CREATE VIEW v_select_produit_composer   AS  select  v_produit . IDP  AS  IDP , v_produit . IDC  AS  IDC , v_produit . ID_CAT  AS  ID_CAT , v_produit . DESI  AS  DESI , v_produit . PHOTO  AS  PHOTO , v_produit . PRIXA  AS  PRIXA , v_produit . PRIXV  AS  PRIXV , v_produit . QNT  AS  QNT , v_produit . COMPOSER  AS  COMPOSER , v_produit . FTECH  AS  FTECH , v_produit . FLAG  AS  FLAG , v_produit . IDFA  AS  IDFA , v_produit . NOM_CAT  AS  NOM_CAT , v_produit . ACHAT  AS  ACHAT , v_produit . VENTE  AS  VENTE , v_produit . COMPT  AS  COMPT , v_produit . NOMF  AS  NOMF , v_produit . COLOR  AS  COLOR , v_produit . NOMC  AS  NOMC  from  v_produit  where (( v_produit . VENTE  = 1) and ( v_produit . ACHAT  = 0) and ( v_produit . COMPT  = 0) and ( v_produit . FLAG  = 0) and ( v_produit . QNT  > 0)) order by  v_produit . DESI;
CREATE VIEW v_select_produit_charge   AS  select  v_produit . IDP  AS  IDP , v_produit . IDC  AS  IDC , v_produit . ID_CAT  AS  ID_CAT , v_produit . DESI  AS  DESI , v_produit . PHOTO  AS  PHOTO , v_produit . PRIXA  AS  PRIXA , v_produit . PRIXV  AS  PRIXV , v_produit . QNT  AS  QNT , v_produit . COMPOSER  AS  COMPOSER , v_produit . FTECH  AS  FTECH , v_produit . FLAG  AS  FLAG , v_produit . IDFA  AS  IDFA , v_produit . NOM_CAT  AS  NOM_CAT , v_produit . ACHAT  AS  ACHAT , v_produit . VENTE  AS  VENTE , v_produit . COMPT  AS  COMPT , v_produit . NOMF  AS  NOMF , v_produit . COLOR  AS  COLOR , v_produit . NOMC  AS  NOMC  from  v_produit  where (( v_produit . ACHAT  = 1) and ( v_produit . VENTE  = 0) and ( v_produit . COMPT  = 0) and ( v_produit . FLAG  = 0)) order by  v_produit . DESI;
CREATE VIEW v_produit_cmp   AS  select  pc . idpcmp  AS  idpcmp , pc . IDP  AS  IDP , pc . tabidp  AS  tabidp , pc . tabqnt  AS  tabqnt , pc . tabmts  AS  tabmts , pc . prv  AS  prv , p . IDC  AS  IDC , p . ID_CAT  AS  ID_CAT , p . DESI  AS  DESI , p . PHOTO  AS  PHOTO , p . PRIXA  AS  PRIXA , p . PRIXV  AS  PRIXV , p . QNT  AS  QNT , p . FTECH  AS  FTECH , p . FLAG  AS  FLAG , p . IDFA  AS  IDFA , p . NOM_CAT  AS  NOM_CAT , p . ACHAT  AS  ACHAT , p . VENTE  AS  VENTE , p . COMPT  AS  COMPT , p . NOMF  AS  NOMF , p . COLOR  AS  COLOR , p . NOMC  AS  NOMC  from ( produit_cmp   pc  join  v_produit   p  on(( p . IDP  =  pc . IDP )));
CREATE VIEW v_produit   AS  select  p . IDP  AS  IDP , p . IDC  AS  IDC , p . ID_CAT  AS  ID_CAT , p . DESI  AS  DESI , p . PHOTO  AS  PHOTO , p . PRIXA  AS  PRIXA , p . PRIXV  AS  PRIXV , p . QNT  AS  QNT , p . COMPOSER  AS  COMPOSER , p . FTECH  AS  FTECH , p . FLAG  AS  FLAG , c . IDFA  AS  IDFA , c . NOM_CAT  AS  NOM_CAT , c . ACHAT  AS  ACHAT , c . VENTE  AS  VENTE , c . COMPT  AS  COMPT , c . DESI  AS  NOMF , c . COLOR  AS  COLOR , cnd . NOMC  AS  NOMC  from (( produit   p  left join  v_categorie   c  on(( c . ID_CAT  =  p . ID_CAT ))) left join  condis   cnd  on(( cnd . IDC  =  p . IDC )));
CREATE VIEW v_prd_details   AS  select  c . IDC  AS  idc , c . NOMC  AS  nomc , p . DESI  AS  desi , p . PHOTO  AS  img , p . IDP  AS  idp , p . IDC  AS  idcp , p . PRIXA  AS  pxa , p . PRIXV  AS  pxv , p . QNT  AS  qnt , p . FLAG  AS  flag , ct . ID_CAT  AS  idcat , ct . IDFA  AS  idfam , ct . NOM_CAT  AS  nomcat , ct . ACHAT  AS  achat , ct . VENTE  AS  vente , ct . COMPT  AS  COMPT , f . IDFA  AS  idfa , f . DESI  AS  fdesi , f . COLOR  AS  COLOR  from ((( produit   p  join  condis   c  on(( c . IDC  =  p . IDC ))) join  categorie   ct  on(( p . ID_CAT  =  ct . ID_CAT ))) join  famille   f  on(( ct . IDFA  =  f . IDFA )));
CREATE VIEW v_grp_etat_compte   AS  select  e . IDE  AS  IDE , e . IDFA  AS  IDFA , e . IDMOUV  AS  IDMOUV , e . DEPENSE  AS  DEPENSE , e . GAINS  AS  GAINS , e . STOCK  AS  STOCK , e . DATEE  AS  DATEE , f . DESI  AS  DESI  from ( etat_compte   e  join  famille   f  on(( f . IDFA  =  e . IDFA )));
CREATE VIEW v_facture   AS  select  f . IDF  AS  IDF , f . IDMV  AS  IDMV , f . IDP  AS  IDP , f . PU  AS  PU , f . QNT  AS  QNT , f . MTS  AS  MTS , f . ROW  AS  ROW , f . FDESI  AS  FDESI , f . FCONDIS  AS  FCONDIS , m . NOMMV  AS  NOMMV , m . DATE_DEL  AS  DATE_DEL , p . IDC  AS  IDC , p . ID_CAT  AS  ID_CAT , p . DESI  AS  DESI , p . PHOTO  AS  PHOTO , p . PRIXA  AS  PRIXA , p . PRIXV  AS  PRIXV , p . QNT  AS  QNTSTK , p . COMPOSER  AS  COMPOSER , p . FTECH  AS  FTECH , p . FLAG  AS  FLAG , p . IDFA  AS  IDFA , p . NOM_CAT  AS  NOM_CAT , p . ACHAT  AS  ACHAT , p . VENTE  AS  VENTE , p . COMPT  AS  COMPT , p . NOMF  AS  NOMF , p . COLOR  AS  COLOR , p . NOMC  AS  NOMC  from (( facture   f  join  mouvement   m  on(( m . IDMV  =  f . IDMV ))) left join  v_produit   p  on(( p . IDP  =  f . IDP )));
CREATE VIEW v_categorie   AS  select  c . ID_CAT  AS  ID_CAT , c . IDFA  AS  IDFA , c . NOM_CAT  AS  NOM_CAT , c . ACHAT  AS  ACHAT , c . VENTE  AS  VENTE , c . COMPT  AS  COMPT , c . flag  AS  flag , f . DESI  AS  DESI , f . COLOR  AS  COLOR  from ( categorie   c  join  famille   f  on(( f . IDFA  =  c . IDFA )));
COMMIT;
