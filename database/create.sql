drop table if exists person;
drop table if exists account;

create table person(
    ID integer primary key,
    personName text(20) not null,
    personAge integer not null,
)

create table account(
    ID integer,
    personID integer references person,
    passW text(20) not null,
    email text(20) not null,
    username text(20) not null,
    phoneNumber text(9),
    primary key(ID, personID),
)