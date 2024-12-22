create database novalighting;
use novalighting;
create table fixture_images
(
    idfixture varchar(50),
    idimage   varchar(50)
);
create table images
(
    idimage varchar(50),
    url     varchar(200),
    primary key (idimage)
);
create table fixtures
(
    idfixture varchar(20),
    name      varchar(50),
    info      varchar(500),
    primary key (idfixture)
);
create table posts
(
    idpost int not null auto_increment,
    name varchar(200),
    body varchar(1000),
    primary key (idpost)
);
create table users
(
    userid int not null auto_increment,
    username  varchar(45) not null,
    email  varchar(45) not null,
    password  varchar(45) not null,
    primary key (userid),
    unique key id_UNIQUE  (userid)
);