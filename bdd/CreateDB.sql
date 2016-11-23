create database if not exists mybetapplicationDB;

use mybetapplicationDB;

ALTER SCHEMA 'MYP'  DEFAULT CHARACTER SET utf8 ;

#Contient la liste des membres du site
CREATE TABLE IF NOT EXISTS Membres
(id int unsigned not null auto_increment primary key,
login varchar(250),
mdp varchar(250),
mail varchar(250)
);


#Contient la liste de tous les matchs 
CREATE TABLE IF NOT EXISTS Matchs
(id int unsigned not null auto_increment primary key,
matchDate varchar(250),
localTeam varchar(20),
localTeamGoal int,
awayTeam varchar(20),
awayTeamGoal int
);

CREATE TABLE IF NOT EXISTS Cote
(id int unsigned not null auto_increment primary key
team1 varchar(20);
team1Cote float,
team2 varchar(20),
team2Cote float,
matchNulCote float
);
