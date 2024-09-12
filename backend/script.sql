create database shework;
use shework;

create table users(
  id int primary key auto_increment,
  email varchar(250) not null,
  password varchar(250) not null,
  name varchar(100) not null,
  phone varchar(100) not null,
  cep varchar(10),
  isCollaborator bit not null default 0
);