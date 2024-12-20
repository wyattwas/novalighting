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
insert into fixtures
values ('1549sd64w846', 'Fixture 1', 'something something something'),
       ('df4d54g56451', 'Fixture 2', 'something something something'),
       ('184fg155485r', 'Fixture 3', 'something something something'),
       ('fg457r8478r8', 'Fixture 4', 'something something something');
insert into images
values ('s2d545ef1121', 'https://c8.alamy.com/comp/2T8D0Y1/led-stage-lighting-fixtures-at-the-show-2T8D0Y1.jpg'),
       ('21554e8f88e4', 'https://i.pinimg.com/originals/b3/b7/19/b3b71915972711fb329e07672e2095c5.jpg'),
       ('s4d48e4fe5e4',
        'https://thumbs.dreamstime.com/z/professional-stage-light-fixtures-hanged-truss-party-show-set-up-rehearsal-sound-check-218241510.jpg');
insert into fixture_images
values ('1549sd64w846', 's2d545ef1121'),
       ('1549sd64w846', '21554e8f88e4'),
       ('1549sd64w846', 's4d48e4fe5e4'),
       ('df4d54g56451', 's2d545ef1121'),
       ('df4d54g56451', '21554e8f88e4'),
       ('df4d54g56451', 's4d48e4fe5e4'),
       ('184fg155485r', 's2d545ef1121'),
       ('184fg155485r', '21554e8f88e4'),
       ('184fg155485r', 's4d48e4fe5e4');