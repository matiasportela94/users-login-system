CREATE DATABASE if not exists GYMBOX2;

USE GYMBOX2;

CREATE TABLE if not exists admins
(
	id INT unsigned NOT NULL auto_increment ,
    dni INT unsigned NOT NULL ,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    enabled BOOLEAN NOT NULL,
    constraint pk_members primary key (id),
    constraint unq_emailAdmin UNIQUE (email),
    constraint unq_dniAdmin UNIQUE (dni)

)Engine=InnoDB;

CREATE TABLE if not exists members
(
	id INT unsigned NOT NULL auto_increment,
    dni INT unsigned NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    enabled BOOLEAN NOT NULL,
    membershipId INT unsigned NOT NULL,
    lastUpdate date NOT NULL,
    constraint pk_members primary key (id),
    constraint unq_emailMember UNIQUE (email),
    constraint unq_dniMember UNIQUE (dni)
)Engine=InnoDB;

CREATE TABLE if not exists resetPassword
(
	id INT unsigned NOT NULL auto_increment,
    email VARCHAR(100) NOT NULL,
    token VARCHAR(255) NOT NULL,
    constraint pk_resetPassword primary key (id)	
)Engine=InnoDB;

alter table members AUTO_INCREMENT=100000;
alter table members AUTO_INCREMENT=1000;
