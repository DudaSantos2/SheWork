create
database shework;
use
shework;

create table servicos
(
    id        int primary key auto_increment,
    descricao varchar(255)
);

create table users
(
    id             int primary key auto_increment,
    email          varchar(250) unique not null,
    password       varchar(250)        not null,
    name           varchar(100)        not null,
    phone          varchar(100)        not null,
    cep            varchar(10),
    isCollaborator bit                 not null default 0,
    id_servico     int,
    avatar         longblob,
    FOREIGN KEY (id_servico) REFERENCES servicos (id)
);

create table requests
(
    id             int primary key auto_increment,
    id_usuario     int,
    id_colaborador int,
    descricao      text,
    foreign key (id_usuario) references users (id),
    foreign key (id_colaborador) references users (id)
);