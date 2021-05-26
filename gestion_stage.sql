create database if not exists gestionambroise;
use gestionambroise;
create table filiere{
idfiliere int(4) auto_increment primary key,
nomfilier varchar(50),
niveau varchar(50)
};

create table statgiaire{
idstagiaire int(4) auto_increment primary key,
nom varchar(50),
prenom varchar(50),
civilite varchar(1),
photo varchar(100),
idfiliere int(4)
};

create table utilisateur{
iduser int(4) auto_increment primary key,
login varchar(50),
email varchar(255),
role varchar(50),
etat varchar(1),
pwd varchar(255)
};

Alter table stagiaire add constraint foreign key(idfiliere) references filiere(idfiliere);
