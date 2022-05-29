create database homework1;

use homework;

CREATE TABLE utenti (
    id integer primary key auto_increment,
    nickname varchar(16) not null unique,
    nome varchar(255) not null,
    cognome varchar(255) not null,
    email varchar(255) not null,
    password varchar(255) not null,
    url varchar(255)
    
) Engine = InnoDB;


CREATE TABLE post(
nickname varchar(16) not null,
foto varchar(255),
foreign key (nickname) references utenti(nickname) on delete cascade on update cascade
) Engine=InnoDB;







