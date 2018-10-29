drop table if exists person;
drop table if exists account;

create table Person(
    personID integer primary key,
    personName text(20) not null,
    personAge integer not null
);

create table Account(
    accountID integer primary key,
    personID integer references person,
    passW text(30) not null,
    email text(40) not null unique,
    username text(20) not null unique
);

create table Post(
    postID integer primary key,
    accountID integer references account,
    photo text(100),
    description text(200)
);

create table Comment(
    commentID integer primary key,
    postID integer references post,
    accountID integer references account,
    commentText text not null
);