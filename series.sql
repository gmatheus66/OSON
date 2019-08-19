drop database if exists pep20192series;
create database if not exists pep20192series;

use pep20192series;

-- UP
create table users (
    id          int primary key auto_increment,
    name        varchar(255),
    email       varchar(255),
    password    varchar(255),
    cpf         varchar(11),
    username    varchar(100)
);

create table series (
    id       int primary key auto_increment,
    name     varchar(255),
    genre    varchar(255),
    seasons  int,
    synopsis text,
    age_range int,
    lauch_year int,
    main_cast varchar(255)
);

create table users_series (
    user_id         int,
    serie_id        int,
    current_season  boolean,
    current_episode int,
    completed       boolean,
    note_serie    double,
    primary key (user_id, serie_id),
    foreign key (user_id) references users(id),
    foreign key (serie_id) references series(id)
);

-- ENDUP

create user if not exists pep20192 identified by 'pep20192';
grant all privileges on pep20192series.* to pep20192;

-- SEED
insert into users (name, username, email, password, cpf) values
    ('Tony Stark', 'Homem de Ferro', 'tony@stark.co', 'pepper',12345678900),
    ('Bruce Banner', 'Hulk', 'bruce@avengers.com', 'natasha',12345678900),
    ('Bruce Wayne', 'Batman', 'bruce@wayne.tech', 'alfred',12345678900);

insert into series (name, genre, seasons, synopsis, age_range, lauch_year, main_cast) values
    ('The Big Bang Theory', 'Comedy', 12, '...',15,2018,'dsadsdsa'),
    ('Supernatural', 'Terror', 14, '...',14,2017,'dsadsa'),
    ('Breaking Bad', 'Drama', 5, '...',20, 1997,'dsadsa'),
    ('La Casa de Papel', 'Police',  2, '...',18,2000,'sadsad');

insert into users_series (user_id, serie_id, current_season, current_episode,note_serie) values
    (1, 1, 1, 1,6),
    (1, 2, 2, 4,5),
    (1, 3, 1, 8,9),
    (2, 2, 10, 2,4),
    (2, 3, 8, 3,4),
    (3, 4, 1, 2,8),
    (3, 2, 1, 2,9),
    (3, 4, 1, 3,6);
-- ENDSEED