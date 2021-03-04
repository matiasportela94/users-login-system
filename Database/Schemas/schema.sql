CREATE DATABASE if not exists log_in_system;

USE log_in_system;

CREATE TABLE if not exists members
(
	id INT unsigned NOT NULL auto_increment,
    dni INT unsigned NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    enabled BOOLEAN NOT NULL,
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