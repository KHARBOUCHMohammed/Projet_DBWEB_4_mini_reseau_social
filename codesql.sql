START TRANSACTION;
SET standard_conforming_strings=off;
SET escape_string_warning=off;
SET CONSTRAINTS ALL DEFERRED;


CREATE TABLE utilisateurs (
 id SERIAL ,
 pseudo VARCHAR(45) NULL ,
 naissance INT	NULL , 
 PRIMARY KEY (id) );

CREATE TABLE categories (
 id SERIAL ,
 categorie VARCHAR(45) NULL ,
 PRIMARY KEY (id) );

CREATE TABLE publications (
 id SERIAL ,
 contenu VARCHAR(250) NULL ,
 auteur INT NULL ,
 categorie INT NULL , 
 PRIMARY KEY (id) ,
 CONSTRAINT utilisateurs
 FOREIGN KEY (auteur)
 REFERENCES utilisateurs (id)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION,
 CONSTRAINT categories
 FOREIGN KEY (categorie)
 REFERENCES categories (id)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION);

CREATE TABLE votes (
 id SERIAL ,
 utilisateur INT NULL ,
 publication INT NULL , 
 PRIMARY KEY (id) ,
 CONSTRAINT utilisateurs
 FOREIGN KEY (utilisateur)
 REFERENCES utilisateurs (id)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION,
 CONSTRAINT publications
 FOREIGN KEY (publication)
 REFERENCES publications (id)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION);


INSERT INTO utilisateurs (pseudo, naissance)
 VALUES
 ('Rebecca', 1985),
 ('Thomas', 2001),
 ('news24', 1978),
 ('Dupont', 1967),
 ('tom', 1983),
 ('mimi', 1974),
 ('manon', 1988),
 ('infoSport', 2000),
 ('samy', 1992),
 ('Robert', 1959), 
 ('bob', 1996),
 ('Lise', 1973);

INSERT INTO categories (categorie) 
 VALUES 
 ('divers'),
 ('news'),
 ('sport'),
 ('citation');

INSERT INTO publications (contenu, auteur, categorie)
 VALUES
 ('Exige beaucoup de toi-même et attends peu des autres', 10, 4),
 ('Le savoir est la seule matière qui s’accroît quand on la partage.', 10, 4),
 ('Le bonheur nest davoir tout ce que lon désire, mais dapprécier que lon a.', 10, 4),
 ('La beauté est dans le regard de celui qui regarde', 10, 4),
 ('Bonne année à tous', 10, 1),
 ('un nouveau confinement !!!', 10, 1),
 ('Tout le monde est un génie. Mais si on juge un poisson sur ses capacités à grimper aux arbres, il passera sa vie à croire quil est stupide', 4, 4),
 ('soit on gagne soit on apprends, mais on ne perd jamais !', 4, 4),
 ('Bonne année !', 4, 1),
 ('mobilisation pour soutenir les travailleurs migrant du Qatar', 4, 3),
 ('Salut tout le monde', 7, 1),
 ('enfin le beau temp', 7, 1),
 ('vives les vacances', 7, 1),
 ('Bonne année les amis', 7, 1),
 ('pas envie de bosser', 7, 1),
 ('La vie cest des étapes.', 7, 4),
 ('Léchec est seulement lopportunité de recommencer dune façon plus intelligente', 7, 4),
 ('augmentation des cas de covid en france', 3, 2),
 ('début de la vaccination', 3, 2),
 ('des livraisons importantes de vaccins la semaine prochaine en France', 3, 2),
 ('Le Cac 40 a retrouvé quelques forces en fin de semaine', 3, 2),
 ('LE CIEL AMÉRICAIN ILLUMINÉ PAR DES DÉBRIS DUNE FUSÉE SPACEX', 3, 2),
 ('Le Tour de France partira d’Espagne en 2023', 8, 3),
 ('Clermont s’impose au Stade Français', 8, 3),
 ('Douche écossaise pour les Bleus', 8, 3),
 ('Bonne année', 8, 1),
 ('confiné', 9, 1),
 ('Coronavirus en France : la situation est grave', 9, 2),
 ('allez les bleus', 9, 3),
 ('do what you like and like what you do', 9, 4);

INSERT INTO votes (utilisateur, publication) 
 VALUES 
 (1,5), (1,9), (1,11),  (1,17),  (1,28),  (1,14), 
 (2,5), (2,9), (3,11),  (4,17),  (5,28),  (8,14), 
 (3,5), (4,9), (9,11),  (9,17),  (11,28),  (7,14), (4,5), (6,5), (7,5), (9,5), (9,2), (1,2), (3,2), (6,2), (7,2), (2,18), (5,16), (5,17), (2,19), (4,19), (5,19), (6,19), (7,19), (1,19), (10,19);

COMMIT;

